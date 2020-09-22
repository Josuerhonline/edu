<?php 
use App\Models\SeleccionarCicloModel;
use App\Models\EvaluacionDocente\CargaViewModel;
use App\Models\Graficos\PromedioDocenteMateriaModel;
use App\Models\Graficos\ViewEvaluacion;

$cargaAcademica      = new CargaViewModel();
$aperCiclo           = new SeleccionarCicloModel();
$viewEvaluacionModel = new ViewEvaluacion();
$promedioModel     = new PromedioDocenteMateriaModel();

//////////////////////////////////Consulta para mostrar la carga académica//////////////////////////////////////////
$carga = $cargaAcademica->asObject()->select()->where('aperCicloId', $_SESSION["cicloId"])->where('areaEvaluacionId', $_SESSION["areaEvaluacionId"])->where('estadoCarga','1')->findAll();

////////////////////////Consultas para los campos selección de ciclo y área evaluadora////////////////////////////
$area  = $viewEvaluacionModel->asObject()->select()->where('aperCicloId',$_SESSION["cicloId"])->groupBy('areaEvaluacionId')->findAll();
$ciclo = $aperCiclo->asObject()->select()->groupBy('aperCicloId','nombrePersonalizado')->where('estado','1')->orderBy('anio','asc')->orderBy('ciclo','asc')->findAll();
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
          <h2>Carga Académica | Ciclo:<?=$_SESSION["nombreCiclo"] ?> | Área: <?=$_SESSION["nombreAreaEvaluacion"] ?></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
          <div class="col-md-4">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <div  class="form-group">
                      <label>Ciclo</label>
                      <select class="form-control" name="cicloId" id="cicloId" onchange="procesarValor()">
                        <option value="">Seleccione un período | Opción Seleccionada: <?= $_SESSION["nombreCiclo"]?></option>
                        <?php foreach ($ciclo as $c): ?>
                          <option value="<?= $c->aperCicloId ?>"><?= 'Ciclo: ',$c->ciclo ,' - Año: ', $c->anio ?></option>
                        <?php endforeach?>
                      </select> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <div  class="form-group">
                      <label>Área</label>
                      <select class="form-control" name="areaEvaluacionId" id="areaEvaluacionId" onchange="procesarValorArea()">
                        <option value="">Seleccione un área de evaluación | Opción Seleccionada: <?=$_SESSION["nombreAreaEvaluacion"] ?></option>
                        <?php foreach ($area as $a): ?>
                          <option value="<?= $a->areaEvaluacionId ?>"><?=$a->areaEvaluacion?></option>
                        <?php endforeach?>
                      </select> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-md-12">
                    <div  class="form-group">
                      <label>Nota</label>
                      <select class="form-control" name="notaId" id="notaId" onchange="procesarValorPonderacion()">
                        <option value="">Seleccione nota mínima | Opción Seleccionada: <?=$_SESSION["ponderacion"] ?></option>
                        <option value="Todas">Todas</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                      </select> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12">
            <div class="x_content">
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <div class="clearfix"></div>
                      <table id="tablaUsuarios" class="display table table-bordered responsive nowrap" style="width:100%">
                       <thead style="background:#2A3F54;">
                        <tr>
                          <th style="color: #fff">Nº</th>
                          <th style="color: #fff" >Nombre</th>
                          <th style="color: #fff" >Apellido</th>
                          <th style="color: #fff" >Materia</th>
                          <th style="color: #fff">Carrera</th>
                          <th style="color: #fff">Facultad</th>
                          <th style="color: #fff">Promedio</th>
                          <th style="color: #fff">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $num=0;  foreach ($carga as $key => $c): 
                       $planMateriaId    = $c->planMateriaId;
                       $aperEvaluacionId = $c->aperEvaluacionId;
                       $_SESSION["cargaId"]=$c->cargaAcademicaId;
                       $mostrar=0;

                       $evaluado  = $viewEvaluacionModel->asObject()->select()->where('aperCicloId',$_SESSION["cicloId"])->where('planMateriaId',$planMateriaId)->findAll();

                       if($evaluado){

                        $notaMinima = $promedioModel->select()->where('aperEvaluacionId', $aperEvaluacionId)->where('planMateriaId', $planMateriaId)->findColumn('promedioMateria');

                        if($_SESSION["ponderacion"]!="Todas"){
                          if($notaMinima[0]<=$_SESSION["ponderacion"]){
                            $mostrar=1;
                          }else{
                            $mostrar=0;
                          }
                        }else{
                          $mostrar=1;
                        }

                        if($mostrar==1){
                      ?>
                         <tr>
                           <td><?= $num+=1; ?></td>
                           <td><?= $c->nombresCarga ?></td>
                           <td><?= $c->apellidosCarga ?></td>
                           <td><?= $c->materia ?></td>
                           <td><?= $c->carrera ?></td>
                           <td><?= $c->facultad ?></td>
                           <td><?= number_format($notaMinima[0],2,".",",") ?></td>
                           <td>

                            <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver Gráficos" class="float-right ml-2 btn btn-primary btn-sm" href="/Graficos/Docente/resultados/<?= $c->cargaAcademicaId?>"><i class="fa fa-eye"></i></a>
                          </td>
                        </tr>
                      <?php }} ?>
                    <?php endforeach?>
                  </tbody>
                </table>
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
  $(document).ready(function() {
    $('#cicloId').select2();
    $('#areaEvaluacionId').select2();
    $('#notaId').select2();
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
function procesarValorArea(){
  let valorAreaEvaluacion = document.getElementById('areaEvaluacionId').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionDocente/generarSesionAreaEvaluacionTbl",
    data:"id=" + valorAreaEvaluacion,
    success:function(p){
      window.location="/Graficos/Docente";
    }
  });
}

function procesarValorPonderacion(){
  let valorNota = document.getElementById('notaId').value;
  $.ajax({
    type:"POST",
    url:"/Graficos/SeleccionDocente/generarSesionNota",
    data:"id=" + valorNota,
    success:function(p){
     window.location="/Graficos/Docente";
   }
 });
}

</script>



