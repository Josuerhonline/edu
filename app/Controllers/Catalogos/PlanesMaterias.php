<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PlanMateriaModelView;
use App\Models\Catalogos\PlanMateriaModel;
use App\Models\Catalogos\PlanesModel;
use App\Models\Catalogos\MateriasModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class PlanesMaterias extends BaseController{
    public function index(){
        $planMateria = new PlanMateriaModelView();
        $data = [
          'planMateria' => $planMateria->asObject()
          ->select('view_planmateria.*')
          ->findAll()
        ];
    
        $this->_loadDefaultView('Planes Materia',$data,'index');
    }

    public function edit($id = null){
        $planMateria = new PlanMateriaModelView;
        $planes = new PlanesModel();
        $materias = new MateriasModel();
    
        if ($planMateria->find($id) == null)
        {
          throw PageNotFoundException::forPageNotFound();
        }  
    
        $validation =  \Config\Services::validation();
        $this->_loadDefaultView('Actualizar Plan materia',
          ['validation'=>$validation,'planMateria'=> $planMateria->asObject()->find($id),'plan' => $planes->asObject()->findAll(),'materia' => $materias->asObject()->findAll()],'edit');
    }

    public function update($id = null){
        $planMateria = new PlanMateriaModel;
    
        if ($planMateria->find($id) == null)
        {
          throw PageNotFoundException::forPageNotFound();
        } 
    
        if($this->validate('planMateria')){
          $planMateria->update($id, [
            'materiaId' => $this->request->getPost('materiaId'),
            'planId'    => $this->request->getPost('planId'),
          ]);
          return redirect()->to('/Catalogos/PlanesMaterias')->with('message', 'Plan Materia editado con éxito.');
        }
    
        return redirect()->back()->withInput();
    }

    private function _loadDefaultView($title,$data,$view){
        $dataHeader =[
          'title' => $title
        ];
    
        echo view("dashboard/templates/header",$dataHeader);
        echo view("Catalogos/planMateria/$view",$data);
        echo view("dashboard/templates/footer");
    }
}