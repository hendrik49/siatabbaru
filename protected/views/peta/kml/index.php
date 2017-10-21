<?php
/* @var $this PetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Layanan Kml',
);

?>

<h2 class="h-view">Layanan KML</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'summaryText'=>'',
	'cssFile'=>Yii::app()->baseUrl . '/css/gridview/styles.css',
	'id'=>'peta-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'Administrator',
		array(
			'name'=>'Tanggal',
			'value'=>'date("d / m / Y", $data->Tanggal)',
		),
		'NamaPeta',
		array(
			'name'=>'File Peta',
			'type'=>'raw',
			'value'=>'CHtml::link($data->FilePeta, array("peta/map", "id"=>$data->ID))',
		),
		'Tipe',
		/*
		'Jenis',
		'Status',
		'Url',
		'Keterangan',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{View}',
			'buttons'=>array(
				'View'=>array(
					'label'=>'Lihat',
					'url'=>'Yii::app()->createUrl("peta/view", array("id"=>$data->ID))',
					'imageUrl'=> Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/gridview/view.png',
				),
			),
		),
	),
)); ?>
