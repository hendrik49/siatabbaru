<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form" style="margin-left:100px;">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php //echo $form->errorSummary($model); ?>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'ID_User'); ?>
		<?php if (isset($model->ID_User)) : ?>
			<?php echo $form->textField($model,'ID_User',array('size'=>1,'maxlength'=>5,'readonly'=>true)); ?>
		<?php else : ?>
		<?php echo CHtml::textField('User[ID_User]',User::getAvailableUserId(),array('size'=>1,'maxlength'=>5,'readonly'=>true)); ?>
		<?php endif ?>
		<?php echo $form->error($model,'ID_User'); ?>
	</div>
	<?php User::getAvailableUserId(); ?>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'Nama'); ?>
		<?php echo $form->textField($model,'Nama',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HakAkses'); ?>
		<?php echo $form->dropDownList($model,'HakAkses',User::lookupHakAkses()); ?>
		<?php echo $form->error($model,'HakAkses'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah User' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->