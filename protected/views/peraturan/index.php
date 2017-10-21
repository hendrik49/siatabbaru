<?php


$this->breadcrumbs=array(
	'Peraturan',
);

?>

<h2 class="h-view">
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Pengaturan Peraturan | <?php echo CHtml::link('Membuat Peraturan', array('Peraturan/add'),['class'=>'btn btn-primary']); ?><?php endif ?></h2>	
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$dataProvider,
	'template'=>'{summary}{items}{pager}',
	'enablePagination' => true,
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'columns'=>array(
		array(
			'name'=>'Tanggal',
			'value'=>'date("d / m / Y", $data->Tanggal)',
		),		
		'NoPeraturan',
		'NamaPeraturan',
		array(
			'name'=>'Link',
			   'header'=>'Link',
			   'type'=>'raw',
			   'value'=>'CHtml::link($data["Link"],Yii::app()->createUrl("/data/peraturan/", array("id"=>$data["Link"])))',
			   'htmlOptions'=>array('width'=>'40'),
					
		),
		'status',				
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>
<?php else : ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$dataProvider,
	'template'=>'{summary}{items}{pager}',
	'enablePagination' => true,
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'columns'=>array(
		array(
			'name'=>'Tanggal',
			'value'=>'date("d / m / Y", $data->Tanggal)',
		),
		'NoPeraturan',
		'NamaPeraturan',
		'Link',		
		'status',		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{Lihat}',
			'buttons'=>array(
				'Lihat'=>array(
					'label'=>'Lihat',
					'url'=>'Yii::app()->createUrl("Peraturan/view", array("id"=>$data->ID))',
					
				),
			),
		),		
	),
));  ?>

<?php endif ?>
