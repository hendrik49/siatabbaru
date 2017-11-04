<?php

$this->breadcrumbs=array(
	'View Berita'=>array('index'),
	$model->ID,
);

?>
<div>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
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
		array(
			'name'=>'Deskripsi',
			'type'=>'raw'
		),
		'status',
		array(
			'name'=>'Foto Berita',
			'type'=>'raw',
			'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/images/SlideImage/'.$model->Link.'"/>',
		),
	),
)); ?>
<?php else : ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'cssFile'=>Yii::app()->baseUrl . '/css/detailview/styles.css',		
	'data'=>$model,
	'htmlOptions'=>array('style'=>'width:80%;'),
	'attributes'=>array(			
		array(
			'type'=>'raw',		
			'value'=>'<p><b>'.$model->NamaBerita.'</b> <p>'			
		),
		array(
			'type'=>'raw',
			'value'=>'<img width="100%" height="300px" src="'.Yii::app()->request->baseUrl.'/images/SlideImage/'.$model->Link.'"/>',
		),
		array(
			'type'=>'raw',
			'value'=>$model->Deskripsi,
			'htmlOptions'=>array('style'=>'text-align:justify;')			
		)
	),
)); ?>


<?php endif ?>
</div>
