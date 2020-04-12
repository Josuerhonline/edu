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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/planes'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear plan</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar plan</h2>
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
											<div class="item form-group col-md-12"  <?= !$created ? "hidden" : "" ?> >
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione la carrera<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="fa fa-balance-scale" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="carreraId" id="carreraId" >
														<?php foreach ($carrera as $c): ?>
															<option value="<?= $c->carreraId ?>"><?= $c->nombre ?></option>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<div class="item form-group col-md-12" <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del plan <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="fa fa-edit" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" id="plan" name="plan">
												</div>
											</div>
											<div class="item form-group col-md-12" <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Plan Acuerdo <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-bank" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control"  type="text" id="planAcuerdo" name="planAcuerdo">
												</div>
											</div>
											<!-- 	campos para editar -->
											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione la carrera<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="fa fa-balance-scale" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11" name="carreraId_editar" id="carreraId_editar">
														<?php foreach ($carrera as $c): ?>
															<option <?= $plan->carreraId !== $c->carreraId ?: "selected"?> value="<?= $c->carreraId ?>"><?= $c->nombre ?> </option>
														<?php endforeach?>
													</select> 
												</div>
											</div>

											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del plan <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-edit" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" id="plan_editar" name="plan_editar" value="<?=old('nombrePlan', $plan->nombrePlan)?>"/>
												</div>
											</div>

											<div class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Plan acuerdo <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-bank" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" id="planAcuerdo_editar" name="planAcuerdo_editar" value="<?=old('plaAcuerdo', $plan->plaAcuerdo)?>"/>
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
														<option  value="<?=old('estado', $plan->estado)?>"><?=old('estado', $plan->estado)?></option>
														<option value="ACTIVO">ACTIVO</option>
														<option value="INACTIVO">INACTIVO</option>
													</select>
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





