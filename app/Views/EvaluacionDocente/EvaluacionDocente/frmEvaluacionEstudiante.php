<?= view("dashboard/partials/_form-error"); ?>
<form id="frmEvaluacionDocente" action="/EvaluacionDocente/EvaluacionDocente/evaluacionEstudiante/<?= $inscripcion->inscripcionDetalleId ?>" method="POST" enctype="multipart/form-data">
<?= view("EvaluacionDocente/EvaluacionDocente/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>