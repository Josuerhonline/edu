<?php namespace App\Controllers\Menu;
use App\Models\Menu\MenuModel;
use App\Models\Menu\MenuDetalleModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Menu extends BaseController {
  public function index(){

    $menu = new MenuModel();
    $data = [
      'menu' => $menu->asObject()
      ->select('cof_menus.*')
      ->findAll()
    ];

    $this->_loadDefaultView('Listado de menus',$data,'index');
  }

  public function new(){
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear menú',['validation'=>$validation,'menu'=> new MenuModel()],'new');
  }

  public function create(){
    $menu = new MenuModel();

    if($this->validate('menu')){
      $id = $menu->insert([
        'nombreMenu'      => $this->request->getPost('nombreMenu'),
        'nombreIcono' => $this->request->getPost('nombreIcono'),
        'estado'      => '1',
      ]);
      helper("Bitacora");
      $valor1 = $this->request->getPost('nombreMenu');
      $valor2 = $this->request->getPost('nombreIcono');
      insert_acciones('INSERTÓ','MENU | nombre del menú '.$valor1.' | nombreIcono '.$valor2);
      return redirect()->to('/Menu/Menu')->with('message', 'Menú creado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $menu = new MenuModel();

    if ($menu->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar menú',
      ['validation'=>$validation,'menu'=> $menu->asObject()->find($id),'menus' => $menu->asObject()->findAll()],'edit');
  }

  public function update($id = null){
   $menu = new MenuModel();

   if ($menu->find($id) == null)
   {
    throw PageNotFoundException::forPageNotFound();
  } 
  $nombreMenuEditar = $this->request->getPost('nombreMenuEditar');
  $nombreIconoEditar = $this->request->getPost('nombreIconoEditar');

  $buscarMenu = $menu->select('nombreMenu','nombreIcono')->where('nombreMenu',$nombreMenuEditar)->where('nombreIcono',$nombreIconoEditar)->where('menuId',$id)->first();
  $buscarMenuNombre = $menu->select('nombreMenu')->where('nombreMenu',$nombreMenuEditar)->where('menuId',$id)->first();
  $buscarIconoNombre = $menu->select('nombreIcono')->where('nombreIcono',$nombreIconoEditar)->where('menuId',$id)->first();
  if ($buscarMenu) {
    $menu->update($id, [
      'estado'      => $this->request->getPost('estado_editar'),
    ]);
    helper("Bitacora");
    $valor2 = $this->request->getPost('estado_editar');
    insert_acciones('EDITÓ','MENU | estado '.$valor2);
    return redirect()->to('/Menu/Menu')->with('message', 'Menú editado con éxito.');
  }
  else if ($buscarMenuNombre) {
    if($this->validate('menu_editar')){
      $menu->update($id, [
        'nombreIcono' => $this->request->getPost('nombreIconoEditar'),
        'estado'      => $this->request->getPost('estado_editar'),
      ]);
      helper("Bitacora");
      $valor1 = $this->request->getPost('nombreIconoEditar');
      $valor2 = $this->request->getPost('estado_editar');
      insert_acciones('EDITÓ','MENU | nombre del icono'.$valor1.' | estado '.$valor2);
      return redirect()->to('/Menu/Menu')->with('message', 'Carrera editada con éxito.');
    }
  }
  else if ($buscarIconoNombre) {
    if($this->validate('menu_editar1')){
      $menu->update($id, [
        'nombreMenu'      => $this->request->getPost('nombreMenuEditar'),
        'estado'      => $this->request->getPost('estado_editar'),
      ]);
      helper("Bitacora");
      $valor1 = $this->request->getPost('nombreMenuEditar');
      $valor2 = $this->request->getPost('estado_editar');
      insert_acciones('EDITÓ','MENU | nombre del menu'.$valor1.' | estado '.$valor2);
      return redirect()->to('/Menu/Menu')->with('message', 'Menú editado con éxito.');
    }
  }else if (!$buscarMenu || !$buscarMenuNombre || !$buscarIconoNombre) {

    if($this->validate('menuEditar_principal')){
      $menu->update($id, [
        'nombreMenu'      => $this->request->getPost('nombreMenuEditar'),
        'nombreIcono' => $this->request->getPost('nombreIconoEditar'),
        'estado'      => $this->request->getPost('estado_editar'),
      ]);
      helper("Bitacora");
      $valor1 = $this->request->getPost('nombreMenuEditar');
      $valor2 = $this->request->getPost('nombreIconoEditar');
      $valor3 = $this->request->getPost('estado_editar');
      insert_acciones('EDITÓ','MENU | nombre del menu'.$valor1.' | nombre del icono '.$valor2.' | estado '.$valor2);
      return redirect()->to('/Menu/Menu')->with('message', 'Menú editado con éxito.');
    }
  }
  return redirect()->back()->withInput();
}

public function delete($id = null){
 $menuDetalle = new MenuDetalleModel();
 $menu = new MenuModel();
 $buscarMenu = $menuDetalle->select('menuId')->where('menuId',$id)->first();

 if ($buscarMenu) {
  return redirect()->to("/Menu/Menu")->with('messageError','Lo sentimos, este menú tiene sub menús asociados y no puede ser eliminado.');
}

if ($menu->find($id) == null)
{
  throw PageNotFoundException::forPageNotFound();
}  

$menu->delete($id);

return redirect()->to('/Menu/Menu')->with('message', 'Menú eliminado con éxito.');
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Menu/Menu/$view",$data);
  echo view("dashboard/templates/footer");
}
}
