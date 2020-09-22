<?= view("dashboard/partials/_form-error"); ?>
<form action="/Menu/Menu/update/<?= $menu->menuId ?>" method="POST" enctype="multipart/form-data">
<?= view("Menu/Menu/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>