<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/personas/update/<?= $personas->personaId ?>" method="POST" enctype="multipart/form-data">
<?= view("Catalogos/personas/_form",['textButton' => 'Actualizar','created' => false]); ?>
<h1>culazo</h1>
</form>