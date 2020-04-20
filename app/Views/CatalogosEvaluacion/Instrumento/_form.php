<?= view("dashboard/edu/menu"); ?>
</div>
</div>
<div class="top_nav">
	<?= view("dashboard/edu/navbar"); ?>
	<?= view("dashboard/partials/_session"); ?>
</div>
<div class="right_col" role="main" >
	<div class="clearfix"></div>
	<div class="row" >
		<div class="col-md-12 col-sm-12 " >
			<div class="x_panel" style="border: 1px solid #e1e1e1;" >
				<div class="x_title">
					<button type="button" class="btn btn-primary" onclick="window.location.href='/CatalogosEvaluacion/instrumento'" style="background: #2A3F54"><i class="fa fa-arrow-left" ></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<!-- campos para crear -->
										<div class="row">
											<div class="col-md-12 col-sm-12 ">
												<div class="x_panel">
													<div class="x_title">
														<h2>Datos generales</h2>
														<div class="clearfix"></div>
													</div>
													<div class="x_content">
														<br />
														<div class="item form-group col-md-9 " style="margin-left: 4%"  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-users" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select class="form-control col-md-11" name="area" id="area" >
																	<?php foreach ($area as $a): ?>
																		<option value="<?= $a->areaEvaluacionId ?>"><?= $a->areaEvaluacion ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
														<div class="item form-group col-md-9 "style="margin-left: 4%"  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del instrumento<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="	fa fa-file" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<input type="text" value="<?= old('nombre') ?>" name="nombre" id="nombre" class="form-control " >
															</div>
														</div>
														<div class="item form-group col-md-11 "  hidden>
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del instrumento<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<input  type="text" value="<?= old('pregunta_1') ?>" name="pregunta_1" id="pregunta_1" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_2" id="pregunta_2" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_3" id="pregunta_3" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_4" id="pregunta_4" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_5" id="pregunta_5" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_6" id="pregunta_6" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_7" id="pregunta_7" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_8" id="pregunta_8" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_9" id="pregunta_9" class="form-control " hidden>
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_10" id="pregunta_10" class="form-control " hidden>
															</div>
														</div>
														<div class="item form-group col-md-11 "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Descripción<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="	fa fa-edit" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<textarea name="descripcion" id="descripcion"  style="width: 73%"	 ><?= old('descripcion') ?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="x_panel">
											<div class="x_title">
												<h2>Preguntas de evaluación <small></small></h2>

												<div class="clearfix"></div>
											</div>
											<div class="x_content">


												<!-- Smart Wizard -->
												<p>Asegurese de seleccionar todas las preguntas para completar el instrumento de evaluación</p>
												<div id="wizard_verticle" class="form_wizard wizard_horizontal">
													<ul class="wizard_steps" style="width: 100%">
														<li>
															<a href="#step-1">
																<span class="step_no">1 </span>
															</a>
														</li>
														<li>
															<a href="#step-2">
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
																<span class="step_no">10</span>
															</a>
														</li>
													</ul>
													
													<div id="step-1">
														<small>Pregunta 1</small>
														<div class="item form-group col-md-11 "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione una pregunta<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control"  name="pregunta1" id="pregunta1" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta," -  Tema de capacitación: " , $p->tema ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-2">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta2" id="pregunta2" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-3">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta3" id="pregunta3" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-4">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta4" id="pregunta4" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-5">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta5" id="pregunta5" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-6">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta6" id="pregunta6" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-7">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta7" id="pregunta7" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-8">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta8" id="pregunta8" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-9">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta9" id="pregunta9" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
													</div>
													<div id="step-10">
														<div class="item form-group col-md-11  "  <?= !$created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select style="width: 74%" class="form-control col-md-11"  name="pregunta10" id="pregunta10" onchange ="valores()" >
																	<?php foreach ($preguntas as $p): ?>
																		<option value="<?= $p->preguntaId ?>"><?= $p->pregunta ?></option>
																	<?php endforeach?>
																</select> 
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
		</div>
	</div>
</div>
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script type="text/javascript">
	function valores(){
		var pregunta1 = document.getElementById("pregunta1").value;
		document.getElementById("pregunta_1").value = pregunta1;
		var pregunta2 = document.getElementById("pregunta2").value;
		document.getElementById("pregunta_2").value = pregunta2;
		var pregunta3 = document.getElementById("pregunta3").value;
		document.getElementById("pregunta_3").value = pregunta3;
		var pregunta4 = document.getElementById("pregunta4").value;
		document.getElementById("pregunta_4").value = pregunta4;
		var pregunta5 = document.getElementById("pregunta5").value;
		document.getElementById("pregunta_5").value = pregunta5;
		var pregunta6 = document.getElementById("pregunta6").value;
		document.getElementById("pregunta_6").value = pregunta6;
		var pregunta7 = document.getElementById("pregunta7").value;
		document.getElementById("pregunta_7").value = pregunta7;
		var pregunta8 = document.getElementById("pregunta8").value;
		document.getElementById("pregunta_8").value = pregunta8;
		var pregunta9 = document.getElementById("pregunta9").value;
		document.getElementById("pregunta_9").value = pregunta9;
		var pregunta10 = document.getElementById("pregunta10").value;
		document.getElementById("pregunta_10").value = pregunta10;
	}
	$(document).ready(function(){
		$('#area').select2();
	});
	$(document).ready(function(){
		$('#pregunta1').select2();
	});
	$(document).ready(function(){
		$('#pregunta2').select2();
	});
	$(document).ready(function(){
		$('#pregunta3').select2();
	});
	$(document).ready(function(){
		$('#pregunta4').select2();
	});
	$(document).ready(function(){
		$('#pregunta5').select2();
	});
	$(document).ready(function(){
		$('#pregunta6').select2();
	});
	$(document).ready(function(){
		$('#pregunta7').select2();
	});
	$(document).ready(function(){
		$('#pregunta8').select2();
	});
	$(document).ready(function(){
		$('#pregunta9').select2();
	});
	$(document).ready(function(){
		$('#pregunta10').select2();
	});
</script>



