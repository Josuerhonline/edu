<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/CargaAdemic/update/<?= $cargaAcademica->cargaAcademicaId ?>" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/cargaAcademica/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>