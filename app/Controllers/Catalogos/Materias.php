<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\MateriasModel;
use App\Models\Catalogos\PlanMateriaModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;
use SoapClient;
use SoapFault;

class Materias extends BaseController {
  public function index(){
    $materias = new MateriasModel();

    $data = [
      'materias' => $materias->asObject()
      ->select('cof_materias.*')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de materias',$data,'index');
  }

  public function trasladar(){
    helper("Bitacora");
    $materias = new MateriasModel();
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

    $clienteSOAP   = new SoapClient($urlWS, $params);//CONEXIÓN A WS
    $ultimaMateria = $materias->select('codMateria')->orderBy('codMateria','desc')->first();
    
    try {
      $datosUsuario = [
        [
          "codMateria"        => $ultimaMateria['codMateria'],
        ]
      ];

      // Convert Array to JSON String
      $dataJSON = json_encode($datosUsuario);

      $request  =  array(
        'datamaterias'  => $dataJSON
      );

      $response        = $clienteSOAP->trasladoMaterias($request); //LLAMADA A MÉTODO
      $responseToArray = (array)$response;
      $responseConvert = json_decode(base64_decode($responseToArray["responsematerias"]), true);

      if($responseConvert){
         //Insert
        foreach ($responseConvert as $key => $m) {
          $materias->insert([
            'nombre'      =>$m['nombre'],
            'codMateria'  =>$m['codMateria'],
            'nombreCorto' =>$m['nombreCorto'],
            'estado'      =>'1',
          ]);
        }
        insert_acciones('TRASLADÓ','MATERIAS | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
        return redirect()->to('/Catalogos/Materias')->with('message', 'Traslado de materias realizado con éxito.');
      }else{
        insert_acciones('TRASLADÓ','ACTUALIZÓ CATÁLOGO MATERIAS | DESDE UONLINE5 A EDU (WEB SERVICE EDU)');
        return redirect()->to("/Catalogos/Materias")->with('message','El catálogo está actualizado.');
      }
    } catch (SoapFault $e) {
      print_r($clienteSOAP->__getLastResponse());
    } 
  }

  public function new(){
    $materias   = new MateriasModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear materia',['validation'=>$validation, 'materias'=> new MateriasModel()],'new');
  }

  public function create(){
    helper("Bitacora");
    $materias = new MateriasModel();

    if($this->validate('materia')){
      $id = $materias->insert([
        'nombre'      =>$this->request->getPost('nombre'),
        'codMateria'  =>$this->request->getPost('codMateria'),
        'nombreCorto' =>$this->request->getPost('nombreCorto'),
        'estado'      =>'1',
      ]);

      $valor1 = $this->request->getPost('nombre');
      $valor2 = $this->request->getPost('codMateria');
      $valor3 = $this->request->getPost('nombreCorto');

      insert_acciones('INSERTÓ','NUEVA MATERIA | Nombre: '.$valor1." | Código: ".$valor2." | Nombre Corto: ".$valor3);
      return redirect()->to('/Catalogos/materias')->with('message', 'Materia creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $materias = new MateriasModel();

    if ($materias->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar materia',
      ['validation'=>$validation,'materias'=> $materias->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $materias = new MateriasModel();

    if ($materias->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }

    $materiaE       = $this->request->getPost('nombre_editar');
    $nombreCortoE   = $this->request->getPost('nombreCorto_editar');
    $buscarMateria  = $materias->select('nombre','nombreCorto')->where('nombre',$materiaE)->where('nombreCorto',$nombreCortoE)->where('materiaId',$id)->first();
    $buscarMateria1 = $materias->select('nombre')->where('nombre',$materiaE)->where('materiaId',$id)->first();
    $buscarMateria2 = $materias->select('nombreCorto')->where('nombreCorto',$nombreCortoE)->where('materiaId',$id)->first();

    if ($buscarMateria) {
      $materias->update($id, [
        'codMateria' =>$this->request->getPost('codMateria_editar'),
        'estado'     =>$this->request->getPost('estado'),

      ]);

      $valor1 = $this->request->getPost('codMateria_editar');
      $valor2 = $this->request->getPost('estado');

      insert_acciones('ACTUALIZÓ','MATERIA | materiaId: '.$id." | Código: ".$valor1." | estado: ".$valor2);
      return redirect()->to('/Catalogos/materias')->with('message', 'Materia editada con éxito.');
    }else if ($buscarMateria1) {
      if($this->validate('materia_editar2')){
        $materias->update($id, [
          'codMateria'  =>$this->request->getPost('codMateria_editar'),
          'nombreCorto' =>$this->request->getPost('nombreCorto_editar'),
          'estado'      =>$this->request->getPost('estado'),
        ]);

        $valor1 = $this->request->getPost('codMateria_editar');
        $valor2 = $this->request->getPost('nombreCorto_editar');
        $valor3 = $this->request->getPost('estado');

        insert_acciones('ACTUALIZÓ','MATERIA | materiaId: '.$id." | Código: ".$valor1." | Nombre Corto: ".$valor2." | estado: ".$valor3);
        return redirect()->to('/Catalogos/materias')->with('message', 'Materia editada con éxito.');
      }
    }else if ($buscarMateria2) {
      if($this->validate('materia_editar1')){
        $materias->update($id, [
          'nombre'     =>$this->request->getPost('nombre_editar'),
          'codMateria' =>$this->request->getPost('codMateria_editar'),
          'estado'     =>$this->request->getPost('estado'),
        ]);

        $valor1 = $this->request->getPost('nombre_editar');
        $valor2 = $this->request->getPost('codMateria_editar');
        $valor3 = $this->request->getPost('estado');

        insert_acciones('ACTUALIZÓ','MATERIA | materiaId: '.$id." | Nombre: ".$valor1." | Código: ".$valor2." | estado: ".$valor3);
        return redirect()->to('/Catalogos/materias')->with('message', 'Materia editada con éxito.');
      }
    }else{
      if($this->validate('materia_editar')){
        $materias->update($id, [
          'nombre'      =>$this->request->getPost('nombre_editar'),
          'codMateria'  =>$this->request->getPost('codMateria_editar'),
          'nombreCorto' =>$this->request->getPost('nombreCorto_editar'),
          'estado'      =>$this->request->getPost('estado'),
        ]);

        $valor1 = $this->request->getPost('nombre_editar');
        $valor2 = $this->request->getPost('codMateria_editar');
        $valor3 = $this->request->getPost('nombreCorto_editar');
        $valor4 = $this->request->getPost('estado');

        insert_acciones('ACTUALIZÓ','MATERIA | materiaId: '.$id." | Nombre: ".$valor1." | Código: ".$valor2." | Nombre corto: ".$valor3." | estado: ".$valor4);
        return redirect()->to('/Catalogos/materias')->with('message', 'Materia editada con éxito.');
      }
    }
    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    helper("Bitacora");
    $materias          = new MateriasModel();
    $planMateria       = new PlanMateriaModel();
    $buscarplanMateria = $planMateria->select('materiaId')->where('materiaId',$id)->first();

    if ($buscarplanMateria) {
      return redirect()->to("/Catalogos/materias")->with('messageError','Lo sentimos, la materia está asociada a un plan de materias y no puede ser eliminada.');
    }

    if ($materias->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $materias->delete($id);
    insert_acciones('ELIMINÓ','MATERIA | materiaId:'.$id);
    return redirect()->to('/Catalogos/materias')->with('message', 'Materia eliminada con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/materias/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
