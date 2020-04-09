<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\FacultadModel;
use App\Models\Catalogos\UniversidadModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Facultad extends BaseController {

  public function index(){

    $facultad = new FacultadModel();

    $data = [
      'facultades' => $facultad->asObject()
      ->select('cof_facultad.*, cof_universidad.universidadId as universidadId,cof_universidad.universidad as universidad')
      ->join('cof_universidad','cof_universidad.universidadId = cof_facultad.universidadId')->findAll()
    ];
    $this->_loadDefaultView( 'Listado de facultades',$data,'index');
  }

  public function new(){
    $facultad = new FacultadModel();
    $universidad = new UniversidadModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear facultad',['validation'=>$validation, 'facultad'=> new FacultadModel(),'universidad' => $universidad->asObject()->findAll()],'new');

  }

  public function create(){
    helper("user");


     $facultad = new FacultadModel();

    if($this->validate('facultad')){
     $id = $facultad->insert([
      'universidadId' =>$this->request->getPost('universidadId'),
      'facultad' =>$this->request->getPost('facultad'),
    ]);

     return redirect()->to('/Catalogos/facultad')->with('message', 'Facultad creada con éxito.');
   }
   return redirect()->back()->withInput();
 }

 public function edit($id = null){
    $facultad = new FacultadModel();
    $universidad = new UniversidadModel();
  if ($facultad->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar facultad',
    ['validation'=>$validation,'facultad'=> $facultad->asObject()->find($id),'universidad' => $universidad->asObject()->findAll() ],'edit');
}
public function update($id = null){
  helper("user");
     $facultad = new FacultadModel();

  if ($facultad->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  
  if($this->validate('facultadEditar')){
    $facultad->update($id, [
      'universidadId' =>$this->request->getPost('universidadId_editar'),
      'facultad' =>$this->request->getPost('facultad_editar'),

    ]);
    return redirect()->to('/Catalogos/facultad')->with('message', 'Facultad editada con éxito.');
  }
  return redirect()->back()->withInput();
}

public function delete($id = null){

     $facultad = new FacultadModel();

  if ($facultad->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $facultad->delete($id);

  return redirect()->to('/Catalogos/facultad')->with('message', 'Facultad eliminada con éxito.');
  
}


private function _loadDefaultView($title,$data,$view){

  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Catalogos/facultad/$view",$data);
  echo view("dashboard/templates/footer");
}


}
