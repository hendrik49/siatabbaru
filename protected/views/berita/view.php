<?php

$this->breadcrumbs=array(
	'View Berita'=>array('index'),
	$model->ID,
);

?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'cssFile'=>Yii::app()->baseUrl . '/css/detailview/styles.css',
	'data'=>$model,
	'attributes'=>array(	
		array(
			'name'=>'Tanggal',
			'value'=>date('d / m / Y', $model->Tanggal),
		),
		'NamaBerita',
		'Kategori',
		'Deskripsi',		
		'status',
		array(
			'name'=>'Foto Berita',
			'type'=>'raw',
			'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/images/SlideImage/'.$model->Link.'"/>',
		),
	),
)); ?>
