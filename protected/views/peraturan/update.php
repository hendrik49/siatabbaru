<?php


$this->breadcrumbs=array(
	'Edit Peraturan'=>array('index'),
	$model->NamaPeraturan=>array('view','id'=>$model->ID),
	'Edit',
);
?>

<h2 class="form-add">Edit Peraturan <?php echo $model->NamaPeraturan; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>