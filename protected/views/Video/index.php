<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Galeri Video',
);
?>
<h2 class="h-view">
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Pengaturan Video | <?php echo CHtml::link('Membuat Video', array('Video/add'),['class'=>'btn btn-primary']); ?><?php endif ?></h2>	
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
			'header' => 'ID',
			'htmlOptions' => array('style' =>'width: 30px;text-align:center;')			
				),	
		array(
			'name'=>'NamaVideo'
		),			
		array(
			'name'=>'Tanggal',
			'value'=>'date("j, M Y", $data->Tanggal)',
			'htmlOptions' => array('style' =>'width: 100px;text-align:center;')			
			
		),				
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',		
			'htmlOptions' => array('style' =>'width: 100px; text-align:center;')		
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



