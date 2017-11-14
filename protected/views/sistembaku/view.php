<?php
/* @Bitartik Group */

$this->breadcrumbs=array(
	'Sistem Air Baku'=>array('index'),
	$model->ID,
);

?>

<div style="background: #fcd13c; width: 44%">  
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
<legend><span style="margin-left: 10px;">Anda Login Sebagai Admin Balai ini<span style="margin-left: 20px;">|<span style="margin-left: 20px;">
<?php //echo CHtml::link('Edit Data', array('unitKerja/update/','id'=>$model->ID));  
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'Link',
		'type'=>'primary',
		'label'=>'Edit Data',
		'url'=>array('sumurs/update/','id'=>$model->ID),
		
		));
?><?php endif ?></legend></div>
		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
					'ID', 'Nama_Sistem', 'ID_Balai_Sistem', 'ID_Sistem',
				),
			)); 
		?>
		</tr>



</html>