<?php namespace App\Controllers\Menu;
use App\Models\Menu\LimitarMenuModel;
use App\Models\Menu\MenuDetalleModel;
use App\Models\Menu\MenuModel;
use App\Models\Menu\RolesMenus;
use App\Models\Catalogos\RolesModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class MenuRol extends BaseController {
  public function index(){
    $menuDetalle = new MenuDetalleModel();
    $limitar = new LimitarMenuModel();
    $rolesMenu = new RolesMenus();
    $roles = new RolesModel();
    $data = [
      'rolesMenu' => $rolesMenu->asObject()
      ->select('cof_roles_menus.*,cof_menus.*,cof_rol.*')
      ->join('cof_menus','cof_menus.menuId = cof_roles_menus.menuId')
      ->join('cof_rol','cof_rol.rolId = cof_roles_menus.rolId')->orderBy('cof_roles_menus.rolId','asc')->orderBy('cof_roles_menus.menuId','asc')
      ->findAll()
    ];

    $this->_loadDefaultView('Listado de menus',$data,'index');
  }

  public function new(){
    $menu = new MenuModel();
    $rolesMenu = new RolesMenus();
    $roles = new RolesModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear menú',['validation'=>$validation,'rolesMenu'=> new RolesMenus(),'menu' => $menu->asObject()->where('estado','1')->findAll(),'rol' => $roles->asObject()->findAll()],'new');
  }

  public function create(){
    $rolesMenu = new RolesMenus();
    $rolId = $this->request->getPost('rolId');
    $menuId = $this->request->getPost('menuId');
    $buscarMenuRol = $rolesMenu->select('rolId','menuId')->where('rolId',$rolId)->where('menuId',$menuId)->first();
    if ($buscarMenuRol) {
      return redirect()->to("/Menu/MenuRol")->with('messageError','Lo sentimos, este menú rol ya existe');
    }else{
      $id = $rolesMenu->insert([
        'rolId'      => $this->request->getPost('rolId'),
        'menuId' => $this->request->getPost('menuId'),
      ]);
      helper("Bitacora");
      $valor1 = $this->request->getPost('rolId');
      $valor2 = $this->request->getPost('menuId');
      insert_acciones('INSERTÓ','MENU ROL | rolId '.$valor1.' | menuId '.$valor2);
      return redirect()->to('/Menu/MenuRol')->with('message', 'Menú rol creado con éxito.');


    }
  }

  public function edit($id = null){
    $menu = new MenuModel();
    $rolesMenu = new RolesMenus();
    $roles = new RolesModel();

    if ($rolesMenu->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar menú',
      ['validation'=>$validation,'rolesMenu'=> $rolesMenu->asObject()->find($id),'menu' => $menu->asObject()->where('estado','1')->findAll(),'rol' => $roles->asObject()->findAll()],'edit');
  }

  public function update($id = null){
   $rolesMenu = new RolesMenus();

   if ($rolesMenu->find($id) == null)
   {
    throw PageNotFoundException::forPageNotFound();
  } 
  $rolId = $this->request->getPost('rolId_editar');
  $menuId = $this->request->getPost('menuId_editar');
  
  $buscarMenuRol  = $rolesMenu->select('rolId','menuId')->where('rolId',$rolId)->where('menuId',$menuId)->where('rolMenuId',$id)->first();
  $buscarMenuRol1  = $rolesMenu->select('rolId','menuId')->where('rolId',$rolId)->where('menuId',$menuId)->first();

  if ($buscarMenuRol) {
    return redirect()->to('/Menu/MenuRol')->with('message', 'Menú rol editado con éxito.');
  }else if ($buscarMenuRol1) {
   return redirect()->to("/Menu/MenuRol")->with('messageError','Lo sentimos, este menú rol ya existe');
 }
 else if (!$buscarMenuRol) {
  $rolesMenu->update($id, [
    'rolId'      => $this->request->getPost('rolId_editar'),
    'menuId' => $this->request->getPost('menuId_editar'),
  ]);
  helper("Bitacora");
  $valor1 = $this->request->getPost('rolId_editar');
  $valor2 = $this->request->getPost('menuId_editar');
  insert_acciones('EDITÓ','MENU ROL | rolId '.$valor1.' | menuId '.$valor2);
  return redirect()->to('/Menu/MenuRol')->with('message', 'Menú rol editado con éxito.');
}
return redirect()->back()->withInput();
}

public function delete($id = null){
  $rolesMenu = new RolesMenus();
  $limitar = new LimitarMenuModel();
  $buscarMenuRol = $limitar->select('rolMenuId')->where('rolMenuId',$id)->first();

  if ($buscarMenuRol) {
    return redirect()->to("/Menu/MenuRol")->with('messageError','Lo sentimos, este menú rol tiene limitaciones asociadas y no puede ser eliminado.');
  }

  if ($rolesMenu->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $rolesMenu->delete($id);
  helper("Bitacora");
  insert_acciones('ELIMINÓ','MENU ROL | rolMenuId '.$id);
  return redirect()->to('/Menu/MenuRol')->with('message', 'Menú rol eliminado con éxito.');
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Menu/MenuRol/$view",$data);
  echo view("dashboard/templates/footer");
}
}
