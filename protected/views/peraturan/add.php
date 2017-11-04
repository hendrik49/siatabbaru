<?php

$this->breadcrumbs=array(
	'Peraturan'=>array('index'),
	'Tambah data',
);

?>

<h2 class="form-add">Tambah Peraturan</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>