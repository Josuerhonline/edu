<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\CargaAcademicaViewModel;
use App\Models\Catalogos\CargaAcademicaModel;
use App\Models\Catalogos\CombinarMateriasModel;
use App\Models\Catalogos\CombinarMateriasDetalleModel;
use App\Models\Catalogos\PlanMateriaModelView;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CombinarMaterias extends BaseController {
  public function index(){
    $carga = new CargaAcademicaViewModel();

    $data = [
      'carga' => $carga->asObject()->findAll()
    ];

    $this->_loadDefaultView('Listado de combinaciones materias',$data,'index');
  }

  public function agregarUnion(){
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Combinar materias',['validation'=>$validation],'unir');
  }


  public function new(){
    $cargaAcademica   = new CargaAcademicaModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Seleccionar docente',['validation'=>$validation,'cargaAcademicas' => $cargaAcademica->asObject()
      ->select('cof_carga_academica.*, cof_personas.*')
      ->join('cof_personas','cof_personas.personaId = cof_carga_academica.personaId')->groupBy('cof_carga_academica.personaId')->findAll()],'new');
  }

  public function generarSesion(){
    $_SESSION["personaIdBuscar"] = $_POST['id'];
  }

  public function create(){

    $combinar        = new CombinarMateriasModel();
    $combinarDetalle = new CombinarMateriasDetalleModel();
    $ids = $combinar->insert([
      'personaId' => $this->request->getPost('personaId'),
      'fechaCreacion'   => date("Y")."-". date("m")."-". date("d"),
      'nombreCombinacion' => $this->request->getPost('nombreCombinacion'),
    ]);

    $valor[] = $this->request->getPost('planMateriaId');
    foreach ($valor as $key => $value) {
      $id = $combinarDetalle->insert([
        'combinarMateriaId' => $ids,
        'planMateriaId' => $value,
      ]);
    }
    helper("Bitacora");

    $valor1 = $this->request->getPost('personaId');

    insert_acciones('INSERTÓ','NUEVA COMBINACIÓN DE MATERIAS | personaId: '.$valor1);
    return redirect()->to('/Catalogos/CombinarMaterias')->with('message', 'Combinación de materias creada con éxito.');

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
    echo view("Catalogos/combinarMaterias/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
