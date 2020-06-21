<?php
use App\Models\CatalogosEvaluacion\InstrumentoDetalleModel;?>
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
														<div class="item form-group col-md-11 " >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el área de evaluación<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="fa fa-users" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select  class="form-control col-md-9" name="area" id="area_editar">
																	<?php foreach ($area as $a): ?>
																		<option <?= $instrumento->areaEvaluacionId !== $a->areaEvaluacionId ?: "selected"?> value="<?= $a->areaEvaluacionId ?>"><?= $a->areaEvaluacion ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>
														<div class="item form-group col-md-11"  <?= $created ? "hidden" : "" ?> >
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Rango de ponderaciones<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="fa fa-sort-numeric-asc" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<select class="form-control col-md-9" name="ponderacion_editar" id="ponderacion_editar" >
																	<?php foreach ($ponderacion as $p): ?>
																		<option <?= $instrumento->ponderacionId !== $p->ponderacionId ?: "selected"?> value="<?= $p->ponderacionId ?>"><?= $p->ponderacionMinima, " - ",$p->ponderacionMaxima ?></option>
																	<?php endforeach?>
																</select> 
															</div>
														</div>

														<div class="item form-group col-md-11">
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del instrumento<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6">
																<div class="input-group-prepend">
																	<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="	fa fa-file" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<input style="width: 76%"  type="text" value="<?=old('nombre', $instrumento->nombreInstrumento)?>" name="nombre" id="nombre" class="form-control col-md-9" required="" >
															</div>
														</div>
														<div class="item form-group col-md-11 "  hidden="">
															<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del instrumento<span class="required">*</span>
															</label>
															<div class="input-group mb-3 col-md-6" > 
																<div class="input-group-prepend">
																	<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
																	"></i></span>
																</div>
																<input type="text" id="formulario" name="formulario" value="editar">
																<?php $instrumentoDetalle = new InstrumentoDetalleModel();
																$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','1')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
																<?php $num=0; foreach ($buscarinstrumento as $i): ?> 
																<input  type="text" value="<?= old('pregunta_1'), $i->preguntaId ?>" name="pregunta_1" id="pregunta_1" class="form-control " >
																<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id1" id="id1" class="form-control " >
															<?php endforeach?>
															<br>
															<?php $instrumentoDetalle = new InstrumentoDetalleModel();
															$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','2')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
															<?php $num=0; foreach ($buscarinstrumento as $i): ?> 
															<input  type="text" value="<?= old('pregunta_2'), $i->preguntaId ?>" name="pregunta_2" id="pregunta_2" class="form-control " >
															<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id2" id="id2" class="form-control " >
														<?php endforeach?>
														<?php $instrumentoDetalle = new InstrumentoDetalleModel();
														$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','3')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
														<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

														<input  type="text" value="<?= old('pregunta_3'), $i->preguntaId ?>" name="pregunta_3" id="pregunta_3" class="form-control " >
														<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id3" id="id3" class="form-control " >
													<?php endforeach?>
													<?php $instrumentoDetalle = new InstrumentoDetalleModel();
													$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','4')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
													<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

													<input  type="text" value="<?= old('pregunta_4'), $i->preguntaId ?>" name="pregunta_4" id="pregunta_4" class="form-control " >
													<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id4" id="id4" class="form-control " >
												<?php endforeach?>
												<?php $instrumentoDetalle = new InstrumentoDetalleModel();
												$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','5')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
												<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

												<input  type="text" value="<?= old('pregunta_5'), $i->preguntaId ?>" name="pregunta_5" id="pregunta_5" class="form-control " >
												<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id5" id="id5" class="form-control " >
											<?php endforeach?>
											<?php $instrumentoDetalle = new InstrumentoDetalleModel();
											$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','6')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
											<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

											<input  type="text" value="<?= old('pregunta_6'), $i->preguntaId ?>" name="pregunta_6" id="pregunta_6" class="form-control " >
											<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id6" id="id6" class="form-control " >

										<?php endforeach?>
										<?php $instrumentoDetalle = new InstrumentoDetalleModel();
										$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','7')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
										<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

										<input  type="text" value="<?= old('pregunta_7'), $i->preguntaId ?>" name="pregunta_7" id="pregunta_7" class="form-control " >
										<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id7" id="id7" class="form-control " >
									<?php endforeach?>
									<?php $instrumentoDetalle = new InstrumentoDetalleModel();
									$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','8')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
									<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

									<input  type="text" value="<?= old('pregunta_8'), $i->preguntaId ?>" name="pregunta_8" id="pregunta_8" class="form-control " >
									<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id8" id="id8" class="form-control " >
								<?php endforeach?>
								<?php $instrumentoDetalle = new InstrumentoDetalleModel();
								$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','9')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
								<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

								<input  type="text" value="<?= old('pregunta_9'), $i->preguntaId ?>" name="pregunta_9" id="pregunta_9" class="form-control " >
								<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id9" id="id9" class="form-control " >
							<?php endforeach?>
							<?php $instrumentoDetalle = new InstrumentoDetalleModel();
							$buscarinstrumento = $instrumentoDetalle->asObject()->where('orden','10')->where('instrumentoId',$instrumento->instrumentoId)->findAll(); ?>
							<?php $num=0; foreach ($buscarinstrumento as $i): ?> 

							<input  type="text" value="<?= old('pregunta_10'), $i->preguntaId ?>" name="pregunta_10" id="pregunta_10" class="form-control " >
							<input  type="text" value="<?=$i->instrumentoDetalleId ?>" name="id10" id="id10" class="form-control " >
						<?php endforeach?>
					</div>
				</div>
				<div class="item form-group col-md-11 " >
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Objtetivo<span class="required">*</span>
					</label>
					<div class="input-group mb-3 col-md-6">
						<div class="input-group-prepend">
							<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="	fa fa-edit" style="color:#2A3F54;width: 20px;height: 24px;
							"></i></span>
						</div>
						<textarea required="" name="descripcion" id="descripcion"  style="width: 75%;border-top: #fff;border-left: #fff;border-right: #fff"	 ><?=old('descripcion', $instrumento->descripcion)?></textarea>
					</div>
				</div>
				<div class="item form-group col-md-11 ">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado <span class="required">*</span>
					</label>
					<div class="input-group mb-3 col-md-6">
						<div class="input-group-prepend">
							<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
							"></i></span>
						</div>
						<select class="form-control col-md-9"  name="estado" id="estado">
							<option <?= $instrumento->estadoInstrumento  !== "1" ?: "selected"?> value="1">ACTIVO</option>
							<option <?= $instrumento->estadoInstrumento  !== "0" ?: "selected"?> value="0">INACTIVO</option>
						</select>
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
			<?= view("CatalogosEvaluacion/Instrumento/selectEditar"); ?>


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
<script type="text/javascript">
	$(document).ready(function(){
	$('#estado').select2();
});
</script>


