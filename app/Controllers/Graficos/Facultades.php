<?php namespace App\Controllers\Graficos;

use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Facultades extends BaseController {
  public function index(){
    $datos = new SeleccionarCicloModel();

    $data = [
      'selectCiclo' => $datos->asObject()->where('estado','1')->orderBy('anio','asc')->orderBy('ciclo','asc')->findAll()
    ];
    $this->_loadDefaultView( 'Seleccionar Ciclo',$data,'index');
    helper("Bitacora");
    insert_acciones('CONSULTÓ','GRÁFICOS POR FACULTADES');
  }

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

  private function _loadDefaultView($title,$data,$view){

    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Graficos/Facultades/$view",$data);
    echo view("dashboard/templates/footer");
  }


}
