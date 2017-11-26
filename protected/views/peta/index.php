<?php
/* @var $this PetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Daftar Kiriman Peta',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('peta-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<div style="background: #fcd13c; height:40px;" class="span11">  
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
<legend><span style="margin-left: 10px;">Kelola Data Pemetaan<span style="margin-left: 20px;">|<span style="margin-left: 20px;">
<?php //echo CHtml::link('Edit Data', array('unitKerja/update/','id'=>$model->ID));  
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'Link',
		'type'=>'primary',
		'label'=>'Upload Peta',
		'url'=>array('peta/add'),
		
		));
?><?php endif ?></legend></div>
<br></br>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 
?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'summaryText'=>'',
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'Tanggal',
			'value'=>'date("d / m / Y", $data->Tanggal)',
		),
		'UnitKerja',
		'NamaPeta',
		'FilePeta1',
		'FilePeta2',
		'Jenis',
		'Status',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
	),
)); ?>
<?php else : ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'summaryText'=>'',
	'type'=>'striped bordered condensed',
	//'id'=>'peta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'Tanggal',
			'value'=>'date("d / m / Y", $data->Tanggal)',
		),
		'UnitKerja',
		'NamaPeta',
		'FilePeta1',
		'FilePeta2',
		'Jenis',
		'Status',
		array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
			'viewButtonUrl'=>'Yii::app()->createUrl("peta/view/", array("id"=>$data->ID))',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
		),
	),
)); ?>
<?php endif ?>





