<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\InscripcionModel;
use App\Models\CatalogosEvaluacion\InscripcionDetalleModel;
use App\Models\CatalogosEvaluacion\InscripcionViewModel;
use App\Models\Catalogos\PlanMateriaModelView;
use App\Models\Catalogos\PersonaModel;
use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;
use SoapClient;
use SoapFault;

class Inscripcion extends BaseController {
  public function index(){
    $inscripcionDetalle = new InscripcionViewModel();
    $data = [
      'inscripcionDetalle' => $inscripcionDetalle->asObject()
      ->select('view_inscripcion.*')
      ->findAll()
    ];

    $this->_loadDefaultView( 'Listado de inscripciones',$data,'index');
  }

  public function new(){
    $ciclo      = new SeleccionarCicloModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Trasladar inscripciones',['validation'=>$validation,'ciclo' => $ciclo->asObject()->findAll()],'new');
  }

  public function trasladar(){
    $ciclo              = new SeleccionarCicloModel();
    $materiaPlan        = new PlanMateriaModelView();
    $inscripcion        = new InscripcionModel();
    $inscripcionDetalle = new InscripcionDetalleModel();
    $persona            = new PersonaModel();
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
    $cicloAnio = $ciclo->where('aperCicloId',$aperCicloId)->first();

    // $ultimoCodigo = $cargaAcademica->where('aperCicloId',$aperCicloId)->orderBy('codigo','desc')->first();

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
        'datainscripciones'  => $dataJSON
      );

      $response        = $clienteSOAP->trasladoInscripciones($request); //LLAMADA A MÉTODO
      $responseToArray = (array)$response;
      $responseConvert = json_decode(base64_decode($responseToArray["responseinscripciones"]), true);

      if($responseConvert){
        $errorPlanMateria = 0;
        $errorPersona     = 0;

        foreach ($responseConvert as $key => $r) {
          $personaId = $persona->where('personaIdUonline',$r['personaIdUonline'])->first();

          if($personaId['personaId']==""){
            $errorPersona++;
          }else{
            $verificarInsc = $inscripcion->where('personaId',$personaId['personaId'])->where('aperCicloId',$cicloAnio['aperCicloId'])->first();

            $inscripcionId = 0;

            if($verificarInsc["inscripcionId"]==""){
              $inscripcion->insert([
                'personaId'        => $personaId['personaId'],
                'aperCicloId'      => $cicloAnio['aperCicloId'],
                'fechaInscripcion' => $r['fechaInscripcion'],  
                'estado'           => '1',
              ]);

              $selInsc       = $inscripcion->orderBy('inscripcionId','desc')->first();
              $inscripcionId = $selInsc['inscripcionId'];
            }else{
              $inscripcionId = $verificarInsc["inscripcionId"];
            }

            foreach ($r['detalleInscripcion'] as $key => $d) {
              $materiaId = $materiaPlan->where('codMateria',$d['codMateria'])->where('planId',$d['planId'])->first();

              if($materiaId['planMateriaId']==""){
                $errorPlanMateria++;
              }else{
                $verificarInscDet = $inscripcionDetalle->where('inscripcionId',$inscripcionId)->where('planMateriaId',$materiaId['planMateriaId'])->first();

                if($verificarInscDet["inscripcionDetalleId"]==""){
                  $inscripcionDetalle->insert([
                    'inscripcionId' => $inscripcionId,
                    'planMateriaId' => $materiaId['planMateriaId'],
                    'estado'        => '1',
                  ]);
                  helper("Bitacora");
                  insert_acciones('TRASLADÓ','INSCRIPCIONES | inscripcionId '.$inscripcionId.' | planMateriaId '.$materiaId['planMateriaId']);
                }else{}
              }
            }
          }
        }

        if($errorPlanMateria!=0){
          return redirect()->to("/CatalogosEvaluacion/Inscripcion")->with('messageError','No se trasladaron todos los registros, asegúrese de haber trasladado todos los Planes Materia.');
        }else if($errorPersona!=0){
          return redirect()->to("/CatalogosEvaluacion/Inscripcion")->with('messageError','No se trasladaron todos los registros, asegúrese de que todos los estudiantes hayan activado su Usuario.');
        }else{
          return redirect()->to('/CatalogosEvaluacion/Inscripcion')->with('message', 'Traslado de inscripciones realizado con éxito.');
        }
      }else{
        if(base64_decode($responseToArray["responseinscripciones"])=='CICLO_INCORRECTO'){
          return redirect()->to("/CatalogosEvaluacion/Inscripcion")->with('messageError','Ha ocurrido un problema, el ciclo seleccionado no existe en Uonline5.');
        }else{
          return redirect()->to("/CatalogosEvaluacion/Inscripcion")->with('messageError','Ha ocurrido un problema, no existen registros para el ciclo seleccionado en Uonline5.');
        }
      }
    } catch (SoapFault $e) {
      print_r($clienteSOAP->__getLastResponse());
    } 
  }

  public function edit($id = null){
    $inscripcion     = new InscripcionModel();
    $inscripcionView = new InscripcionViewModel();
    $planMateria     = new PlanMateriaModelView();
    $persona         = new PersonaModel();
    $ciclo           = new SeleccionarCicloModel();

    if ($inscripcionView->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  
$buscar = $inscripcionView->where('inscripcionDetalleId',$id)->first();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar inscripcion',
      ['validation'=>$validation,'inscripcion'=> $inscripcion->asObject()->find($buscar['inscripcionId']),'persona'=> $persona->asObject()->findAll(),'ciclo'=> $ciclo->asObject()->findAll(),'planMateria'=> $planMateria->asObject()->findAll(),'inscriDeta'=> $inscripcionView->asObject()->where('inscripcionDetalleId',$id)->first()],'edit');
  }

  public function update($id = null){
    $inscripcion        = new InscripcionModel();
    $inscripcionDetalle = new InscripcionDetalleModel();

    if ($inscripcion->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }

    // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
    $valor             = $this->request->getPost('persona');
    $buscarinscripcion = $inscripcion->select('personaId')->where('personaId',$valor)->where('inscripcionId',$id)->first();

    if ($buscarinscripcion) {
      if($this->validate('inscripcion')){
        $inscripcion->update($id, [
          'aperCicloId' =>$this->request->getPost('ciclo'),
          'fechaInscripcion' =>$this->request->getPost('fechaInscripcion'),
          'estado' =>$this->request->getPost('estado'),
        ]);
        $inscripcionDetalleId = $this->request->getPost('inscripcionDetalleId');
        $inscripcionDetalle->update($inscripcionDetalleId, [
          'inscripcionId' => $id,
          'planMateriaId' =>$this->request->getPost('planMateriaId'),
          'estado' =>$this->request->getPost('estado'),
        ]);
        helper("Bitacora");
        $valor1 = $this->request->getPost('planMateriaId');
        $valor2 = $this->request->getPost('estado');
        insert_acciones('EDITÓ','INSCRIPCIONES | inscripcionId '.$id.' | planMateriaId '.$valor1.' | estado '.$valor2);
        return redirect()->to('/CatalogosEvaluacion/Inscripcion')->with('message', 'Inscripción  editada con éxito.');
      }
    }else if(!$buscarinscripcion){
      if($this->validate('inscripcion_editar')){
        $inscripcion->update($id, [
          'personaId' =>$this->request->getPost('persona'),
          'aperCicloId' =>$this->request->getPost('ciclo'),
          'fechaInscripcion' =>$this->request->getPost('fechaInscripcion'),
          'estado' =>$this->request->getPost('estado'),
        ]);
        $inscripcionDetalleId = $this->request->getPost('inscripcionDetalleId');
        $inscripcionDetalle->update($inscripcionDetalleId, [
          'inscripcionId' => $id,
          'planMateriaId' =>$this->request->getPost('planMateriaId'),
          'estado' =>$this->request->getPost('estado'),
        ]);
        
        return redirect()->to('/CatalogosEvaluacion/Inscripcion')->with('message', 'Inscripción  editada con éxito.');
      }
    }
    
    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $inscripcion        = new InscripcionModel();
    $inscripcionDetalle = new InscripcionDetalleModel();

    if ($inscripcion->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  

    $inscripcionDetalle->where('inscripcionId',$id)->delete();
    $inscripcion->delete($id);
    helper("Bitacora");
    insert_acciones('ELIMINÓ','INSCRIPCIONES | inscripcionId '.$id);
    return redirect()->to('/CatalogosEvaluacion/Inscripcion')->with('message', 'Inscripción eliminada con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("CatalogosEvaluacion/Inscripcion/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
