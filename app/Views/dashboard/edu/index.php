
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?= view("dashboard/edu/menu"); ?>
</div>
</div>
<div class="top_nav">
  <?= view("dashboard/edu/navbar"); ?>
</div>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">

      <div class="title_left" style="color:#2a3f54">
        <h3>BIENVENIDO</h3>
        <h6>INFORMACIÓN GENERAL DE EDU</h6>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="">
         <div class="col-lg-12">
          <div class="x_content">
            <div class="row">
              <?php 
              use App\Models\CatalogosEvaluacion\AperEvaluacionModelView;
              $aperEva = new AperEvaluacionModelView();

              $mesDia = date("Y")."-".date("m")."-". date("d");
              $fechas = $aperEva->asObject()->where('anio',date("Y"))
              ->where('fechaFin>=',$mesDia)->where('estado','1')->orderBy('fechaInicio','asc')
              ->findAll();?>

              <?php foreach ($fechas as $key => $f):?>
               <?php if ($_SESSION["anioS"]==date("Y")): ?>
                 <div class="animated flipInY col-lg-6" style="width: 100%">
                  <div class="tile-stats" style="height:95%;background: #fff">
                    <div class="icon"><i class="fa fa-calendar" style="color:#2a3f54"></i>
                    </div>
                    <div class="count" style="color:#2a3f54"><?=$f->nombrePersonalizado?></div>
                    <?php 
                    date_default_timezone_set('America/El_Salvador');
                    $fecha1= new DateTime();
                    $fecha2= new DateTime($f->fechaFin);
                    $diff = $fecha1->diff($fecha2);
                    ?>
                    <br>
                    <div class="col-md-12">
                      <?php if ($diff->days=='0'): ?>
                        <h2 style="color:#2a3f54">El periodo de evaluación termina </h2>
                        <h3 style="color:#2a3f54"><?php  echo ' Este día'; ?></h3>
                      <?php endif ?>
                      <?php if (!$diff->days=='0'): ?>
                        <h2 style="color:#2a3f54">El periodo de evaluación termina en </h2>
                        <h3 style="color:#2a3f54"><?php  echo $diff->days . ' dias'; ?></h3>
                      <?php endif ?>
                      <p style="color:white;background: #1ABB9C">Desde: <?=$f->fechaInicio ?> --  hasta:  <?=$f->fechaFin ?></p>
                    </div>
                  </div>
                </div>
              <?php endif ?>
            <?php endforeach ?>
<!-- 
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6  ">
               <div class="tile-stats" style="height:95%;background:#ffffff;" >
                <div class="icon"><i class="fa fa-check-square-o" style="color:#2a3f54"></i>
                </div>
                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="90">
                    <span class="percent" style="color:#2a3f54"></span>
                  </span>
                </div>
                <h3 style="color:#2a3f54">Porcentaje de evaluación</h3>
                <p style="color:#2a3f54">Indica cuanto queda para finalizar las tres evaluaciones</p>
              </div>
            </div> -->
          </div>
        </div>
        <br />
        <div class="col-lg-6">
          <div class="x_panel ui-ribbon-container">
            <div class="ui-ribbon-wrapper">
              <div class="ui-ribbon" style="background: #1ABB9C">
                Tutorial
              </div>
            </div>
            <div class="x_title">
              <h2 style="color:#2a3f54">CONFIGURACIONES</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <li><iframe width="100%" height="315" src="https://www.youtube.com/embed/Mx0Yaus4jls" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
              <div class="divider"></div>
              <p style="color:#2a3f54">En este tutorial podras comprender todo sobre las configuraciones de EDU</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="x_panel ui-ribbon-container">
            <div class="ui-ribbon-wrapper">
              <div class="ui-ribbon" style="background: #1ABB9C">
                Tutorial
              </div>
            </div>
            <div class="x_title">
              <h2 style="color:#2a3f54">EVALUACIONES</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content col-md-12">

              <li><iframe width="100%" height="315" src="https://www.youtube.com/embed/Ycs7gq_fRcA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
              <div class="divider"></div>
              <p style="color:#2a3f54">En este tutorial podras comprender todo sobre las evaluaciones docentes de EDU</p>
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
</body>
</html>
