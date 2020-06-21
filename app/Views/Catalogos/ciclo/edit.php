<?= view("dashboard/partials/_form-error"); ?>
<?= view("dashboard/partials/_sessionError"); ?>
<form action="/catalogos/ciclo/update/<?= $ciclo->aperCicloId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/ciclo/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>