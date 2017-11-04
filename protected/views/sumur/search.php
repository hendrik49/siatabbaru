<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nama_ws'); ?>
		<?php echo $form->textField($model,'nama_ws'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_das'); ?>
		<?php echo $form->textField($model,'nama_das',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_cat'); ?>
		<?php echo $form->textField($model,'nama_cat',array('size'=>16,'maxlength'=>16)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'provinsi'); ?>
		<?php echo $form->textField($model,'provinsi',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->