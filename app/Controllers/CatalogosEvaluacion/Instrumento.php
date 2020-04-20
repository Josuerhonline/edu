<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\AperEvaluacionModel;
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;
use App\Models\CatalogosEvaluacion\InstrumentoDetalleModel;
use App\Models\CatalogosEvaluacion\preguntasViewModel;
use App\Models\CatalogosEvaluacion\InstrumentoModel;
use App\Models\SeleccionarareaModel;

use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Instrumento extends BaseController {
  public function index(){
    $instrumento = new InstrumentoModel();

    $data = [
      'instrumento' => $instrumento->asObject()
      ->select('eva_instrumento.*,eva_areas_evaluacion.areaEvaluacionId,eva_areas_evaluacion.areaEvaluacion')
      ->join('eva_areas_evaluacion','eva_areas_evaluacion.areaEvaluacionId = eva_instrumento.areaEvaluacionId')
      ->findAll()
    ];

    $this->_loadDefaultView( 'Instrumento de evaluación',$data,'index');
  }

  public function new(){
    $area = new AreasEvaluacioModel();
    $instrumento = new InstrumentoModel();
    $pregunta = new preguntasViewModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear aperura de evaluación',['validation'=>$validation, 'instrumento'=> new InstrumentoModel(),'area' => $area->asObject()->where('estadoAreaEva','1')->findAll(),'instrumento' => $instrumento->asObject()->where('estadoInstrumento','1')->findAll(),'preguntas' => $pregunta->asObject()->findAll()],'new');
  }

  public function create(){
    $instrumentoM = new InstrumentoDetalleModel();
    $instrumento = new InstrumentoDetalleModel();

    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_1'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_2'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_3'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_4'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_5'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_6'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_7'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_8'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_9'),
      ]);
    }
    if($this->validate('instrumento')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>'1',
        'preguntaId' =>$this->request->getPost('pregunta_10'),
      ]);

    }



    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $instrumento = new InstrumentoModel();
    $area = new SeleccionarareaModel();
    $instrumento = new InstrumentoModel();
    if ($instrumento->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar instrumento',
      ['validation'=>$validation,'instrumento'=> $instrumento->asObject()->find($id),'area' => $area->asObject()->where('estado','1')->findAll(),'instrumento' => $instrumento->asObject()->where('estadoInstrumento','1')->findAll()],'edit');
  }

  public function update($id = null){
    $instrumento = new InstrumentoModel();

    if ($instrumento->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }
  // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
    $valor = $this->request->getPost('fechaInicio_editar');
    $valor1 = $this->request->getPost('fechaFin_editar');
    $buscarinstrumentos = $instrumento->select('fechaInicio','fechaFin')->where('fechaInicio',$valor)->where('fechaFin',$valor1)->where('InstrumentoId',$id)->first();
    $buscarinstrumento = $instrumento->select('fechaInicio')->where('fechaInicio',$valor)->where('InstrumentoId',$id)->first();
    $buscarinstrumento1 = $instrumento->select('fechaFin')->where('fechaFin',$valor)->where('InstrumentoId',$id)->first();
    if ($buscarinstrumentos) {
     if($this->validate('instrumento_editar')){
      $instrumento->update($id, [
        'aperareaId' =>$this->request->getPost('area_editar'),
        'instrumentoId' =>$this->request->getPost('instrumento_editar'),
        'estadoinstrumento' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Apertura de evaluación editada con éxito.');
    }
  }else if ($buscarinstrumento) {
   if($this->validate('instrumento_editar2')){
    $instrumento->update($id, [
      'aperareaId' =>$this->request->getPost('area_editar'),
      'instrumentoId' =>$this->request->getPost('instrumento_editar'),
      'fechaFin' =>$this->request->getPost('fechaFin_editar'),
      'estadoinstrumento' =>$this->request->getPost('estado'),
    ]);
    return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Apertura de evaluación editada con éxito.');
  }
}else if ($buscarinstrumento1) {
 if($this->validate('instrumento_editar1')){
  $instrumento->update($id, [
    'aperareaId' =>$this->request->getPost('area_editar'),
    'instrumentoId' =>$this->request->getPost('instrumento_editar'),
    'fechaInicio' =>$this->request->getPost('fechaInicio_editar'),
    'estadoinstrumento' =>$this->request->getPost('estado'),
  ]);
  return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Apertura de evaluación editada con éxito.');
}
}
else if(!$buscarinstrumento){
  if($this->validate('instrumento_editar1')){
    $instrumento->update($id, [
      'aperareaId' =>$this->request->getPost('area_editar'),
      'instrumentoId' =>$this->request->getPost('instrumento_editar'),
      'fechaInicio' =>$this->request->getPost('fechaInicio_editar'),
      'fechaFin' =>$this->request->getPost('fechaFin_editar'),
      'estadoinstrumento'  =>$this->request->getPost('estado'),
      'estadoinstrumento' =>$this->request->getPost('estado'),
    ]);
    return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Apertura de evaluación editada con éxito.');
  }
}
else if(!$buscarinstrumento1){
  if($this->validate('instrumento_editar2')){
    $instrumento->update($id, [
      'aperareaId' =>$this->request->getPost('area_editar'),
      'instrumentoId' =>$this->request->getPost('instrumento_editar'),
      'fechaInicio' =>$this->request->getPost('fechaInicio_editar'),
      'fechaFin' =>$this->request->getPost('fechaFin_editar'),
      'estadoinstrumento'  =>$this->request->getPost('estado'),
    ]);
    return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Apertura de evaluación editada con éxito.');
  }
}
return redirect()->back()->withInput();
}

public function delete($id = null){
  $instrumento = new InstrumentoModel();
  $evaluacion = new EvaluacionModel();
  $buscarinstrumento = $evaluacion->select('InstrumentoId')->where('InstrumentoId',$id)->first();

  if ($buscarinstrumento) {
    return redirect()->to("/CatalogosEvaluacion/Instrumento")->with('messageError','Lo sentimos, la Apertura de evaluación esta asociada a una evaluación y no puede ser eliminada.');
  }

  if ($instrumento->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $instrumento->delete($id);

  return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Apertura de evaluación eliminada con éxito.'); 
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("CatalogosEvaluacion/Instrumento/$view",$data);
  echo view("dashboard/templates/footer");
}
}
