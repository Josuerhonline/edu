<?php namespace App\Controllers\Ayuda;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class ManualUsuario extends BaseController {
  public function index(){
    helper('manuales');
    ManualUsuario();
  }
}
