<?= view("dashboard/partials/_form-error"); ?>
<form action="trasladar" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/cargaAcademica/form",['textButton' => 'Trasladar','created' => true]); ?>
</form>