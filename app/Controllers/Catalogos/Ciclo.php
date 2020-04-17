<?php namespace App\Controllers\Catalogos;
use App\Models\SeleccionarCicloModel;
use App\Models\Catalogos\CargaAcademicaModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Ciclo extends BaseController {
  public function index(){
    $ciclo = new SeleccionarCicloModel();

    $data = [
      'ciclos' => $ciclo->asObject()
      ->select('cof_aper_ciclo.*')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de ciclos',$data,'index');
  }

  public function new(){
    $ciclo = new SeleccionarCicloModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear ciclo',['validation'=>$validation, 'ciclo'=> new SeleccionarCicloModel()],'new');
  }

  public function create(){
    $ciclo = new SeleccionarCicloModel();

    if($this->validate('ciclo')){
      $id = $ciclo->insert([
        'ciclo' =>$this->request->getPost('ciclo'),
        'anio' =>$this->request->getPost('anio'),
        'nombrePersonalizado' =>$this->request->getPost('nombrePersonalizado'),
        'fechaInicio' =>$this->request->getPost('fechaInicio'),
        'fechaFin' =>$this->request->getPost('fechaFin'),
        'estado' =>'ACTIVO',
      ]);

      return redirect()->to('/Catalogos/ciclo')->with('message', 'Ciclo creado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $ciclo = new SeleccionarCicloModel();

    if ($ciclo->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar ciclo',
      ['validation'=>$validation,'ciclo'=> $ciclo->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    $ciclo = new SeleccionarCicloModel();

    if ($ciclo->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }

    if($this->validate('cicloEditar')){
      $ciclo->update($id, [
        'ciclo' =>$this->request->getPost('ciclo_editar'),
        'anio' =>$this->request->getPost('anio_editar'),
        'nombrePersonalizado' =>$this->request->getPost('nombrePersonalizado_editar'),
        'fechaInicio' =>$this->request->getPost('fechaInicio_editar'),
        'fechaFin' =>$this->request->getPost('fechaFin_editar'),
        'estado' =>$this->request->getPost('estado'),

      ]);
      return redirect()->to('/Catalogos/ciclo')->with('message', 'Ciclo editado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $ciclo = new SeleccionarCicloModel();
    $carga = new CargaAcademicaModel();
    $buscarCarga = $carga->select('aperCicloId')->where('aperCicloId',$id)->first();

    if ($buscarCarga) {
      return redirect()->to("/Catalogos/ciclo")->with('messageError','Lo sentimos, el ciclo esta asociado a una carga académica y no puede ser eliminado.');
    }

    if ($ciclo->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $ciclo->delete($id);

    return redirect()->to('/Catalogos/ciclo')->with('message', 'ciclo eliminado con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/ciclo/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
