<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PersonaModel;
use App\Models\Catalogos\CargaAcademicaModel;
use App\Models\Catalogos\PlanMateriaModel;
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
      ->select('cof_carga_academica.*, cof_personas.*,cof_plan_materia.planMateriaId as planMateriaId,cof_plan_materia.materiaId as materiaId,cof_plan_materia.planId as planId,cof_materias.nombre as nombre,cof_aper_ciclo.*,cof_planes.*')
      ->join('cof_aper_ciclo','cof_aper_ciclo.aperCicloId = cof_carga_academica.aperCicloId')
      ->join('cof_personas','cof_personas.personaId = cof_carga_academica.personaId')
      ->join('cof_plan_materia','cof_plan_materia.planMateriaId = cof_carga_academica.planMateriaId')
      ->join('cof_materias','cof_materias.materiaId = cof_plan_materia.materiaId')
      ->join('cof_planes','cof_planes.planId = cof_plan_materia.planId')
      ->findAll()
    ];

    $this->_loadDefaultView( 'Carga Académica',$data,'index');
  }


  public function edit($id = null){
    $cargaAcademica = new CargaAcademicaModel();
    $persona = new PersonaModel();
    $planMateria = new PlanMateriaModel();
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
    helper("cargaAcademica");
    $cargaAcademica = new UsuariosModel();

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    } 

    if($this->validate('cargaAcademicaUpdate')){
      $cargaAcademica->update($id, [
        'personaId' =>$this->request->getPost('personaId_editar'),
        'usuario' =>$this->request->getPost('usuario'),
        'clave' =>hashClave($this->request->getPost('clave')),
        'rolId' => $this->request->getPost('rolId_editar'),
        'estado' =>$this->request->getPost('estado_editar'),
      ]);
      return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario editado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $cargaAcademica = new UsuariosModel();

    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $cargaAcademica->delete($id);

    return redirect()->to('/Catalogos/usuario')->with('message', 'Usuario eliminado con éxito.');
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
