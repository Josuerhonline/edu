<?= view("dashboard/partials/_form-error"); ?>
<form id="frmEvaluacionDocente" action="/EvaluacionDocente/EvaluacionDocente/evaluacionDocente/<?= $inscripcion->inscripcionDetalleId ?>" method="POST" enctype="multipart/form-data">
<?= view("EvaluacionDocente/EvaluacionDocente/_formDocentes",['textButton' => 'Actualizar','created' => false]); ?>
</form>