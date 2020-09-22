<?= view("dashboard/partials/_form-error"); ?>
<form action="/Menu/MenuRol/update/<?= $rolesMenu->rolMenuId ?>" method="POST" enctype="multipart/form-data">
<?= view("Menu/MenuRol/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>