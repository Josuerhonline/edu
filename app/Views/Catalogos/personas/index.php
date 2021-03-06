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
                          <th style="color: #fff">N°</th>
                          <th style="color: #fff">Dui</th>
                          <th style="color: #fff">Carnet</th>
                          <th style="color: #fff">Nombres</th>
                          <th style="color: #fff">Apellidos</th>
                          <th style="color: #fff">Tipo de persona</th>
                          <th style="color: #fff">Teléfono</th>
                          <th style="color: #fff">Email</th>
                          <th style="color: #fff">Estado</th>
                          <th style="color: #fff">Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php $num=0;  foreach ($personas as $key => $v):
                        //Validar estado de persona
                        if ($v->estado =='1'){
                          $v->estado ='<font color="green" style="font-weight:bold;">ACTIVO</font>';
                        }elseif ($v->estado =='0') {
                          $v->estado ='<font color="red" style="font-weight:bold;">INACTIVO</font>';
                        }

                        //Validar tipo de persona
                        if ($v->tipoPersona =='A'){
                          $v->tipoPersona ='ADMINISTRADOR';
                        }elseif ($v->tipoPersona =='D') {
                          $v->tipoPersona ='DOCENTE';
                        }elseif ($v->tipoPersona =='E') {
                          $v->tipoPersona ='ESTUDIANTE';
                        }
                      ?>
                      <tr>
                       <td><?= $num+=1; ?></td>
                       <td><?= $v->DUI ?></td>
                       <td><?= $v->carnet ?></td>
                       <td><?= $v->nombres ?></td>
                       <td><?= $v->apellidos ?></td>
                       <td><?= $v->tipoPersona ?></td>
                       <td><?= $v->telefono ?></td>
                       <td><?= $v->email ?></td>
                       <td><?= $v->estado ?></td> 
                       <td>
                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" class="float-right ml-2 btn btn-primary btn-sm" href="/catalogos/personas/edit/<?= $v->personaId?>"><i class="fa fa-pencil"></i></a>
                        <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar" class="float-right btn btn-danger btn-sm ml-2"  onclick="confirmarBorrar(<?= $v->personaId ?>)"><i class="fa fa-trash"></i></button>
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
      window.location.href = "/Catalogos/personas/delete/"+id;
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



