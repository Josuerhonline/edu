<?php use App\Models\UniversidadModel; ?>
<?= view("dashboard/edu/menu"); ?>
</div>
</div>
<div class="top_nav">
	<?= view("dashboard/edu/navbar"); ?>
	<?= view("dashboard/partials/_session"); ?>
</div>
<div class="right_col" role="main" >
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 " >
			<div class="x_panel" style="border: 1px solid #e1e1e1;" >
				<div class="x_title">
					<button type="button" class="btn btn-primary" onclick="window.location.href='/Bitacora/Bitacora'" style="background: #2A3F54"><i class="fa fa-arrow-left"></i> Regresar</button>
					<div class="clearfix"></div>
				</div>
				<div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
					<div class="clearfix"></div>
					<div class="x_title" >
						<?php 
							$conn      = new mysqli('localhost','root','', 'db_edu'); 
							$tblSesion = 'reg_bitacorasesion'.'_'.date("Y");
							$query     = "SELECT * FROM $tblSesion WHERE bitsesionId='$_SESSION[bitsesionId]'";
							$sel       = mysqli_query($conn, $query);
							$data      = mysqli_fetch_assoc($sel);

                          	$usuarioId = $data["usuarioId"];
                          	$queryUser = "SELECT usuario FROM cof_usuarios WHERE usuarioId='$usuarioId';";
                          	$selUser   = mysqli_query($conn, $queryUser);
                          	$datUser   = mysqli_fetch_assoc($selUser);

						?>
						<h2><b>Bitácora detalle</b> / <b>Usuario:</b> <?php echo $datUser["usuario"] ?> / <b>Fecha:</b> <?php echo $data["fechaEntrada"] ?> / <b>IP:</b> <?php echo $data["ip"] ?></h2>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-12">
						<div class="x_content">
							<div class="x_content">
								<div class="row">
									<div class="col-sm-12">
										<div class="card-box table-responsive">
											<div class="clearfix"></div>
											<table id="tablaBitacora" class="display table table-bordered responsive nowrap" style="width:100%">
												<thead style="background:#2A3F54;">
													<tr>
														<th style="color: #fff">Nº</th>
														<th style="color: #fff">Fecha</th>
														<th style="color: #fff">Hora</th>
														<th style="color: #fff">Actividad</th>
														<th style="color: #fff">Detalles</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$tblSesion = 'reg_bitacora'.'_'.date("Y");
													$query     = "SELECT * FROM $tblSesion WHERE bitsesionId ='$_SESSION[bitsesionId]'";
													$sel       = mysqli_query($conn, $query);
													$num       = 0;  

													while ($data = mysqli_fetch_assoc($sel)){
														?>
														<tr>
															<td><?= $num+=1; ?></td>
															<td><?= $data["fecha"]; ?></td>
															<td><?= $data["hora"]; ?></td>
															<td><?= utf8_encode($data["actividad"]); ?></td>
															<td><?= utf8_encode($data["detalles"]); ?></td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
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
</div>
<script src="/js/jquery-3.4.1.slim.min.js"></script>
<script>

  $(document).ready(function() {
    $('#tablaBitacora').DataTable( {
      "paging":   true,
      "ordering": true,
      "info":     true,
      "language": {
        "url": "/vendors/datatables.net/españolTables.json"
      }
    } );
  } );


</script>




