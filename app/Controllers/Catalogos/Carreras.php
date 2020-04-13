<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\CarrerasModel;
use App\Models\Catalogos\FacultadModel;
use App\Models\Catalogos\PlanesModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Carreras extends BaseController {
  public function index(){
    $carreras = new CarrerasModel();

    $data = [
      'carreras' => $carreras->asObject()
      ->select('cof_carreras.*,cof_facultad.facultad AS facultad')
      ->join('cof_facultad','cof_carreras.facultadId = cof_facultad.facultadId')->findAll()
    ];

    $this->_loadDefaultView('Listado de carreras',$data,'index');
  }

  public function new(){
    $facultades = new FacultadModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear carrera',['validation'=>$validation, 'carreras'=> new CarrerasModel(),'facultades' => $facultades->asObject()->findAll()],'new');
  }

  public function create(){
    $carreras = new CarrerasModel();

    if($this->validate('carreras')){
      $id = $carreras->insert([
        'facultadId'  => $this->request->getPost('facultad'),
        'nombre'      => $this->request->getPost('nombre_carrera'),
        'nombreCorto' => $this->request->getPost('nombre_corto'),
        'estado'      => '1',
      ]);

      return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $carreras = new CarrerasModel();
    $facultades = new FacultadModel();

    if ($carreras->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar carreras',
    ['validation'=>$validation,'carreras'=> $carreras->asObject()->find($id),'facultades' => $facultades->asObject()->findAll()],'edit');
  }

  public function update($id = null){
    $carreras = new CarrerasModel();

    if ($carreras->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    } 

    if($this->validate('carrerasEditar')){
      $carreras->update($id, [
        'facultadId'  => $this->request->getPost('facultad_editar'),
        'nombre'      => $this->request->getPost('nombre_carrera_editar'),
        'nombreCorto' => $this->request->getPost('nombre_corto_editar'),
        'estado'      => $this->request->getPost('estado_editar'),
      ]);
      return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera editada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $carreras   = new CarrerasModel();
    $planes     = new PlanesModel();
    $buscarPlan = $planes->select('carreraId')->where('carreraId',$id)->first();

    if ($buscarPlan) {
      return redirect()->to("/Catalogos/carreras")->with('messageError','Lo sentimos, la Carrera tiene Planes asociados y no puede ser eliminada.');
    }

    if ($carreras->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $carreras->delete($id);

    return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera eliminada con éxito.');
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/carreras/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
