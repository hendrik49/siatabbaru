<?php
/* @var $this UnitKerjaController */
/* @var $model UnitKerja */

$this->breadcrumbs=array(
	'Unit Kerja'=>array('index'),
	$model->NamaUnitKerja=>array('view','id'=>$model->ID),
	'Edit',
);

?>

<h3 class="form-add">Edit Data <?php echo $model->NamaUnitKerja; ?></h3>

<?php echo $this->renderPartial('add', array('model'=>$model)); ?>
