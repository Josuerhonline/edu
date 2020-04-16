<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\InstrumentoDetalleModel;
use App\Models\CatalogosEvaluacion\TemasCapacitacionModel;
use App\Models\CatalogosEvaluacion\preguntasModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Preguntas extends BaseController {
  public function index(){
    $pregunta = new preguntasModel();

    $data = [
      'preguntas' => $pregunta->asObject()
      ->select('eva_preguntas.*,eva_temas_capacitacion.temaCapacitacionId,eva_temas_capacitacion.tema')
      ->join('eva_temas_capacitacion','eva_temas_capacitacion.temaCapacitacionId = eva_preguntas.temaCapacitacionId')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de preguntas',$data,'index');
  }

  public function new(){
    $temas = new TemasCapacitacionModel();
    $pregunta = new preguntasModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear pregunta',['validation'=>$validation, 'preguntas'=> new preguntasModel(),'temas' => $temas->asObject()->where('estado','1')->findAll()],'new');
  }

  public function create(){
    $pregunta = new preguntasModel();

    if($this->validate('pregunta')){
      $id = $pregunta->insert([
        'pregunta' =>$this->request->getPost('pregunta'),
        'temaCapacitacionId' =>$this->request->getPost('tema'),
        'estadoPregunta'  =>'1'
      ]);

      return redirect()->to('/CatalogosEvaluacion/preguntas/')->with('message', 'pregunta creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $pregunta = new preguntasModel();
    $temas = new TemasCapacitacionModel();
    if ($pregunta->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar pregunta',
      ['validation'=>$validation,'preguntas'=> $pregunta->asObject()->find($id),'temas' => $temas->asObject()->where('estado','1')->findAll()],'edit');
  }

  public function update($id = null){
    $pregunta = new preguntasModel();

    if ($pregunta->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }
  // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
    $valor = $this->request->getPost('pregunta_editar');
    $buscarpregunta = $pregunta->select('pregunta')->where('pregunta',$valor)->where('preguntaId',$id)->first();
    if ($buscarpregunta) {
     if($this->validate('pregunta_editar')){
      $pregunta->update($id, [
        'temaCapacitacionId' =>$this->request->getPost('tema_editar'),
        'estadoPregunta' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/preguntas')->with('message', 'pregunta editada con éxito.');
    }
  }else if(!$buscarpregunta){
    if($this->validate('pregunta_editar1')){
      $pregunta->update($id, [
        'pregunta' =>$this->request->getPost('pregunta_editar'),
        'temaCapacitacionId' =>$this->request->getPost('tema'),
        'estadoPregunta' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/preguntas')->with('message', 'pregunta editada con éxito.');
    }
  }
  return redirect()->back()->withInput();
}

public function delete($id = null){
  $pregunta = new preguntasModel();
  $instrumentoDetalle = new InstrumentoDetalleModel();
  $buscarpregunta = $instrumentoDetalle->select('preguntaId')->where('preguntaId',$id)->first();

  if ($buscarpregunta) {
    return redirect()->to("/CatalogosEvaluacion/preguntas")->with('messageError','Lo sentimos, la pregunta esta asociada a un instrumento de evaluación y no puede ser eliminada.');
  }

  if ($pregunta->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $pregunta->delete($id);

  return redirect()->to('/CatalogosEvaluacion/preguntas')->with('message', 'pregunta eliminada con éxito.'); 
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("CatalogosEvaluacion/preguntas/$view",$data);
  echo view("dashboard/templates/footer");
}
}
