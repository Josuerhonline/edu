<?php use App\Models\Catalogos\CarrerasModel; 
use App\Models\SeleccionarCicloModel; 
use App\Models\Graficos\ViewEvaluacion;
use App\Models\Graficos\PromedioFacultadModel;
use App\Models\Graficos\PromedioCarreraModel;
use App\Models\Graficos\PromedioFacultadGeneroModel;
use App\Models\Graficos\PromedioCarreraGeneroModel;
use App\Models\Graficos\TotalEvaluaciones;
use App\Models\Graficos\TotalAutoevaluaciones;
use App\Models\Graficos\TotalAutoevaluacionesGenero;
use App\Models\Graficos\TotalEvaluacionesGenero;
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;

$cicloMod                    = new SeleccionarCicloModel();
$evaluacion                  = new ViewEvaluacion();
$facultadPromedio            = new PromedioFacultadModel();
$carreraPromedio             = new PromedioCarreraModel();
$facultadPromedioGenero      = new PromedioFacultadGeneroModel();
$carreraPromedioGenero       = new PromedioCarreraGeneroModel();
$totalEvaluaciones           = new TotalEvaluaciones();
$totalAutoevaluaciones       = new TotalAutoevaluaciones();
$totalAutoevaluacionesGenero = new TotalAutoevaluacionesGenero();
$totalEvaluacionesGenero     = new TotalEvaluacionesGenero();
$areas                       = new AreasEvaluacioModel();

$ciclo = $cicloMod->asObject()->where('aperCicloId',$_SESSION["cicloNombre"])->findAll();
foreach ($ciclo as $ci ){
 $_SESSION["nombrePersonalizado"]=$ci->nombrePersonalizado; 
}

////////////////////////////CONSULTAS PARA FACULTADES/////////////////////////////////
// Query para el nombre de las facultades
$nombresFacultades= $facultadPromedio->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->groupBy('facultadId')->findColumn('facultad');

//Query para seleccionar el promedio de las facultades
$promedioFacultades = $facultadPromedio->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->groupBy('facultadId')->findColumn('promedio');


// Query para seleccionar los promedios por género facultades
$promedioFacultadesFemenino = $facultadPromedioGenero->asObject()->select()->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','F')
->groupBy('facultadId')->findAll();

$promedioFacultadesMasculino = $facultadPromedioGenero->asObject()->select()->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','M')
->groupBy('facultadId')->findAll();


////////////////////////////CONSULTAS PARA CARRERAS/////////////////////////////////
// Query para el nombre de las carreras
$nombresCarreras= $carreraPromedio->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->groupBy('carreraId')->findColumn('nombre');

//Query para seleccionar el promedio de las carreras
$promedioCarreras = $carreraPromedio->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])
->groupBy('carreraId')->findColumn('AVG(promedio)');


// Query para seleccionar los promedios por género carreras

$promedioCarrerasFemenino = $carreraPromedioGenero->asObject()->select()->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','F')
->groupBy('carreraId')->findAll();


$promedioCarrerasMasculino = $carreraPromedioGenero->asObject()->select()->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','M')
->groupBy('carreraId')->findAll();

////////////////////////////QUERY PARA SELECT DE AREAS EVALUADORAS/////////////////////////////////
$areaEvaluacionEva  = $evaluacion->asObject()->select()->where('aperCicloId',$_SESSION["cicloNombre"])->groupBy('areaEvaluacionId','areaEvaluacion')->findAll();

foreach ($areaEvaluacionEva as $ar ){
 $_SESSION["areaEvaluacion"]=$ar->areaEvaluacion; 
}

///////////////////////////////CONSULTAS PARA TOTAL DE EVALUACIONES////////////////////////////
$totalEva= $totalEvaluaciones->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->findColumn('contador');

$totalEvaM= $totalEvaluacionesGenero->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','M')->findColumn('contador');

$totalEvaF= $totalEvaluacionesGenero->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','F')->findColumn('contador');

///////////////////////////////CONSULTAS PARA TOTAL DE AUTOEVALUACIONES////////////////////////////
$totalAutoEva= $totalAutoevaluaciones->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->findColumn('contador');

$totalAutoEvaM= $totalAutoevaluacionesGenero->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','M')->findColumn('contador');

$totalAutoEvaF= $totalAutoevaluacionesGenero->where('aperCicloId',$_SESSION["cicloNombre"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSessionGraficos"])->where('sexo','F')->findColumn('contador');


if($nombresFacultades){
  $longitudNombres = count($nombresFacultades);//LONGITUD DE ARRAY CON NOMBRES DE FACULTADES
}

//CONVERTIR A DECIMAL PROMEDIOS GENERALES - FACULTADES
if ($promedioFacultades) {
  $longitud  = count($promedioFacultades);

  //Recorrer Elementos
  for($i=0; $i<$longitud; $i++){
    $arrayNewPromediosFacultad[$i] = number_format($promedioFacultades[$i], 2, '.', ',');
  }
}else{
  $arrayNewPromediosFacultad = array();
}

//CONVERTIR A DECIMAL PROMEDIOS FEMENINOS - FACULTADES
if ($promedioFacultadesFemenino) {
  $longitud2 = count($promedioFacultadesFemenino);
  
  for($i=0; $i<$longitudNombres; $i++){//RECORRER ARRAY DE NOMBRES DE FACULTADES
    $nombreFacultad    = $nombresFacultades[$i];
    $promedioFacultadF = "";

    foreach ($promedioFacultadesFemenino as $key => $p){//RECORRER PROMEDIOS DE CONSULTA
      if($nombreFacultad==$p->facultad){//VERIFICAR SI EXISTE PARA LA FACULTAD
        $promedioFacultadF = $p->promedio;
      }else{}
      
    }

    if($promedioFacultadF!=""){//SI EXISTE, CONVERTIR A DECIMAL EL PROMEDIO
      $arrayNewPromediosFacultadF[$i] = number_format($promedioFacultadF, 2, '.', ',');
    }else{//SI NO EXISTE, PONER UNA POSICIÓN VACÍA
      $arrayNewPromediosFacultadF[$i] = '';
    }
  }
}else{
  $arrayNewPromediosFacultadF = array();
}

//CONVERTIR A DECIMAL PROMEDIOS MASCULINOS - FACULTADES
if ($promedioFacultadesMasculino) {
  $longitud3 = count($promedioFacultadesMasculino);

  for($i=0; $i<$longitudNombres; $i++){//RECORRER ARRAY DE NOMBRES DE FACULTADES
    $nombreFacultad    = $nombresFacultades[$i];
    $promedioFacultadM = "";

    foreach ($promedioFacultadesMasculino as $key => $p){//RECORRER PROMEDIOS DE CONSULTA
      if($nombreFacultad==$p->facultad){//VERIFICAR SI EXISTE PARA LA FACULTAD
        $promedioFacultadM = $p->promedio;
      }else{}
      
    }

    if($promedioFacultadM!=""){//SI EXISTE, CONVERTIR A DECIMAL EL PROMEDIO
      $arrayNewPromediosFacultadM[$i] = number_format($promedioFacultadM, 2, '.', ',');
    }else{//SI NO EXISTE, PONER UNA POSICIÓN VACÍA
      $arrayNewPromediosFacultadM[$i] = '';
    }
  }
}else{
  $arrayNewPromediosFacultadM = array();
}

/////////////////////////////////////CARRERAS///////////////////////////////////////////
if($nombresCarreras){
  $longitudNombresC = count($nombresCarreras);//LONGITUD DE ARRAY CON NOMBRES DE CARRERAS
}

//PROMEDIOS GENERALES DE CARRERAS, SIN GÉNEROS
if ($promedioCarreras) {
  $longitud  = count($promedioCarreras);

  //Recorrer Elementos
  for($i=0; $i<$longitud; $i++){
    $arrayNewPromediosCarreras[$i] = number_format($promedioCarreras[$i], 2, '.', ',');
  }
}else{
  $arrayNewPromediosCarreras = array();
}

//CONVERTIR A DECIMAL PROMEDIOS FEMENINOS - CARRERAS
if ($promedioCarrerasFemenino) {
  $longitud2 = count($promedioCarrerasFemenino);

  for($i=0; $i<$longitudNombresC; $i++){//RECORRER ARRAY DE NOMBRES DE CARRERAS
    $nombreCarrera    = $nombresCarreras[$i];
    $promedioCarreraF = "";

    foreach ($promedioCarrerasFemenino as $key => $p){//RECORRER PROMEDIOS DE CONSULTA
      if($nombreCarrera==$p->nombre){//VERIFICAR SI EXISTE PARA LA CARRERA
        $promedioCarreraF = $p->promedio;
      }else{}
      
    }

    if($promedioCarreraF!=""){//SI EXISTE, CONVERTIR A DECIMAL EL PROMEDIO
      $arrayNewPromediosCarrerasF[$i] = number_format($promedioCarreraF, 2, '.', ',');
    }else{//SI NO EXISTE, PONER UNA POSICIÓN VACÍA
      $arrayNewPromediosCarrerasF[$i] = '';
    }
  }
}else{
  $arrayNewPromediosCarrerasF = array();
}

//CONVERTIR A DECIMAL PROMEDIOS MASCULINOS - CARRERAS
if ($promedioCarrerasMasculino) {
  $longitud3 = count($promedioCarrerasMasculino);

  for($i=0; $i<$longitudNombresC; $i++){//RECORRER ARRAY DE NOMBRES DE CARRERAS
    $nombreCarrera    = $nombresCarreras[$i];
    $promedioCarreraM = "";

    foreach ($promedioCarrerasMasculino as $key => $p){//RECORRER PROMEDIOS DE CONSULTA
      if($nombreCarrera==$p->nombre){//VERIFICAR SI EXISTE PARA LA CARRERAS
        $promedioCarreraM = $p->promedio;
      }else{}
      
    }

    if($promedioCarreraM!=""){//SI EXISTE, CONVERTIR A DECIMAL EL PROMEDIO
      $arrayNewPromediosCarrerasM[$i] = number_format($promedioCarreraM, 2, '.', ',');
    }else{//SI NO EXISTE, PONER UNA POSICIÓN VACÍA
      $arrayNewPromediosCarrerasM[$i] = '';
    }
  }
}else{
  $arrayNewPromediosCarrerasM = array();


}
?>
<?= view("dashboard/edu/menu"); ?>
</div>
</div>
<div class="top_nav">
  <?= view("dashboard/edu/navbar"); ?>
  <?= view("dashboard/partials/_session"); ?>
  <?= view("dashboard/partials/_sessionError"); ?>
</div>
<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel" style="border: 60%">
        <div class="x_title">
          <h2>Presentación de datos</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;">
          <div class="col-md-6">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <div  class="form-group">
                      <label>Por favor, seleccione el período del que desea ver los gráficos.</label>
                      <select class="form-control" name="cicloId" id="cicloId" onchange="procesarValor()">
                        <option value="">Seleccione un período | Opción Seleccionada: <?= $_SESSION["nombrePersonalizado"]?></option>
                        <?php foreach ($selectCiclo as $c): ?>
                          <option value="<?= $c->aperCicloId ?>"><?= 'Ciclo: ',$c->ciclo ,' - Año: ', $c->anio ?></option>
                        <?php endforeach?>
                      </select> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <div  class="form-group">
                      <label>Área de evaluación.</label>
                      <select class="form-control" name="areaEvaluacionId" id="areaEvaluacionId" onchange="procesarValorFacultad()">
                        <option value="">Seleccione un área de evaluación | Opción Seleccionada: <?=$_SESSION["areaEvaluacion"] ?></option>
                        <?php foreach ($areaEvaluacionEva as $a): 
                          $areasName = $areas->select('areaEvaluacion')->where('areaEvaluacionId',$a->areaEvaluacionId)->findColumn('areaEvaluacion')?>
                          <option value="<?= $a->areaEvaluacionId ?>"><?=$areasName[0]?></option>
                        <?php endforeach?>
                      </select> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--     GRAFICO PARA LOS PROMEDIOS POR FACULTAD -->
        <div class="row">
          <div class="col-md-12 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Promedios por facultad</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="mainb" style="height:350px;"></div>
              </div>
            </div>
          </div>
        </div>
        <!--     GRAFICO PARA LOS PROMEDIOS POR CARRERA -->
        <div class="row">
          <div class="col-md-12 col-sm-6 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Promedios por carrera</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="mainbC" style="height:350px;"></div>
              </div>
            </div>
          </div>
        </div>
        <!--        GRÁFICO PARA TOTAL EVALUADORES -->
        <div class="row">
         <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Cantidad de evaluaciones</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div id="echart_bar_horizontal" style="height:370px;"></div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Cantidad de autoevaluaciones</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div id="echart_bar_horizontalA" style="height:370px;"></div>
            </div>
          </div>
        </div>
      </div>
      <br><br><br><br>
    </div>
  </div>
</div>
</div>
</div>
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script src="/vendors/Chart.js/dist/Chart.min.js"></script>
<script src="/vendors/echarts/map/js/world.js"></script>
<script src="/vendors/echarts/dist/echarts.min.js"></script>
<script src="/vendors/raphael/raphael.min.js"></script>
<script src="/vendors/morris.js/morris.min.js"></script>
<script>
  ////////////////////////////FACULTADES//////////////////////////////////////////////
  var nombresFacultades=<?php echo json_encode($nombresFacultades);?>;
  var arrayNewPromediosFacultad=<?php echo json_encode($arrayNewPromediosFacultad);?>;
  var promedioFacultadesFemenino=<?php echo json_encode($arrayNewPromediosFacultadF);?>;
  var promedioFacultadesMasculino=<?php echo json_encode($arrayNewPromediosFacultadM);?>;

  ////////////////////////////CARRERAS//////////////////////////////////////////////
  var nombresCarreras=<?php echo json_encode($nombresCarreras);?>;
  var arrayNewPromediosCarreras=<?php echo json_encode($arrayNewPromediosCarreras);?>;
  var arrayNewPromediosCarrerasF=<?php echo json_encode($arrayNewPromediosCarrerasF);?>;
  var arrayNewPromediosCarrerasM=<?php echo json_encode($arrayNewPromediosCarrerasM);?>;

///////////////////////////////EVALUACIONES ///////////////////////////////////////////
var totalEva=<?php echo json_encode($totalEva);?>;
var totalEvaM=<?php echo json_encode($totalEvaM);?>;
var totalEvaF=<?php echo json_encode($totalEvaF);?>;

///////////////////////////////AUTOEVALUACIONES ///////////////////////////////////////////
var totalAutoEva=<?php echo json_encode($totalAutoEva);?>;
var totalAutoEvaM=<?php echo json_encode($totalAutoEvaM);?>;
var totalAutoEvaF=<?php echo json_encode($totalAutoEvaF);?>;

function confirmarBorrar(id){
  swal({   
    title: "¿Desea eliminar este registro?",   text: "Presione confirmar para eliminar",
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    cancelButtonText: "Cancelar",   
    confirmButtonText: "Confirmar",   
    closeOnConfirm: false 
  }, function(){   
    window.location.href = "/Catalogos/ciclo/delete/"+id;
  });
}

$(document).ready(function() {
  $('#tablaUsuarios').DataTable( {
    "paging":   true,
    "ordering": true,
    "info":     true,
    "language": {
      "url": "/vendors/datatables.net/españolTables.json"
    }
  } );
} );
function procesarValor(){
  let valorCiclo = document.getElementById('cicloId').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionGrafico/generarSesionCiclo",
    data:"id=" + valorCiclo,
    success:function(p){
      window.location="/Graficos/Graficos";
    }
  });
}

function procesarValorFacultad(){
  let valorAreaEvaluacion = document.getElementById('areaEvaluacionId').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionGrafico/generarSesionAreaEvaluacion",
    data:"id=" + valorAreaEvaluacion,
    success:function(p){
      window.location="/Graficos/Graficos";
    }
  });
}

$(document).ready(function(){
  $('#cicloId').select2();
  $('#areaEvaluacionId').select2();
});
</script>



