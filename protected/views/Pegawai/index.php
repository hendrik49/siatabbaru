<?php
/* Bitartic Group */
$this->pageTitle=Yii::app()->name . ' - Pusat ATAB';
$this->breadcrumbs=array(
	'Daftar Pegawai',
);
?>
<style type="text/css">
	table{margin:0 auto;width:95%;border-collapse:collapse;background:#ecf3eb; font-size: 10.7px;}
	/*th{padding:6px 3px;background: #fbc50b;}*/
	th{padding:6px 3px;background: #fbc50b;}
</style>		
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>  
	<?php 
		$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'primary',
			'label'=>'Tambah Pegawai',
			'url'=>'/siatab/Pegawai/add',
			'htmlOptions'=>array('data-dismiss'=>'CHtml'),
		)); 
	?>
	<?php 
		$linkfoto = Yii::app()->request->baseUrl . "/data/pegawai";		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'Pegawai',
			'dataProvider'=>$model->search(),
			'filter'=>$model,	
			'template'=>'{summary}{items}{pager}',
			'enablePagination' => true,
			'summaryText'=>'Displaying {start}-{end} of {count} results.',
					'columns'=>
				array( 
					'ID','Nama', 'NIP', 'Email', 'Alamat', 'NoTelp', 
					array(
						'name'=>'Foto', 
						'type'=>'raw',
						'value'=>'CHtml::image("'.Yii::app()->request->baseUrl.'/data/pegawai/$data->Foto")',
						'htmlOptions'=>array('style'=>'width: 100px;'),
					),
					array(
						'class'=>'bootstrap.widgets.TbButtonColumn',
						'htmlOptions'=>array('style'=>'width: 60px'),
						
					),
				),
			)

		); 	
			?>		
<?php else : ?>
	<?php 
	
	?>
<?php endif ?>
