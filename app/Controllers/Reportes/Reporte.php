<?php namespace App\Controllers\Reportes;

use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Reporte extends BaseController {

  public function index(){

    $data = [
    ];
    $this->_loadDefaultView( 'Reportes',$data,'index');
        helper("Bitacora");
    insert_acciones('ACCEDIÓ A','REPORTES');
  }

private function _loadDefaultView($title,$data,$view){

  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Reportes/$view",$data);
  echo view("dashboard/templates/footer");
}


}
