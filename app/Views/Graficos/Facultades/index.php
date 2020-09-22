<?php use App\Models\Catalogos\CarrerasModel; 
use App\Models\SeleccionarCicloModel; 
use App\Models\Graficos\AreasFacultad;
use App\Models\Graficos\ViewEvaluacion;
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;

$evaluacion    = new ViewEvaluacion();
$temasFacultad = new AreasFacultad();
$cicloMod      = new SeleccionarCicloModel();
$areas         = new AreasEvaluacioModel();

$ciclo                = $cicloMod->asObject()->where('aperCicloId',$_SESSION["cicloNombreFacultad"])->findAll();
$areaEvaluacionNombre = $areas->asObject()->where('areaEvaluacionId',$_SESSION["areaEvaluacionSession"])->findAll();
$areasEvaluacion      = $areas->asObject()->findAll();
$facultadEva          = $evaluacion->asObject()->select('facultadId','facultad')->where('aperCicloId',$_SESSION["cicloNombreFacultad"])->groupBy('facultadId','facultad')->findAll();

$areaEvaluacionEva    = $evaluacion->asObject()->select('areaEvaluacionId','areaEvaluacion')->where('aperCicloId',$_SESSION["cicloNombreFacultad"])->groupBy('areaEvaluacionId','areaEvaluacion')->findAll();?>

<?php foreach ($ciclo as $ci ): 
 $_SESSION["nombrePersonalizado"]=$ci->nombrePersonalizado; ?>
<?php endforeach ?>


<?php foreach ($areaEvaluacionNombre as $ar ): 
 $_SESSION["areaEvaluacion"]=$ar->areaEvaluacion; ?>
<?php endforeach ?>

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
          <h2>Presentación de datos | Ciclo:<?= $_SESSION["nombrePersonalizado"]?> | Área de evaluación: <?=$_SESSION["areaEvaluacion"] ?></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;">
          <div class="col-md-6">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <div  class="form-group">
                      <label>Ciclo</label>
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
        <div class="row">
          <script>var cont=0;</script>
          <?php 
          $num=0;  foreach ($facultadEva as $key => $f): 
          $num+=1;

          $nombreFacultad = $evaluacion->where('facultadId',$f->facultadId)->findColumn('facultad');

          //Facultad completa
          $promedioT = $evaluacion->where('facultadId',$f->facultadId)->where('aperCicloId',$_SESSION["cicloNombreFacultad"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSession"])
          ->groupBy('preguntaId')->findColumn('AVG(valor)');

          //Promedio por Género Masculino
          $promedioGenM = $evaluacion->where('facultadId',$f->facultadId)->where('sexo','M')->where('aperCicloId',$_SESSION["cicloNombreFacultad"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSession"])
          ->groupBy('preguntaId')->findColumn('AVG(valor)');

          //Promedio por Género Femenino
          $promedioGenF = $evaluacion->where('facultadId',$f->facultadId)->where('sexo','F')->where('aperCicloId',$_SESSION["cicloNombreFacultad"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionSession"])
          ->groupBy('preguntaId')->findColumn('AVG(valor)');
           

          if ($promedioGenM) {
            $longitud2 = count($promedioGenM);

            //Recorrer Elementos
            for($i=0; $i<$longitud2; $i++){
              $arrayNewFacultadM[$i] = number_format($promedioGenM[$i], 2, '.', ',');
            }
          }else{
            $arrayNewFacultadM = array();
          }

          if ($promedioGenF) {
            $longitud3 = count($promedioGenF);

            //Recorrer Elementos
            for($i=0; $i<$longitud3; $i++){
              $arrayNewFacultadF[$i] = number_format($promedioGenF[$i], 2, '.', ',');
            }
          }else{
            $arrayNewFacultadF = array();
          }

          if ($promedioT) {
            $longitud  = count($promedioT);

            //Recorrer Elementos
            for($i=0; $i<$longitud; $i++){
              $arrayNewFacultad[$i] = number_format($promedioT[$i], 2, '.', ',');
            }
          }else{
            $arrayNewFacultad = array();
          }

          $temasCapacitacion = $evaluacion->where('aperCicloId',$_SESSION["cicloNombreFacultad"])->where('facultadId',$f->facultadId)->where('areaEvaluacionId',$_SESSION["areaEvaluacionSession"])->findColumn('tema');

          ?>

          <div class="col-md-12 col-sm-8">
            <div class="x_panel">
              <div class="x_title">
                <h2><?=$nombreFacultad[0]?></h2>
                <script>
                  cont+=1;
                  eval("var promedioT" + cont + "= " + '<?php echo json_encode($arrayNewFacultad)?>')//CREAR VARIABLE DINÁMICA
                  eval("var promedioGenM" + cont + "= " + '<?php echo json_encode($arrayNewFacultadM)?>')//CREAR VARIABLE DINÁMICA 
                  eval("var promedioGenF" + cont + "= " + '<?php echo json_encode($arrayNewFacultadF)?>')//CREAR VARIABLE DINÁMICA
                </script>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div id="<?='mainb'.$num?>" style="height:350px;"></div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
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
<?php if(isset($temasCapacitacion)){ ?>
  var temasCapacitacion=<?php echo json_encode($temasCapacitacion);?>;
<?php } ?>
 
 var contFacultad = cont;

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
//Crear Sesión para la seleccion de datos en base al ciclo
function procesarValor(){
  let valorCiclo = document.getElementById('cicloId').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionGraficoFacultad/generarSesionCiclo",
    data:"id=" + valorCiclo,
    success:function(p){
      procesarCiclo();
    }
  });
}
function procesarCiclo(){
  let valorCiclo = document.getElementById('cicloId').value;
  if (valorCiclo!="") {
    window.location="/Graficos/Facultades";

  }else{}
}
//Crear Sesión para la area de evaluación
function procesarValorFacultad(){
  let valorAreaEvaluacion = document.getElementById('areaEvaluacionId').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionGraficoFacultad/generarSesionAreaEvaluacion",
    data:"id=" + valorAreaEvaluacion,
    success:function(p){
      procesarAreaEvaluacion();
    }
  });
}
function procesarAreaEvaluacion(){
  let valorAreaEvaluacion = document.getElementById('areaEvaluacionId').value;
  if (valorAreaEvaluacion!="") {
    window.location="/Graficos/Facultades";

  }else{}
}


$(document).ready(function(){
  $('#cicloId').select2();
  $('#areaEvaluacionId').select2();
  $('#carreraId').select2();
  $('#genero').select2();
  $('#rangos').select2();
});
</script>



