<?php

$this->breadcrumbs=array(
	'View Galeri'=>array('index'),
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
			'value'=>date('d, M Y', $model->Tanggal),
		),
		'NamaVideo',
		'Kategori',
		array(
			'name'=>'Deskripsi',
			'type'=>'raw'
		),
		'status',
		array(
			'name'=>'Foto Video',
			'type'=>'raw',
			'value'=>'<video width="720" height="320" controls id="video">
			<source  src="'.Yii::app()->request->baseUrl.'/data/Video/'.$model->Link.'" type="video/mp4">
			</video>',
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
			'value'=>'<p><b>'.$model->NamaVideo.'</b> <p>'			
		),
		array(
			'type'=>'raw',
			'value'=>'<video width="720" height="320" controls id="video">
			<source  src="'.Yii::app()->request->baseUrl.'/data/Video/'.$model->Link.'" type="video/mp4">
			</video>',
		),
		array(
			'type'=>'raw',
			'value'=>'<p  style="color:#999;">Jakarta, '.date('d, M Y', $model->Tanggal).'. Foto: Administrator Siatab'.$model->Deskripsi.'<p>',
			'htmlOptions'=>array('style'=>'text-align:justify;')			
		)
	),
)); ?>


<?php endif ?>
</div>
