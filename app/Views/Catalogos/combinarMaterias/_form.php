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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/Catalogos/CombinarMaterias'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Seleccione un docente</h2>
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
											<div class="item form-group col-md-11"  <?= !$created ? "hidden" : "" ?>>
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione el docente<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6" >
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff"><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<select onchange="buscarMaterias()" class="form-control col-md-11" name="personaIds" id="personaIds" >
														<option value="">Por favor seleccione una persona</option>
														<?php foreach ($cargaAcademicas as $c): ?>
															<option value="<?= $c->personaId ?>"><?= $c->nombres ,' ', $c->apellidos ?></option>
														<?php endforeach?>
													</select> 
												</div>
											</div>	
										</div>
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
		$('#personaIds').select2();
		$('#rolId').select2();
		$('#rolId_editar').select2();
		$('#personaId_editar').select2();
		$('#estado_editar').select2();

	});
	function buscarMaterias(){
let personaId = document.getElementById('personaIds').value;
		$.ajax({
			type:"POST",
			url:"/Catalogos/CombinarMaterias/generarSesion",
			data:"id=" + personaId,
			success:function(p){
				window.location="/Catalogos/CombinarMaterias/agregarUnion";
				$('#materiasR').html(p);
			}
		});
	}

</script>




