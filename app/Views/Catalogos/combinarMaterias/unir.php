<?= view("dashboard/partials/_form-error"); ?>
<form action="create" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/combinarMaterias/form",['textButton' => 'Guardar','created' => true]); ?>
</form>