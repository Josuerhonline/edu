<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\FacultadModel;
use App\Models\Catalogos\UniversidadModel;
use App\Models\Catalogos\CarrerasModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Facultad extends BaseController {
  public function index(){
    $facultad = new FacultadModel();

    $data = [
      'facultades' => $facultad->asObject()
      ->select('cof_facultad.*, cof_universidad.universidadId as universidadId,cof_universidad.universidad as universidad')
      ->join('cof_universidad','cof_universidad.universidadId = cof_facultad.universidadId')->findAll()
    ];

    $this->_loadDefaultView('Listado de facultades',$data,'index');
  }

  public function new(){
    $facultad    = new FacultadModel();
    $universidad = new UniversidadModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear facultad',['validation'=>$validation, 'facultad'=> new FacultadModel(),'universidad' => $universidad->asObject()->findAll()],'new');
  }

  public function create(){
    $facultad = new FacultadModel();
    helper("Bitacora");

    if($this->validate('facultad')){
      $id = $facultad->insert([
        'universidadId' =>$this->request->getPost('universidadId'),
        'facultad'      =>$this->request->getPost('facultad'),
      ]);

      $valor1 = $this->request->getPost('universidadId');
      $valor2 = $this->request->getPost('facultad');

      insert_acciones('INSERTÓ','NUEVA FACULTAD | universidadId: '.$valor1." | Facultad: ".$valor2);
      return redirect()->to('/Catalogos/facultad')->with('message', 'Facultad creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $facultad    = new FacultadModel();
    $universidad = new UniversidadModel();

    if ($facultad->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar facultad',
    ['validation'=>$validation,'facultad'=> $facultad->asObject()->find($id),'universidad' => $universidad->asObject()->findAll() ],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $facultad = new FacultadModel();

    if ($facultad->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }

    $facul          = $this->request->getPost('facultad_editar');
    $buscarFacultad = $facultad->select('facultad')->where('facultad',$facul)->where('facultadId',$id)->first();

    if ($buscarFacultad) {
          $facultad->update($id, [
        'universidadId' =>$this->request->getPost('universidadId_editar'),

      ]);

      $valor1 = $this->request->getPost('universidadId_editar');

      insert_acciones('ACTUALIZÓ','FACULTAD | facultadId: '.$id." | universidadId: ".$valor1);
      return redirect()->to('/Catalogos/facultad')->with('message', 'Facultad editada con éxito.');
    }

    if (!$buscarFacultad) {
      if($this->validate('facultadEditar')){
        $facultad->update($id, [
          'universidadId' => $this->request->getPost('universidadId_editar'),
          'facultad'      => $this->request->getPost('facultad_editar'),

        ]);

        $valor1 = $this->request->getPost('universidadId_editar');
        $valor2 = $this->request->getPost('facultad_editar');

        insert_acciones('ACTUALIZÓ','FACULTAD | facultadId: '.$id." | universidadId: ".$valor1." | Facultad: ".$valor2);
        return redirect()->to('/Catalogos/facultad')->with('message', 'Facultad editada con éxito.');
      }
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    helper("Bitacora");
    $facultad      = new FacultadModel();
    $carreras      = new CarrerasModel();
    $buscarCarrera = $carreras->select('facultadId')->where('facultadId',$id)->first();

    if ($buscarCarrera) {
      return redirect()->to("/Catalogos/facultad")->with('messageError','Lo sentimos, la Facultad tiene Carreras asociadas y no puede ser eliminada.');
    }

    if ($facultad->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $facultad->delete($id);
    insert_acciones('ELIMINÓ','FACULTAD | facultadId:'.$id);
    return redirect()->to('/Catalogos/facultad')->with('message', 'Facultad eliminada con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/facultad/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
