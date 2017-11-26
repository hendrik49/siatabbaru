<?php
/* @var $this UnitKerjaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Data Balai',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('UnitKerja-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div >
	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'htmlOptions'=>array('class'=>'well'),
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	));
	?>
		<div class="span6"><?php echo $form->textFieldRow($model,'NamaUnitKerja'); ?></div>
	<div class="span1"><?php echo CHtml::submitButton('Search'); ?></div>
</div><!-- search-form -->

<style type="text/css">
	table{margin:0 auto;width:95%;border-collapse:collapse;background:#ecf3eb; font-size: 11.5px;}
	th{padding:6px 3px;background: #fbc50b;}
</style>

<div style="background: #fcd13c; width: 50%;" >
<?php if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?>
<legend><span style="margin-left: 10px;">Anda Login Sebagai Admin <b>Pusat</b><span style="margin-left: 20px;">|<span style="margin-left: 20px;">
<?php 
		$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'primary',
			'label'=>'Tambah',
			'url'=>'/siatab/unitKerja/add',
			'htmlOptions'=>array('data-dismiss'=>'CHtml'),
		)); 
?><?php endif ?></legend></div>
<?php if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?>
<?php 
	$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'summaryText'=>'',
			'id'=>'UnitKerja',
			//'dataProvider'=>$dataProvider,
			'dataProvider'=>$model->search(),
			//'dataAdmin'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				array('name'=>'NamaUnitKerja', 'htmlOptions'=>array('style'=>'width: 150px')),
				array('name'=>'AlamatUnitKerja',  'htmlOptions'=>array('style'=>'width: 150px')),
				array(
					'name'=>'admin_search', 
					'value'=>'$data->admin->Nama',
					'htmlOptions'=>array('style'=>'width: 100px'),
				),
				array(
					'name'=>'KodeProv', 
					'value'=>'$data->KodeProv',
					'htmlOptions'=>array('style'=>'width: 30px'),
				),
				array('name'=>'Provinsi',  'htmlOptions'=>array('style'=>'width: 120px')),
				 'CakupanWilayahKerja','Lat',
				 'Lang',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'htmlOptions'=>array('style'=>'width: 50px'),
				),
			),
		)
	); 

?>
<?php else : ?> 
<?php if (isset(Yii::app()->user->hakAkses) AND Yii::app()->user->hakAkses == User::USER_ADMIN) : ?>
<?php 
$model->KodeProv  - 100000000;
$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'summaryText'=>'',
	'id'=>'UnitKerja',
	//'dataProvider'=>$dataProvider,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'NamaUnitKerja', 
		'AlamatUnitKerja',
		//'KodeProv',
		'Provinsi',
		'CakupanWilayahKerja',
			array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("unitKerja/view", array("id"=>$data->ID))'),
				), 			
		),
	)); 

?>
<?php else : ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'summaryText'=>'',
	'id'=>'UnitKerja',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'NamaUnitKerja', 
		'AlamatUnitKerja',
		//'KodeProv',
		'Provinsi',
		'CakupanWilayahKerja',
			
	),
)); 

?>
<?php endif ?>
<?php endif ?>
<?php $this->endWidget(); ?>