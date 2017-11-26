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
		'NamaGambar',
		'Kategori',
		array(
			'name'=>'Deskripsi',
			'type'=>'raw'
		),
		'status',
		array(
			'name'=>'Foto Gambar',
			'type'=>'raw',
			'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/data/Galeri/'.$model->Link.'"/>',
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
			'value'=>'<p><b>'.$model->NamaGambar.'</b> <p>'			
		),
		array(
			'type'=>'raw',
			'value'=>'<img width="100%" height="300px" src="'.Yii::app()->request->baseUrl.'/data/Galeri/'.$model->Link.'"/>',
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
