<?php


$this->breadcrumbs=array(
	'Album',
);

?>

<h2 class="h-view"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Pengaturan Gambar Depan | <?php echo CHtml::link('Upload Gambar', array('album/add')); ?><?php endif ?></h2>
	
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$dataProvider,
	'summaryText'=>'',
	'columns'=>array(
		array(
			'name'=>'Tanggal',
			'value'=>'date("d / m / Y", $data->Tanggal)',
		),
		'NamaGambar',
		'status',
		'Link',
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
	),
)); ?>
<?php else : ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'cssFile'=>Yii::app()->baseUrl . '/css/gridview/styles.css',
	'summaryText'=>'',
	'columns'=>array(
		array(
			'name'=>'Tanggal',
			'value'=>'date("d / m / Y", $data->Tanggal)',
		),
		'NamaGambar',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{Lihat}',
			'buttons'=>array(
				'Lihat'=>array(
					'label'=>'Lihat',
					'url'=>'Yii::app()->createUrl("album/view", array("id"=>$data->ID))',
					
				),
			),
		),
	),
));  ?>

<?php endif ?>
