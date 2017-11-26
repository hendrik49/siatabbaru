<?php

$this->breadcrumbs=array(
	'Berita'=>array('index'),
	'Tambah data',
);

?>

<h2 class="form-add">Tambah Berita</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>