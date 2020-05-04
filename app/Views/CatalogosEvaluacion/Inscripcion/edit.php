<?= view("dashboard/partials/_form-error"); ?>
<form action="/CatalogosEvaluacion/Inscripcion/update/<?= $inscripcion->inscripcionId ?>" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/Inscripcion/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>