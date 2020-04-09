<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\FacultadModel;
use App\Models\Catalogos\UniversidadModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Facultad extends BaseController {

  public function index(){

    $facultad = new FacultadModel();

    $data = [
      'facultades' => $facultad->asObject()
      ->select('cof_facultad.*, cof_universidad.universidadId as universidadId,cof_universidad.universidad as universidad')
      ->join('cof_universidad','cof_universidad.universidadId = cof_facultad.universidadId')->findAll()
    ];
    $this->_loadDefaultView( 'Listado de facultades',$data,'index');
  }

  public function new(){
    $facultad = new FacultadModel();
    $universidad = new UniversidadModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear facultad',['validation'=>$validation, 'facultad'=> new FacultadModel(),'universidad' => $universidad->asObject()->findAll()],'new');

  }
  public function create(){
    helper("user");


    $user = new UsuariosModel();

    if($this->validate('users')){
     $id = $user->insert([
      'personaId' =>$this->request->getPost('personaId'),
      'usuario' =>$this->request->getPost('usuario'),
      'clave' =>hashClave($this->request->getPost('clave')),
      'rolId' => $this->request->getPost('rolId'),
      'estado' => 'EN PROCESO',
    ]);

     return redirect()->to('/Catalogos/usuario')->with('message', 'usuario creado con éxito.');
   }
   return redirect()->back()->withInput();
 }
 public function edit($id = null){

  $user = new UsuariosModel();
  $persona = new PersonaModel();
  $roles = new   RolesModel();
  if ($user->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar usuario',
    ['validation'=>$validation,'user'=> $user->asObject()->find($id),'personas' => $persona->asObject()->findAll(),'rol' => $roles->asObject()->findAll(),'usuarios' => $user->asObject()->findAll() ],'edit');
}
public function update($id = null){
  helper("user");
  $user = new UsuariosModel();

  if ($user->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  
  if($this->validate('userUpdate')){
    $user->update($id, [
      'personaId' =>$this->request->getPost('personaId_editar'),
      'usuario' =>$this->request->getPost('usuario'),
      'clave' =>hashClave($this->request->getPost('clave')),
      'rolId' => $this->request->getPost('rolId_editar'),
      'estado' =>$this->request->getPost('estado_editar'),
    ]);
    return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario editado con éxito.');
  }
  return redirect()->back()->withInput();
}

public function delete($id = null){

  $user = new UsuariosModel();

  if ($user->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $user->delete($id);

  return redirect()->to('/Catalogos/usuario')->with('message', 'usuario eliminado con éxito.');
  
}


private function _loadDefaultView($title,$data,$view){

  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Catalogos/facultad/$view",$data);
  echo view("dashboard/templates/footer");
}


}
