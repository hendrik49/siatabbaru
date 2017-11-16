<?php
$this->breadcrumbs=array(
	'Peta'=>array('index'),
	'Upload/Kirim Peta',
);
?>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); 
?>	<div class="span5">
	<?php echo $form->textFieldRow($model,'NamaPeta'); ?>
	<?php echo $form->dropDownListRow($model, 'Jenis', array('Poly'=>'Polygon', 'Point'=>'Point', 'Line'=>'Line')); ?>
	
	<?php if (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?>
	<?php echo $form->dropDownListRow($model,'Status', array(Peta::statusPublished=>'Tampilkan di Peta Interaktif',Peta::statusDraft=>'Tidak ditampilkan')); ?>
	<?php endif ?>
	<center>
	<?php 
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Simpan',
		));
	
	?>
	</center>
	</div>
	<div class="span5">
	<?php echo $form->fileFieldRow($model,'FilePeta1');?>
	<?php echo $form->fileFieldRow($model,'FilePeta2');?>
	<?php echo $form->textFieldRow($model,'Keterangan'); ?>
	</div>

<?php $this->endWidget(); ?>