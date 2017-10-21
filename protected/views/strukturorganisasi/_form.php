<div class="form" style="padding-left:35px">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'album-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

	<p>Fields dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo $form->labelEx($model,'NamaJabatan'); ?>
	<?php echo $form->textField($model,'NamaJabatan',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'NamaStrukturOrganisasi'); ?>	
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'Nama'); ?>
	<?php echo $form->textField($model,'Nama',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'Nama'); ?>	
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Deskripsi'); ?>
		<?php echo $form->textField($model,'Deskripsi',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'Link'); ?>
		<?php echo $form->FileField($model,'Link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Link'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->