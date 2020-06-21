<?php namespace App\Controllers\Graficos;

use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class SeleccionGrafico extends BaseController {
   public function generarSesionCiclo(){
  $array = array("cicloAnio"=>$_POST['id']);
  $session = session();
  $session->set($array);

  $aperCiclo = new SeleccionarCicloModel();
  $buscarCiclo = $aperCiclo->asObject()->select('aperCicloId')->where('aperCicloId',$_POST['id'])->findAll();
  foreach ($buscarCiclo as $key => $c){
    $_SESSION["cicloNombre"] = $c->aperCicloId;
  }
}

  public function index(){
    $datos = new SeleccionarCicloModel();

    $data = [
      'selectCiclo' => $datos->asObject()
      ->select('cof_aper_ciclo.*')->findAll()
    ];
    $this->_loadDefaultView( 'Seleccionar Ciclo',$data,'index');
  }

private function _loadDefaultView($title,$data,$view){

  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("graficos/SeleccionGrafico/$view",$data);
  echo view("dashboard/templates/footer");
}


}
