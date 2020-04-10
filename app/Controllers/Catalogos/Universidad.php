<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\UniversidadModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Universidad extends BaseController {
  public function index(){
    $universidad = new UniversidadModel();
    $data = [
      'universidades' => $universidad->asObject()
      ->select('cof_universidad.*')
      ->findAll()
    ];
    $this->_loadDefaultView( 'Listado de Universidades',$data,'index');
  }

  public function new(){
   $universidad = new UniversidadModel();
   $validation  =  \Config\Services::validation();
   $this->_loadDefaultView('Crear universidad',['validation'=>$validation, 'universidad'=> new UniversidadModel()],'new');
  }

  public function create(){
    $universidad = new UniversidadModel();
    if($this->validate('universidad')){
      $id = $universidad->insert([
        'universidad' =>$this->request->getPost('nombre_universidad'),
        'direccion'   =>$this->request->getPost('direccion'),
        'telefono'    =>$this->request->getPost('telefono'),
      ]);

      return redirect()->to('/Catalogos/universidad')->with('message', 'Universidad creada con éxito.');
    }
    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $user = new UniversidadModel();
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
    $user = new UniversidadModel();

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
    $user = new UniversidadModel();

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
    echo view("Catalogos/universidad/$view",$data);
    echo view("dashboard/templates/footer");
  }

}
