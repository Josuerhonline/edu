<?= view("dashboard/edu/menu");
use App\Models\Menu\MenuDetalleModel;
use App\Models\Menu\LimitarMenuModel;
use App\Models\Menu\RolesMenus;

?>
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
					<button type="button" class="btn btn-primary" onclick="window.location.href='/Menu/LimitarMenu'" style="background: #2A3F54"><i class="glyphicon glyphicon-chevron-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div <?=!$created ? "hidden" : "" ?> class="x_title" >
					<h2>Limitar menú</h2>
					<div class="clearfix"></div>
				</div>
				<div <?= $created ? "hidden" : "" ?> class="x_title" >
					<h2>Editar Menú rol</h2>
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
												<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Menú<span class="required">*</span>
												</label>
												<div class="input-group mb-3 col-md-6">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1" style="background: #fff;border-top: #fff;border-left: #fff;border-bottom: #fff;border-right: #fff"><i class="	fa fa-columns" style="color:#2A3F54;width: 20px;height: 24px;
														"></i></span>
													</div>
													<?php foreach ($menuDeta as $m): 
														$menuDetalle = new MenuDetalleModel();

														$buscarMenuDetalle = $menuDetalle->asObject()->select()->where('menuId',$m->menuId)->findAll();
														?>
														<input hidden="" type="text" name="rolIdS" id="rolIdS" value="<?= $m->rolId?>"/>
														<input hidden="" type="text" name="rolMenuIdS" id="rolMenuIdS" value="<?= $m->rolMenuId?>"/>
														<select class="form-control col-md-11" name="menuDetalleId" id="menuDetalleId" >
															<?php foreach ($buscarMenuDetalle as $b):
																$limitar = new LimitarMenuModel();
																$buscarDetalleMenu = $limitar->asObject()->select('menuDetalleId')->where('menuDetalleId',$b->menuDetalleId)->where('rolMenuId',$m->rolMenuId)->first();?> ?>
																<?php if (!$buscarDetalleMenu): ?>
																	<option  value="<?= $b->menuDetalleId ?>"><?= $b->nombreMenuDetalle ?></option>
																<?php endif ?>
															<?php endforeach?>
														<?php endforeach?>
													</select> 
												</div>
											</div>
											<!-- 	campos para editar -->
											
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
		$('#menuDetalleId').select2();
		$('#rolId').select2();
		$('#menuId_editar').select2();
		$('#rolId_editar').select2();
		$('#estado_editar').select2();
	});
</script>




