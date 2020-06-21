<?php namespace App\Controllers\EvaluacionDocente;
use App\Models\EvaluacionDocente\Evaluacion;
use App\Models\EvaluacionDocente\EvaluacionDetalle;
use App\Models\EvaluacionDocente\EvaluacionDocentes;
use App\Models\EvaluacionDocente\EvaluacionDocentesDetalle;
use App\Models\EvaluacionDocente\CargaViewModel;
use App\Models\EvaluacionDocente\CargaInscripcionViewModel;
use App\Models\CatalogosEvaluacion\AperEvaluacionModelView;
use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class EvaluacionDocente extends BaseController {
 public function generarSesionCiclo(){
  $array = array("cicloId"=>$_POST['id']);
  $session = session();
  $session->set($array);

  $aperCiclo = new SeleccionarCicloModel();
  $buscarCiclo = $aperCiclo->asObject()->select('nombrePersonalizado')->where('aperCicloId',$_POST['id'])->findAll();
  foreach ($buscarCiclo as $key => $c){
    $_SESSION["ciclo"] = $c->nombrePersonalizado;
  }
}
public function index(){
  $session = session(); 
  $rol =  $session->rolId;
  $carga = new CargaViewModel();
  $inscripcion = new CargaInscripcionViewModel();
  if ($rol == '1') {
    $data = [
      'carga' => $carga->asObject()
      ->select('view_carga_academica.*')->findAll()
    ];

    $this->_loadDefaultView( ' Admin',$data,'admin');
  }else if($rol == '2'){
    $data = [
      'carga' => $carga->asObject()
      ->select('view_carga_academica.*')->findAll()
    ];

    $this->_loadDefaultView( ' Docente',$data,'docente');
  }else if($rol == '3'){
    $data = [
      'inscripcion' => $inscripcion->asObject()
      ->select('view_carga_inscripcion.*')->findAll()
    ];

    $this->_loadDefaultView( ' Estuadiante',$data,'estudiante');

  }
}

public function evaluacionEstudiante(){
  $evaluacion = new Evaluacion();
  $evaluacionDetalle = new EvaluacionDetalle();
  $identificador = $this->request->getPost('personaId');
  $fecha = $this->request->getPost('fechaEvaluacion');
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacion->insert([
      'personaId' =>$this->request->getPost('personaId'),
      'planMateriaId' =>$this->request->getPost('planMateriaId'),
      'aperEvaluacionId' =>$this->request->getPost('aperEvaluacionId'),
      'fechaEvaluacion' =>$this->request->getPost('fechaEvaluacion'),
      'observaciones' =>$this->request->getPost('obs'),
    ]);
  }
  $EvaluacionId = $evaluacion->select('evaluacionId')->where('personaId',$identificador)->where('fechaEvaluacion',$fecha)->first();
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId1'),
      'valor' =>$this->request->getPost('pregunta1'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId2'),
      'valor' =>$this->request->getPost('pregunta2'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId3'),
      'valor' =>$this->request->getPost('pregunta3'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId4'),
      'valor' =>$this->request->getPost('pregunta4'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId5'),
      'valor' =>$this->request->getPost('pregunta5'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId6'),
      'valor' =>$this->request->getPost('pregunta6'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId7'),
      'valor' =>$this->request->getPost('pregunta7'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId8'),
      'valor' =>$this->request->getPost('pregunta8'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId9'),
      'valor' =>$this->request->getPost('pregunta9'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDetalle->insert([
      'evaluacionId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId10'),
      'valor' =>$this->request->getPost('pregunta10'),
    ]);

  }
  $EvaluacionResultado = $evaluacionDetalle->selectAvg('valor')->where('evaluacionId',$EvaluacionId)->first();
    $evaluacion->update($EvaluacionId, [
      'resultadoEvaluacion' =>$EvaluacionResultado,
    ]);
    return redirect()->to('/EvaluacionDocente/EvaluacionDocente/')->with('message', 'Evaluación realizada con éxito.');

  return redirect()->back()->withInput();
}
// Evaluacion para  Docentes
public function evaluacionDocente(){
  $evaluacionDocentes = new EvaluacionDocentes();
  $evaluacionDocentesDetalle = new EvaluacionDocentesDetalle();
  $identificador = $this->request->getPost('personaIdCarga');
  $fecha = $this->request->getPost('fechaEvaluacion');
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentes->insert([
      'personaId' =>$this->request->getPost('personaIdCarga'),
      'aperEvaluacionId' =>$this->request->getPost('aperEvaluacionIdCarga'),
      'fechaEvaluacion' =>$this->request->getPost('fechaEvaluacion'),
      'observaciones' =>$this->request->getPost('obs'),
    ]);
  }

  $EvaluacionId = $evaluacionDocentes->select('evaluacionDocenteId')->where('personaId',$identificador)->where('fechaEvaluacion',$fecha)->first();
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId1'),
      'valor' =>$this->request->getPost('pregunta1'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId2'),
      'valor' =>$this->request->getPost('pregunta2'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId3'),
      'valor' =>$this->request->getPost('pregunta3'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId4'),
      'valor' =>$this->request->getPost('pregunta4'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId5'),
      'valor' =>$this->request->getPost('pregunta5'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId6'),
      'valor' =>$this->request->getPost('pregunta6'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId7'),
      'valor' =>$this->request->getPost('pregunta7'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId8'),
      'valor' =>$this->request->getPost('pregunta8'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId9'),
      'valor' =>$this->request->getPost('pregunta9'),
    ]);
  }
  if($this->validate('evaluacionEstudiante')){
    $id = $evaluacionDocentesDetalle->insert([
      'evaluacionDocenteId' =>$EvaluacionId,
      'instrumentoDetalleId' =>$this->request->getPost('instrumentoDetalleId10'),
      'valor' =>$this->request->getPost('pregunta10'),
    ]);
    return redirect()->to('/EvaluacionDocente/EvaluacionDocente/')->with('message', 'Evaluación realizada con éxito.');
  }
  return redirect()->back()->withInput();
}

public function realizarEvaluacion($id = null){
  $inscripcion = new CargaInscripcionViewModel();
  if ($inscripcion->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar evaluacion',
    ['validation'=>$validation,'inscripcion'=> $inscripcion->asObject()->find($id)],'frmEvaluacionEstudiante');
}

public function realizarEvaluacionDocente($id = null){
  $inscripcion = new CargaInscripcionViewModel();
  if ($inscripcion->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar evaluacion',
    ['validation'=>$validation,'inscripcion'=> $inscripcion->asObject()->find($id)],'frmEvaluacionDocente');
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("EvaluacionDocente/EvaluacionDocente/$view",$data);
  echo view("dashboard/templates/footer");
}
}
