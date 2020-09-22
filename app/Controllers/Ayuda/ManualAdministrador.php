<?php namespace App\Controllers\Ayuda;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class ManualAdministrador extends BaseController {
  public function index(){
    helper('manuales');
    ManualAdministrador();
  }
}
