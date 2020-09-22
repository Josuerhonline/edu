<?php use App\Models\CatalogosEvaluacion\AperEvaluacionModelView;
use App\Models\EvaluacionDocente\CargaInscripcionViewModel; 
use App\Models\CatalogosEvaluacion\preguntasViewModel;
use App\Models\CatalogosEvaluacion\InstrumentoDetalleModel;?>

<!-- datos generales de la carga academica y la inscripción -->
<?php  $cargaInscripcion = new CargaInscripcionViewModel();
$cargaInscripcionData =  $cargaInscripcion->asObject()
->select('view_carga_inscripcion.*')->where('aperCicloId',$_SESSION["cicloId"])->where('estadoInstrumento','1')->where('inscripcionDetalleId',$inscripcion->inscripcionDetalleId)->findAll() ?>

<?php $num=0;  foreach ($cargaInscripcionData as $key => $c): 
$_SESSION["nombres"] = $c->nombres; $_SESSION["apellidos"] = $c->apellidos;$_SESSION["nombresCarga"] = $c->nombresCarga; $_SESSION["apellidosCarga"] = $c->apellidosCarga;  $_SESSION["materia"]=$c->materia;$_SESSION["personaId"]=$c->personaId;$_SESSION["planMateriaId"]=$c->planMateriaId ?>
<?php endforeach ?>

<!-- Datos generales de apertura de evaluación -->
<?php  $aperEvaluacion = new AperEvaluacionModelView();
$fechaActual = date("Y-m-d");
$aperEvaluacionData =  $aperEvaluacion->asObject()
->select('view_aper_evaluacion.*')->where('aperCicloId',$_SESSION["cicloId"])->where('fechaInicio<=',$fechaActual)->where('fechaFin>=',$fechaActual)->where('estadoInstrumento','1')->findAll() ?>
<?php $num=0;  foreach ($aperEvaluacionData as $key => $i): ?>
<h1 hidden=""><?$areaEvaluacion= $i->areaEvaluacion ?></h1>
<h1 hidden=""><?php $_SESSION["ciclo"]= $i->nombrePersonalizado ?></h1>
<h1 hidden=""><?php  $_SESSION["descripcion"]= $i->descripcion ?></h1>
<h1 hidden=""><?php  $_SESSION["instrumentoIdS"]= $i->instrumentoId ?></h1>
<h1 hidden=""><?php  $_SESSION["aperEvaluacionId"]= $i->aperEvaluacionId ?></h1>
<h1 hidden=""><?php $instrumento= $i->instrumentoId ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','1')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId1"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta1"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','2')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId2"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta2"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','3')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId3"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta3"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','4')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId4"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta4"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','5')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId5"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta5"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','6')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId6"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta6"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','7')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId7"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta7"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','8')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId8"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta8"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','9')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId9"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta9"]= $pr->pregunta ?></h1>
<?php endforeach ?>

<!-- Datos detalles de las preguntas -->
<?php  $instrumentoDetalle = new InstrumentoDetalleModel();
$preguntasDetalle =  $instrumentoDetalle->asObject()
->select('eva_instrumento_detalle.*')->where('instrumentoId',$instrumento)->where('orden','10')->findAll() ?>
<?php $num=0;  foreach ($preguntasDetalle as $key => $p): ?>
<h1 hidden=""><?php $preguntaId= $p->preguntaId ?></h1>
<h1 hidden=""><?php $_SESSION["instrumentoDetalleId10"]= $p->instrumentoDetalleId ?></h1>
<?php endforeach ?>

<?php  $preguntas = new preguntasViewModel();
$preguntasResultado =  $preguntas->asObject()
->select('view_preguntas.*')->where('preguntaId',$preguntaId)->findAll() ?>
<?php $num=0;  foreach ($preguntasResultado as $key => $pr): ?>
<h1 hidden=""><?php $_SESSION["pregunta10"]= $pr->pregunta ?></h1>
<?php endforeach ?>
