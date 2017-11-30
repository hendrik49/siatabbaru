<?php


$this->breadcrumbs=array(
	'Berita',
);

?>

<h2 class="h-view"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>Pengaturan Berita | <?php echo CHtml::link('Membuat Berita', array('Berita/add'),['class'=>'btn btn-primary']); ?><?php endif ?></h2>
	
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,	
	'template'=>'{summary}{items}{pager}',
	'enablePagination' => true,
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'columns'=>array(
		'NamaBerita',
		'Kategori',
		array(
			'name'=>'Tanggal',
			'value'=>'date("j, M Y", $data->Tanggal)',
		),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px;text-align:center'),
        ),
	),
)); ?>
<?php else : ?>
<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'itemView'=>'_thumb',
)); ?>


<?php endif ?>
