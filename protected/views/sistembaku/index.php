<?php

$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Sistem Air Baku',
);
?>
<style type="text/css">
	table{margin:0 auto;width:95%;border-collapse:collapse;background:#ecf3eb; font-size: 10.7px;}
	/*th{padding:6px 3px;background: #fbc50b;}*/
	th{padding:6px 3px;background: #fbc50b;}
</style>
		
		
<b>Kelola Sistem Air Baku</b>
	
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?> | 
	<?php $datacomp = 0;
		$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'primary',
			'label'=>'Tambah',
			'url'=>'/siatab/sistembaku/add',
			'htmlOptions'=>array('data-dismiss'=>'CHtml'),
		)); 
	?>
	<?php //$this->renderPartial('//sumurs/search', array('model'=>$model)); ?>
	<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'SistemBaku',
			//'dataProvider'=>$model->search(),
			'dataProvider'=>$dataProvider,
			//'filter'=>$model,
			'template'=>"{items}",
			'columns'=>array( 'ID_Sistem', 'Nama_Sistem', 'ID_Balai_Sistem',
			array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("sistembaku/view", array("id"=>$data->ID_Balai_Sistem))'),
				), 
				),
			)

		); 		
	?>		
<?php else : ?>
	<?php 
		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'SistemBaku',
			//'dataProvider'=>$model->search(),
			'dataProvider'=>$dataProvider,
			//'filter'=>$model,
			'template'=>"{items}",
			'columns'=>array('ID_Sistem', 'Nama_Sistem', 'ID_Balai_Sistem',
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{Lihat}',
				'buttons'=>array(
					'Lihat'=>array(
						'label'=>'Lihat',
						'url'=>'Yii::app()->createUrl("sistembaku/view", array("id"=>$data->ID_Balai_Sistem))',
						//'imageUrl'=> Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/gridview/tamu-view.png',
					),
				),
		),


			),	
					)
				); 	
	?>
<?php endif ?>
