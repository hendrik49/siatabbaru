<?php

$this->breadcrumbs=array(
	'Galeri'=>array('index'),
	'Tambah data',
);

?>

<h2 class="form-add">Tambah Galeri</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>