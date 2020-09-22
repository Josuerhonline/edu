<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\AperEvaluacionModel;
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;
use App\Models\CatalogosEvaluacion\InstrumentoDetalleModel;
use App\Models\CatalogosEvaluacion\preguntasViewModel;
use App\Models\CatalogosEvaluacion\preguntasModel;
use App\Models\CatalogosEvaluacion\InstrumentoModel;
use App\Models\Catalogos\PonderacionesModel;
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
    $ponderacion = new PonderacionesModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear aperura de evaluación',['validation'=>$validation, 'instrumento'=> new InstrumentoModel(),'area' => $area->asObject()->where('estadoAreaEva','1')->findAll(),'instrumento' => $instrumento->asObject()->where('estadoInstrumento','1')->findAll(),'preguntas' => $pregunta->asObject()->where('estadoPregunta','1')->findAll(),'ponderacion' => $ponderacion->asObject()->where('estadoPonderacion','1')->findAll()],'new');
  }

  public function create(){
    $instrumentoM = new InstrumentoDetalleModel();
    $instrumento = new InstrumentoModel();
    $identificador = $this->request->getPost('nombre');
    if($this->validate('instrumento')){
      $id = $instrumento->insert([
        'areaEvaluacionId' =>$this->request->getPost('area'),
        'ponderacionId' =>$this->request->getPost('ponderacion'),
        'nombreInstrumento' =>$this->request->getPost('nombre'),
        'descripcion' =>$this->request->getPost('descripcion'),
        'estadoInstrumento' =>'1',
      ]);
    }
    $instrumentoIdDeta = $instrumento->select('instrumentoId')->where('nombreInstrumento',$identificador)->first();
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_1'),
        'orden' =>'1',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_2'),
        'orden' =>'2',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_3'),
        'orden' =>'3',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_4'),
        'orden' =>'4',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_5'),
        'orden' =>'5',

      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_6'),
        'orden' =>'6',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_7'),
        'orden' =>'7',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_8'),
        'orden' =>'8',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_9'),
        'orden' =>'9',
      ]);
    }
    if($this->validate('preguntas')){
      $id = $instrumentoM->insert([
        'instrumentoId' =>$instrumentoIdDeta,
        'preguntaId' =>$this->request->getPost('pregunta_10'),
        'orden' =>'10',
      ]);
      helper("Bitacora");
      $identificador = $this->request->getPost('nombre');
      insert_acciones('INSERTÓ','INSTRUMENTO DE EVALUACIÓN | nombre '.$identificador);
      return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Instrumento creado con éxito.');
    }
    return redirect()->back()->withInput();
  }

  public function edit($id = null){
   $instrumento = new InstrumentoModel();
   $instrumentoM = new InstrumentoDetalleModel();
   $area = new AreasEvaluacioModel();
   $pregunta = new preguntasViewModel();
   $ponderacion = new PonderacionesModel();


   if ($instrumento->find($id) == null)
   {
    throw PageNotFoundException::forPageNotFound();
  }  

  $validation =  \Config\Services::validation();
  $this->_loadDefaultView('Actualizar instrumento',
    ['validation'=>$validation,'instrumento'=> $instrumento->asObject()->find($id),'area' => $area->asObject()->where('estadoAreaEva','1')->findAll(),'preguntas' => $pregunta->asObject()->where('estadoPregunta','1')->findAll(),'ponderacion' => $ponderacion->asObject()->where('estadoPonderacion','1')->findAll()],'edit');
}

public function update($id = null){
  $instrumento = new InstrumentoModel();
  $instrumentoM = new InstrumentoDetalleModel();

  if ($instrumento->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }
  // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
  $valor = $this->request->getPost('nombre');
  $buscarinstrumentos = $instrumento->select('nombreInstrumento')->where('nombreInstrumento',$valor)->where('instrumentoId',$id)->first();
  if ($buscarinstrumentos) {
   if($this->validate('instrumento_editar')){
    $instrumento->update($id, [
      'areaEvaluacionId' =>$this->request->getPost('area'),
      'ponderacionId' =>$this->request->getPost('ponderacion_editar'),
      'descripcion' =>$this->request->getPost('descripcion'),
      'estadoInstrumento' =>$this->request->getPost('estado'),
    ]);
  }
  $id1 = $this->request->getPost('id1');
  if($this->validate('preguntas')){
   $instrumentoM->update($id1, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_1'),
    'orden' =>'1',
  ]);
 }
 $id2 = $this->request->getPost('id2');
 if($this->validate('preguntas')){
  $instrumentoM->update($id2, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_2'),
    'orden' =>'2',
  ]);
}
$id3 = $this->request->getPost('id3');
if($this->validate('preguntas')){
 $instrumentoM->update($id3, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_3'),
  'orden' =>'3',
]);
}
$id4 = $this->request->getPost('id4');
if($this->validate('preguntas')){
 $instrumentoM->update($id4, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_4'),
  'orden' =>'4',
]);
}
$id5 = $this->request->getPost('id5');
if($this->validate('preguntas')){
  $instrumentoM->update($id5, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_5'),
    'orden' =>'5',

  ]);
}
$id6 = $this->request->getPost('id6');
if($this->validate('preguntas')){
  $instrumentoM->update($id6, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_6'),
    'orden' =>'6',
  ]);
}
$id7 = $this->request->getPost('id7');
if($this->validate('preguntas')){
 $instrumentoM->update($id7, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_7'),
  'orden' =>'7',
]);
}
$id8 = $this->request->getPost('id8');
if($this->validate('preguntas')){
 $instrumentoM->update($id8, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_8'),
  'orden' =>'8',
]);
}
$id9 = $this->request->getPost('id9');
if($this->validate('preguntas')){
  $instrumentoM->update($id9, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_9'),
    'orden' =>'9',
  ]);
}
$id10 = $this->request->getPost('id10');
if($this->validate('preguntas')){
  $instrumentoM->update($id10, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_10'),
    'orden' =>'10',
  ]);
  helper("Bitacora");
  insert_acciones('EDITÓ','INSTRUMENTO DE EVALUACIÓN | instrumentoId '.$id);
  return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Instrumento actualizado con éxito.');
}
}else if (!$buscarinstrumentos) {
  if($this->validate('instrumento')){
    $instrumento->update($id, [
      'nombreInstrumento' => $this->request->getPost('nombre'),
      'areaEvaluacionId' =>$this->request->getPost('area'),
      'descripcion' =>$this->request->getPost('descripcion'),
      'estadoInstrumento' =>$this->request->getPost('estado'),
    ]);
  }
  $id1 = $this->request->getPost('id1');
  if($this->validate('preguntas')){
   $instrumentoM->update($id1, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_1'),
    'orden' =>'1',
  ]);
 }
 $id2 = $this->request->getPost('id2');
 if($this->validate('preguntas')){
  $instrumentoM->update($id2, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_2'),
    'orden' =>'2',
  ]);
}
$id3 = $this->request->getPost('id3');
if($this->validate('preguntas')){
 $instrumentoM->update($id3, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_3'),
  'orden' =>'3',
]);
}
$id4 = $this->request->getPost('id4');
if($this->validate('preguntas')){
 $instrumentoM->update($id4, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_4'),
  'orden' =>'4',
]);
}
$id5 = $this->request->getPost('id5');
if($this->validate('preguntas')){
  $instrumentoM->update($id5, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_5'),
    'orden' =>'5',

  ]);
}
$id6 = $this->request->getPost('id6');
if($this->validate('preguntas')){
  $instrumentoM->update($id6, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_6'),
    'orden' =>'6',
  ]);
}
$id7 = $this->request->getPost('id7');
if($this->validate('preguntas')){
 $instrumentoM->update($id7, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_7'),
  'orden' =>'7',
]);
}
$id8 = $this->request->getPost('id8');
if($this->validate('preguntas')){
 $instrumentoM->update($id8, [
  'instrumentoId' =>$id,
  'preguntaId' =>$this->request->getPost('pregunta_8'),
  'orden' =>'8',
]);
}
$id9 = $this->request->getPost('id9');
if($this->validate('preguntas')){
  $instrumentoM->update($id9, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_9'),
    'orden' =>'9',
  ]);
}
$id10 = $this->request->getPost('id10');
if($this->validate('preguntas')){
  $instrumentoM->update($id10, [
    'instrumentoId' =>$id,
    'preguntaId' =>$this->request->getPost('pregunta_10'),
    'orden' =>'10',
  ]);
  helper("Bitacora");
  insert_acciones('EDITÓ','INSTRUMENTO DE EVALUACIÓN | instrumentoId '.$id);
  return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Instrumento actualizado con éxito.');
}
}

return redirect()->back()->withInput();
}

public function delete($id = null){
  $instrumento = new InstrumentoModel();
  $instrumentoDetalle = new InstrumentoDetalleModel();
  $evaluacion = new AperEvaluacionModel();
  $buscarinstrumento = $evaluacion->select('InstrumentoId')->where('InstrumentoId',$id)->first();

  if ($buscarinstrumento) {
    return redirect()->to("/CatalogosEvaluacion/Instrumento")->with('messageError','Lo sentimos, este instrumento  esta asociado a una apertura de evaluación y no puede ser eliminado.');
  }

  if ($instrumento->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  
  $instrumentoDetalle->where('instrumentoId',$id)->delete();
  $instrumento->delete($id);
  helper("Bitacora");
  insert_acciones('ELIMINÓ','INSTRUMENTO DE EVALUACIÓN | instrumentoId '.$id);
  return redirect()->to('/CatalogosEvaluacion/Instrumento')->with('message', 'Instrumento de evaluación eliminado con éxito.'); 
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("CatalogosEvaluacion/Instrumento/$view",$data);
  echo view("dashboard/templates/footerInstrumento");
}

}

?>