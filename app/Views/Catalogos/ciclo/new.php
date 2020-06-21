<?= view("dashboard/partials/_sessionError"); ?>
<?= view("dashboard/partials/_form-error"); ?>
<form action="create" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/ciclo/_form",['textButton' => 'Guardar','created' => true]); ?>
</form>