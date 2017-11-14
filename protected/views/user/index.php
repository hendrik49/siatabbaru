<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);


?>

<h2 class="h-view">Manajemen User/Admin<?php if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?> | <?php echo CHtml::link('Tambah User/Admin', array('user/add')); ?><?php endif ?></h2>

<?php 		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
	'summaryText'=>'',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'Nama',
		'HakAkses',
				array(
						'class'=>'bootstrap.widgets.TbButtonColumn',
						'htmlOptions'=>array('style'=>'width: 60px'),
					),
	),
	//'itemView'=>'_view',
)); ?>

