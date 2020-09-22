<?= view("dashboard/edu/menu");  $session = session(); ?>
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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/personas'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div class="x_title" >
					<h2>Crear persona</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px;padding-left: 8%">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">

									<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" >
										<div class="item form-group col-md-6">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Dui <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-credit-card" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 77%" class="form-control col-md-9" type="text" data-inputmask="'mask': '99999999-9'" id="DUI" name="DUI" value="<?=old('DUI')?>" />
											</div>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Carné <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-credit-card" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 77%" class="form-control col-md-9" type="text" id="carnet" name="carnet" value="<?=old('carnet')?>" />
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="item form-group col-md-6">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombres <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input required="" style="width: 77%" class="form-control col-md-9" type="text" id="nombres" name="nombres" value="<?=old('nombres')?>" >
											</div>

											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Apellidos <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input  required="" style="width: 77%" class="form-control col-md-9" type="text" id="apellidos" name="apellidos" value="<?=old('apellidos')?>"/>
											</div>

										</div>
										<div class="clearfix"></div>
										<div class="item form-group col-md-6">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tipo de persona <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-users" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select style="width: 78%" class="form-control"  name="tipoPersona" id="tipoPersona">
													<option value="E">Estudiante</option>
													<option value="D">Docente</option>
													<option value="A">Administrador</option>
												</select>
											</div>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado civil <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select  style="width: 78%" class="form-control"  name="estadoCivil" id="estadoCivil">
													<option  value ="S">Soltero/a</option>
													<option  value ="C">Casado/a</option>
													<option  value ="D">Divorciado/a</option>
													<option  value ="V">Viudo/a</option>
												</select>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="item form-group col-md-6">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Sexo <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="fa fa-male" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select style="width: 77%" class="form-control"  name="sexo" id="sexo">
													<option value="M">Masculino</option>
													<option value="F">Femenino</option>
												</select>
											</div>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Teléfono <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-phone" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input  required="" style="width: 77%" class="form-control col-md-9" type="text" id="telefono" data-inputmask="'mask': '9999-9999'" name="telefono" value="<?=old('telefono')?>"/>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="item form-group col-md-6">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Email <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-google-plus" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 77%" class="form-control col-md-9" type="email" required=""  id="email" name="email" value="<?=old('email')?>"/>
											</div>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha de nacimiento <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input required="" style="width: 77%" class="form-control col-md-9" type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?=old('fechaNacimiento')?>"/>
											</div>
										</div>
										<div class="clearfix"></div>
										<div hidden="">

										<div class="item form-group col-md-6">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha y hora de ingreso <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 77%" class="form-control col-md-9" type="text" readonly="" id="fechaIngreso" name="fechaIngreso" value="<?=old('fechaIngreso',date("Y")."-". date("m")."-". date("d")." ".date("G").":".date("i").":".date("s"))?>"/>
											</div>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Año de ingreso <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 77%" class="form-control col-md-9" type="text" readonly="" id="anioIngreso" name="anioIngreso" value="<?=old('anioIngreso',date("Y"))?>"/>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="item form-group col-md-6">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Fecha y hora de traslado <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 77%" class="form-control col-md-9" type="text" readonly="" id="fechaTraslado" name="fechaTraslado" value="<?=old('fechaTraslado',date("Y")."-". date("m")."-". date("d")." ".date("G").":".date("i").":".date("s"))?>"/>
											</div>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Usuario que trasladó <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 77%" class="form-control col-md-9" type="text" readonly="" id="usuarioTraslado" name="usuarioTraslado" value="<?=old('usuarioTraslado', $session->usuario)?>"/>
											</div>
										</div>
										<div class="clearfix"></div>
											
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
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#personaId').select2();
		$('#tipoPersona').select2();
		$('#estadoCivil').select2();
		$('#sexo').select2();
		$('#estado').select2();
		$('#personaId_editar').select2();
	});

	$(function () {
		$('#datetimepicker4').datetimepicker({
			format: 'L'
		});
	});
</script>




