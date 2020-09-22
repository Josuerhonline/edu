<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\CarrerasModel;
use App\Models\Catalogos\FacultadModel;
use App\Models\Catalogos\PlanesModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Carreras extends BaseController {
  public function index(){
    $carreras = new CarrerasModel();

    $data = [
      'carreras' => $carreras->asObject()
      ->select('cof_carreras.*,cof_facultad.facultad AS facultad')
      ->join('cof_facultad','cof_carreras.facultadId = cof_facultad.facultadId')->findAll()
    ];

    $this->_loadDefaultView('Listado de carreras',$data,'index');
  }

  public function new(){
    $facultades = new FacultadModel();

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear carrera',['validation'=>$validation, 'carreras'=> new CarrerasModel(),'facultades' => $facultades->asObject()->findAll()],'new');
  }

  public function create(){
    helper("Bitacora");
    $carreras = new CarrerasModel();

    if($this->validate('carreras')){
      $id = $carreras->insert([
        'facultadId'  => $this->request->getPost('facultad'),
        'nombre'      => $this->request->getPost('nombre_carrera'),
        'nombreCorto' => $this->request->getPost('nombre_corto'),
        'estado'      => '1',
      ]);

      $valor1 = $this->request->getPost('facultad');
      $valor2 = $this->request->getPost('nombre_carrera');
      $valor3 = $this->request->getPost('nombre_corto');

      insert_acciones('INSERTÓ','NUEVA CARRERA | facultadId: '.$valor1." | Nombre: ".$valor2." | Nombre corto: ".$valor3);
      return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $carreras   = new CarrerasModel();
    $facultades = new FacultadModel();

    if ($carreras->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar carrera',
      ['validation'=>$validation,'carreras'=> $carreras->asObject()->find($id),'facultades' => $facultades->asObject()->findAll()],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $carreras = new CarrerasModel();

    if ($carreras->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    } 

    $carrNombre      = $this->request->getPost('nombre_carrera_editar');
    $carrNombreCorto = $this->request->getPost('nombre_corto_editar');
    $buscarCarrera   = $carreras->select('nombre')->where('nombre',$carrNombre)->where('carreraId',$id)->first();
    $buscarCarrera1  = $carreras->select('nombreCorto')->where('nombreCorto',$carrNombreCorto)->where('carreraId',$id)->first();
    $buscarC         = $carreras->select('nombre','nombreCorto')->where('nombre',$carrNombre)->where('nombreCorto',$carrNombreCorto)->where('carreraId',$id)->first();

    if ($buscarC) {
      $carreras->update($id, [
        'facultadId'  => $this->request->getPost('facultad_editar'),
        'estado'      => $this->request->getPost('estado_editar'),
      ]);

      $valor1 = $this->request->getPost('facultad_editar');
      $valor2 = $this->request->getPost('estado_editar');

      insert_acciones('ACTUALIZÓ','CARRERA | carreraId: '.$id." | facultadId: ".$valor1." | estado: ".$valor2);
      return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera editada con éxito.');
    }else if ($buscarCarrera) {
      if($this->validate('carrerasEditar_uno')){
        $carreras->update($id, [
          'facultadId'  => $this->request->getPost('facultad_editar'),
          'nombreCorto' => $this->request->getPost('nombre_corto_editar'),
          'estado'      => $this->request->getPost('estado_editar'),
        ]);

        $valor1 = $this->request->getPost('facultad_editar');
        $valor2 = $this->request->getPost('nombre_corto_editar');
        $valor3 = $this->request->getPost('estado_editar');

        insert_acciones('ACTUALIZÓ','CARRERA | carreraId: '.$id." | facultadId: ".$valor1." | Nombre corto: ".$valor2." | estado: ".$valor3);
        return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera editada con éxito.');
      }
    }else if ($buscarCarrera1) {
      if($this->validate('carrerasEditar_dos')){
        $carreras->update($id, [
          'facultadId'  => $this->request->getPost('facultad_editar'),
          'nombre'      => $this->request->getPost('nombre_carrera_editar'),
          'estado'      => $this->request->getPost('estado_editar'),
        ]);

        $valor1 = $this->request->getPost('facultad_editar');
        $valor2 = $this->request->getPost('nombre_carrera_editar');
        $valor3 = $this->request->getPost('estado_editar');

        insert_acciones('ACTUALIZÓ','CARRERA | carreraId: '.$id." | facultadId: ".$valor1." | Nombre: ".$valor2." | estado: ".$valor3);
        return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera editada con éxito.');
      }
    }else if (!$buscarC || !$buscarCarrera || !$buscarCarrera1) {
      if($this->validate('carrerasEditar_principal')){
        $carreras->update($id, [
          'facultadId'  => $this->request->getPost('facultad_editar'),
          'nombre'      => $this->request->getPost('nombre_carrera_editar'),
          'nombreCorto' => $this->request->getPost('nombre_corto_editar'),
          'estado'      => $this->request->getPost('estado_editar'),
        ]);

        $valor1 = $this->request->getPost('facultad_editar');
        $valor2 = $this->request->getPost('nombre_carrera_editar');
        $valor3 = $this->request->getPost('nombre_corto_editar');
        $valor4 = $this->request->getPost('estado_editar');

        insert_acciones('ACTUALIZÓ','CARRERA | carreraId: '.$id." | facultadId: ".$valor1." | Nombre: ".$valor2." | Nombre corto: ".$valor3." | estado: ".$valor4);
        return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera editada con éxito.');
      }
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    helper("Bitacora");
    $carreras   = new CarrerasModel();
    $planes     = new PlanesModel();
    $buscarPlan = $planes->select('carreraId')->where('carreraId',$id)->first();

    if ($buscarPlan) {
      return redirect()->to("/Catalogos/carreras")->with('messageError','Lo sentimos, la Carrera tiene Planes asociados y no puede ser eliminada.');
    }

    if ($carreras->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $carreras->delete($id);
    insert_acciones('ELIMINÓ','CARRERA | carreraId:'.$id);
    return redirect()->to('/Catalogos/carreras')->with('message', 'Carrera eliminada con éxito.');
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/carreras/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
