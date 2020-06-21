<?php namespace App\Controllers\Graficos;
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;
use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class SeleccionGraficoFacultad extends BaseController {
   public function generarSesionCiclo(){
  $array = array("cicloAnio"=>$_POST['id']);
  $session = session();
  $session->set($array);

  $aperCiclo = new SeleccionarCicloModel();
  $buscarCiclo = $aperCiclo->asObject()->select('aperCicloId')->where('aperCicloId',$_POST['id'])->findAll();
  foreach ($buscarCiclo as $key => $c){
    $_SESSION["cicloNombreFacultad"] = $c->aperCicloId;
  }
}
//Generar sesión de areas de evaluación
   public function generarSesionAreaEvaluacion(){
  $array = array("areaEvaluacion"=>$_POST['id']);
  $session = session();
  $session->set($array);

  $areas = new AreasEvaluacioModel();
  $buscarArea = $areas->asObject()->select('areaEvaluacionId')->where('areaEvaluacionId',$_POST['id'])->findAll();
  foreach ($buscarArea as $key => $a){
    $_SESSION["areaEvaluacionSession"] = $a->areaEvaluacionId;
  }
}
  public function index(){
    $datos = new SeleccionarCicloModel();

    $data = [
      'selectCiclo' => $datos->asObject()
      ->select('cof_aper_ciclo.*')->findAll()
    ];
    $this->_loadDefaultView( 'Gráficos facultad',$data,'index');
  }

private function _loadDefaultView($title,$data,$view){

  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("graficos/Facultades/SeleccionarCicloFacultad/$view",$data);
  echo view("dashboard/templates/footer");
}


}
