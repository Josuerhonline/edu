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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/CatalogosEvaluacion/Preguntas'" style="background: #2A3F54"><i class="fa fa-arrow-left" ></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear pregunta</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar pregunta</h2>
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
										<div class="item form-group col-md-11"  <?= !$created ? "hidden" : "" ?> >
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el tema de capacitación<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-graduation-cap" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="tema" id="tema" >
													<?php foreach ($temas as $t): ?>
														<option value="<?= $t->temaCapacitacionId ?>"><?= $t->tema ?></option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pregunta<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-question" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<textarea style="background: #fff;border-top: #fff;border-left: #fff;border-right: #fff;width: 79%" class="col-md-11"  type="text" id="pregunta" name="pregunta"><?=old('pregunta', $preguntas->pregunta)?></textarea>
											</div>
										</div>		
										<!-- 	campos para editar -->
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el tema de capacitación<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-graduation-cap" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="tema_editar" id="tema_editar">
													<?php foreach ($temas as $t): ?>
														<option <?= $preguntas->temaCapacitacionId !== $t->temaCapacitacionId ?: "selected"?> value="<?= $t->temaCapacitacionId ?>"><?= $t->tema ?> </option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Pregunta<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-question" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<textarea  style="background: #fff;border-top: #fff;border-left: #fff;border-right: #fff;width: 79%" class="col-md-11" type="text" id="pregunta_editar" name="pregunta_editar"><?=old('pregunta_editar', $preguntas->pregunta)?></textarea>
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11"  name="estado" id="estado">
													<option <?= $preguntas->estadoPregunta !== "1" ?: "selected"?> value="1">ACTIVO</option>
													<option <?= $preguntas->estadoPregunta !== "0" ?: "selected"?> value="0">INACTIVO</option>
												</select>
											</div>
										</div>
										<button class="btn btn-success" type="submit" style="width: 42%;margin-left: 26%"><i class="fa fa-save"></i> <?=$textButton?></button>
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
		$('#tema').select2();
	});
	$(document).ready(function(){
		$('#tema_editar').select2();
	});
		$(document).ready(function(){
		$('#estado').select2();
	});
</script>






