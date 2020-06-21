<?php use App\Models\CatalogosEvaluacion\AperEvaluacionModelView;?>
<?php  $ponderacion = new AperEvaluacionModelView();
$ponderacionResultado =  $ponderacion->asObject()
->select('view_aper_evaluacion.*')->where('instrumentoId',$_SESSION["instrumentoIdS"])->findAll() ?>
<?php  foreach ($ponderacionResultado as $key => $p): ?>
	<h1 hidden=""><?php $minima= $p->ponderacionMinima ?></h1>
	<h1 hidden=""><?php $maxima= $p->ponderacionMaxima ?></h1>
<?php endforeach ?>
<div id="wizard_verticle" class="form_wizard wizard_horizontal">
	<ul class="wizard_steps" style="width: 100%">
		<li>
			<a href="#step-1">
				<span class="step_no">1 </span>
			</a>
		</li>
		<li>
			<a href="#step-2" >
				<span class="step_no">2</span>
			</a>
		</li>
		<li>
			<a href="#step-3">
				<span class="step_no">3</span>
			</a>
		</li>
		<li>
			<a href="#step-4">
				<span class="step_no">4</span>
			</a>
		</li>
		<li>
			<a href="#step-5">
				<span class="step_no">5</span>
			</a>
		</li>
		<li>
			<a href="#step-6">
				<span class="step_no">6</span>
			</a>
		</li>
		<li>
			<a href="#step-7">
				<span class="step_no">7</span>
			</a>
		</li>
		<li>
			<a href="#step-8">
				<span class="step_no">8</span>
			</a>
		</li>
		<li>
			<a href="#step-9">
				<span class="step_no">9</span>
			</a>
		</li>
		<li>
			<a href="#step-10">
				<span style="width: 50%" class="step_no">10</span>
			</a>
		</li>
		<li>
			<a href="#step-11">
				<span class="step_no"><i class="fa fa-pencil-square-o"></i></span>
			</a>
		</li>
	</ul>
	<div id="step-1">
		<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta1"] ?></h2></font>
		<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">

			<div class="col-md-12" >
				<center> <h2>Selecciona una ponderación</h2>
					<div id="menu" width=100%>
						<div class="btn-group btn-group-toggle" data-toggle="buttons">
							<ul>
								<?php foreach (range($minima, $maxima) as $ponderacion): ?>
									<li>
										<a href="#step-2" onclick="preg1(<?=$ponderacion ?>)">
											<label style="margin-top: 10px"  class="btn btn-dark">
												<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
											</label>
										</a>
									</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</center>
			</div>
		</div>
	</div>
	<div id="step-2">
		<div id="step2"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta2"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >
					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg2(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>				
	</div>
	<div id="step-3">
		<div id="step3"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta3"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >
					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg3(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-4">
		<div id="step4"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta4"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >

					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg4(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-5">
		<div id="step5"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta5"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >

					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg5(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-6">
		<div id="step6"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta6"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >

					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg6(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-7">
		<div id="step7"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta7"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >

					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg7(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-8">
		<div id="step8"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta8"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >

					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg8(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-9">
		<div id="step9"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta9"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >

					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg9(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-10">
		<div id="step10"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px"><?=$_SESSION["pregunta10"] ?></h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >

					<center> <h2>Selecciona una ponderación</h2>
						<div id="menu" width=100%>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<ul>
									<?php foreach (range($minima, $maxima) as $ponderacion): ?>
										<li>
											<a href="#step-2" onclick="preg10(<?=$ponderacion ?>)">
												<label style="margin-top: 10px"  class="btn btn-dark">
													<input type="radio" name="options" id="option2" autocomplete="off"> <?=$ponderacion ?>
												</label>
											</a>
										</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div id="step-11">
		<div id="step11"  style="display:none;">
			<font color="white"><h2 style="text-decoration-color: red;text-align: center;background:#172D44;border-radius: 10px;padding-top: 10px;padding-bottom: 10px">¿DESEA  AGREGAR UN COMENTARIO?</h2></font>
			<div class="x_content" style="background: #fff;border: 1px solid #172D44;padding-top: 10px;border-radius: 10px">
				<div class="col-md-12" >
					<label>El comentario es opcional y solo debe contener como máximo 50 carácteres.</label>
					<div class="clearfix"></div>
					<textarea style="border-bottom: 100%;border-bottom-color: #172D44;border-left: #fff;border-top: #fff;border-right: #fff" id="observaciones" onblur="document.getElementById('obs').value=this.value" maxlength="50" cols="40" rows="10" placeholder="Agrega tu comentario"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/js/jquery-3.4.1.slim.min.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		$("textarea[maxlength]").keyup(function() {
			var limit   = $(this).attr("maxlength");
			var value   = $(this).val(); 
			var current = value.length;   
			if (limit < current) {  
				$(this).val(value.substring(0, limit));
			}
		});
	});
</script>