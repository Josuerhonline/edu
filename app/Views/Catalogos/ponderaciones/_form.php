<?= view("dashboard/edu/menu"); ?>
<link rel="stylesheet" type="text/css" href="/build/css/select2.css">
<link rel="stylesheet" type="text/css" href="/build/css/selects.css">
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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/catalogos/ponderaciones'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Crear ponderaciones</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar ponderaciones</h2>
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

											<div class="item form-group col-md-6" style="text-align: center;" <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Ponderación mínima <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff" id="basic-addon1"><i class="	fa fa-sort-numeric-desc" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select onchange="validar()"  class="form-control col-md-12" name="ponderacionMinima" id="ponderacionMinima" >
														<option value="1" selected="">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
													</select> 
												</div>
												<label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Ponderación máxima <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff" id="basic-addon1"><i class="	fa fa-sort-numeric-asc" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select onchange="validar()"  class="form-control col-md-12" name="ponderacionMaxima" id="ponderacionMaxima" >
														<option value="10" selected="">10</option>
														<option value="9">9</option>
														<option value="8">8</option>
														<option value="7">7</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="6">6</option>
														<option value="5">5</option>
														<option value="4">4</option>
														<option value="3">3</option>
														<option value="2">2</option>
													</select> 
												</div>
											</div>

											<!-- 	campos para editar -->
											<div class="item form-group col-md-6" style="text-align: center;" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-4 col-sm-4 label-align" for="first-name">Ponderación mínima <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff" id="basic-addon1"><i class="	fa fa-sort-numeric-desc" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select onchange="validar_editar()" class="form-control col-md-12" name="ponderacionMinima_editar" id="ponderacionMinima_editar" >
														<option selected="" value="<?=$ponderacion->ponderacionMinima ?>" disabled="true"><?=$ponderacion->ponderacionMinima ?> </option>
														<option value="1" >1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
													</select> 
												</div>
												<label class="col-form-label col-md-4 col-sm-3 label-align" for="first-name">Ponderación máxima <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff" id="basic-addon1"><i class="	fa fa-sort-numeric-asc" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select onchange="validar_editar()"  class="form-control col-md-12" name="ponderacionMaxima_editar" id="ponderacionMaxima_editar" >
														<option selected="" disabled="true" value="<?=$ponderacion->ponderacionMaxima ?>"><?=$ponderacion->ponderacionMaxima ?> </option>
														<option value="10">10</option>
														<option value="9">9</option>
														<option value="8">8</option>
														<option value="7">7</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="6">6</option>
														<option value="5">5</option>
														<option value="4">4</option>
														<option value="3">3</option>
														<option value="2">2</option>
													</select> 
												</div>
											</div>
											<div style="padding-top:3%" class="item form-group col-md-12" <?= $created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-2 col-sm-3 label-align" for="first-name">Estado <span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-8">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-bottom: #fff;border-top: #fff;border-left: #fff"><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select class="form-control col-md-11"  name="estadoPonderacion" id="estadoPonderacion">
														<option <?= $ponderacion->estadoPonderacion !== "1" ?: "selected"?> value="1">ACTIVO</option>
														<option <?= $ponderacion->estadoPonderacion !== "0" ?: "selected"?> value="0">INACTIVO</option>
													</select>
												</div>
											</div>
											<input type="text" name="ponderacionMinimaInput" id="ponderacionMinimaInput" value="<?=$ponderacion->ponderacionMinima ?>" hidden>
											<input type="text" name="ponderacionMaximaInput" id="ponderacionMaximaInput" value="<?=$ponderacion->ponderacionMaxima ?>" hidden>
											<button <?= !$created ? "hidden" : "" ?> onclick="enviar()" class="btn btn-success" type="button" style="width: 48%;margin-left: 26%;margin-top: 2%"><i class="fa fa-save"></i> <?=$textButton?></button>
											<button <?= $created ? "hidden" : "" ?> onclick="enviar_editar()" class="btn btn-success" type="button" style="width: 48%;margin-left: 26%;margin-top: 2%"><i class="fa fa-save"></i> <?=$textButton?></button>
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
<script src="/js/pnotify/dist/pnotify.js"></script>
<script src="/js/pnotify/dist/pnotify.buttons.js"></script>
<script src="/js/pnotify/dist/pnotify.nonblock.js"></script>
<script type="text/javascript">
	function validar(){
		var minima = document.getElementById("ponderacionMinima").value;
		var maxima = document.getElementById("ponderacionMaxima").value;
		if (parseInt(minima) == parseInt(maxima)) {
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Seleccione una ponderación valida',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima").val(0);
			document.getElementById("ponderacionMaxima").val(0);
		}else if(parseInt(minima) > parseInt(maxima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación mínima no pude ser mayor que la máxima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima").val(0);
			document.getElementById("ponderacionMaxima").val(0);
		}else if(parseInt(maxima) < parseInt(minima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación máxima no pude ser menor que la mínima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima").val(0);
			document.getElementById("ponderacionMaxima").val(0);
		}
	}
	function validar_editar(){
		var minima = document.getElementById("ponderacionMinima_editar").value;
		var maxima = document.getElementById("ponderacionMaxima_editar").value;
		if (parseInt(minima) == parseInt(maxima)) {
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Seleccione una ponderación valida',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima_editar").val(0);
			document.getElementById("ponderacionMaxima_editar").val(0);
		}else if(parseInt(minima) > parseInt(maxima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación mínima no pude ser mayor que la máxima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima_editar").val(0);
			document.getElementById("ponderacionMaxima_editar").val(0);
		}else if(parseInt(maxima) < parseInt(minima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación máxima no pude ser menor que la mínima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima_editar").val(0);
			document.getElementById("ponderacionMaxima_editar").val(0);
		}
		document.getElementById("ponderacionMinimaInput").value=minima;
		document.getElementById("ponderacionMaximaInput").value=maxima;
	}
	function enviar(){
		var minima = document.getElementById("ponderacionMinima").value;
		var maxima = document.getElementById("ponderacionMaxima").value;
		if (parseInt(minima) == parseInt(maxima)) {
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Seleccione una ponderación valida',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima").val(0);
			document.getElementById("ponderacionMaxima").val(0);
		}else if(parseInt(minima) > parseInt(maxima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación mínima no pude ser mayor que la máxima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima").val(0);
			document.getElementById("ponderacionMaxima").val(0);
		}else if(parseInt(maxima) < parseInt(minima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación máxima no pude ser menor que la mínima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima").val(0);
			document.getElementById("ponderacionMaxima").val(0);
		}else{
			$("#frmCrearPonderacion").submit();
		}

	}
	function enviar_editar(){
		var minima = document.getElementById("ponderacionMinima_editar").value;
		var maxima = document.getElementById("ponderacionMaxima_editar").value;
		if (parseInt(minima) == parseInt(maxima)) {
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'Seleccione una ponderación valida',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima_editar").val(0);
			document.getElementById("ponderacionMaxima_editar").val(0);
		}else if(parseInt(minima) > parseInt(maxima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación mínima no pude ser mayor que la máxima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima_editar").val(0);
			document.getElementById("ponderacionMaxima_editar").val(0);
		}else if(parseInt(maxima) < parseInt(minima)){
			new PNotify({
				title: '¡INFORMACIÓN!',
				text: 'La ponderación máxima no pude ser menor que la mínima',
				type:'info',
				styling: 'bootstrap3',addclass: 'dark'
			});
			document.getElementById("ponderacionMinima_editar").val(0);
			document.getElementById("ponderacionMaxima_editar").val(0);
		}else{
			$("#frmEditarPonderacion").submit();
		}

	}
	$(document).ready(function(){
		$('#ponderacionMinima').select2();
	});
	$(document).ready(function(){
		$('#ponderacionMaxima').select2();
	});
	$(document).ready(function(){
		$('#ponderacionMinima_editar').select2();
	});
	$(document).ready(function(){
		$('#ponderacionMaxima_editar').select2();
	});
	$(document).ready(function(){
		$('#estadoPonderacion').select2();
	});
</script>




