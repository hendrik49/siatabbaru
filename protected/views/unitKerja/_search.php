<?php
/* @var $this UnitKerjaController */
/* @var $model UnitKerja */
/* @var $form CActiveForm */
?>
<div class="span6">
<?php
/*
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
	'htmlOptions'=>array('class'=>'well'),
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	)); 
*/
	 $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); 
?>
	<div class="span6"><?php echo $form->textField($model,'NamaUnitKerja'); ?></div>
	<div class="span1"><?php echo CHtml::submitButton('Search'); ?></div>
</div>
	<!--<div class="row">-->
		<?php //echo $form->label($model,'NamaUnitKerja'); ?>
		<?php //echo $form->textField($model,'NamaUnitKerja'); ?>
	<!--</div>-->

	<!--<div class="row">
		<?php //echo $form->label($model,'ID_Admin'); ?>
		<?php //echo $form->textField($model,'ID_Admin',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'NamaUnitKerja'); ?>
		<?php //echo $form->textField($model,'KodeProv'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'ID_Admin'); ?>
		<?php //echo $form->textField($model,'Provinsi',array('size'=>20,'maxlength'=>20)); ?>
	</div>
	<div class="row">
		<?php //echo $form->label($model,'ID_Admin'); ?>
		<?php //echo $form->textField($model,'CakupanWilayahKerja',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php //echo CHtml::submitButton('Search'); ?>
	</div>-->

<?php $this->endWidget(); ?>
<!-- search-form -->