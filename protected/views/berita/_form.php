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
	<?php echo $form->labelEx($model,'NamaBerita'); ?>
	<?php echo $form->textField($model,'NamaBerita',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'NamaBerita'); ?>	
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'Kategori'); ?>
	<?php echo $form->textField($model,'Kategori',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'Kategori'); ?>	
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Deskripsi'); ?>
		<?php echo $form->textArea($model,'Deskripsi',array('rows'=>6, 'class'=>'ckeditor','cols'=>50)); ?>
		<?php echo $form->error($model,'Deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo CHtml::dropDownList('status', $model, 
              array('1' => 'Terbit', '0' => 'Draft'),
              array('empty' => '(Pilih Status Terbit)'));?>
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