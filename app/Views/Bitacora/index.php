<?= view("dashboard/edu/menu"); ?>
</div>
</div>

<div class="top_nav">
  <?= view("dashboard/edu/navbar"); ?>
  <?= view("dashboard/partials/_session"); ?>
  <?= view("dashboard/partials/_sessionError"); ?>
</div>
<div class="right_col" role="main">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel" style="border: 60%">
        <div class="x_title">
          <h2>Administración de Bitácora</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content" style="background: #fff;border: 1px solid #E1E1E1;padding-top: 10px;border-radius: 10px">
          <div class="clearfix"></div>
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
                          <th style="color: #fff">Nombre Persona</th>
                          <th style="color: #fff">Usuario</th>
                          <th style="color: #fff">F. Entrada</th>
                          <th style="color: #fff">H. Entrada</th>
                          <th style="color: #fff">F. Salida</th>
                          <th style="color: #fff">H. Salida</th>
                          <th style="color: #fff">Nombre Host</th>
                          <th style="color: #fff">Ip Host</th>
                          <th style="color: #fff">Observaciones</th>
                          <th style="color: #fff">Detalles</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $conn      = new mysqli('localhost','root','', 'db_edu');
                        $tblSesion = 'reg_bitacorasesion'.'_'.date("Y");
                        $query     = "SELECT * FROM $tblSesion";
                        $sel       = mysqli_query($conn, $query);
                        $num       = 0;  

                        while ($data = mysqli_fetch_assoc($sel)){
                          $usuarioId = $data["usuarioId"];

                          $queryUser = "SELECT personaId, usuario FROM cof_usuarios WHERE usuarioId='$usuarioId';";
                          $selUser   = mysqli_query($conn, $queryUser);
                          $datUser   = mysqli_fetch_assoc($selUser);

                          $queryPer = "SELECT nombres, apellidos FROM cof_personas WHERE personaId='$datUser[personaId]';";
                          $selPer   = mysqli_query($conn, $queryPer);
                          $datPer   = mysqli_fetch_assoc($selPer);
                       ?>
                       <tr>
                         <td><?= $num+=1; ?></td>
                         <td><?= utf8_encode($datPer["nombres"]) ?></td>
                         <td><?= $datUser["usuario"]; ?></td>
                         <td><?= $data["fechaEntrada"]; ?></td>
                         <td><?= $data["horaEntrada"]; ?></td>
                         <td><?= $data["fechaSalida"]; ?></td>
                         <td><?= $data["horaSalida"]; ?></td>
                         <td><?= $data["nombreHost"]; ?></td>
                         <td><?= $data["ip"]; ?></td>
                         <td><?= $data["obs"]; ?></td>
                         <td>
                          <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Detalles bitácora" class="float-right ml-2 btn btn-primary btn-sm" href="/Bitacora/Bitacora/edit/<?= $data["bitsesionId"];?>"><i class=" fa fa-eye"></i></a>
                        </td>
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
<br><br><br><br>
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



