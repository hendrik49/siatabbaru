<?php


$this->breadcrumbs=array(
	'Edit Galeri'=>array('index'),
	$model->NamaGambar=>array('view','id'=>$model->ID),
	'Edit',
);
?>

<h2 class="form-add">Edit Gambar <?php echo $model->NamaGambar; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>