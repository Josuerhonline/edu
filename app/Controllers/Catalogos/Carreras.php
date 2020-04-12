<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\CarrerasModel;
use App\Models\Catalogos\FacultadModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Carreras extends BaseController {
  public function index(){
    $carreras = new CarrerasModel();

    $data = [
      'carreras' => $carreras->asObject()
      ->select('cof_carreras.*,cof_facultad.facultad AS facultad')
      ->join('cof_facultad','cof_carreras.facultadId = cof_facultad.facultadId')->findAll()
    ];

    $this->_loadDefaultView('Listado de carreras',$data,'index');
  }

  public function new(){
    $facultades = new FacultadModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear carrera',['validation'=>$validation, 'carreras'=> new CarrerasModel(),'facultades' => $facultades->asObject()->findAll()],'new');
  }

  public function create(){
    $carreras = new CarrerasModel();

    if($this->validate('carreras')){
      $id = $carreras->insert([
        'facultadId' =>$this->request->getPost('facultad'),
        'nombre' =>$this->request->getPost('nombre_carrera'),
        'nombreCorto' =>$this->request->getPost('nombre_corto'),
        'estado' => '1',
      ]);

      return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera creada con éxito.');
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

    return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario eliminado con éxito.');
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/carreras/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
