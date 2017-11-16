<?php
/* Bitartic Group */
$this->breadcrumbs=array(
	'Migrasi Data',
);
?>

<h3 class="h-view" style="padding-top:2px;">
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>
</h3>
<form method="post" enctype="multipart/form-data" action="<?php echo Yii::app()->baseUrl; ?>/dbrencana/addm">
<h3>Silakan Pilih File Excel : <input name="userfile" type="file"> 
<?php 
$this->widget('bootstrap.widgets.TbButton', array(
	'id'=>'upload',
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Import',
	));
?>
</h3>
</form>



<?php
$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'DTBase',
			'dataProvider'=>$dataProvider,
			'columns'=>array( 
				array(
					'name'=>'Tanggal',
					'value'=>'date("d / m / Y", $data->Tanggal)',
				),
				'kdsatker', 'NamaSatker', 'NamaBalai', 'KdOutput', 'nmoutput', 'Kinerja', 'satm', 'vol1', 'st_outcome',
				array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("dbrencana/update/", array("id"=>$data->ID))'),
				), 
			),
			)

		); 
?>

<?php endif ?>
	

