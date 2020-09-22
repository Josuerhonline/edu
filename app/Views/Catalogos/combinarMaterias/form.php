<?php use App\Models\Catalogos\CargaAcademicaModel;
$carga       = new CargaAcademicaModel();
$planesMateria = $carga->asObject()
->select('cof_carga_academica.*,view_planmateria.*')
->join('view_planmateria','view_planmateria.planMateriaId = cof_carga_academica.planMateriaId')
->where('personaId',$_SESSION["personaIdBuscar"])
->findAll();


?>
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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/Catalogos/CombinarMaterias/new'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Combinar materias</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar usuario</h2>
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
											<input type="text" id="personaId" name="personaId" value="<?=$_SESSION["personaIdBuscar"] ?>">
											<div class="item form-group col-md-11" >
												<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Materias a combinar<span class='required'>*</span>
												</label>
												<div class='input-group mb-3 col-md-6'>
													<div class='input-group-prepend'>
														<span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
														'></i></span>
													</div>
													<select onchange ="getValues()" id="planMateriaId" name="planMateriaId" class="col-md-11 selectpicker" multiple data-live-search="true">
														<?php foreach ($planesMateria as $p): ?>
															<option value="<?= $p->planMateriaId ?>"><?= $p->nombre ,' ', $p->nombrePlan ?></option>
														<?php endforeach?>
													</select>
												</div>
											</div>
											<div class="item form-group col-md-11" >
												<label class='col-form-label col-md-3 col-sm-3 label-align' for='first-name'>Nombre de la combinación<span class='required'>*</span>
												</label>
												<div class='input-group mb-3 col-md-6'>
													<div class='input-group-prepend'>
														<span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class='fa fa-graduation-cap' style='color:#2A3F54;width: 20px;height: 24px;
														'></i></span>
													</div>
													<input class="form-control col-md-11" type="text" id="nombreCombinacion" name="nombreCombinacion">
												</div>
											</div>
										
											<button class="btn btn-success" type="submit" style="width: 42%;margin-left: 26%"><i class="fa fa-save"></i> <?=$textButton?></button>
												<div id="listaElementos">
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
		$('#planMateriaId').selectpicker();

	});

	function getValues() {
    document.getElementById('listaElementos').innerHTML = '';
    var selectObject =document.getElementById("secretariaTxt");
    for (var i = 0; i < selectObject.options.length; i++) {
        if(selectObject.options[i].selected ==true){              
           document.getElementById('listaElementos').innerHTML += selectObject.options[i].value + '<br>';
          }
      }

}

</script>




