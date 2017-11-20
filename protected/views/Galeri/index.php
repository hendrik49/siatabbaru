<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Galeri Foto',
);
?>

<h2 class="h-view">
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Pengaturan Galeri | <?php echo CHtml::link('Membuat Galeri', array('Galeri/add'),['class'=>'btn btn-primary']); ?><?php endif ?></h2>	
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,	
	'template'=>'{summary}{items}{pager}',
	'enablePagination' => true,
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'columns'=>array(
        array(
			'name'=>'ID',
			'htmlOptions'=>array('width'=>'20')
		),	
		array(
			'name'=>'NamaGambar',
			'htmlOptions'=>array('width'=>'100')
		),			
		array(
			'name'=>'Tanggal',
			'value'=>'date("j, M Y", $data->Tanggal)',
			'htmlOptions'=>array('width'=>'80')	
		),				
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
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




