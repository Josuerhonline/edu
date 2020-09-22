<?php namespace App\Controllers\Graficos;
use App\Models\EvaluacionDocente\CargaViewModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Docente extends BaseController {
  public function index(){
    $cargaAcademica = new CargaViewModel();
    $data = [];
    $this->_loadDefaultView('Listado de carga académica',$data,'index');
    helper("Bitacora");
    insert_acciones('CONSULTÓ','GRÁFICOS POR DOCENTE ');
  }


  public function resultados($id = null){
    $cargaAcademica = new CargaViewModel();
    if ($cargaAcademica->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  
    $array   = array("carga"=>$id);
    $session = session();
    $session->set($array);
    $_SESSION["cargaId"] = $id;
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Resultados evaluación',
      ['validation'=>$validation,'viewCarga'=> $cargaAcademica->asObject()->find($id)],'graficosDocente');


  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Graficos/Docentes/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
