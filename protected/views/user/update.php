<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID_User=>array('view','id'=>$model->ID_User),
	'Update',
);

?>

<h2 class="form-add">Edit #<?php echo $model->Nama; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
