<?php namespace App\Controllers\Rol;
use App\Models\Catalogos\RolesModel;
use App\Models\Catalogos\UsuariosModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Rol extends BaseController {
  public function index(){
    $roles = new RolesModel();

    $data = [
      'roles' => $roles->asObject()
      ->select('cof_rol.*')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de roles',$data,'index');
  }

  public function new(){
    $roles      = new RolesModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear facultad',['validation'=>$validation, 'roles'=> new RolesModel()],'new');
  }

  public function create(){
    helper("Bitacora");
    $roles = new RolesModel();

    if($this->validate('rol')){
      $id = $roles->insert([
        'nombreRol' =>$this->request->getPost('rol'),
      ]);

      $valor1 = $this->request->getPost('rol');
      insert_acciones('INSERTÓ','NUEVO ROL | rolId:'.$id." | nombre del rol:".$valor1);
      return redirect()->to('/Rol/Rol')->with('message', 'Rol creado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $roles = new RolesModel();

    if ($roles->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar facultad',
    ['validation'=>$validation,'roles'=> $roles->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $roles = new RolesModel();

    if ($roles->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }
    
    $rol       = $this->request->getPost('rol_editar');
    $buscarRol = $roles->select('nombreRol')->where('nombreRol',$rol)->first();

    if ($buscarRol) {
      return redirect()->to('/Rol/Rol')->with('message', 'Rol editado con éxito.');
    }else if (!$buscarRol) {
      if($this->validate('rol_editar')){
        $roles->update($id, [
          'nombreRol' =>$this->request->getPost('rol_editar'),
        ]);
        
        $valor1 = $this->request->getPost('rol_editar');
        insert_acciones('ACTUALIZÓ','ROL | rolId:'.$id." | nombre del rol:".$valor1);
        return redirect()->to('/Rol/Rol')->with('message', 'Rol editado con éxito.');
      }
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
     helper("Bitacora");
    $usuarios      = new UsuariosModel();
    $roles         = new RolesModel();
    $buscarUsuario = $usuarios->select('rolId')->where('rolId',$id)->first();

    if ($buscarUsuario) {
      return redirect()->to("/Rol/Rol")->with('messageError','Lo sentimos, el rol tiene usuarios asociados y no puede ser eliminado.');
    }

    if ($roles->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  

    $roles->delete($id);
    insert_acciones('ELIMINÓ','ROL | rolId:'.$id);
    return redirect()->to('/Rol/Rol')->with('message', 'Rol eliminado con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Rol/Rol/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
