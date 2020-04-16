<?= view("dashboard/partials/_form-error"); ?>
<form action="/CatalogosEvaluacion/Preguntas/update/<?= $preguntas->preguntaId ?>" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/Preguntas/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>