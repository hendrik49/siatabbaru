<?php


$this->breadcrumbs=array(
	'Edit Gambar'=>array('index'),
	$model->NamaGambar=>array('view','id'=>$model->ID),
	'Edit',
);
?>

<h2 class="form-add">Update/edit Gambar<?php echo $model->NamaGambar; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>