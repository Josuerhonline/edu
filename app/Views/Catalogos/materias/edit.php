<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/materias/update/<?= $materias->materiaId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/materias/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>