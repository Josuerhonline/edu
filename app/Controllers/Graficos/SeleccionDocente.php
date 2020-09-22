<?php namespace App\Controllers\Graficos;

use App\Models\SeleccionarCicloModel;
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class SeleccionDocente extends BaseController {

  public function index(){
    $datos = new SeleccionarCicloModel();

    $data = [
      'selectCiclo' => $datos->asObject()->where('estado','1')->orderBy('anio','asc')->orderBy('ciclo','asc')->findAll()
    ];
    $this->_loadDefaultView( 'Seleccionar Ciclo',$data,'index');
  }

  public function generarSesionCiclo(){
    $array   = array("cil"=>$_POST['id']);
    $session = session();
    $session->set($array);

    $aperCiclo   = new SeleccionarCicloModel();
    $buscarCiclo = $aperCiclo->asObject()->select()->where('aperCicloId',$_POST['id'])->findAll();

    foreach ($buscarCiclo as $key => $c){
      $_SESSION["cicloId"]     = $c->aperCicloId;
      $_SESSION["nombreCiclo"] = $c->nombrePersonalizado;
    }
  }

  //Generar sesión de areas de evaluación en el index de seleccion
  public function generarSesionAreaEvaluacion(){
    $array   = array("areaEvaluacion"=>$_POST['id']);
    $session = session();
    $session->set($array);

    $areas      = new AreasEvaluacioModel();
    $buscarArea = $areas->asObject()->select()->where('areaEvaluacionId',$_POST['id'])->findAll();

    foreach ($buscarArea as $key => $a){
      $_SESSION["areaEvaluacionId"]     = $a->areaEvaluacionId;
      $_SESSION["nombreAreaEvaluacion"] = $a->areaEvaluacion;
    }

    $_SESSION["ponderacion"] = "Todas";
  }

  //Generar sesión de areas de evaluación dentro de la tabla de cargas academicas
  public function generarSesionAreaEvaluacionTbl(){
    $array   = array("areaEvaluacion"=>$_POST['id']);
    $session = session();
    $session->set($array);

    $areas      = new AreasEvaluacioModel();
    $buscarArea = $areas->asObject()->select()->where('areaEvaluacionId',$_POST['id'])->findAll();

    foreach ($buscarArea as $key => $a){
      $_SESSION["areaEvaluacionId"]     = $a->areaEvaluacionId;
      $_SESSION["nombreAreaEvaluacion"] = $a->areaEvaluacion;
    }
  }

  public function generarSesionNota(){
    $array   = array("notaId"=>$_POST['id']);
    $session = session();
    $session->set($array);
    $_SESSION["ponderacion"]  = $_POST['id'];
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Graficos/Docentes/seleccionDocente/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
