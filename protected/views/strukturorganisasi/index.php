<?php


$this->breadcrumbs=array(
	'StrukturOrganisasi',
);

?>

<h2 class="h-view"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Pengaturan Struktur Organisasi | <?php echo CHtml::link('Membuat Struktur Organisasi', array('StrukturOrganisasi/add')); ?><?php endif ?></h2>
	
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
		'Nama',		
		'NamaJabatan',
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
		'NamaJabatan',
		'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{Lihat}',
			'buttons'=>array(
				'Lihat'=>array(
					'label'=>'Lihat',
					'url'=>'Yii::app()->createUrl("StrukturOrganisasi/view", array("id"=>$data->ID))',
					
				),
			),
		),
	),
));  ?>

<?php endif ?>
