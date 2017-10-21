<?php
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Neraca'=>array('/neraca/index'),
);
?>

<b>Kelola Data Neraca</b>
	
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?> | 
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Tambah', 'url'=>'/siatab/neraca/add'),

        ),
    )); ?>
	<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'',
			'dataProvider'=>$dataProvider,
			//'filter'=>$model,
			'columns'=>array(
				array(
					'name'=>'Tanggal',
					'value'=>'date("d / m / Y", $data->Tanggal)',
				),
				'NamaBalai', 'kota', 'PopulasiKabKota', 'TotalABKabKota', 'JiwaTerlayani', 'JiwaBelumTerlayani', 
				array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("neraca/view/", array("id"=>$data->ID))'),
				), 
			),
			)

		); 		
	?>		
<?php else : ?>
	<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'',
			'dataProvider'=>$dataProvider,
			//'filter'=>$model,
			'columns'=>array(
				array(
					'name'=>'Tanggal',
					'value'=>'date("d / m / Y", $data->Tanggal)',
				),
				'NamaBalai', 'kota', 'PopulasiKabKota', 'TotalABKabKota', 'JiwaTerlayani', 'JiwaBelumTerlayani', 
				array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("neraca/view/", array("id"=>$data->ID))'),
				), 
			),

		)); 	
	?>
<?php endif ?>
