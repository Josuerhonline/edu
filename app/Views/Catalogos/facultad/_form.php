<?php use App\Models\UsuariosModel; ?>
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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/facultad'" style="background: #2A3F54"><i class="glyphicon glyphicon-chevron-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear facultad</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar facultad</h2>
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
											<div class="item form-group "  <?= !$created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione Universidad<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="universidadId" id="universidadId" >
														<?php foreach ($universidad as $u): ?>
															<option value="<?= $u->universidadId ?>"><?= $u->universidad ?></option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<!-- 	campos para editar -->
											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione Universidad<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-asl-interpretingfa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="universidadId_editar" id="universidadId_editar">
														<?php foreach ($universidad as $u): ?>
															<option <?= $facultad->universidadId !== $u->universidadId ?: "selected"?> value="<?= $u->universidadId ?>"><?= $u->universidad ?> </option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<div class="item form-group col-md-12" <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Facultad <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" id="facultad" name="facultad">
												</div>
											</div>
											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Facultad <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" id="facultad_editar" name="facultad_editar" value="<?=old('facultad', $facultad->facultad)?>"/>
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
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#universidadId').select2();
	});
	$(document).ready(function(){
		$('#universidadId_editar').select2();
	});
</script>




