<?php
/* @Bitartik Group */

$this->breadcrumbs=array(
	'Data Satker'=>array('index'),
	'Tambah',
);
?>
<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

<fieldset>
    <legend>Input Data Satker</legend>
	<?php echo $form->textFieldRow($model,'Nama',array('size'=>60,'maxlength'=>60)); ?>
	<?php echo $form->textFieldRow($model,'NIP',array('size'=>25,'maxlength'=>30)); ?>
	<?php echo $form->textFieldRow($model,'Email',array('size'=>60,'maxlength'=>60)); ?>
	<?php echo $form->textAreaRow($model,'Alamat',array('rows'=>3,'cols'=>40)); ?>
	<?php echo $form->textFieldRow($model,'NoTelp',array('size'=>14,'maxlength'=>15)); ?>
	<?php echo $form->textFieldRow($model,'Golongan',array('size'=>40,'maxlength'=>60)); ?>
	<?php echo $form->fileFieldRow($model, 'Foto'); ?>
</fieldset>
 
<div class="form-actions"> 
    <?php  
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Simpan',
		));
		
	?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
 
<?php $this->endWidget(); ?>