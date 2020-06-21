<?php namespace App\Controllers\Catalogos;
use App\Models\Catalogos\UniversidadModel;
use App\Models\Catalogos\FacultadModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Universidad extends BaseController {
  public function index(){
    $universidad = new UniversidadModel();
    $data = [
      'universidades' => $universidad->asObject()
      ->select('cof_universidad.*')
      ->findAll()
    ];
    $this->_loadDefaultView( 'Listado de Universidades',$data,'index');
  }

  public function new(){
    $universidad = new UniversidadModel();
    $validation  =  \Config\Services::validation();
    $this->_loadDefaultView('Crear universidad',['validation'=>$validation, 'universidad'=> new UniversidadModel()],'new');
  }

  public function create(){
    $universidad = new UniversidadModel();
    if($this->validate('universidad')){
      $id = $universidad->insert([
        'universidad' =>$this->request->getPost('nombre_universidad'),
        'direccion'   =>$this->request->getPost('direccion'),
        'telefono'    =>$this->request->getPost('telefono'),
      ]);

      return redirect()->to('/Catalogos/universidad')->with('message', 'Universidad creada con éxito.');
    }

    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $universidad = new UniversidadModel();
    if ($universidad->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar universidad',
    ['validation'=>$validation,'universidad'=> $universidad->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    $universidad = new UniversidadModel();

    if ($universidad->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  
    $uni = $this->request->getPost('nombre_universidad_editar');
    $buscarUniversidad = $universidad->select('universidad')->where('universidad',$uni)->where('universidadId',$id)->first();
    if ($buscarUniversidad) {
      $universidad->update($id, [
        'direccion' =>$this->request->getPost('direccion_editar'),
        'telefono' =>$this->request->getPost('telefono_editar'),
      ]);
      return redirect()->to('/Catalogos/universidad')->with('message', 'Universidad edita con éxito.');
    }
    if (!$buscarUniversidad) {
      if($this->validate('universidadEditar')){
      $universidad->update($id, [
        'universidad' =>$this->request->getPost('nombre_universidad_editar'),
        'direccion' =>$this->request->getPost('direccion_editar'),
        'telefono' =>$this->request->getPost('telefono_editar'),
      ]);
      return redirect()->to('/Catalogos/universidad')->with('message', 'Universidad edita con éxito.');
    }

    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    $universidad = new UniversidadModel();
    $facultad = new FacultadModel();
    $buscarFacultad = $facultad->select('universidadId')->where('universidadId',$id)->first();

    if ($buscarFacultad) {
      return redirect()->to("/Catalogos/universidad")->with('messageError','Lo sentimos, la Universidad tiene Facultades asociadas y no puede ser eliminada.');
    }    

    if ($universidad->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $universidad->delete($id);
    return redirect()->to('/Catalogos/universidad')->with('message', 'Universidad eliminada con éxito.');
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];
    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/universidad/$view",$data);
    echo view("dashboard/templates/footer");
  }

}
