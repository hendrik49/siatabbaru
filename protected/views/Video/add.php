<?php

$this->breadcrumbs=array(
	'Video'=>array('index'),
	'Tambah Video',
);

?>

<h2 class="form-add">Tambah Video</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>