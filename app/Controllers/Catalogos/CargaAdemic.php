<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PersonaModel;
use App\Models\Catalogos\CargaAcademicaModel;
use App\Models\Catalogos\PlanMateriaModel;
use App\Models\Catalogos\PlanMateriaModelView;
use App\Models\Catalogos\UsuariosModel;
use App\Models\Catalogos\PlanesModel;
use App\Models\Catalogos\MateriasModel;
use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;
use SoapClient;
use SoapFault;

class CargaAdemic extends BaseController {
  public function index(){
    $cargaAcademica = new CargaAcademicaModel();
    $data = [
      'cargaAcademicas' => $cargaAcademica->asObject()
      ->select('cof_carga_academica.*, cof_personas.*,view_planmateria.*,cof_aper_ciclo.*')
      ->join('cof_aper_ciclo','cof_aper_ciclo.aperCicloId = cof_carga_academica.aperCicloId')
      ->join('cof_personas','cof_personas.personaId = cof_carga_academica.personaId')
      ->join('view_planmateria','view_planmateria.planMateriaId = cof_carga_academica.planMateriaId')
      ->findAll()
    ];

    $this->_loadDefaultView('Cargas Académicas',$data,'index');
  }

  public function new(){
    $ciclo      = new SeleccionarCicloModel();
    $materias   = new PlanesModel();
    $validation =  \Config\Services::validation();

    $this->_loadDefaultView('Trasladar Carga Académica',['validation'=>$validation,'ciclo' => $ciclo->asObject()->findAll()],'new');
  }

  public function trasladar(){
    helper("Bitacora");
    $ciclo          = new SeleccionarCicloModel();
    $materiaPlan    = new PlanMateriaModelView();
    $cargaAcademica = new CargaAcademicaModel();
    $persona        = new PersonaModel();
    ini_set('default_socket_timeout', 35);

    $urlWS = 'http://localhost/EduWS/directorioWSDL/eduWS.wsdl';

    //Opciones para SSL
    $opts = array(
      'ssl' => array(
        'verify_peer'       => false,
        'verify_peer_name'  => false,
        'allow_self_signed' => true
      )
    );

    // SOAP
    $params = array(
      'login'              => base64_encode('EDU_UCAD'),
      'password'           => base64_encode('PlataformaEvaluacionEDU2020$*'),
      'encoding'           => 'UTF-8',
      'verifypeer'         => false,
      'verifyhost'         => false,
      'Content-Type'       => 'text/xml',
      'trace'              => 1,
      'exceptions'         => 1,
      'connection_timeout' => 60,
      'stream_context'     => stream_context_create($opts)
    );

    $clienteSOAP = new SoapClient($urlWS, $params);//CONEXIÓN A WS

    //Datos del ciclo
    $aperCicloId = $this->request->getPost('aperCicloId');
    $cicloAnio   = $ciclo->where('aperCicloId',$aperCicloId)->first();

    try {
      $datosUsuario = [
        [
          "anio"      => $cicloAnio['anio'],
          "ciclo"     => $cicloAnio['ciclo'],
        ]
      ];

      // Convert Array to JSON String
      $dataJSON = json_encode($datosUsuario);

      $request  =  array(
        'datacargas'  => $dataJSON
      );

      $response        = $clienteSOAP->trasladoCargaAcademica($request); //LLAMADA A MÉTODO
      $responseToArray = (array)$response;
      $responseConvert = json_decode(base64_decode($responseToArray["responsecargas"]), true);

      if($responseConvert){
        $errorPlanMateria = 0;
        $errorPersona     = 0;

        foreach ($responseConvert as $key => $r) {
          $materiaId = $materiaPlan->where('codMateria',$r['codMateria'])->where('planId',$r['planId'])->first();
          $personaId = $persona->where('personaIdUonline',$r['personaIdUonline'])->first();

          if ($materiaId['planMateriaId'] == "") {
            $errorPlanMateria ++;
          }else if($personaId['personaId']== ""){
            $errorPersona++;
          }else{
            $verificarCarga = $cargaAcademica->where('personaId',$personaId['personaId'])->where('aperCicloId',$cicloAnio['aperCicloId'])->where('planMateriaId',$materiaId['planMateriaId'])->first();

            if($verificarCarga["cargaAcademicaId"] == ""){//VERIFICAR SI YA EXISTE EL REGISTO PARA NO DUPLICAR
              $cargaAcademica->insert([
               'planMateriaId' => $materiaId['planMateriaId'],
               'personaId'     => $personaId['personaId'],
               'aperCicloId'   => $cicloAnio['aperCicloId'],
               'estadoCarga'   => '1',
             ]);
            }
          }
        }

        if($errorPlanMateria!=0){
          insert_acciones('TRASLADÓ','CARGA ACADÉMICA | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
          return redirect()->to("/Catalogos/CargaAdemic")->with('messageError','No se trasladaron todos los registros, asegúrese de haber trasladado todos los Planes Materia.');
        }else if($errorPersona!=0){
          insert_acciones('TRASLADÓ','CARGA ACADÉMICA | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
          return redirect()->to("/Catalogos/CargaAdemic")->with('messageError','No se trasladaron todos los registros, asegúrese de que todos los docentes hayan activado su Usuario.');
        }else{
          insert_acciones('TRASLADÓ','CARGA ACADÉMICA | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
          return redirect()->to('/Catalogos/CargaAdemic')->with('message', 'Traslado de carga académica realizado con éxito.');
        }
      }else{
        if(base64_decode($responseToArray["responsecargas"])=='CICLO_INCORRECTO'){
          return redirect()->to("/Catalogos/CargaAdemic")->with('messageError','Ha ocurrido un problema, el ciclo seleccionado no existe en Uonline5.');
        }else{
          return redirect()->to("/Catalogos/CargaAdemic")->with('messageError','Ha ocurrido un problema, no existen registros para el ciclo seleccionado en Uonline5.');
        }
      }
    } catch (SoapFault $e) {
      print_r($clienteSOAP->__getLastResponse());
    } 
  }

  public function edit($id = null){
    $cargaAcademica = new CargaAcademicaModel();
    $persona        = new PersonaModel();
    $planMateria    = new PlanMateriaModelView();
    $ciclo          = new SeleccionarCicloModel();

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar Carga Académica',
      ['validation'=>$validation,'cargaAcademica'=> $cargaAcademica->asObject()->find($id),'personas' => $persona->asObject()->where('estado','1')->findAll(),'ciclo' => $ciclo->asObject()->where('estado','1')->findAll(),'planM' => $planMateria->asObject()->findAll() ],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $cargaAcademica = new CargaAcademicaModel();

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    } 

    $persona  = $this->request->getPost('personaId');
    $pmateria = $this->request->getPost('planMateria');
    $cic      = $this->request->getPost('ciclo');

    $buscarCarga = $cargaAcademica->select('personaId','planMateriaId','aperCicloId')->where('personaId',$persona)->where('planMateriaId',$pmateria)->where('aperCicloId',$cic)->where('cargaAcademicaId',$id)->first();

    $buscarCarga1 = $cargaAcademica->select('personaId','planMateriaId','aperCicloId')->where('personaId',$persona)->where('planMateriaId',$pmateria)->where('aperCicloId',$cic)->first();

    if ($buscarCarga) {
      $cargaAcademica->update($id, [
        'estadoCarga' =>$this->request->getPost('estado'),
      ]);
      
      $valor1 = $this->request->getPost('estado');
      insert_acciones('ACTUALIZÓ','CARGA ACADÉMICA | cargaAcademicaId: '.$id." | Estado: ".$valor1);
      return redirect()->to('/Catalogos/CargaAdemic')->with('message', 'Carga Académica editada con éxito.');
    }else if ($buscarCarga1) {
      return redirect()->to("/Catalogos/CargaAdemic/edit/$id")->with('messageError','Lo sentimos, esta carga académica ya existe.');
    }else{
      if($this->validate('cargaAcademica')){
        $cargaAcademica->update($id, [
          'personaId'     => $this->request->getPost('personaId'),
          'planMateriaId' => $this->request->getPost('planMateria'),
          'aperCicloId'   => $this->request->getPost('ciclo'),
          'estadoCarga'   => $this->request->getPost('estado'),
        ]);

        $valor1 = $this->request->getPost('personaId');
        $valor2 = $this->request->getPost('planMateria');
        $valor3 = $this->request->getPost('ciclo');
        $valor4 = $this->request->getPost('estado');

        insert_acciones('ACTUALIZÓ','CARGA ACADÉMICA | cargaAcademicaId: '.$id." | personaId: ".$valor1." | planMateria: ".$valor2." | Ciclo: ".$valor3." | Estado: ".$valor4);
        return redirect()->to('/Catalogos/CargaAdemic')->with('message', 'Carga Académica editada con éxito.');
      }
    }
    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    helper("Bitacora");
    $cargaAcademica    = new CargaAcademicaModel();
    $planMateria       = new PlanMateriaModel();
    $buscarplanMateria = $planMateria->select('planMateriaId')->where('planMateriaId',$id)->first();

    if ($buscarplanMateria) {
      return redirect()->to("/Catalogos/CargaAdemic")->with('messageError','Lo sentimos, Esta carga Académica tiene planes asociados y no puede ser eliminada.');
    }    

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $cargaAcademica->delete($id);
    insert_acciones('ELIMINÓ','CARGA ACADÉMICA | cargaAcademicaId:'.$id);
    return redirect()->to('/Catalogos/CargaAdemic')->with('message', 'Carga Académica eliminada con éxito.');
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/cargaAcademica/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
