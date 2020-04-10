<?php namespace App\Controllers;
use App\Models\Catalogos\UsuariosModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CambioClave extends BaseController {

  public function index(){

    $this->_loadDefaultView( 'Listado de facultades','index');
  }

  public function update($id = null){
    helper("user");
    $user = new UsuariosModel();
    if ($user->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  
    if($this->validate('cheta')){
      $user->update($id, [
        'clave' =>hashClave($this->request->getPost('cClave')),
        'estado' =>'ACTIVO',
      ]);
      return redirect()->to('/pageErrorController')->with('message', 'Usuario editado con éxito.');
    }
    return redirect()->back()->withInput();
  }

  private function _loadDefaultView($title,$view){

    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("dashboard/cambioClave/$view");
    echo view("dashboard/templates/footer");
  }


}
