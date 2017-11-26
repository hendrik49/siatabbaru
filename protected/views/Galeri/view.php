<?php

$this->breadcrumbs=array(
<<<<<<< HEAD
	'View Peraturan'=>array('index'),
=======
	'View Galeri'=>array('index'),
>>>>>>> 4babcd7f82c9942e0770269afdd7bdb43cd93a7a
	$model->ID,
);

?>
<<<<<<< HEAD

=======
<div>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
>>>>>>> 4babcd7f82c9942e0770269afdd7bdb43cd93a7a
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'cssFile'=>Yii::app()->baseUrl . '/css/detailview/styles.css',
	'data'=>$model,
	'attributes'=>array(	
		array(
			'name'=>'Tanggal',
<<<<<<< HEAD
			'value'=>date('d / m / Y', $model->Tanggal),
		),
		'NamaGambar',
		'status',
		array(
			'name'=>'Foto Peraturan',
			'type'=>'raw',
			'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/images/SlideImage/'.$model->Link.'"/>',
		),
	),
)); ?>
=======
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
>>>>>>> 4babcd7f82c9942e0770269afdd7bdb43cd93a7a
