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
          <h2>Administración de Menús</h2>
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
                      <a href="/Menu/MenuRol/new" title="Crear" class="btn btn-success mb-12" style="margin-left: 19px"><i class="fa fa-plus"></i> Crear menú rol</a>
                      <div class="clearfix"></div>
                      <table id="tabla" class="display table table-bordered responsive nowrap" style="width:100%">
                       <thead style="background:#2A3F54;">
                        <tr>
                          <th style="color: #fff">Nº</th>
                          <th style="color: #fff">Rol</th>
                          <th style="color: #fff">Menú</th>
                          <th style="color: #fff">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php $num=0;  foreach ($rolesMenu as $key => $m): 
                       ?>
                       <tr>
                         <td><?= $num+=1; ?></td>
                         <td><?= $m->nombreRol ?></td>
                         <td><?= $m->nombreMenu ?></td>
                         <td>
                          <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" class="float-right ml-2 btn btn-primary btn-sm" href="/Menu/MenuRol/edit/<?= $m->rolMenuId?>"><i class="fa fa-pencil"></i></a>
                          
                          <a class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Limitar" class="float-right ml-2 btn btn-warning btn-sm" href="/Menu/LimitarMenu/new/<?= $m->rolMenuId?>"><i class="fa fa-times-circle"></i></a>
                          <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar" class="float-right btn btn-danger btn-sm ml-2"  onclick="confirmarBorrar(<?= $m->rolMenuId ?>)"><i class="fa fa-trash"></i></button>
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
      cancelButtonText: "Cancelar",  
      confirmButtonText: "Confirmar",   
      closeOnConfirm: false 
    }, function(){   
      window.location.href = "/Menu/MenuRol/delete/"+id;
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



