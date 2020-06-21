<?php use App\Models\CatalogosEvaluacion\InscripcionDetalleModel; ?>
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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/CatalogosEvaluacion/Inscripcion'" style="background: #2A3F54"><i class="fa fa-arrow-left" ></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar Inscripción</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<!-- 	campos para editar -->
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione una persona<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="	fa fa-user" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="persona" id="persona">
													<?php foreach ($persona as $p): ?>
														<option <?= $inscripcion->personaId !== $p->personaId ?: "selected"?> value="<?= $p->personaId ?>"><?= $p->nombres, " ", $p->apellidos ?> </option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione un plan materia<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="	fa fa-graduation-cap" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<?php   $inscripcionDetalle = new InscripcionDetalleModel();
												$planMateriaDetalle= $inscripcionDetalle->asObject()->where('inscripcionId',$inscripcion->inscripcionId)->findAll()  ?>
												<?php foreach ($planMateriaDetalle as $pl): ?>
													<input hidden="" type="text" name="inscripcionDetalleId" id="inscripcionDetalleId" value="<?= $pl->inscripcionDetalleId ?>">
													<select class="form-control col-md-11" name="planMateria" id="planMateria">
														<?php foreach ($planMateria as $p): ?>
															<option <?= $pl->planMateriaId !== $p->planMateriaId ?: "selected"?> value="<?= $p->planMateriaId ?>"><?= $p->nombre, " ", $p->nombrePlan ?> </option>
														<?php endforeach?>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Seleccione un ciclo<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="	fa fa-graduation-cap" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11" name="ciclo" id="ciclo">
													<?php foreach ($ciclo as $c): ?>
														<option <?= $inscripcion->aperCicloId !== $c->aperCicloId ?: "selected"?> value="<?= $c->aperCicloId ?>"><?= $c->nombrePersonalizado ?> </option>
													<?php endforeach?>
												</select> 
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nombre del area de evaluación<span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="	fa fa-calendar" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<input style="width: 79%" class="form-control" value="<?=old('fechaInscripcion', $inscripcion->fechaInscripcion)?>" type="date" id="fechaInscripcion" name="fechaInscripcion">
											</div>
										</div>
										<div class="item form-group col-md-11" <?= $created ? "hidden" : "" ?>>
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Estado <span class="required">*</span>
											</label>
											<div class="input-group mb-3 col-md-6">
												<div class="input-group-prepend">
													<span span class='input-group-text' id='basic-addon1' style='background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff'><i class="fa fa-toggle-on" style="color:#2A3F54;width: 20px;height: 24px;
													"></i></span>
												</div>
												<select class="form-control col-md-11"  name="estado" id="estado">
													<option <?= $inscripcion->estado !== "1" ?: "selected"?> value="1">ACTIVO</option>
													<option <?= $inscripcion->estado !== "0" ?: "selected"?> value="0">INACTIVO</option>
												</select>
											</div>
										</div>
										<button class="btn btn-success" type="submit" style="width: 44%;margin-left: 24%"><i class="fa fa-save"></i> <?=$textButton?></button>
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
		$('#persona').select2();
	});
	$(document).ready(function(){
		$('#planMateria').select2();
	});
	$(document).ready(function(){
		$('#ciclo').select2();
	});
	$(document).ready(function(){
		$('#estado').select2();
	});
</script>



