<?php


$this->breadcrumbs=array(
	'Edit Struktur Organisasi'=>array('index'),
	$model->NamaJabatan=>array('view','id'=>$model->ID),
	'Edit',
);
?>

<h2 class="form-add">Edit Struktur Organisasi <?php echo $model->NamaJabatan; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>