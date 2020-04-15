<?= view("dashboard/partials/_form-error"); ?>
<form action="/CatalogosEvaluacion/TemasCapacitacion/update/<?= $temas->temaCapacitacionId ?>" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/TemasCapacitacion/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>