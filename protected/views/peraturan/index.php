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
	'dataProvider'=>$model->search(),
	'filter'=>$model,	
	'template'=>'{summary}{items}{pager}',
	'enablePagination' => true,
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'columns'=>array(
		array(
			'name'=>'NoPeraturan',
			'htmlOptions'=>array('width'=>'100')
		),		
		array(
			'name'=>'NamaPeraturan',
			'htmlOptions'=>array('width'=>'300')
		),		
		array(
			'name'=>'Link',
			   'header'=>'Link',
			   'type'=>'raw',
			   'type' => 'raw',
			   'value'=> function($data){
				   return '
				   <p><img width="25px" height="25px" src="'.Yii::app()->request->baseUrl.'/images/pdf.png"/>
				   <a href="'.Yii::app()->createUrl("/images/SlideImage/", array("id"=>urlencode($data->Link))).'">'.$data->Link.'</a>			   
				   </p>			
				   ';
				 },   
			   'htmlOptions'=>array('width'=>'300')
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

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'template'=>'{summary}{items}{pager}',
	'enablePagination' => true,
	'summaryText'=>'Displaying {start}-{end} of {count} results.',
	'columns'=>array(
		array(
			'name'=>'NoPeraturan',
			'htmlOptions'=>array('width'=>'100')
		),		
		array(
			'name'=>'NamaPeraturan',
			'htmlOptions'=>array('width'=>'300')
		),		
		array(
			'name'=>'Link',
			   'header'=>'Link',
			   'type'=>'raw',
			   'type' => 'raw',
			   'value'=> function($data){
				   return '
				   <p><img width="25px" height="25px" src="'.Yii::app()->request->baseUrl.'/images/pdf.png"/>
					   <a href="'.Yii::app()->createUrl("/images/SlideImage/", array("id"=>rawurlencode($data->Link))).'">'.$data->Link.'</a>			   
				   </p>			
				   ';
				 },   
			   'htmlOptions'=>array('width'=>'300')
			),
		array(
			'name'=>'Tanggal',
			'value'=>'date("j, M Y", $data->Tanggal)',
			'htmlOptions'=>array('width'=>'80')			
		),
	),
));  ?>

<?php endif ?>
