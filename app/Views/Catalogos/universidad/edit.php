<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/universidad/update/<?= $universidad->universidadId ?>" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/universidad/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>