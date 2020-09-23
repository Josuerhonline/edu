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
   $combinar        = new CombinarMateriasModel();

   $data = [
    'carga' => $combinar->asObject()->select('cof_combinar_materias.*,cof_combinar_materias_detalle.*,cof_personas.*,cof_plan_materia.*,cof_materias.*')
    ->join('cof_combinar_materias_detalle','cof_combinar_materias_detalle.combinarMateriaId = cof_combinar_materias.combinarMateriaId')
    ->join('cof_personas','cof_personas.personaId = cof_combinar_materias.personaId')
    ->join('cof_plan_materia','cof_plan_materia.planMateriaId = cof_combinar_materias_detalle.planMateriaId')
    ->join('cof_materias','cof_materias.materiaId = cof_plan_materia.materiaId')
    ->findAll()
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
    'personaId'         => $this->request->getPost('personaId'),
    'fechaCreacion'     => date("Y")."-". date("m")."-". date("d"),
    'nombreCombinacion' => $this->request->getPost('nombreCombinacion'),
  ]);

  $planesMaterias = $this->request->getPost('planesMaterias');
  $personaId      = $this->request->getPost('personaId');

  foreach ($planesMaterias as $key => $value) {
   if (!$value=="") {
    $consulta = $combinar->select('cof_combinar_materias.*,cof_combinar_materias_detalle.*')
    ->join('cof_combinar_materias_detalle','cof_combinar_materias_detalle.combinarMateriaId = cof_combinar_materias.combinarMateriaId')->where('personaId',$personaId)->where('planMateriaId',$value)->first();
    if ($consulta) {
      return redirect()->to('/Catalogos/CombinarMaterias')->with('messageError', 'Las materias seleccionadas ya han sido combinadas');
    }
    $combinarDetalle->insert([
      'combinarMateriaId' => $ids,
      'planMateriaId' =>$value,
    ]);
  }
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
  $combiar        = new CombinarMateriasModel();
  $combinarDetalle = new CombinarMateriasDetalleModel();

  if ($combiar->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  
  $buscar= $combinarDetalle->select('combinarMateriaDetaId')->where('combinarMateriaDetaId',$id)->first();

  $combinarDetalle->where('combinarMateriaId',$id)->delete();

  $combiar->delete($id);

  insert_acciones('ELIMINÓ','COMBINACIÓN MATERIAS | combinarMateriaId:'.$id);
  return redirect()->to('/Catalogos/combinarMaterias')->with('message', 'Combinación eliminada con exito.');
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
