<?php

$this->breadcrumbs=array(
	'StrukturOrganisasi'=>array('index'),
	'Tambah data',
);

?>

<h2 class="form-add">Tambah Struktur Organisasi</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>