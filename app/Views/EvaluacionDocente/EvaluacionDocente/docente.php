     <?php use App\Models\EvaluacionDocente\CargaViewModel;
     use App\Models\Catalogos\UsuariosModel; 
     use App\Models\EvaluacionDocente\EvaluacionDocentes;
     use App\Models\EvaluacionDocente\Evaluacion;
     $evaluacion = new EvaluacionDocentes();
     use App\Models\CatalogosEvaluacion\AperEvaluacionModelView;
     ?>
     <?php  $aperEvaluacion = new AperEvaluacionModelView();
     $fechaActual = date("Y-m-d");
     $aperEvaluacionData =  $aperEvaluacion->asObject()
     ->select('view_aper_evaluacion.*')->where('aperCicloId',$_SESSION["cicloId"])->where('fechaInicio<=',$fechaActual)->where('fechaFin>=',$fechaActual)->where('estadoInstrumento','1')->where('estadoAperEva','1')->findAll() ?> 
     <?php $num=0;  foreach ($aperEvaluacionData as $key => $aper):
     $aperEvaluacionIdResultado= $aper->aperEvaluacionId?>
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
    <?php if ($aperEvaluacionData): ?>
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel" style="border: 60%">
          <div class="x_title">
            <h2>Autoevaluación</h2>
            <div class="clearfix"></div>
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
                        <?php  $usuarios = new UsuariosModel(); 
                        $usuario =  $usuarios->asObject()
                        ->select('cof_usuarios.*')->where('usuario',$_SESSION["usuario"])->findAll() ?>
                        <?php   foreach ($usuario as $key => $per): 
                         $persona = $per->personaId; ?>
                       <?php endforeach ?>
                       <?php  $carga = new CargaViewModel();
                       $cargaData =  $carga->asObject()
                       ->select('view_carga_academica.*')->where('aperCicloId',$_SESSION["cicloId"])->where('personaId',$persona)->where('estadoCarga','1')->findAll() ?>
                       <?php if ($cargaData): ?>
                         <?php $num=0;  foreach ($cargaData as $key => $i):
                         $aperEvaluacionId = $i->aperEvaluacionId;$_SESSION["personaIdCarga"]=$i->personaId; $_SESSION["aperEvaluacionIdCarga"]= $i->aperEvaluacionId?>
                       <?php endforeach?>
                       <button hidden="" ></button>
                       <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief">Autoevaluación docente</h4>
                            <div class="left col-md-7 col-sm-7">
                              <strong>Docente: </strong><h2><?=$i->nombresCarga, " ",$i->apellidosCarga  ?></h2>
                              <p>Universidad Cristiana de las Asambleas de Dios</p>

                              <p><strong>Ciclo: </strong><?= $_SESSION["ciclo"] ?></p>
                            </div>
                            <div class="right col-md-5 col-sm-5 text-center">
                              <img src="/user/img/user.png" alt="" class="img-circle img-fluid" style="width: 110px">
                            </div>
                          </div>
                          <div class=" profile-bottom text-center">
                            <?php $verificar= $evaluacion->select('personaId','aperEvaluacionId')->where('personaId',$persona)->where('aperEvaluacionId',$aperEvaluacionId)->first(); ?>
                            <div class=" col-sm-6 emphasis" style="padding-top: 15px">
                              <?php if ($verificar): ?>
                                <button disabled="" class="btn btn-secundary mb-12" ><i class="fa fa-check-square"><font face="arial" size="2px"> Evaluación realizada</font></i></button>
                              <?php endif ?>
                              <?php if (!$verificar): ?>
                               <a href="/EvaluacionDocente/EvaluacionDocente/realizarEvaluacionDocente/<?= $i->cargaAcademicaId?>" title="Crear" class="btn btn-success mb-12" ><i class="fa fa-check-square-o"><font face="arial" size="2px"> Auto Evaluarse</font></i> </a>
                             <?php endif ?>
                           </div>
                         </div>
                       </div>

                       <?php else : ?>       
                        <h4>No tiene una carga académica asignada para este ciclo.</h4>
                      <?php endif ?>
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
<?php endif ?>
<?php if (!$aperEvaluacionData): ?>
 <div class="clearfix"></div>
 <div class="col-md-12 col-sm-12 ">
  <div class="x_panel" style="border: 60%">
    <div class="x_title">
      <h2>¡Alerta!</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 20px;padding-left:13px;padding-bottom:10px;border-radius: 10px">
      <h4>No existe un período de evaluación activo.</h4>
    </div>
  </div>
</div>
<?php endif ?>
</div>
</div>
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script>
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
      window.location.href = "/CatalogosEvaluacion/TemasCapacitacion/delete/"+id;
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


</script>



