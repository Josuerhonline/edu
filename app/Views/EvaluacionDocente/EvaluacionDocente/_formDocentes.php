<link rel="stylesheet" href="/build/css/selects.css">
<link rel="stylesheet" href="/build/css/select2-evaluacionDocente.css">
<?= view("EvaluacionDocente/EvaluacionDocente/preguntas");  
$session = session(); 
$rol =  $session->rolId; ?>
<?= view("dashboard/edu/menu"); ?>
<?php use App\Models\CatalogosEvaluacion\AperEvaluacionModelView;?>
<?php  $ponderacion = new AperEvaluacionModelView();
$ponderacionResultado =  $ponderacion->asObject()
->select('view_aper_evaluacion.*')->where('instrumentoId',$_SESSION["instrumentoIdS"])->findAll() ?>
<?php  foreach ($ponderacionResultado as $key => $p): ?>
	<h1 hidden=""><?php $minima= $p->ponderacionMinima ?></h1>
	<h1 hidden=""><?php $maxima= $p->ponderacionMaxima ?></h1>
<?php endforeach ?>
</div>
</div>

<div class="top_nav">
	<?= view("dashboard/edu/navbar"); ?>
	<?= view("dashboard/partials/_session"); ?>
</div>
<style type="text/css">
	#menu ul{
		list-style: none;
	}
	#menu li{
		display: inline;
	}
</style>

<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row" >
		<?php $areaEvaluacion ?>
		<div class="col-md-12 col-sm-12 " >
			<div class="x_panel" style="border: 1px solid #e1e1e1;" >
				<div class="x_title">
					<button type="button" class="btn btn-primary" onclick="window.location.href='/EvaluacionDocente/EvaluacionDocente'" style="background: #2A3F54"><i class="fa fa-chevron-left" ></i> </button>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div  style="background: #fff;border-radius: 5px">
						<img src="/user/img/ucad-logo.png" class="col-md-12" style="max-width: 94px;margin-top: 2px">
						<h3 style="margin-left: 6%"><font color="#2A3F54">EVALUACIÓN DOCENTE | CICLO  <?= $_SESSION["ciclo"] ?></font></h3>
					</div>
					<div class="col-md-4">
						<h2><font color="#172D44" >Materia:</font><font color="#4b5f71"> <?=  $_SESSION["materia"] ?></font></h2>
						<h2><font color="#172D44">Docente:</font><font color="#4b5f71"> <?=  $_SESSION["nombresCarga"];echo " "; echo  $_SESSION["apellidosCarga"]; ?></font></h2>
						<h2><font color="#172D44">Fecha de evaluación:</font><font color="#4b5f71"> <?=  date("d") . " del " . date("m") . " de " . date("Y"); ?></font></h2>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div class="clearfix"></div>
					<div class="x_title">
						<h4><font color="#172D44">Objetivo de la evaluación:</font><font color="#4b5f71"> <?=  $_SESSION["descripcion"] ?></font></h4>
						<div class="clearfix"></div>
					</div>

					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<!-- campos para crear -->
										<div class="x_content">
											<p>Asegurese de seleccionar una ponderación para cada pregunta. Siendo <?=$minima ?> la nota mínima y <?=$maxima ?> la nota máxima.</p>
											<input type="text" name="formulario" id="formulario" value="crear" hidden="">
											<div  hidden="">

												<input type="text" name="aperEvaluacionIdCarga" id="aperEvaluacionIdCarga" value="<?= $_SESSION["aperEvaluacionIdCarga"]?>">
												<input type="text" name="personaIdCarga" id="personaIdCarga"  value="<?= $_SESSION["personaIdCarga"]?>">
												<input type="text" name="instrumentoDetalleId1" id="instrumentoDetalleId1"  value="<?= $_SESSION["instrumentoDetalleId1"]?>">
												<input type="text" name="instrumentoDetalleId2" id="instrumentoDetalleId2"  value="<?= $_SESSION["instrumentoDetalleId2"]?>">
												<input type="text" name="instrumentoDetalleId3" id="instrumentoDetalleId3"  value="<?= $_SESSION["instrumentoDetalleId3"]?>">
												<input type="text" name="instrumentoDetalleId4" id="instrumentoDetalleId4"  value="<?= $_SESSION["instrumentoDetalleId4"]?>">
												<input type="text" name="instrumentoDetalleId5" id="instrumentoDetalleId5"  value="<?= $_SESSION["instrumentoDetalleId5"]?>">
												<input type="text" name="instrumentoDetalleId6" id="instrumentoDetalleId6"  value="<?= $_SESSION["instrumentoDetalleId6"]?>">
												<input type="text" name="instrumentoDetalleId7" id="instrumentoDetalleId7"  value="<?= $_SESSION["instrumentoDetalleId7"]?>">
												<input type="text" name="instrumentoDetalleId8" id="instrumentoDetalleId8"  value="<?= $_SESSION["instrumentoDetalleId8"]?>">
												<input type="text" name="instrumentoDetalleId9" id="instrumentoDetalleId9"  value="<?= $_SESSION["instrumentoDetalleId9"]?>">
												<input type="text" name="instrumentoDetalleId10" id="instrumentoDetalleId10"  value="<?= $_SESSION["instrumentoDetalleId10"]?>">
												<input type="text" name="fechaEvaluacion" id="fechaEvaluacion"  value=" <?= date("Y")."-". date("m")."-". date("d")." ".date("G").":".date("i").":".date("s"); ?>">
												<input type="text" name="pregunta1" id="pregunta1">
												<input type="text" name="pregunta2" id="pregunta2">
												<input type="text" name="pregunta3" id="pregunta3">
												<input type="text" name="pregunta4" id="pregunta4">
												<input type="text" name="pregunta5" id="pregunta5">
												<input type="text" name="pregunta6" id="pregunta6">
												<input type="text" name="pregunta7" id="pregunta7">
												<input type="text" name="pregunta8" id="pregunta8">
												<input type="text" name="pregunta9" id="pregunta9">
												<input type="text" name="pregunta10" id="pregunta10">
												<input type="text" name="obs" id="obs">
											</div>
											<?= view("EvaluacionDocente/EvaluacionDocente/steps"); ?>
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
</div>
</div>
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script src="/js/pnotify/dist/pnotify.js"></script>
<script src="/js/pnotify/dist/pnotify.buttons.js"></script>
<script src="/js/pnotify/dist/pnotify.nonblock.js"></script>
<script src="/js/funcionPregunta.js"></script>


