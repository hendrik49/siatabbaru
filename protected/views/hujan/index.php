<?php
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Baku'=>array('/sistembaku/listbaku'),
	'Air Hujan',
);
?>
<style type="text/css">

</style>
		
		
<b>Kelola Data Air Baku (PAH)</b>
	
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?> | 
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Tambah', 'url'=>'/siatab/hujan/tambah'),
            array('items'=>array(
                array('label'=>'Sumber Air/ Reservoar', 'url'=>'/siatab/hujan/tambah'),
                array('label'=>'Sistem Air Baku', 'url'=>'/siatab/sistembaku/add'),
                '---',
            )),
        ),
    )); ?>
	<?php //$this->renderPartial('//sumurs/search', array('model'=>$model)); ?>
	<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'DataSumur',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'template'=>"{items}",
			'columns'=>array(
				array('name'=>'NoData', 'htmlOptions'=>array('style'=>'width: 40px')),
				array('name'=>'kodefikasi', 'htmlOptions'=>array('style'=>'width: 120px')),
				'nama_sistem', 'nama_ws', 'nama_das', 'provinsi', 'kota',
			array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{delete}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("hujan/delete", array("id"=>$data->ID))'),
				), 
				),
			)

		); 		
	?>		
<?php else : ?>
	<?php 
		$balai[0]="balai";
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'DataSumur',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'template'=>"{items}",
			'columns'=>array(
				array('name'=>'NoData', 'htmlOptions'=>array('style'=>'width: 40px')),
				array('name'=>'kodefikasi', 'htmlOptions'=>array('style'=>'width: 120px')),
				'nama_sistem', 'nama_ws', 'nama_das', 'provinsi', 'kota',
			array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{delete}', 'buttons'=>array(
				'viewButtonUrl'=>'Yii::app()->createUrl("hujan/delete", array("id"=>$data->ID))'),
			), 


			),	
					)
				); 	
	?>
<?php endif ?>
