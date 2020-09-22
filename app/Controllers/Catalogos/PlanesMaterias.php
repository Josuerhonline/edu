<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PlanMateriaModelView;
use App\Models\Catalogos\PlanMateriaModel;
use App\Models\Catalogos\CargaAcademicaModel;
use App\Models\Catalogos\PlanesModel;
use App\Models\Catalogos\MateriasModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;
use SoapClient;
use SoapFault;

class PlanesMaterias extends BaseController{
  public function index(){
    $planMateria = new PlanMateriaModelView();
    $data = [
      'planMateria' => $planMateria->asObject()
      ->select('view_planmateria.*')
      ->findAll()
    ];
    $this->_loadDefaultView('Planes Materia',$data,'index');
  }

  public function new(){
    $plan       = new PlanesModel();
    $materias   = new PlanesModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Trasladar plan materia',['validation'=>$validation,'plan' => $plan->asObject()->findAll()],'new');
  }
  
  public function trasladar(){
    helper("Bitacora");
    $planMateria = new PlanMateriaModelView();
    $planMat     = new PlanMateriaModel();
    $materias    = new MateriasModel();
    $planId      = $this->request->getPost('planId');

    date_default_timezone_set('America/El_Salvador');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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

    $clienteSOAP       = new SoapClient($urlWS, $params);//CONEXIÓN A WS
    $ultimoPlanMateria = $planMateria->where('planId',$planId)->orderBy('codMateria','desc')->first();

    try {
      $datosUsuario = [
        [
          "planId"        =>$planId,
          "ultimaMateria" =>$ultimoPlanMateria['codMateria'],
        ]
      ];

      // Convert Array to JSON String
      $dataJSON = json_encode($datosUsuario);

      $request  =  array(
        'dataplanmateria'  => $dataJSON
      );

      $response        = $clienteSOAP->trasladoPlanMateria($request); //LLAMADA A MÉTODO
      $responseToArray = (array)$response;
      $responseConvert = json_decode(base64_decode($responseToArray["responseplanmateria"]), true);

      if($responseConvert){
         //Insert
        foreach ($responseConvert as $key => $m) {
          $materiaId = $materias->select('materiaId')->where('codMateria',$m['codMateria'])->first();
          $planMat->insert([
           'planId'    =>$planId,
           'materiaId' =>$materiaId['materiaId'],
          ]);
        }
        
        insert_acciones('TRASLADÓ','PLANES MATERIAS | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
        return redirect()->to('/Catalogos/PlanesMaterias')->with('message', 'Traslado de planes materias realizado con éxito.');
      }else{
        insert_acciones('TRASLADÓ','ACTUALIZÓ CATÁLOGO PLANES MATERIAS | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
        return redirect()->to("/Catalogos/PlanesMaterias")->with('message','El catálogo está actualizado.');
      }
    } catch (SoapFault $e) {
      print_r($clienteSOAP->__getLastResponse());
    } 
  }

  public function edit($id = null){
    $planMateria = new PlanMateriaModelView;
    $planes      = new PlanesModel();
    $materias    = new MateriasModel();

    if ($planMateria->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar Plan materia',
      ['validation'=>$validation,'planMateria'=> $planMateria->asObject()->find($id),'plan' => $planes->asObject()->where('estado','1')->findAll(),'materia' => $materias->asObject()->findAll()],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $planMateria = new PlanMateriaModel;

    if ($planMateria->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    } 

    $mat                = $this->request->getPost('materiaId');
    $plan               = $this->request->getPost('planId');
    $buscarPlanMateria  = $planMateria->select('materiaId','planId')->where('materiaId',$mat)->where('planId',$plan)->where('planMateriaId',$id)->first();
    $buscarPlanMateria1 = $planMateria->select('materiaId','planId')->where('materiaId',$mat)->where('planId',$plan)->first();

    if ($buscarPlanMateria) {
      $planMateria->update($id, [
        'materiaId' => $this->request->getPost('materiaId'),
        'planId'    => $this->request->getPost('planId'),
      ]);

      $valor1 = $this->request->getPost('materiaId');
      $valor2 = $this->request->getPost('planId');

      insert_acciones('ACTUALIZÓ','PLAN MATERIA | planMateriaId: '.$id." | materiaId: ".$valor1." | planId: ".$valor2);
      return redirect()->to('/Catalogos/PlanesMaterias')->with('message', 'Plan Materia editado con éxito.');
    }else if ($buscarPlanMateria1){
      return redirect()->to("/Catalogos/PlanesMaterias/edit/$id")->with('messageError','Lo sentimos, este plan materia ya existe');
      return redirect()->back()->withInput();
    }else{
      $planMateria->update($id, [
        'materiaId' => $this->request->getPost('materiaId'),
        'planId'    => $this->request->getPost('planId'),
      ]);

      $valor1 = $this->request->getPost('materiaId');
      $valor2 = $this->request->getPost('planId');

      insert_acciones('ACTUALIZÓ','PLAN MATERIA | planMateriaId: '.$id." | materiaId: ".$valor1." | planId: ".$valor2);
      return redirect()->to('/Catalogos/PlanesMaterias')->with('message', 'Plan Materia editado con éxito.');
    }
    
    return redirect()->back()->withInput();
  }

  public function delete($id = null){
   
    $planMateria       = new PlanMateriaModel;
    $cargaAcademica    = new CargaAcademicaModel();
    $buscarplanMateria = $cargaAcademica->select('planMateriaId')->where('planMateriaId',$id)->first();

    if ($buscarplanMateria) {
     return redirect()->to("/Catalogos/PlanesMaterias")->with('messageError','Lo sentimos, este Plan Materia tiene Cargas Académicas asociadas y no puede ser eliminada.');
    }    

 helper("Bitacora");
    $planMateria->delete($id);
    insert_acciones('ELIMINÓ','PLAN MATERIA | planMateriaId:'.$id);
    return redirect()->to('/Catalogos/PlanesMaterias')->with('message', 'Plan Materia eliminado con éxito.');
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/planMateria/$view",$data);
    echo view("dashboard/templates/footer");
  }
}