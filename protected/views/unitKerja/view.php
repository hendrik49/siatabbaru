<?php
/* @var $this UnitKerjaController */
/* @var $model UnitKerja */

$this->breadcrumbs=array(
	'Unit Kerja'=>array('index'),
	$model->NamaUnitKerja,
);
?>


<div style="background: #fcd13c; width: 44%">  
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->uid == $model->ID_Admin)) : ?>
<legend><span style="margin-left: 10px;">Anda Login Sebagai Admin Balai ini<span style="margin-left: 20px;">|<span style="margin-left: 20px;">
<?php //echo CHtml::link('Edit Data', array('unitKerja/update/','id'=>$model->ID));  
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'Link',
		'type'=>'primary',
		'label'=>'Edit Data',
		'url'=>array('unitKerja/update/','id'=>$model->ID),
		
		));
?><?php endif ?></legend></div>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'NamaUnitKerja',
				'admin.Nama',
				'AlamatUnitKerja',
				'CakupanWilayahKerja',
				//'KodeProv',
				'Provinsi',
				'Lat',
				'Lang',
					array(
						'name'=>'Gambar',
						'type'=>'raw',
						'value'=>'<img width="200px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'.$model->NamaUnitKerja.'/'.$model->Gambar.'"/>',
					),
				),
			)); 
?>
