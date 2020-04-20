

<?= view("dashboard/partials/_form-error"); ?>
<form id="culo" action="create" method="POST" enctype="multipart/form-data">
<?= view("CatalogosEvaluacion/Instrumento/_form",['textButton' => 'Guardar','created' => true]); ?>
</form>