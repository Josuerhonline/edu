<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\AperEvaluacionModel;
use App\Models\CatalogosEvaluacion\AperEvaluacionModelView;
use App\Models\CatalogosEvaluacion\EvaluacionModel;
use App\Models\CatalogosEvaluacion\InstrumentoModel;
use App\Models\SeleccionarCicloModel;

use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class AperEvaluacion extends BaseController {
  public function index(){
    $aperEva = new AperEvaluacionModel();

    $data = [
      'aperEva' => $aperEva->asObject()
      ->select('eva_aper_evaluacion.*,view_aper_evaluacion.*')
      ->join('view_aper_evaluacion','view_aper_evaluacion.AperEvaluacionId = eva_aper_evaluacion.AperEvaluacionId')
      ->findAll()
    ];

    $this->_loadDefaultView( 'Apertura de evaluación',$data,'index');
  }

  public function new(){
    $aperEva = new AperEvaluacionModel();
    $ciclo = new SeleccionarCicloModel();
    $instrumento = new InstrumentoModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear aperura de evaluación',['validation'=>$validation, 'aperEva'=> new AperEvaluacionModel(),'ciclo' => $ciclo->asObject()->where('estado','1')->findAll(),'instrumento' => $instrumento->asObject()->where('estadoInstrumento','1')->findAll()],'new');
  }

  public function create(){
    $aperEva = new AperEvaluacionModel();

    if($this->validate('aperEva')){
      $id = $aperEva->insert([
        'aperCicloId' =>$this->request->getPost('ciclo'),
        'instrumentoId' =>$this->request->getPost('instrumento'),
        'fechaInicio' =>$this->request->getPost('fechaInicio'),
        'fechaFin' =>$this->request->getPost('fechaFin'),
        'estadoAperEva'  =>'1'
      ]);
      helper("Bitacora");
      $valor1 = $this->request->getPost('instrumento');
      insert_acciones('INSERTÓ','APERTURA DE EVALUACIÓN | aperEvaluacionId '.$id.' | instrumentoId '.$valor1);
      return redirect()->to('/CatalogosEvaluacion/AperEvaluacion/')->with('message', 'Apertura de evaluación creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $aperEva = new AperEvaluacionModel();
    $ciclo = new SeleccionarCicloModel();
    $instrumento = new InstrumentoModel();
    if ($aperEva->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar aperEva',
      ['validation'=>$validation,'aperEva'=> $aperEva->asObject()->find($id),'ciclo' => $ciclo->asObject()->where('estado','1')->findAll(),'instrumento' => $instrumento->asObject()->where('estadoInstrumento','1')->findAll()],'edit');
  }

  public function update($id = null){
    $aperEva = new AperEvaluacionModel();

    if ($aperEva->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }
  // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
    $valor = $this->request->getPost('fechaInicio_editar');
    $valor1 = $this->request->getPost('fechaFin_editar');
    $buscarAperEvas = $aperEva->select('fechaInicio','fechaFin')->where('fechaInicio',$valor)->where('fechaFin',$valor1)->where('aperEvaluacionId',$id)->first();
    $buscarAperEva = $aperEva->select('fechaInicio')->where('fechaInicio',$valor)->where('aperEvaluacionId',$id)->first();
    $buscarAperEva1 = $aperEva->select('fechaFin')->where('fechaFin',$valor)->where('aperEvaluacionId',$id)->first();
    if ($buscarAperEvas) {
     if($this->validate('aperEva_editar')){
      $aperEva->update($id, [
        'aperCicloId' =>$this->request->getPost('ciclo_editar'),
        'instrumentoId' =>$this->request->getPost('instrumento_editar'),
        'estadoAperEva' =>$this->request->getPost('estado'),
      ]);
      helper("Bitacora");
      $valor1 = $this->request->getPost('instrumento_editar');
      $valor2 = $this->request->getPost('fechaInicio_editar');
      $valor3 = $this->request->getPost('fechaFin_editar');
      $valor4 = $this->request->getPost('estado');
      insert_acciones('EDITÓ','APERTURA DE EVALUACIÓN | aperEvaluacionId '.$id.' | instrumentoId '.$valor1. ' | fecha de inicio: '.$valor2.' | fecha de finalización: '.$valor3.' | estado '.$valor4);
      return redirect()->to('/CatalogosEvaluacion/AperEvaluacion')->with('message', 'Apertura de evaluación editada con éxito.');
    }
  }else if ($buscarAperEva) {
   if($this->validate('aperEva_editar2')){
    $aperEva->update($id, [
      'aperCicloId' =>$this->request->getPost('ciclo_editar'),
      'instrumentoId' =>$this->request->getPost('instrumento_editar'),
      'fechaFin' =>$this->request->getPost('fechaFin_editar'),
      'estadoAperEva' =>$this->request->getPost('estado'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('instrumento_editar');
    $valor2 = $this->request->getPost('fechaInicio_editar');
    $valor3 = $this->request->getPost('fechaFin_editar');
    $valor4 = $this->request->getPost('estado');
    insert_acciones('EDITÓ','APERTURA DE EVALUACIÓN | aperEvaluacionId '.$id.' | instrumentoId '.$valor1. ' | fecha de inicio: '.$valor2.' | fecha de finalización: '.$valor3.' | estado '.$valor4);
    return redirect()->to('/CatalogosEvaluacion/AperEvaluacion')->with('message', 'Apertura de evaluación editada con éxito.');
  }
}else if ($buscarAperEva1) {
 if($this->validate('aperEva_editar1')){
  $aperEva->update($id, [
    'aperCicloId' =>$this->request->getPost('ciclo_editar'),
    'instrumentoId' =>$this->request->getPost('instrumento_editar'),
    'fechaInicio' =>$this->request->getPost('fechaInicio_editar'),
    'estadoAperEva' =>$this->request->getPost('estado'),
  ]);
  helper("Bitacora");
  $valor1 = $this->request->getPost('instrumento_editar');
  $valor2 = $this->request->getPost('fechaInicio_editar');
  $valor3 = $this->request->getPost('fechaFin_editar');
  $valor4 = $this->request->getPost('estado');

  insert_acciones('EDITÓ','APERTURA DE EVALUACIÓN | aperEvaluacionId '.$id.' | instrumentoId '.$valor1. ' | fecha de inicio: '.$valor2.' | fecha de finalización: '.$valor3.' | estado '.$valor4);
  return redirect()->to('/CatalogosEvaluacion/AperEvaluacion')->with('message', 'Apertura de evaluación editada con éxito.');
}
}
else if(!$buscarAperEva){
  if($this->validate('aperEva_editar1')){
    $aperEva->update($id, [
      'aperCicloId' =>$this->request->getPost('ciclo_editar'),
      'instrumentoId' =>$this->request->getPost('instrumento_editar'),
      'fechaInicio' =>$this->request->getPost('fechaInicio_editar'),
      'fechaFin' =>$this->request->getPost('fechaFin_editar'),
      'estadoAperEva'  =>$this->request->getPost('estado'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('instrumento_editar');
    $valor2 = $this->request->getPost('fechaInicio_editar');
    $valor3 = $this->request->getPost('fechaFin_editar');
    $valor4 = $this->request->getPost('estado');
    insert_acciones('EDITÓ','APERTURA DE EVALUACIÓN | aperEvaluacionId '.$id.' | instrumentoId '.$valor1. ' | fecha de inicio: '.$valor2.' | fecha de finalización: '.$valor3.' | estado '.$valor4);
    return redirect()->to('/CatalogosEvaluacion/AperEvaluacion')->with('message', 'Apertura de evaluación editada con éxito.');
  }
}
else if(!$buscarAperEva1){
  if($this->validate('aperEva_editar2')){
    $aperEva->update($id, [
      'aperCicloId' =>$this->request->getPost('ciclo_editar'),
      'instrumentoId' =>$this->request->getPost('instrumento_editar'),
      'fechaInicio' =>$this->request->getPost('fechaInicio_editar'),
      'fechaFin' =>$this->request->getPost('fechaFin_editar'),
      'estadoAperEva'  =>$this->request->getPost('estado'),
    ]);
    helper("Bitacora");
    $valor1 = $this->request->getPost('instrumento_editar');
    $valor2 = $this->request->getPost('fechaInicio_editar');
    $valor3 = $this->request->getPost('fechaFin_editar');
    $valor4 = $this->request->getPost('estado');
    insert_acciones('EDITÓ','APERTURA DE EVALUACIÓN | aperEvaluacionId '.$id.' | instrumentoId '.$valor1. ' | fecha de inicio: '.$valor2.' | fecha de finalización: '.$valor3.' | estado '.$valor4);
    return redirect()->to('/CatalogosEvaluacion/AperEvaluacion')->with('message', 'Apertura de evaluación editada con éxito.');
  }
}
return redirect()->back()->withInput();
}

public function delete($id = null){
  $aperEva = new AperEvaluacionModel();
  $evaluacion = new EvaluacionModel();
  $buscaraperEva = $evaluacion->select('AperEvaluacionId')->where('AperEvaluacionId',$id)->first();

  if ($buscaraperEva) {
    return redirect()->to("/CatalogosEvaluacion/AperEvaluacion")->with('messageError','Lo sentimos, la Apertura de evaluación esta asociada a una evaluación y no puede ser eliminada.');
  }

  if ($aperEva->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $aperEva->delete($id);
  helper("Bitacora");
  insert_acciones('ELIMINÓ','APERTURA DE EVALUACIÓN | aperEvaluacionId '.$id);
  return redirect()->to('/CatalogosEvaluacion/AperEvaluacion')->with('message', 'Apertura de evaluación eliminada con éxito.'); 
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("CatalogosEvaluacion/aperEvaluacion/$view",$data);
  echo view("dashboard/templates/footer");
}
}
