<?php
/* @var $this PetaController */
/* @var $model Peta */
$this->breadcrumbs=array(
	'Peta'=>array('index'),
	$model->NamaPeta,
);
?>
<div style="background: #fcd13c; padding: 2px;" class="span11">  
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
<span style="margin-left: 10px;"><b>Detail Peta <?php echo $model->NamaPeta; ?><span style="margin-left: 20px;">|<span style="margin-left: 20px;"></b>
<?php //echo CHtml::link('Edit Data', array('unitKerja/update/','id'=>$model->ID));  
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'Link',
		'type'=>'primary',
		'label'=>'Edit Data',
		'url'=>array('peta/update/','id'=>$model->ID),
		));
?><?php endif ?></div>
<div class="span11">


<?php if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
	'data'=>$model,
	'attributes'=>array(
		'Administrator',
		'UnitKerja', 
		'NamaPeta', 
		'Status',
		'Jenis',
		array(
			'name'=>'FilePeta1',
			'type'=>'raw',
			'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Peta/'.$model->FilePeta1.'').'">'.$model->FilePeta1.'</a>',
			),
		array(
			'name'=>'FilePeta2',
			'type'=>'raw',
			'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Peta/'.$model->FilePeta2.'').'">'.$model->FilePeta2.'</a>',
			),	
		),
	)); 
?>
<?php else : ?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
	'data'=>$model,
	'attributes'=>array(
		'Administrator',
		'UnitKerja', 
		'NamaPeta', 
		'Status',
		'Jenis',
		array(
			'name'=>'FilePeta1',
			'type'=>'raw',
			'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Peta/'.$model->FilePeta1.'').'">'.$model->FilePeta1.'</a>',
			),
		array(
			'name'=>'FilePeta2',
			'type'=>'raw',
			'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Peta/'.$model->FilePeta2.'').'">'.$model->FilePeta2.'</a>',
			),
		),
	)); 
?>
<?php endif ?>
<?/div>