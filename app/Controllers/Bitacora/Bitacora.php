<?php namespace App\Controllers\Bitacora;

use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Bitacora extends BaseController {
  public function index(){
    helper("Bitacora");
    crear_view();
    $data = [];
    $this->_loadDefaultView('Bitácora Usuarios',$data,'index');
    helper("Bitacora");
    insert_acciones('CONSULTÓ','BITÁCORA');
  }

  public function edit($id = null){
    $session = session();
    $_SESSION["bitsesionId"] = $id;
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Bitácora detalle',
      ['validation'=>$validation],'edit');
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Bitacora/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
