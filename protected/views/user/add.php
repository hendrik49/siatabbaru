<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Manajemen User'=>array('index'),
	'Tambah User',
);

?>

<h2 class="form-add">Tambah User</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
