<?php namespace App\Controllers\Graficos;
use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Graficos extends BaseController {
  public function index(){

    $aperCiclo = new SeleccionarCicloModel();

    $data = [
      'selectCiclo' => $aperCiclo->asObject()
      ->select('cof_aper_ciclo.*')->where('estado','1')->orderBy('anio','asc')->orderBy('ciclo','asc')->findAll()
    ];

    $this->_loadDefaultView( 'Gráficos',$data,'index');
    helper("Bitacora");
    insert_acciones('CONSULTÓ','GRÁFICOS GENERALES ');
  }


  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Graficos/Graficos/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
