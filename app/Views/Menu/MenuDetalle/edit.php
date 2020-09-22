<?= view("dashboard/partials/_form-error"); ?>
<form action="/Menu/MenuDetalle/update/<?= $menuDetalle->menuDetalleId ?>" method="POST" enctype="multipart/form-data">
<?= view("Menu/MenuDetalle/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>