<?php
/* @var $this PetaController */
/* @var $model Peta */

$this->breadcrumbs=array(
	'Petas'=>array('index'),
	$model->NamaPeta=>array('view','id'=>$model->ID),
	'Update',
);

?>

<h2 class="form-add">Update Peta <?php echo $model->NamaPeta; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>