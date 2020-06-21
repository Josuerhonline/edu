<?php use App\Models\UniversidadModel; ?>
<?= view("dashboard/edu/menu"); ?>
</div>
</div>
<div class="top_nav">
	<?= view("dashboard/edu/navbar"); ?>
	<?= view("dashboard/partials/_session"); ?>
</div>
<div class="right_col" role="main" >
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 " >
			<div class="x_panel" style="border: 1px solid #e1e1e1;" >
				<div class="x_title">
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/universidad'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear Universidad</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar Universidad</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" autocomplete="off">
											<!-- campos para crear -->
											<div class="item form-group" <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre de Universidad<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-home" style="color:#2A3F54;
														"></i></span>
													</div>
													<input  style="width: 78%" class="form-control col-md-11" value="<?= old('nombre_universidad') ?>" type="text" id="nombre_universidad" name="nombre_universidad"/>
												</div>
											</div>
											<div class="item form-group" <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Dirección<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-map" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input  style="width: 78%" class="form-control col-md-11" value="<?= old('direccion') ?>" type="text" id="direccion" name="direccion"/>
												</div>
											</div>
											<div class="item form-group" <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Teléfono<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-phone" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input  style="width: 78%" class="form-control col-md-11" value="<?= old('telefono') ?>" type="text" data-inputmask="'mask': '9999-9999'" id="telefono" name="telefono"/>
												</div>
											</div>

											<!-- 	campos para editar -->
											<div class="item form-group" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre de Universidad<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-home" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input  style="width: 78%" value="<?=old('nombre_universidad_editar', $universidad->universidad)?>" class="form-control" type="text" id="nombre_universidad_editar" name="nombre_universidad_editar"/>
												</div>
											</div>
											<div class="item form-group" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Dirección<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-map" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input  style="width: 78%" value="<?=old('direccion_editar', $universidad->direccion)?>"  class="form-control" type="text" id="direccion_editar" name="direccion_editar"/>
												</div>
											</div>
											<div class="item form-group" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Teléfono<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-phone" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input  style="width: 78%" value="<?=old('telefono_editar', $universidad->telefono)?>" class="form-control" type="text" data-inputmask="'mask': '9999-9999'" id="telefono_editar" name="telefono_editar"/>
												</div>
											</div>
											<button class="btn btn-success" type="submit" style="width: 48%;margin-left: 26%"><i class="fa fa-save"></i> <?=$textButton?></button>
										</form>
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




