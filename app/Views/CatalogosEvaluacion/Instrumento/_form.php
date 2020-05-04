<link rel="stylesheet" href="/build/css/selects.css">

<link rel="stylesheet" href="/build/css/select2.css">
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
																	<span class="input-group-text" style="background: #fff;border-color: #fff"id="basic-addon1"><i class="fa fa-users" style="color:#2A3F54;width: 20px;height: 24px;
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
																	<span class="input-group-text" style="background: #fff;border-color: #fff" id="basic-addon1"><i class="	fa fa-file" style="color:#2A3F54;height: 24px;
																	"></i></span>
																</div>
																<input  type="text" value="<?= old('nombre') ?>" name="nombre" id="nombre" class="form-control col-md-10" required="" >
															</div>
														</div>
														<div class="item form-group col-md-11 "  hidden="">
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del instrumento<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6" > 
																<div class="input-group-prepend">
																	<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<input type="text" id="formulario" name="formulario" value="crear">
																<input  type="text" value="<?= old('pregunta_1') ?>" name="pregunta_1" id="pregunta_1" class="form-control " >
																<input  type="text" value="<?= old('pregunta_2') ?>" name="pregunta_2" id="pregunta_2" class="form-control " >
																<input  type="text" value="<?= old('pregunta_3') ?>" name="pregunta_3" id="pregunta_3" class="form-control " >
																<input  type="text" value="<?= old('pregunta_4') ?>" name="pregunta_4" id="pregunta_4" class="form-control " >
																<input  type="text" value="<?= old('pregunta_5') ?>" name="pregunta_5" id="pregunta_5" class="form-control " >
																<input  type="text" value="<?= old('pregunta_6') ?>" name="pregunta_6" id="pregunta_6" class="form-control " >
																<input  type="text" value="<?= old('pregunta_7') ?>" name="pregunta_7" id="pregunta_7" class="form-control " >
																<input  type="text" value="<?= old('pregunta_8') ?>" name="pregunta_8" id="pregunta_8" class="form-control " >
																<input  type="text" value="<?= old('pregunta_9') ?>" name="pregunta_9" id="pregunta_9" class="form-control " >
																<input  type="text" value="<?= old('pregunta_10') ?>" name="pregunta_10" id="pregunta_10" class="form-control " >
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
																<textarea required="" name="descripcion" id="descripcion"  style="width: 73%"	 ><?= old('descripcion') ?></textarea>
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
												<p>Asegurese de seleccionar todas las preguntas para completar el instrumento de evaluación.</p>
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
																<span class="step_no">10</span>
															</a>
														</li>
													</ul>
													<?= view("CatalogosEvaluacion/Instrumento/select"); ?>


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.1/select2.min.js"></script>
<script src="/js/validationQuestion.js"></script>



