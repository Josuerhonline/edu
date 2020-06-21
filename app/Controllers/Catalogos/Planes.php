<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PlanesModel;
use App\Models\Catalogos\CarrerasModel;
use App\Models\Catalogos\PlanMateriaModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Planes extends BaseController {
  public function index(){
    $planes = new PlanesModel();

    $data = [
      'planes' => $planes->asObject()
      ->select('cof_planes.*, cof_carreras.carreraId as carreraId,cof_carreras.nombre as nombre')
      ->join('cof_carreras','cof_carreras.carreraId = cof_planes.carreraId')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de planes',$data,'index');
  }

  public function new(){
    $plan = new PlanesModel();
    $carrera = new CarrerasModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear plan',['validation'=>$validation, 'plan'=> new PlanesModel(),'carrera' => $carrera->asObject()->where('estado','1')->findAll()],'new');
  }

  public function create(){
    $plan = new PlanesModel();

    if($this->validate('plan')){
      $id = $plan->insert([
        'carreraId' =>$this->request->getPost('carreraId'),
        'nombrePlan' =>$this->request->getPost('plan'),
        'plaAcuerdo' =>$this->request->getPost('planAcuerdo'),
        'estado' =>'1',
      ]);

      return redirect()->to('/Catalogos/planes')->with('message', 'Plan creado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $plan = new PlanesModel();
    $carrera = new CarrerasModel();

    if ($plan->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar plan',
      ['validation'=>$validation,'plan'=> $plan->asObject()->find($id),'carrera' => $carrera->asObject()->where('estado','1')->findAll() ],'edit');
  }

  public function update($id = null){
    $plan = new PlanesModel();

    if ($plan->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }
    $planE = $this->request->getPost('plan_editar');
    $buscarPlan = $plan->select('nombrePlan')->where('nombrePlan',$planE)->where('planId',$id)->first();
    if ($buscarPlan) {
       $plan->update($id, [
        'carreraId' =>$this->request->getPost('carreraId_editar'),
        'plaAcuerdo' =>$this->request->getPost('planAcuerdo_editar'),
        'estado' =>$this->request->getPost('estado'),

      ]);
      return redirect()->to('/Catalogos/planes')->with('message', 'Plan editado con éxito.');
    }
    else if (!$buscarPlan) {
    if($this->validate('planEditar')){
      $plan->update($id, [
        'carreraId' =>$this->request->getPost('carreraId_editar'),
        'nombrePlan' =>$this->request->getPost('plan_editar'),
        'plaAcuerdo' =>$this->request->getPost('planAcuerdo_editar'),
        'estado' =>$this->request->getPost('estado'),

      ]);
      return redirect()->to('/Catalogos/planes')->with('message', 'Plan editado con éxito.');
    }
    }


    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $plan = new PlanesModel();
    $planMateria = new PlanMateriaModel();
    $buscarCarrera = $planMateria->select('planId')->where('planId',$id)->first();

    if ($buscarCarrera) {
      return redirect()->to("/Catalogos/planes")->with('messageError','Lo sentimos, El plan tiene materias asociadas y no puede ser eliminado.');
    }

    if ($plan->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $plan->delete($id);

    return redirect()->to('/Catalogos/planes')->with('message', 'Plan eliminado con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/planes/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
