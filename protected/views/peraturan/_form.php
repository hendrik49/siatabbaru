<div class="form" style="padding-left:35px">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'album-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="span10">
		<div class="span3">
			<div class="row">
			<?php echo $form->labelEx($model,'NoPeraturan'); ?>
			<?php echo $form->textField($model,'NoPeraturan',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'NoPeraturan'); ?>	
			</div>
		</div>
		<div class="span3">
			<div class="row">
			<?php echo $form->labelEx($model,'NamaPeraturan'); ?>
			<?php echo $form->textField($model,'NamaPeraturan',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'NamaPeraturan'); ?>	
			</div>
		</div>
	
		<div class="span3">
			<div class="row">
			<?php echo $form->labelEx($model,'status'); ?>
			<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'status'); ?>
			</div>
		</div>
	</div>
	<br></br>
	<div class="row">
		<?php echo $form->labelEx($model,'Deskripsi'); ?>
		<?php echo $form->textArea($model,'Deskripsi',array('rows'=>4, 'name'=>'editor1', 'id'=>'editor1', 'class'=>'ckeditor','cols'=>50)); ?>
		<?php echo $form->error($model,'Deskripsi'); ?>
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