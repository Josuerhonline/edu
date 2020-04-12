<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/carreras/update/<?= $carreras->carreraId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/carreras/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>