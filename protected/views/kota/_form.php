<?php
/* @var $this PetaController */
/* @var $model Peta */
/* @var $form CActiveForm */
?>

<div style="margin-left: 60px;" class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'peta-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'provinsi'); ?>
		<?php echo $form->dropDownList($model,'provinsi', CHtml::listData(Provinsi::model()->findAll(),'Nama_provinsi','Nama_provinsi'),
		array(
		'prompt'=>'Pilih Propinsi', 
		'value'=>'0',
		'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('Kota/setKot'), // panggi filter kabupaten di controller
		'update'=>'#Kota_id_prov', //selector to update
		'data'=>array('provinsi'=>'js:this.value'),
		))); ?>
		<?php echo $form->error($model,'provinsi'); ?>
	</div>

	
	<div class="row">
		<?php //echo $form->labelEx($model,'id_prov'); ?>
		<?php echo $form->dropDownList($model,'id_prov', CHtml::listData(Kota::model()->findAll(),'id_prov','kab')); ?>
		<?php echo $form->error($model,'id_prov'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->