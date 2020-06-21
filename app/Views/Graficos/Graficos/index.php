<?php use App\Models\Catalogos\CarrerasModel; 
use App\Models\Graficos\PromedioCarrerasModel;
use App\Models\Graficos\CarreraFechaModel;

use App\Models\Graficos\CountEvaluacionesModel;
use App\Models\Graficos\CountEvaluacionesDocenteModel;
use App\Models\Graficos\FacultadFechaModel;
$promedio = new PromedioCarrerasModel();
$nombreFecha = new CarreraFechaModel();
$nombreFechaFacultad = new FacultadFechaModel();
$countFecha = new CountEvaluacionesModel();
$countFechaDocentes = new CountEvaluacionesDocenteModel();

$nombreFacultad = $nombreFechaFacultad->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('nombreFechaFacultad');
$promedioFacultad = $nombreFechaFacultad->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('promedio');
//Data para el promedio de las evaluaciones por carrera
$nombreFecha = $nombreFecha->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('nombreFecha');
$promedio = $promedio->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('promedio');
//Data de evaluaciones de estudiantes
$fecha = $countFecha->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('fecha');
$cantidad = $countFecha->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('cantidad');
  //Data de auto evaluaciones
$cantidadDocente = $countFechaDocentes->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('cantidad');
$fechaDocente = $countFechaDocentes->where('aperCicloId',$_SESSION["cicloNombre"])->findColumn('fecha');?>

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
          <div class="col-md-12">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <div  class="form-group">
                      <p>Por favor, seleccione el período del que desea ver los gráficos.</p>
                      <select class="form-control" name="cicloId" id="cicloId" onchange="procesarValor()">
                        <option value="">Seleccione un periodo</option>
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
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Resultados evaluación docente por facultades</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="lineChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Resultados evaluación docente por carreras</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <canvas id="mybarChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Cantidad de evaluaciones realizadas</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="echart_line" style="height:350px;"></div>
              </div>
            </div>
          </div>
          <!-- /////////////// -->
          <div class="col-md-6 col-sm-6  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Cantidad de auto evaluaciones realizadas</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div id="echart_line1" style="height:350px;"></div>
              </div>
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
 var fecha=<?php echo json_encode($fecha);?>;
 var cantidad=<?php echo json_encode($cantidad);?>;
 var cantidadDocente=<?php echo json_encode($cantidadDocente);?>;
 var fechaDocente=<?php echo json_encode($fechaDocente);?>;
 var nombreFecha=<?php echo json_encode($nombreFecha);?>;
 var promedio=<?php echo json_encode($promedio);?>;
 var nombreFacultad=<?php echo json_encode($nombreFacultad);?>;
 var promedioFacultad=<?php echo json_encode($promedioFacultad);?>;
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
      procesarCiclo();
    }
  });
}
function procesarCiclo(){
  let valorCiclo = document.getElementById('cicloId').value;
  if (valorCiclo!="") {
    window.location="/Graficos/Graficos";
  }else{}
}
function verificarRangos(){
  let rangos = document.getElementById('rangos').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionGrafico/verficarRango",
    data:"id=" + rangos,
    success:function(p){
      procesarCiclo();
    }
  });
}
$(document).ready(function(){
  $('#cicloId').select2();
});

$(document).ready(function(){
  $('#rangos').select2();
});



</script>



