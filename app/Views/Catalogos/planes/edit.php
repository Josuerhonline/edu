<?= view("dashboard/partials/_form-error"); ?>
<form action="/catalogos/planes/update/<?= $plan->planId ?>" method="POST" enctype="multipart/form-data">
<?= view("catalogos/planes/_form",['textButton' => 'Actualizar','created' => false]); ?>
</form>