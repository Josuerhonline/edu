

<?= view("dashboard/partials/_form-error"); ?>
<form action="create" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/TemasCapacitacion/_form",['textButton' => 'Guardar','created' => true]); ?>
</form>