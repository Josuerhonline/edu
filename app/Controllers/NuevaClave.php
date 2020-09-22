<?php namespace App\Controllers;
use App\Models\Catalogos\UsuariosModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class NuevaClave extends BaseController {
  public function index(){
    $this->_loadDefaultView('Nueva contraseña','index');
    return $this->_redirectAuth();
  }

  public function update($id = null){
    $user = new UsuariosModel();
    helper("user");
    $session = session();
    $actual =$this-> request->getPost('actual');
    $nClave =$this-> request->getPost('nClave');
    $cClave =$this-> request->getPost('cClave');

    $claveDB = $user->select('clave')->where('usuarioId',$id)->first();

    if ($user->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }else if(!verifyKey($actual,$claveDB['clave'])){
     return redirect()->to('/NuevaClave')->with('messageError','Su contraseña actual no coincide con la proporcionada.');

   }else if($nClave !==  $cClave){
     return redirect()->to('/NuevaClave')->with('messageError','Las contraseñas no son iguales, intente nuevamente.');
   }

   if($this->validate('cambioClave')){
    $user->update($id, [
      'clave' =>hashClave($this->request->getPost('cClave')),
      'estado' =>'1',
    ]);
    helper("bitacora");
    insert_acciones('ACTUALIZO','MODIFICACIÓN DE CONTRASEÑA | UsuarioId: '.$id);

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

  echo view("dashboard/templates/headerSeleccionCiclo",$dataHeader);
  echo view("dashboard/NuevaClave/$view");
  echo view("dashboard/templates/footer");
}

}
