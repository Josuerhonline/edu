<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;
use App\Models\CatalogosEvaluacion\InstrumentoModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class AreasEvaluacion extends BaseController {
  public function index(){
    $areas = new AreasEvaluacioModel();

    $data = [
      'areas' => $areas->asObject()
      ->select('eva_areas_evaluacion.*')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de areas de evaluación',$data,'index');
  }

  public function new(){
    $areas = new AreasEvaluacioModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear areas de evaluación',['validation'=>$validation, 'areas'=> new AreasEvaluacioModel()],'new');
  }

  public function create(){
    $areas = new AreasEvaluacioModel();

    if($this->validate('area')){
      $id = $areas->insert([
        'areaEvaluacion' =>$this->request->getPost('area'),
        'estadoAreaEva'  =>'1'
      ]);

      return redirect()->to('/CatalogosEvaluacion/AreasEvaluacion/')->with('message', 'Area creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $areas = new AreasEvaluacioModel();
    if ($areas->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar areas',
      ['validation'=>$validation,'areas'=> $areas->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    $areas = new AreasEvaluacioModel();

    if ($areas->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }
  // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
    $valor = $this->request->getPost('area_editar');
    $buscarAreas = $areas->select('areaEvaluacion')->where('areaEvaluacion',$valor)->where('areaEvaluacionId',$id)->first();
    if ($buscarAreas) {
     if($this->validate('area_editar')){
      $areas->update($id, [
        'estadoAreaEva' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/AreasEvaluacion')->with('message', 'Area de evaluación editada con éxito.');
    }
  }else if(!$buscarAreas){
    if($this->validate('area_editar1')){
      $areas->update($id, [
        'areaEvaluacion' =>$this->request->getPost('area_editar'),
        'estadoAreaEva' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/AreasEvaluacion')->with('message', 'Area de evaluación editada con éxito.');
    }
  }
  return redirect()->back()->withInput();
}

public function delete($id = null){
  $areas = new AreasEvaluacioModel();
  $instrumento = new InstrumentoModel();
  $buscarAreas = $instrumento->select('areaEvaluacionId')->where('areaEvaluacionId',$id)->first();

  if ($buscarAreas) {
    return redirect()->to("/CatalogosEvaluacion/AreasEvaluacion")->with('messageError','Lo sentimos, la area de evaluación esta asociada a un instrumento de evaluación y no puede ser eliminada.');
  }

  if ($areas->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $areas->delete($id);

  return redirect()->to('/CatalogosEvaluacion/AreasEvaluacion')->with('message', 'Area de evaluación eliminada con éxito.'); 
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("CatalogosEvaluacion/AreasEvaluacion/$view",$data);
  echo view("dashboard/templates/footer");
}
}
