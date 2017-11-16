<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'excel-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<div class="row">
                <b>Masukkan Kata Kunci :</b>
		<?php echo $form->fileField($model,'filee',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo CHtml::submitButton('Search'); ?>
	</div>
        
<?php $this->endWidget(); ?>
</div>