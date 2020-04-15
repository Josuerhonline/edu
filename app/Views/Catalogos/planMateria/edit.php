<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/PlanesMaterias/update/<?= $planMateria->planMateriaId ?>" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/planMateria/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>