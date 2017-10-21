<?php
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'DT-Base'=>array('/dbrencana'),
	'Detail Proses',
);
?>
<div class="span11"><h3>Anda Login Sebagai Admin Pusat (Bidang DT-Base) |
<?php 
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'Link',
		'type'=>'primary',
		'label'=>'Edit Data',
		'url'=>array('dbrencana/'),
	));
?></h3>
</div>
<div class="span5"> 
	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'kdsatker', 'NamaSatker', 'NamaBalai', 'KdOutput', 'nmoutput', 'Kinerja', 'Strategis', 
				'satm', 'vol1', 'st_outcome', 'vol2', 'rpm', 'rmp', 'apln', 'Jumlah',

				),
			)); 
	?>
</div>
<div class="span5" style="margin-left: -30px;"> 
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'nmkabkota', 'kewenangan', 'jk2', 'b_sp', 'swakelola', 'RTRW', 'SIPPA',
				'Permohonan', 'RKP_Renstra', 'DokumenLH', 'DokumenkesiapanLahan', 'FS_SID_DED', 'KAK_RAB', 'Keterangan',
				array(
					'name'=>'file_',
					'type'=>'raw',
					'value'=>'<a width="180px" href="'.Yii::app()->createUrl('/data/File/'.$model->file_.'').'">'.$model->file_.'</a>',
					),
				),
			)); 
	?>

</div>
