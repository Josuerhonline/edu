<?php namespace App\Controllers\Menu;
use App\Models\Menu\MenuDetalleModel;
use App\Models\Menu\MenuModel;
use App\Models\Menu\LimitarMenuModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class MenuDetalle extends BaseController {
  public function index(){
    $menuDetalle = new MenuDetalleModel();
    $data = [
      'menuDetalle' => $menuDetalle->asObject()
      ->select('cof_menus_detalle.*,cof_menus.nombreMenu AS nombreMenu')
      ->join('cof_menus','cof_menus.menuId = cof_menus_detalle.menuId')->orderBy('nombreMenu','asc')
      ->findAll()
    ];

    $this->_loadDefaultView('Listado de menuDetalles',$data,'index');
  }

  public function new(){
   $menu = new MenuModel();
   $menuDetalle = new MenuDetalleModel();
   $validation =  \Config\Services::validation();
   $this->_loadDefaultView('Crear menú detalle',['validation'=>$validation,'menuDetalle'=> new MenuDetalleModel(),'menu' => $menu->asObject()->where('estado','1')->findAll()],'new');
 }

 public function create(){
  $menuDetalle = new MenuDetalleModel();

  if($this->validate('menuDetalle')){
    $id = $menuDetalle->insert([
      'menuId'      => $this->request->getPost('menuId'),
      'nombreMenuDetalle' => $this->request->getPost('nombreMenuDetalle'),
      'orden' => $this->request->getPost('orden'),
      'archivo' => $this->request->getPost('archivo'),
      'estado'      => '1',
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('menuId');
    $valor2 = $this->request->getPost('nombreMenuDetalle');
    $valor3 = $this->request->getPost('orden');
    $valor4 = $this->request->getPost('archivo');
    insert_acciones('INSERTÓ','MENU DETALLE | menuId '.$valor1.' | nombre del menú detalle '.$valor2.' | orden '.$valor3.' | archivo '.$valor4);
    return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú creado con éxito.');
  }

  return redirect()->back()->withInput();
}

public function edit($id = null){
  $menuDetalle = new MenuDetalleModel();
  $menu = new MenuModel();
  if ($menuDetalle->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar menú',
    ['validation'=>$validation,'menuDetalle'=> $menuDetalle->asObject()->find($id),'menu' => $menu->asObject()->where('estado','1')->findAll()],'edit');
}

public function update($id = null){
 $menuDetalle = new MenuDetalleModel();

 if ($menuDetalle->find($id) == null)
 {
  throw PageNotFoundException::forPageNotFound();
} 
$menuIdEditar = $this->request->getPost('menuId_editar');
$nombreMenuDetalleEditar = $this->request->getPost('nombreMenuDetalle_editar');
$ordenEditar = $this->request->getPost('orden_editar');
$archivoEditar = $this->request->getPost('archivo_editar');

$buscarMenuDetalle = $menuDetalle->select('nombreMenuDetalle','orden','archivo')->where('nombreMenuDetalle',$nombreMenuDetalleEditar)->where('orden',$ordenEditar)->where('archivo',$archivoEditar)->where('menuDetalleId',$id)->first();
//SOLO NOMBRE MENU
$ordenArchivo = $menuDetalle->select('orden','archivo')->where('orden',$ordenEditar)->where('archivo',$archivoEditar)->where('menuDetalleId',$id)->first();
//MENU Y ORDEN
$buscarMenuOrden = $menuDetalle->select('nombreMenuDetalle','orden')->where('nombreMenuDetalle',$nombreMenuDetalleEditar)->where('orden',$ordenEditar)->where('menuDetalleId',$id)->first();
//MENU y ARCHIVO
$buscarMenuArchivo = $menuDetalle->select('nombreMenuDetalle','archivo')->where('nombreMenuDetalle',$nombreMenuDetalleEditar)->where('archivo',$archivoEditar)->where('menuDetalleId',$id)->first();

$buscarOrden = $menuDetalle->select('orden')->where('orden',$ordenEditar)->where('menuDetalleId',$id)->first();

$buscarArchivo = $menuDetalle->select('archivo')->where('archivo',$archivoEditar)->where('menuDetalleId',$id)->first();

if ($buscarMenuDetalle) {
  $menuDetalle->update($id, [
    'menuId' => $this->request->getPost('menuId_editar'),
    'estado' => $this->request->getPost('estado_editar'),
  ]);
  helper("Bitacora");
  $valor1 = $this->request->getPost('menuId_editar');
  $valor2 = $this->request->getPost('estado_editar');
  insert_acciones('EDITÓ','MENU DETALLE | menuId '.$valor1.' | estado '.$valor2);
  return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú detalle detalle editado con éxito.');
}
else if ($ordenArchivo) {
  if($this->validate('menuDetalleNombre_editar')){
    $menuDetalle->update($id, [
      'menuId' => $this->request->getPost('menuId_editar'),
      'nombreMenuDetalle' => $this->request->getPost('nombreMenuDetalle_editar'),
      'estado'      => $this->request->getPost('estado_editar'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('menuId_editar');
    $valor2 = $this->request->getPost('nombreMenuDetalle_editar');
    $valor3 = $this->request->getPost('estado_editar');
    insert_acciones('EDITÓ','MENU DETALLE | menuId '.$valor1.' | nombre del menú detalle '.$valor2.' | estado '.$valor3);
    return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú detalle editado con éxito.');
  }
}
else if ($buscarMenuOrden) {
  if($this->validate('menuDetalle_editar')){
    $menuDetalle->update($id, [
      'menuId' => $this->request->getPost('menuId_editar'),
      'archivo' => $this->request->getPost('archivo_editar'),
      'estado'      => $this->request->getPost('estado_editar'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('menuId_editar');
    $valor2 = $this->request->getPost('archivo_editar');
    $valor3 = $this->request->getPost('estado_editar');
    insert_acciones('EDITÓ','MENU DETALLE | menuId '.$valor1.' | archivo '.$valor2.' | estado '.$valor3);
    return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú detalle editado con éxito.');
  }
}else if ($buscarMenuArchivo) {
  if($this->validate('menuDetalle_editar1')){
    $menuDetalle->update($id, [
      'menuId' => $this->request->getPost('menuId_editar'),
      'orden' => $this->request->getPost('orden_editar'),
      'estado'      => $this->request->getPost('estado_editar'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('menuId_editar');
    $valor2 = $this->request->getPost('orden_editar');
    $valor3 = $this->request->getPost('estado_editar');
    insert_acciones('EDITÓ','MENU DETALLE | menuId '.$valor1.' | orden '.$valor2.' | estado '.$valor3);
    return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú detalle editado con éxito.');
  }
}else if ($buscarArchivo) {
  if($this->validate('menuDetalle_editar2')){
    $menuDetalle->update($id, [
      'menuId' => $this->request->getPost('menuId_editar'),
      'nombreMenuDetalle' => $this->request->getPost('nombreMenuDetalle_editar'),
      'orden' => $this->request->getPost('orden_editar'),
      'estado'      => $this->request->getPost('estado_editar'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('menuId_editar');
    $valor2 = $this->request->getPost('nombreMenuDetalle_editar');
    $valor3 = $this->request->getPost('orden_editar');
    $valor4 = $this->request->getPost('estado_editar');
    insert_acciones('EDITÓ','MENU DETALLE | menuId '.$valor1.' | nombre del menú detalle '.$valor2.' | orden '.$valor3.' | estado '.$valor4);
    return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú detalle editado con éxito.');
  }
}else if (!$buscarMenuDetalle || !$buscarMenuDetalleNombre || !$buscarOrden || !$buscarArchivo) {

  if($this->validate('menuDetalleEditar_principal')){
    $menuDetalle->update($id, [
      'menuId' => $this->request->getPost('menuId_editar'),
      'nombreMenuDetalle' => $this->request->getPost('nombreMenuDetalle_editar'),
      'archivo' => $this->request->getPost('archivo_editar'),
      'orden' => $this->request->getPost('orden_editar'),
      'estado'      => $this->request->getPost('estado_editar'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('menuId_editar');
    $valor2 = $this->request->getPost('nombreMenuDetalle_editar');
    $valor3 = $this->request->getPost('archivo_editar');
    $valor4 = $this->request->getPost('orden_editar');
    $valor5 = $this->request->getPost('estado_editar');
    insert_acciones('EDITÓ','MENU DETALLE | menuId '.$valor1.' | nombre del menú detalle '.$valor2.' | archivo '.$valor3.' | orden '.$valor4.' | estado '.$valor5);
    return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú detalle editado con éxito.');
  }
}
return redirect()->back()->withInput();
}

public function delete($id = null){
 $limitar = new LimitarMenuModel();
 $menuDetalle = new MenuDetalleModel();
 $buscarMenuDetalle = $limitar->select('menuDetalleId')->where('menuDetalleId',$id)->first();

 if ($buscarMenuDetalle) {
  return redirect()->to("/Menu/MenuDetalle")->with('messageError','Lo sentimos, este menú detalle tiene limitaciones asociadas y no puede ser eliminado');
}

if ($menuDetalle->find($id) == null)
{
  throw PageNotFoundException::forPageNotFound();
}  

$menuDetalle->delete($id);
helper("Bitacora");

insert_acciones('ELIMINÓ','MENU DETALLE | menuDetalleId '.$id);
return redirect()->to('/Menu/MenuDetalle')->with('message', 'Menú detalle eliminado con éxito.');
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Menu/MenuDetalle/$view",$data);
  echo view("dashboard/templates/footer");
}
}
