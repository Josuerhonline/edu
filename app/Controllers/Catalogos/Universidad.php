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

    $this->_loadDefaultView('Datos de Universidad',$data,'index');
  }

  public function new(){
    $universidad = new UniversidadModel();
    $validation  =  \Config\Services::validation();
    $this->_loadDefaultView('Crear universidad',['validation'=>$validation, 'universidad'=> new UniversidadModel()],'new');
  }

  public function create(){
    $universidad = new UniversidadModel();
    helper("Bitacora");

    if($this->validate('universidad')){
      $id = $universidad->insert([
        'universidad' => $this->request->getPost('nombre_universidad'),
        'direccion'   => $this->request->getPost('direccion'),
        'telefono'    => $this->request->getPost('telefono'),
      ]);

      $valor1 = $this->request->getPost('nombre_universidad');
      $valor2 = $this->request->getPost('direccion');
      $valor3 = $this->request->getPost('telefono');

      insert_acciones('INSERTÓ','NUEVA UNIVERSIDAD | Nombre: '.$valor1." | Dirección: ".$valor2." | Teléfono: ".$valor3);
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
    helper("Bitacora");
    $universidad = new UniversidadModel();

    if ($universidad->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  

    $uni               = $this->request->getPost('nombre_universidad_editar');
    $buscarUniversidad = $universidad->select('universidad')->where('universidad',$uni)->where('universidadId',$id)->first();

    if ($buscarUniversidad) {
      $universidad->update($id, [
        'direccion' =>$this->request->getPost('direccion_editar'),
        'telefono'  =>$this->request->getPost('telefono_editar'),
      ]);

      $valor1 = $this->request->getPost('direccion_editar');
      $valor2 = $this->request->getPost('telefono_editar');

      insert_acciones('ACTUALIZÓ','UNIVERSIDAD | universidadId: '.$id." | direccion: ".$valor1." | telefono: ".$valor2);
      return redirect()->to('/Catalogos/universidad')->with('message', 'Datos editados con éxito.');
    }

    if (!$buscarUniversidad) {
      if($this->validate('universidadEditar')){
        $universidad->update($id, [
          'universidad' =>$this->request->getPost('nombre_universidad_editar'),
          'direccion'   =>$this->request->getPost('direccion_editar'),
          'telefono'    =>$this->request->getPost('telefono_editar'),
        ]);

        $valor1 = $this->request->getPost('direccion_editar');
        $valor2 = $this->request->getPost('telefono_editar');
        $valor3 = $this->request->getPost('nombre_universidad_editar');

        insert_acciones('ACTUALIZÓ','UNIVERSIDAD | universidadId: '.$id." | direccion: ".$valor1." | telefono: ".$valor2." | nombre: ".$valor3);
        return redirect()->to('/Catalogos/universidad')->with('message', 'Datos editados con éxito.');
      }
    }

    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    helper("Bitacora");
    $universidad    = new UniversidadModel();
    $facultad       = new FacultadModel();
    $buscarFacultad = $facultad->select('universidadId')->where('universidadId',$id)->first();

    if ($buscarFacultad) {
      return redirect()->to("/Catalogos/universidad")->with('messageError','Lo sentimos, la Universidad tiene Facultades asociadas y no puede ser eliminada.');
    }    

    if ($universidad->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $universidad->delete($id);
    insert_acciones('ELIMINÓ','UNIVERSIDAD | universidadId:'.$id);
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
