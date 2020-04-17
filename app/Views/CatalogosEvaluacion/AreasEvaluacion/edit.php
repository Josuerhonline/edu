<?= view("dashboard/partials/_form-error"); ?>
<form action="/CatalogosEvaluacion/AreasEvaluacion/update/<?= $areas->areaEvaluacionId ?>" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/AreasEvaluacion/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>