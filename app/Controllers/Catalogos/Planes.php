<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PlanesModel;
use App\Models\Catalogos\CarrerasModel;
use App\Models\Catalogos\PlanMateriaModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;
use SoapClient;
use SoapFault;

class Planes extends BaseController {
  public function index(){
    $planes = new PlanesModel();

    $data = [
      'planes' => $planes->asObject()
      ->select('cof_planes.*, cof_carreras.carreraId as carreraId,cof_carreras.nombre as nombre')
      ->join('cof_carreras','cof_carreras.carreraId = cof_planes.carreraId')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de planes',$data,'index');
  }

  public function trasladar(){
    helper("Bitacora");
    date_default_timezone_set('America/El_Salvador');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    ini_set('default_socket_timeout', 35);

    $urlWS   = 'http://localhost/EduWS/directorioWSDL/eduWS.wsdl';
    $plan    = new PlanesModel();
    $carrera = new CarrerasModel();

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
    $ultimoPlan  = $plan->select('planId')->orderBy('planId','desc')->first();

    try {
      $datosUsuario = [
        [

          "pla_codigo" => $ultimoPlan['planId'],
        ]
      ];

      // Convert Array to JSON String
      $dataJSON = json_encode($datosUsuario);

      $request  =  array(
        'dataplanes'  => $dataJSON
      );

      $response        = $clienteSOAP->trasladoPlanes($request); //LLAMADA A MÉTODO
      $responseToArray = (array)$response;
      $responseConvert = json_decode(base64_decode($responseToArray["responseplanes"]), true);

      if($responseConvert){
        //Insert
        foreach ($responseConvert as $key => $p) {
           $plan->insert([
            'planId'     => $p['planId'],
            'carreraId'  => $p['carreraId'],
            'nombrePlan' => $p['nombrePlan'],
            'plaAcuerdo' => $p['plaAcuerdo'],
            'estado'     => '1',
          ]);
        }

        insert_acciones('TRASLADÓ','PLANES | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
        return redirect()->to('/Catalogos/planes')->with('message', 'Traslado de planes realizado con éxito.');
      }else{
        insert_acciones('TRASLADÓ','ACTUALIZÓ CATÁLOGO PLANES | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
        return redirect()->to("/Catalogos/planes")->with('message','El catálogo está actualizado.');
      }
    } catch (SoapFault $e) {
      print_r($clienteSOAP->__getLastResponse());
    }
  }

  public function new(){
    $plan    = new PlanesModel();
    $carrera = new CarrerasModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear plan',['validation'=>$validation, 'plan'=> new PlanesModel(),'carrera' => $carrera->asObject()->where('estado','1')->findAll()],'new');
  }
  
  public function create(){
    helper("Bitacora");
    $plan = new PlanesModel();

    if($this->validate('plan')){
      $id = $plan->insert([
        'carreraId'  =>$this->request->getPost('carreraId'),
        'nombrePlan' =>$this->request->getPost('plan'),
        'plaAcuerdo' =>$this->request->getPost('planAcuerdo'),
        'estado'     =>'1',
      ]);

      $valor1 = $this->request->getPost('carreraId');
      $valor2 = $this->request->getPost('plan');
      $valor3 = $this->request->getPost('planAcuerdo');

      insert_acciones('INSERTÓ','NUEVO PLAN | carreraId: '.$valor1." | Plan: ".$valor2." | Plan Acuerdo: ".$valor3);
      return redirect()->to('/Catalogos/planes')->with('message', 'Plan creado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $plan    = new PlanesModel();
    $carrera = new CarrerasModel();

    if ($plan->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();

    $this->_loadDefaultView('Actualizar plan',
      ['validation'=>$validation,'plan'=> $plan->asObject()->find($id),'carrera' => $carrera->asObject()->where('estado','1')->findAll() ],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $plan = new PlanesModel();

    if ($plan->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }

    $planE      = $this->request->getPost('plan_editar');
    $buscarPlan = $plan->select('nombrePlan')->where('nombrePlan',$planE)->where('planId',$id)->first();

    if ($buscarPlan) {
      $plan->update($id, [
        'carreraId'  =>$this->request->getPost('carreraId_editar'),
        'plaAcuerdo' =>$this->request->getPost('planAcuerdo_editar'),
        'estado'     =>$this->request->getPost('estado'),
      ]);

      $valor1 = $this->request->getPost('carreraId_editar');
      $valor2 = $this->request->getPost('planAcuerdo_editar');
      $valor3 = $this->request->getPost('estado');

      insert_acciones('ACTUALIZÓ','PLAN | planId: '.$id." | carreraId: ".$valor1." | planAcuerdo: ".$valor2." | estado: ".$valor3);
      return redirect()->to('/Catalogos/planes')->with('message', 'Plan editado con éxito.');
    }else if (!$buscarPlan) {
      if($this->validate('planEditar')){
        $plan->update($id, [
          'carreraId'  =>$this->request->getPost('carreraId_editar'),
          'nombrePlan' =>$this->request->getPost('plan_editar'),
          'plaAcuerdo' =>$this->request->getPost('planAcuerdo_editar'),
          'estado'     =>$this->request->getPost('estado'),

        ]);

        $valor1 = $this->request->getPost('carreraId_editar');
        $valor2 = $this->request->getPost('plan_editar');
        $valor3 = $this->request->getPost('planAcuerdo_editar');
        $valor4 = $this->request->getPost('estado');

        insert_acciones('ACTUALIZÓ','PLAN | planId: '.$id." | carreraId: ".$valor1." | Plan: ".$valor2." | planAcuerdo: ".$valor3." | estado: ".$valor4);
        return redirect()->to('/Catalogos/planes')->with('message', 'Plan editado con éxito.');
      }
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    helper("Bitacora");
    $plan          = new PlanesModel();
    $planMateria   = new PlanMateriaModel();
    $buscarCarrera = $planMateria->select('planId')->where('planId',$id)->first();

    if ($buscarCarrera) {
      return redirect()->to("/Catalogos/planes")->with('messageError','Lo sentimos, El plan tiene materias asociadas y no puede ser eliminado.');
    }

    if ($plan->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $plan->delete($id);
    insert_acciones('ELIMINÓ','PLAN | planId:'.$id);
    return redirect()->to('/Catalogos/planes')->with('message', 'Plan eliminado con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/planes/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
