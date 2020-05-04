<?= view("dashboard/partials/_form-error"); ?>
<form id="frmInstrumentoEditar"	action="/CatalogosEvaluacion/Instrumento/update/<?= $instrumento->instrumentoId ?>" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/Instrumento/_formEditar",['textButton' => 'Actualizar','created' => false]); ?>
</form>