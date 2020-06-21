<?= view("dashboard/partials/_form-error"); ?>
<?= view("dashboard/partials/_sessionError"); ?>
<form id="frmEditarPonderacion" action="/catalogos/ponderaciones/update/<?= $ponderacion->ponderacionId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/ponderaciones/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>