<?php namespace App\Controllers;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Expirar extends BaseController {
	public function index(){
		$this->_loadDefaultView('Sesión expirada','index');
		
	}


	private function _loadDefaultView($title,$view){
		$dataHeader =[
			'title' => $title
		];
		echo view("dashboard/templates/headerExpirar",$dataHeader);
		echo view("dashboard/Expirar/$view");
		echo view("dashboard/templates/footerExpirar");
	}

}
