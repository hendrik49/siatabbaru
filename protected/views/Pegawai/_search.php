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
		<?php echo $form->label($model,'Kode_Sumur'); ?>
		<?php echo $form->textField($model,'Kode_Sumur',array('size'=>10,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Lokasi'); ?>
		<?php echo $form->textField($model,'Lokasi',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Jenis_Sumur'); ?>
		<?php echo $form->textField($model,'Jenis_Sumur',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->