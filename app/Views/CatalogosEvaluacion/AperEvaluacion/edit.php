<?= view("dashboard/partials/_form-error"); ?>
<form action="/CatalogosEvaluacion/AperEvaluacion/update/<?= $aperEva->aperEvaluacionId ?>" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/AperEvaluacion/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>