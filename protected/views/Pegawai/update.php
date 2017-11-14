<?php
/* @bitartik Group */

$this->breadcrumbs=array(
	'Data Sumur-Edit'=>array('index'),
	$model->Nama=>array('update','id'=>$model->ID),
	'update',
);
?>

<!--<h2 class="form-add">Update/edit <?php echo $model->ID; ?></h2>-->

<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?><h2 class="h-view">Kelola Data Sumur | <?php echo CHtml::link('Lihat Data', array('Pegawai/view', 'id'=>$model->ID)); ?></h2><?php endif ?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

<fieldset>
    <legend>Input Data Pegawai</legend>
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

