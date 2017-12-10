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
	'htmlOptions'=>array('style'=>'width:85%;'),
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
			'value'=>'<p  style="color:#999;"><i class="fa fa-clock-o"></i> '.date('d, M Y', $model->Tanggal).' <i class="fa fa-user"> created by Admin </i> <i class="fa fa-eye"></i> Foto: Administrator Siatab <p>',
			'htmlOptions'=>array('style'=>'text-align:justify;')			
		),		
		array(
			'type'=>'raw',
			'value'=>'<p style="text-align:justify;">'.$model->Deskripsi.'<p>',
			'htmlOptions'=>array('style'=>'text-align:justify;')			
		)
	),
)); ?>


<?php endif ?>
</div>
