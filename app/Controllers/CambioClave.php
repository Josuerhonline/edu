<?php namespace App\Controllers;
use App\Models\Catalogos\UsuariosModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CambioClave extends BaseController {
  public function index(){
    $this->_loadDefaultView([],'index');
    return $this->_redirectAuth();
  }

  public function update($id = null){
    helper("user");
    $nClave =$this-> request->getPost('nClave');
    $cClave =$this-> request->getPost('cClave');

    $user = new UsuariosModel();
    if ($user->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    } else if($nClave !==  $cClave){
           return redirect()->to('/CambioClave')->with('messageError','Las contraseñas no son iguales, intente nuevamente.');
    }

    if($this->validate('cambioClave')){
      $user->update($id, [
        'clave' =>hashClave($this->request->getPost('cClave')),
        'estado' =>'ACTIVO',
      ]);
      return redirect()->to('/SeleccionarCiclo')->with('message','Su contraseña ha sido modificada exitosamente.');
    }
    return redirect()->back()->withInput();
  }

  private function _redirectAuth(){
    $session = session();
    if ($session->rolId=='1' && $session->estado=='ACTIVO') {
      return redirect()->to("/SeleccionarCiclo")->with('message','Bienvenido: '.$session->usuario);
    }
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
