<?= view("dashboard/partials/_form-error"); ?>
<form action="/Menu/LimitarMenu/update/<?= $limitarMenu->limitarMenuId ?>" method="POST" enctype="multipart/form-data">
<?= view("Menu/LimitarMenu/form",['textButton' => 'Actualizar','created' => false]); ?>
</form>