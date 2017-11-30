<?php
/* @Bitartik Group */

	$this->breadcrumbs=array(
	'Neraca'=>array('index'),
	$model->ID,
);

?>	
<div class="span11"><h3>Anda Login Sebagai Admin (<?php UnitKerja::getUnitKerjaByAdmin() ?>) |
<?php 
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'Link',
		'type'=>'primary',
		'label'=>'Edit Data',
		'url'=>array('update','id'=>$model->ID),
	));
?></h3></div>
	<div class="span12">
		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'Nrw', 'PopulasiKabKota', 'TargetJiwa', 'TotalABKabKota', 'JiwaTerlayani', 'JiwaBelumTerlayani', 
				'KebutuhanAirBaku', 'provinsi', 'NamaBalai', 'KabKota', 'JTOL', 
				),
			)); 
		?>		
	</div>