<?= view("dashboard/partials/_form-error"); ?>
<form action="create" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/universidad/_form",['textButton' => 'Guardar','created' => true]); ?>
</form>