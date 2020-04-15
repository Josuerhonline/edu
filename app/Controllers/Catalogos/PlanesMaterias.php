<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PlanMateriaModelView;
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

    private function _loadDefaultView($title,$data,$view){
        $dataHeader =[
          'title' => $title
        ];
    
        echo view("dashboard/templates/header",$dataHeader);
        echo view("Catalogos/planMateria/$view",$data);
        echo view("dashboard/templates/footer");
    }
}