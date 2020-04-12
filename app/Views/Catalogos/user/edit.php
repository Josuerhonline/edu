<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/usuario/update/<?= $user->usuarioId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/user/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>