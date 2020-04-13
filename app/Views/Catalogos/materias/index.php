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
          <h2>Administración de materias</h2>
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
                      <a href="/catalogos/materias/new" title="Crear" class="btn btn-success mb-12" style="margin-left: 19px"><i class="fa fa-plus"></i> Crear</a>
                      <div class="clearfix"></div>
                      <table id="tablaUsuarios" class="display table table-bordered responsive nowrap" style="width:100%">
                       <thead style="background:#2A3F54;">
                        <tr>
                          <th style="color: #fff">Nº</th>
                          <th style="color: #fff" >Nombre de la materia</th>
                          <th style="color: #fff">Código de la materia</th>
                          <th style="color: #fff">Nombre corto</th>
                          <th style="color: #fff">Estado</th>
                          <th style="color: #fff">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php $num=0;  foreach ($materias as $key => $m): ?>

                       <?php if ($m->estado =='ACTIVO'){
                        $m->estado ='<font color="green" style="font-weight:bold;">ACTIVO</font>';

                      }elseif ($m->estado =='INACTIVO') {
                        $m->estado ='<font color="red" style="font-weight:bold;">INACTIVO</font>';
                      }
                      ?>
                      <tr>
                       <td><?= $num+=1; ?></td>
                       <td><?= $m->nombre ?></td>
                       <td><?= $m->codMateria ?></td>
                       <td><?= $m->nombreCorto ?></td>
                       <td><?= $m->estado ?></td>
                       <td>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" class="float-right ml-2 btn btn-primary btn-sm" href="/catalogos/materias/edit/<?= $m->materiaId?>"><i class="fa fa-pencil"></i></a>
                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar" class="float-right btn btn-danger btn-sm ml-2"  onclick="confirmarBorrar(<?= $m->materiaId ?>)"><i class="fa fa-trash"></i></button>
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
      window.location.href = "/Catalogos/materias/delete/"+id;
    });
  }

  $(document).ready(function() {
    $('#tablaUsuarios').DataTable( {
      "paging":   true,
      "ordering": true,
      "info":     true,
      "language": {
        "url": "/vendors/datatables.net/españolTables.json"
      }
    } );
  } );


</script>



