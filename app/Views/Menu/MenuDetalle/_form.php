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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/Menu/MenuDetalle'" style="background: #2A3F54"><i class="glyphicon glyphicon-chevron-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear menú detalle</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar Menú</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
											<!-- campos para crear -->
											<div class="item form-group col-md-11"  <?= !$created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione un menú<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-columns" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="menuId" id="menuId" >
														<?php foreach ($menu as $m): ?>
															<option  value="<?= $m->menuId ?>"><?= $m->nombreMenu ?></option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del menú detalle<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-columns" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input style="width: 79%" class="form-control" value="<?= old('nombreMenuDetalle') ?>" type="text" id="nombreMenuDetalle" name="nombreMenuDetalle"/> 
												</div>
											</div>
											<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Orden<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-sort-numeric-asc" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input style="width: 79%" class="form-control" value="<?= old('orden') ?>" type="number" id="orden" name="orden" /> 
												</div>
											</div>
											<div class="item form-group col-md-11" <?= !$created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del archivo<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-html5" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input style="width: 79%" class="form-control" value="<?= old('archivo') ?>" type="text" id="archivo" name="archivo"/> 
												</div>
											</div>
											<!-- 	campos para editar -->
											<div class="item form-group col-md-11"  <?= $created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione un menú<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-columns" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="menuId_editar" id="menuId_editar" >
														<?php foreach ($menu as $m): ?>
															<option <?= $menuDetalle->menuId !== $m->menuId ?: "selected"?> value="<?= $m->menuId ?>"><?= $m->nombreMenu ?> </option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del menú detalle<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-columns" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input style="width: 79%" class="form-control" value="<?= old('nombreMenuDetalle_editar',$menuDetalle->nombreMenuDetalle) ?>" type="text" id="nombreMenuDetalle_editar" name="nombreMenuDetalle_editar"/> 
												</div>
											</div>
											<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Orden<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-sort-numeric-asc" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input style="width: 79%" class="form-control" value="<?= old('orden_editar',$menuDetalle->orden) ?>" type="text" id="orden_editar" name="orden_editar"/> 
												</div>
											</div>
											<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del archivo<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-html5" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input style="width: 79%" class="form-control" value="<?= old('archivo_editar',$menuDetalle->archivo) ?>" type="text" id="archivo_editar" name="archivo_editar"/> 
												</div>
											</div>
											<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el estado<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11"  name="estado_editar" id="estado_editar">
														<option selected value="<?=old('estado', $menuDetalle->estado)?>"><?=old('estado', $menuDetalle->estado == '0' ?"INACTIVO": "ACTIVO")?></option>
														<option value="<?= $menuDetalle->estado == '0' ? "1": "0"?>"><?= $menuDetalle->estado == '0' ? "ACTIVO": "INACTIVO"?></option>
													</select>
												</div>
											</div>
											<button class="btn btn-success" type="submit" style="width: 42%;margin-left: 26%"><i class="fa fa-save"></i> <?=$textButton?></button>
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
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#menuId').select2();
	});
	$(document).ready(function(){
		$('#menuId_editar').select2();
	});
	$(document).ready(function(){
		$('#estado_editar').select2();
	});
</script>



