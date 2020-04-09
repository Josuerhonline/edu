<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/facultad/update/<?= $facultad->facultadId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/facultad/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>