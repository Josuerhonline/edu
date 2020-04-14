
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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/CargaAdemic'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div class="x_title" >
					<h2>Editar persona</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px;">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione la persona<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-asl-interpretingfa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="personaId_editar" id="personaId_editar">
														<?php foreach ($personas as $p): ?>
															<option <?= $cargaAcademica->personaId !== $p->personaId ?: "selected"?> value="<?= $p->personaId ?>"><?= $p->nombres, ' ',$p->apellidos,' - ', $p->carnet ?> </option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el plan materia<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-asl-interpretingfa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="personaId_editar" id="personaId_editar">
														<?php foreach ($planM as $n): ?>
															<option <?= $cargaAcademica->planMateriaId !== $n->planMateriaId ?: "selected"?> value="<?= $n->planId ?>"><?= $n->planId?> </option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el ciclo<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-asl-interpretingfa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="personaId_editar" id="personaId_editar">
														<?php foreach ($ciclo as $c): ?>
															<option <?= $cargaAcademica->aperCicloId !== $c->aperCicloId ?: "selected"?> value="<?= $c->aperCicloId ?>"><?= $c->nombrePersonalizado?> </option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<div class="item form-group col-md-12">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control"  name="estado" id="estado">
														<option <?= $cargaAcademica->estadoCarga !== "1" ?: "selected"?> value="1">ACTIVO</option>
														<option <?= $cargaAcademica->estadoCarga !== "0" ?: "selected"?> value="0">INACTIVO</option>
													</select>
												</div>
											</div>
											<div class="clearfix"></div><br>
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
		$('#personaId').select2();
	});
	$(document).ready(function(){
		$('#personaId_editar').select2();
	});
	$(function () {
		$('#datetimepicker4').datetimepicker({
			format: 'L'
		});
	});
</script>




