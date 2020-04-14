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
          <h2>Administración de Personas</h2>
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
                      <table id="tabla" class="display table table-bordered responsive nowrap" style="width:100%">
                       <thead style="background:#2A3F54;">
                        <tr>
                          <th style="color: #fff">Nº</th>
                          <th style="color: #fff">Nombres</th>
                          <th style="color: #fff">Apellidos</th>
                          <th style="color: #fff">Carnet</th>
                          <th style="color: #fff">Materia</th>
                          <th style="color: #fff">Plan</th>
                          <th style="color: #fff">Ciclo</th>

                          <th style="color: #fff">Estado</th>
                          <th style="color: #fff">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php $num=0;  foreach ($cargaAcademicas as $key => $c):
                        //Validar estado de persona
                       if ($c->estadoCarga =='1'){
                        $c->estado ='<font color="green" style="font-weight:bold;">ACTIVO</font>';
                      }elseif ($c->estado =='0') {
                        $c->estado ='<font color="red" style="font-weight:bold;">INACTIVO</font>';
                      }
                      ?>
                      <tr>
                       <td><?= $num+=1; ?></td>
                       <td><?= $c->nombres ?></td>
                       <td><?= $c->apellidos ?></td>
                       <td><?= $c->carnet ?></td>
                       <td><?= $c->nombre ?></td>
                       <td><?= $c->nombrePlan ?></td>
                       <td><?= $c->nombrePersonalizado ?></td>
                       <td><?= $c->estado ?></td> 
                       <td>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" class="float-right ml-2 btn btn-primary btn-sm" href="/catalogos/CargaAdemic/edit/<?= $c->cargaAcademicaId?>"><i class="fa fa-pencil"></i></a>
                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar" class="float-right btn btn-danger btn-sm ml-2"  onclick="confirmarBorrar(<?= $c->cargaAcademicaId ?>)"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php endforeach?>
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
  function confirmarBorrar(id){
    swal({   
      title: "¿Desea eliminar este registro?",   text: "Presione confirmar para eliminar",
      type: "warning",   
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",   
      confirmButtonText: "Confirmar",   
      closeOnConfirm: false 
    }, function(){   
      window.location.href = "/Catalogos/cargaAcademica/delete/"+id;
    });
  }
  $(document).ready(function() {
    $('#tabla').DataTable( {
      "paging":   true,
      "ordering": true,
      "info":     true,
      "language": {
        "url": "/vendors/datatables.net/españolTables.json"
      }
    } );
  } );


</script>



