<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/ciclo/update/<?= $ciclo->aperCicloId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/ciclo/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>