<?= view("dashboard/partials/_form-error"); ?>
<?= view("dashboard/partials/_sessionError"); ?>
<form action="/catalogos/CargaAdemic/update/<?= $cargaAcademica->cargaAcademicaId ?>" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/cargaAcademica/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>