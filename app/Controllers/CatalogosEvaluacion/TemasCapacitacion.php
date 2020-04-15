<?php namespace App\Controllers\CatalogosEvaluacion;
use App\Models\CatalogosEvaluacion\TemasCapacitacionModel;
use App\Models\CatalogosEvaluacion\preguntasModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class TemasCapacitacion extends BaseController {
  public function index(){
    $tema = new TemasCapacitacionModel();

    $data = [
      'temas' => $tema->asObject()
      ->select('eva_temas_capacitacion.*')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de temas',$data,'index');
  }

  public function new(){
    $tema = new TemasCapacitacionModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear tema',['validation'=>$validation, 'temas'=> new TemasCapacitacionModel()],'new');
  }

  public function create(){
    $tema = new TemasCapacitacionModel();

    if($this->validate('temaCapacitacion')){
      $id = $tema->insert([
        'tema' =>$this->request->getPost('tema'),
        'estado'  =>'1'
      ]);

      return redirect()->to('/CatalogosEvaluacion/TemasCapacitacion/')->with('message', 'Tema de capacitación creado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $tema = new TemasCapacitacionModel();

    if ($tema->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar tema',
      ['validation'=>$validation,'temas'=> $tema->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    $tema = new TemasCapacitacionModel();

    if ($tema->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }
  // VALIDAR SI EL VALOR INGRESADO NO EXISTE EN LA BASE DE DATOS, ACTUALIZAR SOLO SI ES EL MISMO VALOR O UNO NO EXISTENTE EN LA BASE DE DATOS
    $valor = $this->request->getPost('tema_editar');
    $buscarTema = $tema->select('tema')->where('tema',$valor)->first();
    if ($buscarTema) {
      return redirect()->to("/CatalogosEvaluacion/TemasCapacitacion")->with('messageError','Lo sentimos, el tema de capacitación ya existe');
    }
    if($this->validate('temaCapacitacion_editar')){
      $tema->update($id, [
        'tema' =>$this->request->getPost('tema_editar'),
        'estado' =>$this->request->getPost('estado'),
      ]);
      return redirect()->to('/CatalogosEvaluacion/TemasCapacitacion')->with('message', 'Tema editado con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $tema = new TemasCapacitacionModel();
    $pregunta = new preguntasModel();
    $buscarpregunta = $pregunta->select('TemaCapacitacionId')->where('TemaCapacitacionId',$id)->first();

    if ($buscarpregunta) {
      return redirect()->to("/CatalogosEvaluacion/TemasCapacitacion")->with('messageError','Lo sentimos, el tema de capacitación esta asociado a una pregunta  y no puede ser eliminado.');
    }

    if ($tema->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $tema->delete($id);

    return redirect()->to('/CatalogosEvaluacion/TemasCapacitacion')->with('message', 'Tema de capacitación eliminado con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("CatalogosEvaluacion/TemasCapacitacion/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
