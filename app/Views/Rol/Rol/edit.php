<?= view("dashboard/partials/_form-error"); ?>
<form action="/Rol/Rol/update/<?= $roles->rolId ?>" method="POST" enctype="multipart/form-data">
<?= view("Rol/Rol/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>