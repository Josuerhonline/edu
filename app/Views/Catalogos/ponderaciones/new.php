<?= view("dashboard/partials/_form-error"); ?>
<?= view("dashboard/partials/_sessionError"); ?>
<form id="frmCrearPonderacion" action="create" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/ponderaciones/_form",['textButton' => 'Guardar','created' => true]); ?>
</form>