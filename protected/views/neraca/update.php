<?php
/* @bitartik Group */

$this->breadcrumbs=array(
	'Neraca Air'=>array('index'),
	$model->NamaBalai=>array('update','id'=>$model->ID),
	'update',
);
?>
<?php echo $this->renderPartial('add', array('model'=>$model)); ?>