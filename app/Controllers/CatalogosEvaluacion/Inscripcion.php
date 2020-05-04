<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\InscripcionModel;
use App\Models\CatalogosEvaluacion\InscripcionDetalleModel;
use App\Models\CatalogosEvaluacion\InscripcionViewModel;
use App\Models\Catalogos\PlanMateriaModelView;
use App\Models\Catalogos\PersonaModel;
use App\Models\SeleccionarCicloModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Inscripcion extends BaseController {
  public function index(){
    $inscripcionDetalle = new InscripcionViewModel();
    $data = [
      'inscripcionDetalle' => $inscripcionDetalle->asObject()
      ->select('view_inscripcion.*')
      ->findAll()
    ];

    $this->_loadDefaultView( 'Listado de inscripciones',$data,'index');
  }

  public function edit($id = null){
    $inscripcion = new InscripcionModel();
    $planMateria = new PlanMateriaModelView();
    $persona = new PersonaModel();
    $ciclo = new SeleccionarCicloModel();
    if ($inscripcion->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar inscripcion',
      ['validation'=>$validation,'inscripcion'=> $inscripcion->asObject()->find($id),'persona'=> $persona->asObject()->findAll(),'ciclo'=> $ciclo->asObject()->findAll(),'planMateria'=> $planMateria->asObject()->findAll()],'edit');
  }

  public function update($id = null){
    $inscripcion = new InscripcionModel();
    $inscripcionDetalle = new InscripcionDetalleModel();


    if ($inscripcion->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }
  // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
    $valor = $this->request->getPost('persona');
    $buscarinscripcion = $inscripcion->select('personaId')->where('personaId',$valor)->where('inscripcionId',$id)->first();
    if ($buscarinscripcion) {
     if($this->validate('inscripcion')){
      $inscripcion->update($id, [
        'aperCicloId' =>$this->request->getPost('ciclo'),
        'fechaInscripcion' =>$this->request->getPost('fechaInscripcion'),
        'estado' =>$this->request->getPost('estado'),
      ]);
      $inscripcionDetalleId = $this->request->getPost('inscripcionDetalleId');
      $inscripcionDetalle->update($inscripcionDetalleId, [
        'inscripcionId' => $id,
        'planMateriaId' =>$this->request->getPost('planMateria'),
        'estado' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/Inscripcion')->with('message', 'Inscripción  editada con éxito.');
    }

  }else if(!$buscarinscripcion){
    if($this->validate('inscripcion_editar')){
      $inscripcion->update($id, [
        'personaId' =>$this->request->getPost('persona'),
        'aperCicloId' =>$this->request->getPost('ciclo'),
        'fechaInscripcion' =>$this->request->getPost('fechaInscripcion'),
        'estado' =>$this->request->getPost('estado'),
      ]);
      $inscripcionDetalleId = $this->request->getPost('inscripcionDetalleId');
      $inscripcionDetalle->update($inscripcionDetalleId, [
        'inscripcionId' => $id,
        'planMateriaId' =>$this->request->getPost('planMateria'),
        'estado' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/Inscripcion')->with('message', 'Inscripción  editada con éxito.');
    }
  }
  return redirect()->back()->withInput();
}

public function delete($id = null){
  $inscripcion = new InscripcionModel();
  $inscripcionDetalle = new InscripcionDetalleModel();

  if ($inscripcion->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  
  $inscripcionDetalle->where('inscripcionId',$id)->delete();
  $inscripcion->delete($id);

  return redirect()->to('/CatalogosEvaluacion/Inscripcion')->with('message', 'Inscripción eliminada con éxito.'); 
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("CatalogosEvaluacion/Inscripcion/$view",$data);
  echo view("dashboard/templates/footer");
}
}
