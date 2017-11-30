<?php
/* Bitartic Group */
$this->pageTitle=Yii::app()->name . ' - Pusat ATAB';
$this->breadcrumbs=array(
	'List Satker',
);
?>
<style type="text/css">
	table{margin:0 auto;width:95%;border-collapse:collapse;background:#ecf3eb; font-size: 10.7px;}
	/*th{padding:6px 3px;background: #fbc50b;}*/
	th{padding:6px 3px;background: #fbc50b;}
</style>
		


<b>Daftar Staker</b>

	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?> | 
	<?php 
		$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'primary',
			'label'=>'Tambah',
			'url'=>'/siatab/PPK/add',
			'htmlOptions'=>array('data-dismiss'=>'CHtml'),
		)); 
	?>
	<?php 
		$linkfoto = Yii::app()->request->baseUrl . "/data/PPK";
		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'PPK',
			'dataProvider'=>$model->search(),
			'filter'=>$model,	
			'template'=>'{summary}{items}{pager}',
			'enablePagination' => true,
			'summaryText'=>'Displaying {start}-{end} of {count} results.',
			'columns'=>
				array(
					array(
						'name'=>'ID',
						'htmlOptions' => array('style' =>'width: 30px;text-align:center;')					
					),	 
					'Nama', 'NIP', 'Email', 'Alamat', 'NoTelp', 
					array(
						'name'=>'Foto', 
						'type'=>'raw',
						'value'=>'CHtml::image("'.Yii::app()->request->baseUrl.'/data/PPK/$data->Foto")',
						'htmlOptions'=>array('style'=>'width: 100px;'),
					),
					array(
						'class'=>'bootstrap.widgets.TbButtonColumn',
						'htmlOptions'=>array('style'=>'width: 60px'),
						
					),
				),
			)

		); 	
		
	/*
	$this->widget('CTreeView',array(
        'data'=>$dataTree,
        'animated'=>'fast', //quick animation
        'collapsed'=>'false',//remember must giving quote for boolean value in here
        'htmlOptions'=>array(
                'class'=>'treeview-red',//there are some classes that ready to use
        ),
));
	*/
	?>		
<?php else : ?>
	<?php 
	
	?>
<?php endif ?>
