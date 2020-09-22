<?php namespace App\Controllers\Catalogos;
use App\Models\SeleccionarCicloModel;
use App\Models\CatalogosEvaluacion\AperEvaluacionModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Ciclo extends BaseController {
  public function index(){
    $ciclo = new SeleccionarCicloModel();

    $data = [
      'ciclos' => $ciclo->asObject()
      ->select('cof_aper_ciclo.*')->findAll()
    ];

    $this->_loadDefaultView('Listado de ciclos',$data,'index');
  }

  public function new(){
    $ciclo      = new SeleccionarCicloModel();
    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Crear ciclo',['validation'=>$validation, 'ciclo'=> new SeleccionarCicloModel()],'new');
  }

  public function create(){
    helper("Bitacora");
    $ciclo        = new SeleccionarCicloModel();
    $cic          = $this->request->getPost('ciclo');
    $an           = $this->request->getPost('anio');
    $nombreP      = $this->request->getPost('nombrePersonalizado');
    $fechaI       = $this->request->getPost('fechaInicio');
    $fechaF       = $this->request->getPost('fechaFin');
    $buscarCiclo  = $ciclo->select('ciclo','anio','nombrePersonalizado','fechaInicio','fechaFin')->where('ciclo',$cic)->where('anio',$an)->where('nombrePersonalizado',$nombreP)->where('fechaInicio',$fechaI)->where('fechaFin',$fechaF)->first();
    $buscarCiclo1 = $ciclo->select('fechaInicio','fechaFin')->where('fechaInicio',$fechaI)->where('fechaFin',$fechaF)->first();
    $buscarCiclo2 = $ciclo->select('ciclo','anio')->where('ciclo',$cic)->where('anio',$an)->first();

    if ($buscarCiclo) {
      return redirect()->back()->withInput()->with('messageError','Lo sentimos, este ciclo ya existe.');
    }else if ($buscarCiclo1) {
      return redirect()->back()->withInput()->with('messageError','Lo sentimos, esta configuración de fechas ya existe.');
    }else if ($buscarCiclo2) {
     return redirect()->back()->withInput()->with('messageError','Lo sentimos, ya existe este ciclo para el año seleccionado.');
    }else{
      if($this->validate('ciclo')){
        $id = $ciclo->insert([
          'ciclo'               => $this->request->getPost('ciclo'),
          'anio'                => $this->request->getPost('anio'),
          'nombrePersonalizado' => $this->request->getPost('nombrePersonalizado'),
          'fechaInicio'         => $this->request->getPost('fechaInicio'),
          'fechaFin'            => $this->request->getPost('fechaFin'),
          'estado'              => '1',
        ]);

        $valor1 = $this->request->getPost('ciclo');
        $valor2 = $this->request->getPost('anio');
        $valor3 = $this->request->getPost('nombrePersonalizado');
        $valor4 = $this->request->getPost('fechaInicio');
        $valor5 = $this->request->getPost('fechaFin');

        insert_acciones('INSERTÓ','NUEVO CICLO | Ciclo: '.$valor1." | Año: ".$valor2." | Nombre Personalizado: ".$valor3." | Fecha Inicio: ".$valor4." | Fecha Fin: ".$valor5);
        return redirect()->to('/Catalogos/ciclo')->with('message','Ciclo creado con éxito.');
      }
    }
    
    return redirect()->back()->withInput();
  }

  public function edit($id = null){
    $ciclo = new SeleccionarCicloModel();

    if ($ciclo->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }  

    $validation =  \Config\Services::validation();
    $this->_loadDefaultView('Actualizar ciclo',
      ['validation'=>$validation,'ciclo'=> $ciclo->asObject()->find($id)],'edit');
  }

  public function update($id = null){
    helper("Bitacora");
    $ciclo = new SeleccionarCicloModel();

    if ($ciclo->find($id) == null){
      throw PageNotFoundException::forPageNotFound();
    }

    $cic     = $this->request->getPost('ciclo_editar');
    $anio    = $this->request->getPost('anio_editar');
    $nombreP = $this->request->getPost('nombrePersonalizado_editar');
    $fechaI  = $this->request->getPost('fechaInicio_editar');
    $fechaF  = $this->request->getPost('fechaFin_editar');
    $estado  = $this->request->getPost('estado');
  
    //BUSCAR SI EXISTE EL CICLO
    $buscarCiclo = $ciclo->asObject()->where('ciclo',$cic)->where('anio',$anio)->findAll();

    if($buscarCiclo){
      $n = 0;

      foreach ($buscarCiclo as $key => $b) {
       $aperCicloId = $b->aperCicloId;

       if($id==$aperCicloId){$n=1;}
      }

      if($n==1){
        //BUSCAR PERSONALIZADO
        $buscarPersonalizado = $ciclo->asObject()->where('nombrePersonalizado',$nombreP)->findAll();
        $n2 = 0;

        foreach ($buscarPersonalizado as $key => $b) {
          $aperCicloId = $b->aperCicloId;
          $nombrePer   = $b->nombrePersonalizado;

          if($id==$aperCicloId && $nombreP==$nombrePer){$n2=1;}
        }

        if($buscarPersonalizado){
          if($n2==1){
            $ciclo->update($id, [
              'ciclo'               => $cic,
              'anio'                => $anio,
              'nombrePersonalizado' => $nombreP,
              'fechaInicio'         => $fechaI,
              'fechaFin'            => $fechaF,
              'estado'              => $estado,
            ]);

            $valor1 = $cic;
            $valor2 = $anio;
            $valor3 = $nombreP;
            $valor4 = $fechaI;
            $valor5 = $fechaF;
            $valor6 = $estado;

            insert_acciones('ACTUALIZÓ','CICLO | cicloId: '.$id." | Ciclo: ".$valor1." | Año: ".$valor2." | Nombre Personalizado: ".$valor3." | Fecha Inicio: ".$valor4." | Fecha Fin: ".$valor5." | Estado: ".$valor6);
            return redirect()->to('/Catalogos/ciclo')->with('message', 'Ciclo editado con éxito.');
          }else{
            return redirect()->back()->withInput()->with('messageError','Lo sentimos, ya existe este nombre personalizado.');
          }
        }else{
          $ciclo->update($id, [
            'ciclo'               => $cic,
            'anio'                => $anio,
            'nombrePersonalizado' => $nombreP,
            'fechaInicio'         => $fechaI,
            'fechaFin'            => $fechaF,
            'estado'              => $estado,
          ]);

          $valor1 = $cic;
          $valor2 = $anio;
          $valor3 = $nombreP;
          $valor4 = $fechaI;
          $valor5 = $fechaF;
          $valor6 = $estado;

          insert_acciones('ACTUALIZÓ','CICLO | cicloId: '.$id." | Ciclo: ".$valor1." | Año: ".$valor2." | Nombre Personalizado: ".$valor3." | Fecha Inicio: ".$valor4." | Fecha Fin: ".$valor5." | Estado: ".$valor6);
          return redirect()->to('/Catalogos/ciclo')->with('message', 'Ciclo editado con éxito.');
        }
      }else{
        return redirect()->back()->withInput()->with('messageError','Lo sentimos, el ciclo ya existe.');
      }
    }else{
      //BUSCAR PERSONALIZADO
      $buscarPersonalizado = $ciclo->asObject()->where('nombrePersonalizado',$nombreP)->findAll();
      $n2 = 0;

      foreach ($buscarPersonalizado as $key => $b) {
        $aperCicloId = $b->aperCicloId;
        $nombrePer   = $b->nombrePersonalizado;

        if($id==$aperCicloId && $nombreP==$nombrePer){$n2=1;}
      }

      if($buscarPersonalizado){
        if($n2==1){
          $ciclo->update($id, [
            'ciclo'               => $cic,
            'anio'                => $anio,
            'nombrePersonalizado' => $nombreP,
            'fechaInicio'         => $fechaI,
            'fechaFin'            => $fechaF,
            'estado'              => $estado,
          ]);

          $valor1 = $cic;
          $valor2 = $anio;
          $valor3 = $nombreP;
          $valor4 = $fechaI;
          $valor5 = $fechaF;
          $valor6 = $estado;

          insert_acciones('ACTUALIZÓ','CICLO | cicloId: '.$id." | Ciclo: ".$valor1." | Año: ".$valor2." | Nombre Personalizado: ".$valor3." | Fecha Inicio: ".$valor4." | Fecha Fin: ".$valor5." | Estado: ".$valor6);
          return redirect()->to('/Catalogos/ciclo')->with('message', 'Ciclo editado con éxito.');
        }else{
          return redirect()->back()->withInput()->with('messageError','Lo sentimos, ya existe este nombre personalizado');
        }
      }else{
        $ciclo->update($id, [
          'ciclo'               => $cic,
          'anio'                => $anio,
          'nombrePersonalizado' => $nombreP,
          'fechaInicio'         => $fechaI,
          'fechaFin'            => $fechaF,
          'estado'              => $estado,
        ]);

        $valor1 = $cic;
        $valor2 = $anio;
        $valor3 = $nombreP;
        $valor4 = $fechaI;
        $valor5 = $fechaF;
        $valor6 = $estado;

        insert_acciones('ACTUALIZÓ','CICLO | cicloId: '.$id." | Ciclo: ".$valor1." | Año: ".$valor2." | Nombre Personalizado: ".$valor3." | Fecha Inicio: ".$valor4." | Fecha Fin: ".$valor5." | Estado: ".$valor6);
        return redirect()->to('/Catalogos/ciclo')->with('message', 'Ciclo editado con éxito.');
      }
    }
    
    return redirect()->back()->withInput();
  }

  public function delete($id = null){
    helper("Bitacora");
    $ciclo       = new SeleccionarCicloModel();
    $aper        = new AperEvaluacionModel();
    $buscarCarga = $aper->select('aperCicloId')->where('aperCicloId',$id)->first();

    if ($buscarCarga) {
      return redirect()->to("/Catalogos/ciclo")->with('messageError','Lo sentimos, el ciclo esta asociado a una apertura de evaluación y no puede ser eliminado.');
    }

    if ($ciclo->find($id) == null)
    {
      throw PageNotFoundException::forPageNotFound();
    }  

    $ciclo->delete($id);
    insert_acciones('ELIMINÓ','CICLO | cicloId:'.$id);
    return redirect()->to('/Catalogos/ciclo')->with('message', 'Ciclo eliminado con éxito.'); 
  }

  private function _loadDefaultView($title,$data,$view){
    $dataHeader =[
      'title' => $title
    ];

    echo view("dashboard/templates/header",$dataHeader);
    echo view("Catalogos/ciclo/$view",$data);
    echo view("dashboard/templates/footer");
  }
}
