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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/ciclo'" style="background: #2A3F54"><i class="fa fa-arrow-left" ></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear ciclo</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar ciclo</h2>
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
										<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ciclo <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?= old('ciclo') ?>" type="text" id="ciclo" name="ciclo" >
											</div>
										</div>
										<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Año <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-font" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?= old('anio') ?>" data-inputmask="'mask': '9999'" type="text" id="anio" name="anio">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre personalizado <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-edit" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?= old('nombrePersonalizado') ?>" type="text" id="nombrePersonalizado" name="nombrePersonalizado">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de inicio <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?= old('fechaInicio') ?>" type="date" id="fechaInicio" name="fechaInicio">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de finalización <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?= old('fechaFin') ?>" type="date" id="fechaFin" name="fechaFin">
											</div>
										</div>
										<!-- 	campos para editar -->
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Ciclo <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-list-ol" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?=old('ciclo_editar', $ciclo->ciclo)?>" type="text" id="ciclo_editar" name="ciclo_editar">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Año <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-font" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" data-inputmask="'mask': '9999'" value="<?=old('anio_editar', $ciclo->anio)?>" type="text" id="anio_editar" name="anio_editar">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre personalizado <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-edit" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?=old('nombrePersonalizado_editar', $ciclo->nombrePersonalizado)?>" type="text" id="nombrePersonalizado_editar" name="nombrePersonalizado_editar">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de inicio <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?=old('fechaInicio_editar', $ciclo->fechaInicio)?>" type="date" id="fechaInicio_editar" name="fechaInicio_editar">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de finalización <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input class="form-control" style="width: 79%" value="<?=old('fechaFin_editar', $ciclo->fechaFin)?>" type="date" id="fechaFin_editar" name="fechaFin_editar">
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
													<option <?= $ciclo->estado !== "1" ?: "selected"?> value="1">ACTIVO</option>
													<option <?= $ciclo->estado !== "0" ?: "selected"?> value="0">INACTIVO</option>
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
		$('#universidadId').select2();
	});
	$(document).ready(function(){
		$('#universidadId_editar').select2();
	});
		$(document).ready(function(){
		$('#estado').select2();
	});
</script>




