<?php namespace App\Controllers\Menu;
use App\Models\Menu\MenuDetalleModel;
use App\Models\Menu\MenuModel;
use App\Models\Menu\LimitarMenuModel;
use App\Models\Menu\RolesMenus;
use App\Models\Catalogos\RolesModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class LimitarMenu extends BaseController {
  public function index(){
    $limitar = new LimitarMenuModel();
    $data = [
      'limitarMenu' => $limitar->asObject()
      ->select('cof_limitar_menus.*,cof_rol.*,cof_menus_detalle.*')
      ->join('cof_rol','cof_rol.rolId = cof_limitar_menus.rolId')
      ->join('cof_menus_detalle','cof_menus_detalle.menuDetalleId = cof_limitar_menus.menuDetalleId')
      ->findAll()
    ];
    $this->_loadDefaultView('Listado de menús limitados',$data,'index');
  }

  public function new($ids){
   $rol = new RolesModel();
   $rolesMenu = new RolesMenus();
   $limitar = new LimitarMenuModel();
   $menuDetalle = new MenuDetalleModel();
   $validation =  \Config\Services::validation();
   $this->_loadDefaultView('Limitar menú',['validation'=>$validation,'limitarMenu'=> new LimitarMenuModel(),'menuDeta' => $rolesMenu->asObject()->select()->where('rolMenuId',$ids)->findAll(),'limite' => $limitar->asObject()->select()->findAll(),'menuDetalles' => $menuDetalle->asObject()->select()->where('estado','1')->findAll()],'new');
 }

 public function create(){
  $menuDetalle = new MenuDetalleModel();
  $rolesMenu = new RolesMenus();
  $limitar = new LimitarMenuModel();
  $rolId = $this->request->getPost('rolIdS');
  $menuDetalleId = $this->request->getPost('menuDetalleId');
  $buscarMenuRol = $limitar->select('rolId','menuDetalleId')->where('rolId',$rolId)->where('menuDetalleId',$menuDetalleId)->first();
  if ($buscarMenuRol) {
    return redirect()->to("/Menu/MenuRol")->with('messageError','Lo sentimos, esta limitacion ya existe');
  }else{
    $id = $limitar->insert([
     'rolMenuId' => $this->request->getPost('rolMenuIdS'),
     'rolId' => $this->request->getPost('rolIdS'),
     'menuDetalleId' => $this->request->getPost('menuDetalleId'),
   ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('rolMenuIdS');
    $valor2 = $this->request->getPost('rolIdS');
    $valor3 = $this->request->getPost('menuDetalleId');
    insert_acciones('INSERTÓ','UN LÍMITE MENÚ | rolMenuId '.$valor1.' | rolId '.$valor2.' | menuDetalleId '.$valor3);
    return redirect()->to('/Menu/MenuRol')->with('message', 'Limitación creada con éxito.');
  }
}

public function edit($id = null){
  $menuDetalle = new MenuDetalleModel();
  $rolesMenu = new RolesMenus();
  $limitar = new LimitarMenuModel();

  $rol = new RolesModel();
  if ($limitar->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar menú',
    ['validation'=>$validation,'limitarMenu'=> $limitar->asObject()->find($id),'menuDeta' => $rolesMenu->asObject()->select()->findAll(),'limite' => $limitar->asObject()->select()->where('limitarMenuId',$id)->findAll(),'menuDetalles' => $menuDetalle->asObject()->select()->where('estado','1')->findAll()],'edit');
}

public function update($id = null){
  $limitar = new LimitarMenuModel();
  if ($limitar->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  } 
  $rolId = $this->request->getPost('rolId');
  $menuDetalleId = $this->request->getPost('menuDetalleId');
  $buscarMenuRol = $limitar->select('rolId','menuDetalleId')->where('rolId',$rolId)->where('menuDetalleId',$menuDetalleId)->first();
  if ($buscarMenuRol) {
   return redirect()->to("/Menu/MenuRol")->with('message','Esta limitacion no ha recibido ninguna actualización');
 }else {
  $limitar->update($id, [
    'menuDetalleId' => $this->request->getPost('menuDetalleId'),
  ]);
}
helper("Bitacora");
$valor1 = $this->request->getPost('menuDetalleId');
insert_acciones('EDITÓ','UN LÍMITE MENÚ | menuDetalleId '.$valor1);
return redirect()->to('/Menu/MenuRol')->with('message', 'Límite realializado con éxito.');
}

public function delete($id = null){
 $limitar = new LimitarMenuModel();

 if ($limitar->find($id) == null)
 {
  throw PageNotFoundException::forPageNotFound();
}  

$limitar->delete($id);
helper("Bitacora");
insert_acciones('ELIMINÓ','UN LÍMITE MENÚ | limitarMenuId '.$id);
return redirect()->to('/Menu/LimitarMenu')->with('message', 'Límite eliminado con éxito.');
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Menu/LimitarMenu/$view",$data);
  echo view("dashboard/templates/footer");
}
}
