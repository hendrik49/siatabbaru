<?php
/* @var $this PetaController */
/* @var $model Peta */
/* @var $form CActiveForm */
?>

<div style="margin-left: 60px;" class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'peta-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

	<p class="note">Field dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NamaPeta'); ?>
		<?php echo $form->textField($model,'NamaPeta',array('size'=>58,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'NamaPeta'); ?> <br/>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FilePeta1'); ?>
		<?php echo $form->fileField($model,'FilePeta1',array('size'=>58,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'FilePeta1'); ?> <br/>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'FilePeta2'); ?>
		<?php echo $form->fileField($model,'FilePeta2',array('size'=>58,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'FilePeta2'); ?> <br/>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Jenis'); ?>
		<?php echo $form->dropDownList($model,'Jenis', array('Poly'=>'Polygon','Point'=>'Point', 'Line'=>'Line')); ?>
		<?php echo $form->error($model,'Jenis'); ?>
	</div>
	<?php if (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Status'); ?>
		<?php echo $form->dropDownList($model,'Status', array(Peta::statusPublished=>'Tampilkan di Peta Interaktif',Peta::statusDraft=>'Tidak ditampilkan')); ?>
		<?php echo $form->error($model,'Status'); ?>
	</div>

	<?php endif ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kirim' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->