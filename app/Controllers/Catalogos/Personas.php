<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PersonaModel;
use App\Models\Catalogos\UsuariosModel;

use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Personas extends BaseController {

  public function index(){

    $user = new PersonaModel();

    $data = [
      'personas' => $user->asObject()
      ->select('cof_personas.*')->findAll()
    ];
    $this->_loadDefaultView( 'Listado de usuarios',$data,'index');
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
  $persona = new PersonaModel();

  if ($persona->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  
  if($this->validate('personaUpdate')){
    $persona->update($id, [
      'DUI' =>$this->request->getPost('DUI'),
      'carnet' =>$this->request->getPost('carnet'),
      'nombres' => $this->request->getPost('nombres'),
      'apellidos' =>$this->request->getPost('apellidos'),
      'tipoPersona' =>$this->request->getPost('tipoPersona'),
      'sexo' =>$this->request->getPost('sexo'),
      'telefono' =>$this->request->getPost('telefono'),
      'email' =>$this->request->getPost('email'),
      'fechaNacimiento' =>$this->request->getPost('fechaNacimiento'),
      'fechaIngreso' =>$this->request->getPost('fechaIngreso'),
      'anioIngreso' =>$this->request->getPost('anioIngreso'),
      'fechaTraslado' =>$this->request->getPost('fechaTraslado'),
      'usuarioTraslado' =>$this->request->getPost('usuarioTraslado'),
      'estado' =>$this->request->getPost('estado'),
      'direccion' =>$this->request->getPost('direccion'),
    ]);
    return redirect()->to('/catalogos/personas')->with('message', 'Persona editada con éxito.');
  }
  return redirect()->back()->withInput();
}
public function delete($id = null){
     $user = new UsuariosModel();
   $buscarPersona = $user->select('personaId')->where('personaId',$id)->first();
  $persona = new PersonaModel();
 if ($buscarPersona) {
     return redirect()->to("/catalogos/personas")->with('messageError','Esta persona tiene usuarios activos y no se puede eliminar');
 }
  if ($persona->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  
  $persona->delete($id);
  return redirect()->to('/catalogos/personas')->with('message', 'persona eliminada con éxito.');
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
