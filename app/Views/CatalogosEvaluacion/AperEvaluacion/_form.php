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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/CatalogosEvaluacion/AperEvaluacion'" style="background: #2A3F54"><i class="fa fa-arrow-left" ></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear apertura de evaluación</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar apertura de evaluación</h2>
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
										<div class="item form-group "  <?= !$created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el ciclo<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="ciclo" id="ciclo" >
													<?php foreach ($ciclo as $a): ?>
														<option value="<?= $a->aperCicloId ?>"><?= $a->nombrePersonalizado,' - ', $a->anio ?></option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group "  <?= !$created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el intrumento de evaluación<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="	fa fa-file" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="instrumento" id="instrumento" >
													<?php foreach ($instrumento as $i): ?>
														<option value="<?= $i->instrumentoId ?>"><?= $i->nombreInstrumento ?></option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group "  <?= !$created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de inicio<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input type="date" value="<?= old('fechaInicio') ?>" name="fechaInicio" id="fechaInicio" class="form-control col-md-11">
											</div>
										</div>
										<div class="item form-group "  <?= !$created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de finalización<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input type="date" value="<?= old('fechaFin') ?>" name="fechaFin" id="fechaFin" class="form-control col-md-11">
											</div>
										</div>
										<!-- 	campos para editar -->
										<div class="item form-group "  <?= $created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el ciclo<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="ciclo_editar" id="ciclo_editar">
													<?php foreach ($ciclo as $a): ?>
														<option <?= $aperEva->aperCicloId !== $a->aperCicloId ?: "selected"?> value="<?= $a->aperCicloId ?>"><?= $a->nombrePersonalizado,' - ', $a->anio ?></option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group "  <?= $created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el intrumento de evaluación<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="	fa fa-file" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="instrumento_editar" id="instrumento_editar">
													<?php foreach ($instrumento as $a): ?>
														<option <?= $aperEva->instrumentoId !== $a->instrumentoId ?: "selected"?> value="<?= $a->instrumentoId ?>"><?= $a->nombreInstrumento ?></option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group "  <?= $created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de inicio<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input type="date" value="<?=old('fechaInicio_editar', $aperEva->fechaInicio)?>" name="fechaInicio_editar" id="fechaInicio_editar" class="form-control col-md-11">
											</div>
										</div>
										<div class="item form-group "  <?= $created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de finalización<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input type="date" value="<?=old('fechaFin_editar', $aperEva->fechaFin)?>" name="fechaFin_editar" id="fechaFin_editar" class="form-control col-md-11">
											</div>
										</div>
										<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1"><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control"  name="estado" id="estado">
													<option <?= $aperEva->estadoAperEva !== "1" ?: "selected"?> value="1">ACTIVO</option>
													<option <?= $aperEva->estadoAperEva !== "0" ?: "selected"?> value="0">INACTIVO</option>
												</select>
											</div>
										</div>

										<button class="btn btn-success" type="submit" style="width: 48%;margin-left: 26%"><i class="fa fa-save"></i> <?=$textButton?></button>
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
	$(document).ready(function(){
		$('#ciclo').select2();
	});
	$(document).ready(function(){
		$('#instrumento').select2();
	});
		$(document).ready(function(){
		$('#ciclo_editar').select2();
	});
	$(document).ready(function(){
		$('#instrumento_editar').select2();
	});
</script>



