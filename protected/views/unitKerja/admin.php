<?php
/* @var $this UnitKerjaController */
/* @var $model UnitKerja */

$this->breadcrumbs=array(
	'Unit Kerja'=>array('index'),
	'Administrasi Unit Kerja',
);

$this->menu=array(
	array('label'=>'List Unit Kerja', 'url'=>array('index')),
	array('label'=>'Tambah Unit Kerja', 'url'=>array('add')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('unit-kerja-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrasi Unit Kerja</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'UnitKerja-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'ID_UnitKerja',
		'NamaUnitKerja',
		'ID_Admin',
		'website',
		'Lokasi',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
