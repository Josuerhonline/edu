<?php use App\Models\UsuariosModel; 
use App\Models\CatalogosEvaluacion\AreasEvaluacioModel;
$areas = new AreasEvaluacioModel();
$areasEvaluacion = $areas->asObject()->findAll();?>
<?= view("dashboard/edu/menu"); ?>
</div>
</div>
<div class="top_nav">
	<?= view("dashboard/edu/navbar"); ?>
	<?= view("dashboard/partials/_session"); ?>
</div>
<div class="right_col" role="main" >
	<link rel="stylesheet" href="/build/css/selects.css">

	<link rel="stylesheet" href="/build/css/select2.css">
	<div class="clearfix"></div>
	<div class="row" >
		<div class="col-md-12 col-sm-12 " >
			<div class="x_panel" style="border: 1px solid #e1e1e1;" >
				<div  class="x_title" >
					<h2>Seleccione un Período | Gráficos Facultades</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-md-6" style="padding-bottom: 40px">
										<p>Por favor, seleccione el período al que desea ingresar.</p>
										<select class="form-control" name="cicloId" id="cicloId" onchange="procesarValor()">
											<option value="">Seleccione un periodo</option>
											<?php foreach ($selectCiclo as $c): ?>
												<option value="<?= $c->aperCicloId ?>"><?= 'Ciclo: ',$c->ciclo ,' - Año: ', $c->anio ?></option>
											<?php endforeach?>
										</select> 
									</div>
									<div id="areas" class="col-md-6"  style="display:none;">
										<p>Área de evaluación.</p>
										<select style="width: 100%;" class="form-control" name="areaEvaluacionId" id="areaEvaluacionId" onchange="procesarValorFacultad()">
											<option value="">Seleccione un área de evaluación</option>
											<?php foreach ($areasEvaluacion as $a): ?>
												<option value="<?= $a->areaEvaluacionId ?>"><?=$a->areaEvaluacion?></option>
											<?php endforeach?>
										</select> 
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
	function procesarValor(){
		let valorCiclo = document.getElementById('cicloId').value;
		$.ajax({
			type:"POST",
			url:"/Graficos/SeleccionGraficoFacultad/generarSesionCiclo",
			data:"id=" + valorCiclo,
			success:function(p){
				document.getElementById('areas').style.display = 'block';
			}
		});
	}
	function procesarCiclo(){
		let valorCiclo = document.getElementById('cicloId').value;
		if (valorCiclo!="") {
			window.location="/Graficos/Facultades";
		}else{}
	}

	//Crear Sesión para la area de evaluación
	function procesarValorFacultad(){
		let valorAreaEvaluacion = document.getElementById('areaEvaluacionId').value;
		$.ajax({
			type:"POST",
			url:"/Graficos/SeleccionGraficoFacultad/generarSesionAreaEvaluacion",
			data:"id=" + valorAreaEvaluacion,
			success:function(p){
				procesarAreaEvaluacion();
			}
		});
	}
	function procesarAreaEvaluacion(){
		let valorAreaEvaluacion = document.getElementById('areaEvaluacionId').value;
		if (valorAreaEvaluacion!="") {
			window.location="/Graficos/Facultades";

		}else{}
	}

	$(document).ready(function(){
		$('#cicloId').select2();
		$('#areaEvaluacionId').select2();
	});

</script>

