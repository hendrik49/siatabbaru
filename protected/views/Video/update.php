<?php


$this->breadcrumbs=array(
	'Edit Video'=>array('index'),
	$model->NamaVideo=>array('view','id'=>$model->ID),
	'Edit',
);
?>

<h2 class="form-add">Edit Video <?php echo $model->NamaVideo; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>