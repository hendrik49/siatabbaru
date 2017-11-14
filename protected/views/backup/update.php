<?php
/* @bitartik Group */

$this->breadcrumbs=array(
	'Data Sarana Kesling-Edit'=>array('index'),
	$model->Judul=>array('update','id'=>$model->ID),
	'update',
);
?>

<!--<h2 class="form-add">Update/edit <?php echo $model->ID; ?></h2>-->

<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?><h2 class="h-view">Kelola Data Umum | <?php echo CHtml::link('Lihat Data', array('backup/view', 'id'=>$model->ID)); ?></h2><?php endif ?>

<?php echo $this->renderPartial('_form', array('model'=>$model));?>

