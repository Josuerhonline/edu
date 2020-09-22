<?php namespace App\Controllers\Catalogos;
$session = session();
use App\Models\Catalogos\PersonaModel;
use App\Models\Catalogos\RolesModel;
use App\Models\Catalogos\UsuariosModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Usuario extends BaseController {
  public function index(){
    $user = new UsuariosModel();

    $data = [
      'users' => $user->asObject()
      ->select('cof_usuarios.*, cof_personas.nombres as nombres,cof_personas.apellidos as apellidos,cof_rol.nombreRol as nombreRol')
      ->join('cof_personas','cof_personas.personaId = cof_usuarios.personaId')
      ->join('cof_rol','cof_rol.rolId = cof_usuarios.rolId')->findAll()
    ];

    $this->_loadDefaultView('Listado de usuarios',$data,'index');
  }

  public function new(){
    $user    = new UsuariosModel();
    $persona = new PersonaModel();
    $roles   = new RolesModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear usuario',['validation'=>$validation, 'user'=> new UsuariosModel(),'personas' => $persona->asObject()->findAll(),'rol' => $roles->asObject()->findAll(),'usuarios' => $user->asObject()->findAll()],'new');
  }

  public function create(){
    helper("user");
    helper("Bitacora");
    $user = new UsuariosModel();
    $personaId = $this->request->getPost('personaId');
    $rolId     = $this->request->getPost('rolId');
    $verificar = $user->where('personaId',$personaId)->where('rolId',$rolId)->first();
    if ($verificar) {
      return redirect()->to("/Catalogos/usuario")->with('messageError','Lo sentimos, esta persona ya tiene un usuario con el mismo rol');
   }else{
    if($this->validate('users')){
     $id = $user->insert([
      'personaId' => $this->request->getPost('personaId'),
      'usuario'   => $this->request->getPost('usuario'),
      'clave'     => hashClave($this->request->getPost('clave')),
      'rolId'     => $this->request->getPost('rolId'),
      'estado'    => '2',
    ]);

     $valor1 = $this->request->getPost('personaId');
     $valor2 = $this->request->getPost('usuario');
     $valor3 = $this->request->getPost('rolId');

     insert_acciones('INSERTÓ','NUEVO USUARIO | personaId: '.$valor1." | usuario: ".$valor2." | rolId: ".$valor3);
     return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario creado con éxito.');
   }
 }
 return redirect()->back()->withInput();
}

public function edit($id = null){
  $user    = new UsuariosModel();
  $persona = new PersonaModel();
  $roles   = new RolesModel();

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
  helper("Bitacora");
  $user = new UsuariosModel();

  if ($user->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  } 

  $usuario       = $this->request->getPost('usuario');
  $buscarUsuario = $user->select('usuario')->where('usuario',$usuario)->where('usuarioId',$id)->first();

  if ($buscarUsuario) {
    $user->update($id, [
      'personaId' =>$this->request->getPost('personaId_editar'),
      'clave'     =>hashClave($this->request->getPost('clave')),
      'rolId'     =>$this->request->getPost('rolId_editar'),
      'estado'    =>$this->request->getPost('estado_editar'),
    ]);

    $valor1 = $this->request->getPost('personaId_editar');
    $valor2 = $this->request->getPost('estado_editar');
    $valor3 = $this->request->getPost('rolId_editar');

    insert_acciones('ACTUALIZÓ','USUARIO | personaId: '.$valor1." | estado: ".$valor2." | rolId: ".$valor3);
    return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario editado con éxito.');
  }

  if (!$buscarUsuario) {
    if($this->validate('userUpdate')){
      $user->update($id, [
        'personaId' =>$this->request->getPost('personaId_editar'),
        'usuario'   =>$this->request->getPost('usuario'),
        'clave'     =>hashClave($this->request->getPost('clave')),
        'rolId'     => $this->request->getPost('rolId_editar'),
        'estado'    =>$this->request->getPost('estado_editar'),
      ]);

      $valor0 = $this->request->getPost('usuario');
      $valor1 = $this->request->getPost('personaId_editar');
      $valor2 = $this->request->getPost('estado_editar');
      $valor3 = $this->request->getPost('rolId_editar');

      insert_acciones('ACTUALIZÓ','USUARIO | personaId: '.$valor1." | usuario: ".$valor0." | estado: ".$valor2." | rolId: ".$valor3);
      return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario editado con éxito.');
    }
  }

  return redirect()->back()->withInput();
}

public function delete($id = null){
  helper("Bitacora");
  $user = new UsuariosModel();

  if ($user->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $user->delete($id);

  insert_acciones('ELIMINÓ','USUARIO | usuarioId:'.$id);
  return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario eliminado con éxito.');
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Catalogos/user/$view",$data);
  echo view("dashboard/templates/footer");
}
}
