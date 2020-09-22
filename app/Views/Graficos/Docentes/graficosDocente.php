<?php 
use App\Models\SeleccionarCicloModel;
use App\Models\EvaluacionDocente\CargaViewModel;
use App\Models\EvaluacionDocente\Evaluacion;
use App\Models\EvaluacionDocente\EvaluacionDocentes;
use App\Models\Graficos\ViewEvaluacion;
use App\Models\Graficos\TemasPromedio;
use App\Models\Graficos\ViewTotalInscripciones;
use App\Models\Graficos\PromedioDocenteMateriaModel;
use App\Models\Graficos\ViewTotalEvaluacionesCargaInscripcion;

$cargaAcademica      = new CargaViewModel();
$aperCiclo           = new SeleccionarCicloModel();
$areaEvaluacionModel = new ViewEvaluacion();
$autoEvaluacion      = new EvaluacionDocentes();
$totalInscripciones  = new ViewTotalInscripciones();
$promedioModel       = new PromedioDocenteMateriaModel();
$totalEvaluaciones   = new ViewTotalEvaluacionesCargaInscripcion();
$evaluacion          = new Evaluacion();
$temasProm           = new TemasPromedio();

//////////////////////////////////Consulta para mostrar la carga académica//////////////////////////////////////////

$datosDocente = $cargaAcademica->select('view_carga_academica.*')->where('aperCicloId', $_SESSION["cicloId"])->where('areaEvaluacionId', $_SESSION["areaEvaluacionId"])->where('estadoCarga','1')->where('cargaAcademicaId',$_SESSION["cargaId"])->first();

$carga = $cargaAcademica->asObject()->select('view_carga_academica.*')->where('aperCicloId', $_SESSION["cicloId"])->where('areaEvaluacionId', $_SESSION["areaEvaluacionId"])->where('estadoCarga','1')->findAll();

$notaMinima = $promedioModel->select()->where('aperEvaluacionId',$datosDocente['aperEvaluacionId'])->where('planMateriaId',$datosDocente['planMateriaId'])->findColumn('promedioMateria');
////////////////////////////////////////Cantidad de estudiantes que comentaron/////////////////////////////////
$cantidadComentarios = $evaluacion->selectCount('observaciones')->where('planMateriaId',$datosDocente['planMateriaId'])->where('aperEvaluacionId',$datosDocente['aperEvaluacionId'])->where('observaciones<>',"")->first();
/////////////////////////////////////////lista de los promedios de los temas a capacitar////////////////////////////
$promediosT = $temasProm->asObject()->select()->where('planMateriaId',$datosDocente['planMateriaId'])->where('aperCicloId',$_SESSION["cicloId"])->orderBy('promedio','desc')->findAll();

$autoE = $autoEvaluacion->where('aperEvaluacionId',$datosDocente['aperEvaluacionId'])->where('personaId',$datosDocente['personaId'])->first();
////////////////////////Consultas para los campos selección de ciclo y área evaluadora////////////////////////////
$area  = $areaEvaluacionModel->asObject()->select()->where('aperCicloId',$_SESSION["cicloId"])->groupBy('areaEvaluacionId')->findAll();
$ciclo = $aperCiclo->asObject()->select()->groupBy('aperCicloId','nombrePersonalizado')->findAll();

$evaluaciones = $totalEvaluaciones->select()->where('aperCicloId',$_SESSION["cicloId"])->where('areaEvaluacionId',$_SESSION["areaEvaluacionId"])->where('planMateriaId',$datosDocente['planMateriaId'])->findColumn('totalEvaluaciones');

$inscripciones = $totalInscripciones->select()->where('aperCicloId',$_SESSION["cicloId"])->where('planMateriaId',$datosDocente['planMateriaId'])->findColumn('totalInscripcion');
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
          <button type="button" class="btn btn-primary" onclick="window.location.href='/Graficos/Docente'" style="background: #2A3F54"><i class="fa fa-chevron-left" ></i> Regresar</button>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
          <div  style="background: #fff;border-radius: 5px">
            <?php if ($datosDocente['sexo'] =='M'): ?>
              <img src="/user/img/man.png" class="col-md-12" style="max-width: 110px;border: 2px solid #E1E1E1;border-radius:6px">
            <?php endif ?>
            <?php if ($datosDocente['sexo'] =='F'): ?>
             <img src="/user/img/woman.png" class="col-md-12" style="max-width: 110px;border: 2px solid #E1E1E1;border-radius:6px">
           <?php endif ?>
           <h3 style="margin-left: 9%;background:#4b5f71 "><font color="#fff">RESULTADOS DE LA EVALUACIÓN DOCENTE </font>
           </div>
           <div class="col-md-11">
            <h2><font color="#172D44">DOCENTE:</font><font color="#4b5f71"> <?=$datosDocente['nombresCarga']; echo " ".$datosDocente['apellidosCarga']; ?></font></h2>
            <h2><font color="#172D44">MATERIA:</font><font color="#4b5f71"> <?=$datosDocente['materia']?>
            <h2><font color="#172D44">CARRERA:</font><font color="#4b5f71"> <?=$datosDocente['carrera']?>
            <h2><font color="#172D44">FACULTAD:</font><font color="#4b5f71"> <?=$datosDocente['facultad']?>
          </div>
        </div> 
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">

          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="clearfix"></div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon" ><i class="fa fa-users" style="color:#2A3F54"></i></div>
                          <div class="count"><?=$inscripciones[0];?></div>
                          <h3>Inscripciones</h3>
                          <p>Cantidad de estudiantes inscritos en la materia.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-clipboard" style="color:#2A3F54"></i></div>
                          <div class="count"><?=$evaluaciones[0];?></div>
                          <h3>Evaluaciones</h3>
                          <p>Cantidad de estudiantes que realizarón la evaluación.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-comments-o" style="color:#2A3F54"></i></div>
                          <div class="count"><?=$cantidadComentarios['observaciones'];?></div>
                          <h3>Comentarios</h3>
                          <p>Estudiantes que realizaron observaciones.</p>
                        </div>
                      </div>
                      <!-- ////////////////////////////////////////////////////// -->
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon" ><i class="fa fa-slideshare" style="color:#2A3F54"></i></div>
                          <div class="count"><?= number_format($notaMinima[0],2,".",",") ?></div>
                          <h3>Promedio evaluacion</h3>
                          <p>Nota promedio de las evaluaciones realizadas por los estudiantes.</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-child" style="color:#2A3F54"></i></div>
                          <?php if ($autoE['resultadoEvaluacion']==""):?>
                            <div class="count"><h2> Aún no se ha realizado</h2></div>
                            <br>
                          <?php endif ?>
                          <?php if (!$autoE['resultadoEvaluacion']==""):?>
                            <div class="count"><?= number_format($autoE['resultadoEvaluacion'],2,".",",") ?></div>
                          <?php endif ?>
                          <h3>Promedio autoevaluación</h3>
                          <p>Nota promedio de la autoevaluación.</p>
                        </div>
                      </div>
                      <?php if ($autoE['resultadoEvaluacion']==""):?>
                        <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-sort-numeric-desc" style="color:#2A3F54"></i></div>
                            <div class="count"><?=  number_format($notaMinima[0],2,".",",")?></div>
                            <h3>Promedio final</h3>
                            <p>Promedio final de la nota de los estudiantes mas la autoevaluación.</p>
                          </div>
                        </div>
                      <?php endif ?>
                      <?php if (!$autoE['resultadoEvaluacion']==""):?>
                        <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-sort-numeric-desc" style="color:#2A3F54"></i></div>
                            <?php $notaFinal = (number_format($notaMinima[0],2,".",",")+number_format($autoE['resultadoEvaluacion'],2,".",","))?>
                            <div class="count"><?= number_format($notaFinal/2,2,".",",")?></div>

                            <h3>Promedio final</h3>
                            <p>Promedio final de la nota de los estudiantes mas la autoevaluación.</p>
                          </div>
                        </div>
                      <?php endif ?>
                      <div class="col-md-12 col-sm-4 ">
                        <div class="x_panel tile ">
                          <div class="x_title">
                            <span style="color: #172D44">Gráfica general de los temas de capacitación con su respectivo promedio y recomendación.</span>
                            <ul class="nav navbar-right panel_toolbox">
                              <li class="dropdown">
                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <h2 style="color: #172D44">TEMAS DE CAPACITACIÓN</h2>
                            <br>
                            <?php foreach ($promediosT as $key => $pte): ?>

                              <div class="widget_summary">

                                <div class="w_left w_25">
                                  <span style="color: #172D44"><?=$pte->tema ?></span>
                                </div>
                                <div class="w_center w_55">
                                  <div class="progress">
                                    <?php $resultados= $pte->promedio/100*(1000); ?>
                                    <?php if ($resultados >=10 && $resultados<=59): ?>
                                      <div class="progress-bar bg-red" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$resultados ?>%;">
                                        <span class="sr-only">60% Complete</span>
                                        <h2>Se necesita capacitación</h2>
                                      </div>
                                    <?php endif ?>
                                    <?php if ($resultados >=60 && $resultados <=79): ?>
                                      <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$resultados ?>%;">
                                        <h2>Se podría mejorar</h2>
                                      </div>
                                    <?php endif ?>
                                    <?php if ($resultados >=80 && $resultados <=100): ?>
                                      <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?=$resultados ?>%;">
                                        <h2>Excelente</h2>
                                      </div>
                                    <?php endif ?>

                                  </div>
                                </div>
                                <div class="w_right w_20">
                                  <span style="color: #172D44"> <?= number_format($pte->promedio,2,".",",") ?></span>

                                </div>
                                <div class="clearfix"></div>
                              </div>
                            <?php endforeach ?>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
<script>
  var totalE= parseInt(<?php echo json_encode($evaluaciones[0]);?>);
  var totalI = parseInt(<?php echo json_encode($inscripciones[0]);?>);

  $(document).ready(function() {
    $('#cicloId').select2();
    $('#areaEvaluacionId').select2();
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
    url:"/Graficos/SeleccionDocente/generarSesionCiclo",
    data:"id=" + valorCiclo,
    success:function(p){
     window.location="/Graficos/Docente";
   }
 });
}

//Crear Sesión para la area de evaluación
function procesarValorFacultad(){
  let valorAreaEvaluacion = document.getElementById('areaEvaluacionId').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionDocente/generarSesionAreaEvaluacion",
    data:"id=" + valorAreaEvaluacion,
    success:function(p){
      window.location="/Graficos/Docente";
    }
  });
}
</script>



