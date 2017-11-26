<?php


$this->breadcrumbs=array(
	'Edit Berita'=>array('index'),
	$model->NamaBerita=>array('view','id'=>$model->ID),
	'Edit',
);
?>

<h2 class="form-add">Edit Berita <?php echo $model->NamaBerita; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>