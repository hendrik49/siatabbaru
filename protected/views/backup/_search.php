<?php
/* @var $this PetaController */
/* @var $model Peta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Judul'); ?>
		<?php echo $form->textField($model,'Judul',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Tanggal'); ?>
		<?php echo $form->textField($model,'Tanggal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RW'); ?>
		<?php echo $form->textField($model,'RW',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RT'); ?>
		<?php echo $form->textField($model,'RT',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->