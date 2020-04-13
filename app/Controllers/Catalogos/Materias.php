<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\MateriasModel;
use App\Models\Catalogos\PlanMateriaModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Materias extends BaseController {
  public function index(){
    $materias = new MateriasModel();

    $data = [
      'materias' => $materias->asObject()
      ->select('cof_materias.*')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de materias',$data,'index');
  }

  public function new(){
    $materias = new MateriasModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear materia',['validation'=>$validation, 'materias'=> new MateriasModel()],'new');
  }

  public function create(){
    $materias = new MateriasModel();

    if($this->validate('materia')){
      $id = $materias->insert([
        'nombre' =>$this->request->getPost('nombre'),
        'codMateria' =>$this->request->getPost('codMateria'),
        'nombreCorto' =>$this->request->getPost('nombreCorto'),
        'estado' =>'ACTIVO',
      ]);

      return redirect()->to('/Catalogos/materias')->with('message', 'materia creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $materias = new MateriasModel();

    if ($materias->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar materia',
      ['validation'=>$validation,'materias'=> $materias->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    $materias = new MateriasModel();

    if ($materias->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }

    if($this->validate('materia_editar')){
      $materias->update($id, [
        'nombre' =>$this->request->getPost('nombre_editar'),
        'codMateria' =>$this->request->getPost('codMateria_editar'),
        'nombreCorto' =>$this->request->getPost('nombreCorto_editar'),
        'estado' =>$this->request->getPost('estado'),

      ]);
      return redirect()->to('/Catalogos/materias')->with('message', 'materia editada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $materias = new MateriasModel();
    $planMateria = new PlanMateriaModel();
    $buscarplanMateria = $planMateria->select('materiaId')->where('materiaId',$id)->first();

    if ($buscarplanMateria) {
      return redirect()->to("/Catalogos/materias")->with('messageError','Lo sentimos, la materia esta asociada a un plan de materias y no puede ser eliminada.');
    }

    if ($materias->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $materias->delete($id);

    return redirect()->to('/Catalogos/materias')->with('message', 'materia eliminada con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/materias/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
