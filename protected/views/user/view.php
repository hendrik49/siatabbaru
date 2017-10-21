<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID_User,
);

?>

<h2 class="form-add">User #<?php echo $model->Nama; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'cssFile'=>Yii::app()->baseUrl . '/css/detailview/styles.css',
	'data'=>$model,
	'attributes'=>array(
		//'ID_User',
		'Nama',
		'Password',
		'HakAkses',
	),
)); ?>
