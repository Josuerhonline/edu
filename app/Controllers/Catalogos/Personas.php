<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PersonaModel;
use App\Models\Catalogos\UsuariosModel;
use App\Models\Catalogos\CargaAcademicaModel;
use App\Models\CatalogosEvaluacion\InscripcionModel;

use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Personas extends BaseController {
  public function index(){
    $user = new PersonaModel();

    $data = [
      'personas' => $user->asObject()
      ->select('cof_personas.*')->findAll()
    ];
    $this->_loadDefaultView( 'Listado de personas',$data,'index');
  }

  public function new(){
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear persona',['validation'=>$validation],'new');
  }

  public function create(){
   $persona = new PersonaModel();

   if($this->validate('personaIns')){
    $id = $persona->insert([
      'DUI'             => $this->request->getPost('DUI'),
      'carnet'          => $this->request->getPost('carnet'),
      'nombres'         => $this->request->getPost('nombres'),
      'apellidos'       => $this->request->getPost('apellidos'),
      'tipoPersona'     => $this->request->getPost('tipoPersona'),
      'estadoCivil'     => $this->request->getPost('estadoCivil'),
      'sexo'            => $this->request->getPost('sexo'),
      'telefono'        => $this->request->getPost('telefono'),
      'email'           => $this->request->getPost('email'),
      'fechaNacimiento' => $this->request->getPost('fechaNacimiento'),
      'fechaIngreso'    => $this->request->getPost('fechaIngreso'),
      'anioIngreso'     => $this->request->getPost('anioIngreso'),
      'fechaTraslado'   => $this->request->getPost('fechaTraslado'),
      'usuarioTraslado' => $this->request->getPost('usuarioTraslado'),
      'estado'      => '1',
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('DUI');
    $valor2 = $this->request->getPost('carnet');
    $valor3 = $this->request->getPost('nombres');
    $valor4 = $this->request->getPost('apellidos');
    $valor5 = $this->request->getPost('tipoPersona');
    $valor6 = $this->request->getPost('sexo');
    $valor7 = $this->request->getPost('email');
    $valor8 = $this->request->getPost('fechaNacimiento');
    $valor9 = '1';

    insert_acciones('INSERTÓ','PERSONA | DUI: '.$valor1." | carné: ".$valor2." | nombres: ".$valor3." | apellidos: ".$valor4." | tipoPersona: ".$valor5." | sexo: ".$valor6." | email: ".$valor7." | fechaNacimiento: ".$valor8." | estado: ".$valor9);

    return redirect()->to('/Catalogos/personas')->with('message', 'Persona creada con éxito.');
  }

  return redirect()->back()->withInput();
}

public function edit($id = null){
  $persona = new PersonaModel();

  if ($persona->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar persona',
    ['validation'=>$validation,'personas'=> $persona->asObject()->find($id)],'edit');
}

public function update($id = null){
  helper("Bitacora");
  $persona = new PersonaModel();

  if ($persona->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  if($this->validate('personaUpdate')){
    $persona->update($id, [
      'DUI'             => $this->request->getPost('DUI'),
      'carnet'          => $this->request->getPost('carnet'),
      'nombres'         => $this->request->getPost('nombres'),
      'apellidos'       => $this->request->getPost('apellidos'),
      'tipoPersona'     => $this->request->getPost('tipoPersona'),
      'estadoCivil'     => $this->request->getPost('estadoCivil'),
      'sexo'            => $this->request->getPost('sexo'),
      'telefono'        => $this->request->getPost('telefono'),
      'email'           => $this->request->getPost('email'),
      'fechaNacimiento' => $this->request->getPost('fechaNacimiento'),
      'fechaIngreso'    => $this->request->getPost('fechaIngreso'),
      'anioIngreso'     => $this->request->getPost('anioIngreso'),
      'fechaTraslado'   => $this->request->getPost('fechaTraslado'),
      'usuarioTraslado' => $this->request->getPost('usuarioTraslado'),
      'estado'          => $this->request->getPost('estado'),
    ]);

    $valor1 = $this->request->getPost('DUI');
    $valor2 = $this->request->getPost('carnet');
    $valor3 = $this->request->getPost('nombres');
    $valor4 = $this->request->getPost('apellidos');
    $valor5 = $this->request->getPost('tipoPersona');
    $valor6 = $this->request->getPost('sexo');
    $valor7 = $this->request->getPost('email');
    $valor8 = $this->request->getPost('fechaNacimiento');
    $valor9 = $this->request->getPost('estado');

    insert_acciones('ACTUALIZÓ','PERSONA | DUI: '.$valor1." | carné: ".$valor2." | nombres: ".$valor3." | apellidos: ".$valor4." | tipoPersona: ".$valor5." | sexo: ".$valor6." | email: ".$valor7." | fechaNacimiento: ".$valor8." | estado: ".$valor9);
    return redirect()->to('/catalogos/personas')->with('message', 'Persona editada con éxito.');
  }

  return redirect()->back()->withInput();
}

public function delete($id = null){
  helper("Bitacora");
  $user        = new UsuariosModel();
  $carga       = new CargaAcademicaModel();
  $inscripcion = new InscripcionModel();
  $persona     = new PersonaModel();

  $buscarPersona     = $user->select('personaId')->where('personaId',$id)->first();
  $buscarCarga       = $carga->select('personaId')->where('personaId',$id)->first();
  $buscarInscripcion = $inscripcion->select('personaId')->where('personaId',$id)->first();

  if ($buscarPersona) {
    return redirect()->to("/catalogos/personas")->with('messageError','Lo sentimos, esta persona tiene usuarios activos y no puede ser eliminada.');
  }else if ($buscarCarga) {
    return redirect()->to("/catalogos/personas")->with('messageError','Lo sentimos, esta persona tiene carga académica y no puede ser eliminada.');
  }else if ($buscarInscripcion) {
   return redirect()->to("/catalogos/personas")->with('messageError','Lo sentimos, esta persona tiene inscripciones y no puede ser eliminada.');
 }

 if ($persona->find($id) == null){
  throw PageNotFoundException::forPageNotFound();
} 

$persona->delete($id);
insert_acciones('ELIMINÓ','PERSONA | personaId:'.$id);
return redirect()->to('/catalogos/personas')->with('message', 'Persona eliminada con éxito.');
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("catalogos/personas/$view",$data);
  echo view("dashboard/templates/footer");
}
}
