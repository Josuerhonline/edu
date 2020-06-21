<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\PonderacionesModel;
use App\Models\CatalogosEvaluacion\InstrumentoModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Ponderaciones extends BaseController {
  public function index(){
    $ponderacion = new PonderacionesModel();

    $data = [
      'ponderacion' => $ponderacion->asObject()
      ->select('cof_ponderaciones.*')->findAll()
    ];

    $this->_loadDefaultView( 'Listado de ponderaciones',$data,'index');
  }

  public function new(){
    $ponderacion = new PonderacionesModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear ponderacion',['validation'=>$validation, 'ponderacion'=> new PonderacionesModel()],'new');
  }

  public function create(){
    $ponderacion = new PonderacionesModel();
    $minima =$this->request->getPost('ponderacionMinima');
    $maxima =$this->request->getPost('ponderacionMaxima');

    $buscarPonderacion = $ponderacion->select('ponderacionMinima','ponderacionMaxima')->where('ponderacionMinima',$minima)->where('ponderacionMaxima',$maxima)->first();
    if ($buscarPonderacion) {
      return redirect()->to("/Catalogos/ponderaciones/new")->with('messageError','Lo sentimos, este rango de ponderaciones ya existe');
    }
    if($this->validate('ponderacion')){
      $id = $ponderacion->insert([
        'ponderacionMinima' =>$this->request->getPost('ponderacionMinima'),
        'ponderacionMaxima' =>$this->request->getPost('ponderacionMaxima'),
        'estadoPonderacion' =>'1',
      ]);

      return redirect()->to('/Catalogos/ponderaciones')->with('message', 'Ponderación creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $ponderacion = new PonderacionesModel();
    if ($ponderacion->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar ponderacion',
      ['validation'=>$validation,'ponderacion'=> $ponderacion->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    $ponderacion = new PonderacionesModel();

    if ($ponderacion->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }

    $minima =$this->request->getPost('ponderacionMinima_editar');
    $maxima =$this->request->getPost('ponderacionMaxima_editar');

    $minimaI =$this->request->getPost('ponderacionMinimaInput');
    $maximaI =$this->request->getPost('ponderacionMaximaInput');

    $buscarPonderacion0 = $ponderacion->select('ponderacionMinima','ponderacionMaxima')->where('ponderacionMinima',$minimaI)->where('ponderacionMaxima',$maximaI)->where('ponderacionId<>',$id)->first();

    $buscarPonderacion = $ponderacion->select('ponderacionMinima','ponderacionMaxima')->where('ponderacionMinima',$minima)->where('ponderacionMaxima',$maxima)->first();

    $buscarPonderacion1 = $ponderacion->select('ponderacionMinima','ponderacionMaxima')->where('ponderacionMinima<>',$minima)->where('ponderacionMaxima<>',$maxima)->where('ponderacionId',$id)->first();

    if ($buscarPonderacion0) {
     return redirect()->to("/Catalogos/ponderaciones/edit/$id")->with('messageError','Lo sentimos, este rando de ponderaciones ya existe');
   }else{

     if ($buscarPonderacion) {
       if($this->validate('ponderacion_editar')){
        $ponderacion->update($id, [
          'estadoPonderacion' =>$this->request->getPost('estadoPonderacion'),
        ]);
        return redirect()->to('/Catalogos/Ponderaciones')->with('message', 'Ponderación editada con éxito.');
      }
    }else if($buscarPonderacion1){
      if($this->validate('ponderacion_editar')){
        $ponderacion->update($id, [
          'ponderacionMinima' =>$this->request->getPost('ponderacionMinimaInput'),
          'ponderacionMaxima' =>$this->request->getPost('ponderacionMaximaInput'),
          'estadoPonderacion' =>$this->request->getPost('estadoPonderacion'),
        ]);
        return redirect()->to('/Catalogos/Ponderaciones')->with('message', 'Ponderación editada con éxito.');
      }
    }
    return redirect()->back()->withInput();
  }
}

public function delete($id = null){
  $ponderacion = new PonderacionesModel();
  $instrumento = new InstrumentoModel();
  $buscarPonderacion = $instrumento->select('ponderacionId')->where('ponderacionId',$id)->first();

  if ($buscarPonderacion) {
    return redirect()->to("/Catalogos/ponderaciones")->with('messageError','Lo sentimos, la ponderacion tiene un instrumento de evaluación asociado y no puede ser eliminado.');
  }

  if ($ponderacion->find($id) == null)
  {
    throw PageNotFoundException::forPageNotFound();
  }  

  $ponderacion->delete($id);

  return redirect()->to('/Catalogos/ponderaciones')->with('message', 'ponderación eliminada con éxito.'); 
}

private function _loadDefaultView($title,$data,$view){
  $dataHeader =[
    'title' => $title
  ];

  echo view("dashboard/templates/header",$dataHeader);
  echo view("Catalogos/ponderaciones/$view",$data);
  echo view("dashboard/templates/footer");
}
}
