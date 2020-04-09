<?php use App\Models\UsuariosModel; ?>
<?= view("dashboard/edu/menu"); ?>
</div>
</div>
<div class="top_nav">
	<?= view("dashboard/edu/navbar"); ?>
	<?= view("dashboard/partials/_session"); ?>
</div>
<h1>La concha de la lora</h1>
culo
<div class="right_col" role="main" >
	<div class="clearfix"></div>
	<div class="row" >
		<div class="col-md-12 col-sm-12 " >
			<div class="x_panel" style="border: 1px solid #e1e1e1;" >
				<div class="x_title">
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/personas'" style="background: #2A3F54"><i class="glyphicon glyphicon-chevron-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div class="x_title" >
					<h2>Editar persona</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px;padding-left: 8%">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Dui <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-credit-card" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" data-inputmask="'mask': '99999999-9'" required="" id="DUI" name="DUI" value="<?=old('DUI', $personas->DUI)?>" />
												</div>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Carnet <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-credit-card" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text"  required="" id="carnet" name="carnet" value="<?=old('carnet', $personas->carnet)?>" />
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" id="nombres" required="" name="nombres" value="<?=old('nombres', $personas->nombres)?>" >
												</div>

												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Apellidos <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" required="" type="text" id="apellidos" name="apellidos" value="<?=old('apellidos', $personas->apellidos)?>"/>
												</div>

											</div>
											<div class="clearfix"></div>
											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tipo de persona <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="fa fa-users" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control"  name="tipoPersona" id="tipoPersona">
														<option value="<?=old('tipoPersona', $personas->tipoPersona)?>"><?=old('tipoPersona', $personas->tipoPersona)?></option>
														<option value="Estudiante">Estudiante</option>
														<option value="Docente">Docente</option>
														<option value="Administrador">Administrador</option>
														<option value="Empleado">Empleado</option>
													</select>
												</div>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado civil <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control"  name="estadoCivil" id="estadoCivil">
														<option value="<?=old('estadoCivil', $personas->estadoCivil)?>"><?=old('estadoCivil', $personas->estadoCivil)?></option>
														<option value="Soltero(a)">Soltero(a)</option>
														<option value="Casado(o)">Casado(o)</option>
														<option value="Estudiante">Estudiante</option>
														<option value="Empleado">Empleado</option>
													</select>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Sexo <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="fa fa-male" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control"  name="sexo" id="sexo">
														<option value="<?=old('sexo', $personas->sexo)?>"><?=old('sexo', $personas->sexo)?></option>
														<option value="M">M</option>
														<option value="F">F</option>
													</select>
												</div>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Teléfono <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-phone" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" id="telefono" data-inputmask="'mask': '9999-9999'" name="telefono" required="" value="<?=old('telefono', $personas->telefono)?>"/>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-google-plus" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="email" required=""  id="email" name="email" value="<?=old('email', $personas->email)?>"/>
												</div>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de nacimiento <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?=old('fechaNacimiento', $personas->fechaNacimiento)?>"/>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de ingreso <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" readonly="" id="fechaIngreso" name="fechaIngreso" value="<?=old('fechaIngreso', $personas->fechaIngreso)?>"/>
												</div>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Año de ingreso <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" readonly="" id="anioIngreso" name="anioIngreso" value="<?=old('anioIngreso', $personas->anioIngreso)?>"/>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de traslado <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" readonly="" id="fechaTraslado" name="fechaTraslado" value="<?=old('fechaTraslado', $personas->fechaTraslado)?>"/>
												</div>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Usuario que traslado <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<input class="form-control" type="text" readonly="" id="usuarioTraslado" name="usuarioTraslado" value="<?=old('usuarioTraslado', $personas->usuarioTraslado)?>"/>
												</div>
											</div>
											<div class="clearfix"></div>

											<div class="item form-group col-md-6">
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control"  name="estado" id="estado">
														<option value="<?=old('estado', $personas->estado)?>"><?=old('estado', $personas->estado)?></option>
														<option value="RETIRADO">RETIRADO</option>
														<option value="ACTIVO">ACTIVO</option>
														<option value="EN PROCESO">EN PROCESO</option>
													</select>
												</div>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Dirección <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1"><i class="	fa fa-home" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<textarea id="direccion" name="direccion" style="width: 77%; height:38px; " placeholder="Dirección"><?=old('direccion', $personas->direccion)?></textarea>
												</div>
											</div>
											<div class="clearfix"></div><br>
											<button class="btn btn-success" type="submit" style="width: 48%;margin-left: 18%"><i class="fa fa-save"></i> <?=$textButton?></button>
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




