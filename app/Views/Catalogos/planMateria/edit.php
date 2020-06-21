<?= view("dashboard/partials/_form-error"); ?>
<?= view("dashboard/partials/_sessionError"); ?>
<form action="/catalogos/PlanesMaterias/update/<?= $planMateria->planMateriaId ?>" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/planMateria/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>