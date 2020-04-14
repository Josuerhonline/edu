<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PersonaModel;
use App\Models\Catalogos\CargaAcademicaModel;
use App\Models\Catalogos\PlanMateriaModel;
use App\Models\Catalogos\PlanMateriaModelView;
use App\Models\Catalogos\UsuariosModel;
use App\Models\Catalogos\PlanesModel;
use App\Models\Catalogos\MateriasModel;
use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class CargaAdemic extends BaseController {
  public function index(){
    $cargaAcademica = new CargaAcademicaModel();
    $data = [
      'cargaAcademicas' => $cargaAcademica->asObject()
      ->select('cof_carga_academica.*, cof_personas.*,view_planmateria.*,cof_aper_ciclo.*')
      ->join('cof_aper_ciclo','cof_aper_ciclo.aperCicloId = cof_carga_academica.aperCicloId')
      ->join('cof_personas','cof_personas.personaId = cof_carga_academica.personaId')
      ->join('view_planmateria','view_planmateria.planMateriaId = cof_carga_academica.planMateriaId')

      ->findAll()
    ];

    $this->_loadDefaultView( 'Carga Académica',$data,'index');
  }


  public function edit($id = null){
    $cargaAcademica = new CargaAcademicaModel();
    $persona = new PersonaModel();
    $planMateria = new PlanMateriaModelView;
    $planes = new PlanesModel();
    $materias = new MateriasModel();
    $ciclo = new SeleccionarCicloModel();

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar usuario',
      ['validation'=>$validation,'cargaAcademica'=> $cargaAcademica->asObject()->find($id),'personas' => $persona->asObject()->findAll(),'plan' => $planes->asObject()->findAll(),'materia' => $materias->asObject()->findAll(),'ciclo' => $ciclo->asObject()->findAll(),'planM' => $planMateria->asObject()->findAll() ],'edit');
  }

  public function update($id = null){
    $cargaAcademica = new CargaAcademicaModel();

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    } 

    if($this->validate('cargaAcademica')){
      $cargaAcademica->update($id, [
        'personaId' =>$this->request->getPost('personaId'),
        'planMateriaId' =>$this->request->getPost('planMateria'),
        'aperCicloId' =>$this->request->getPost('ciclo'),
        'estadoCarga' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/Catalogos/CargaAdemic')->with('message', 'Carga Académica editada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
   $cargaAcademica = new CargaAcademicaModel();
    $planMateria = new PlanMateriaModel();
    $buscarplanMateria = $planMateria->select('planMateriaId')->where('planMateriaId',$id)->first();

    if ($buscarplanMateria) {
      return redirect()->to("/Catalogos/CargaAdemic")->with('messageError','Lo sentimos, Esta carga Académica tiene planes asociados y no puede ser eliminada.');
    }    

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $cargaAcademica->delete($id);
    return redirect()->to('/Catalogos/CargaAdemic')->with('message', 'Carga Académica eliminada con éxito.');
  }


  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/cargaAcademica/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
