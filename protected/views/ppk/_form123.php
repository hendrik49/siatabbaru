
<div class="form" >
<?php	/* Versi Lama
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'Pegawai-form-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array( 'enctype'=>'multipart/form-data'),
	)); */ 
?>
		  
	<?php /* ------- Form Input Inline ------------ */
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', 
		array(
			'id'=>'inlineForm',
			'type'=>'inline',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('class'=>'well','enctype'=>'multipart/form-data'),
	)); 
	?>
	<table>
	<td style="width: 250px;"><?php echo $form->labelEx($model,'Nama'); ?></td>
	<td ><?php echo $form->textField($model,'Nama',array('size'=>60,'maxlength'=>60)); ?></td>
	<td style="width: 100px;"><?php echo $form->error($model,'Nama'); ?></td>
	<tr>
	<td><?php echo $form->labelEx($model,'NIP'); ?></td>
	<td><?php echo $form->textField($model,'NIP',array('size'=>25,'maxlength'=>30)); ?></td>
	<td><?php echo $form->error($model,'NIP'); ?></td>
	</tr>
	<tr>
	<td style="width: 300px;"><?php echo $form->labelEx($model,'Email'); ?></td>
	<td ><?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>60)); ?></td>
	<td style="width: 100px;"><?php echo $form->error($model,'Email'); ?></td>
	</tr>	
	<tr>
	<td><?php echo $form->labelEx($model,'Alamat'); ?></td>
	<td><?php echo $form->textArea($model,'Alamat',array('rows'=>3,'cols'=>40)); ?></td>
	<td style="width: 100px;"><?php echo $form->error($model,'Alamat'); ?></td>
	</tr>	
	<tr>
	<td><?php echo $form->labelEx($model,'NoTelp'); ?></td>
	<td><?php echo $form->textField($model,'NoTelp',array('size'=>14,'maxlength'=>15)); ?></td>
	<td style="width: 100px;"><?php echo $form->error($model,'NoTelp'); ?></td>
	</tr>	
	<td><?php echo $form->labelEx($model,'Golongan'); ?></td>
	<td><?php echo $form->textField($model,'Golongan',array('size'=>40,'maxlength'=>60)); ?></td>
	<td style="width: 100px;"><?php echo $form->error($model,'Golongan'); ?></td>
	</tr>	
	</tr><div class="row">
	<td><?php echo $form->labelEx($model,'Foto'); ?>
	<td><?php echo $form->textField($model,'Foto',array('size'=>40,'maxlength'=>60)); ?></td>
	<td style="width: 100px;"><?php echo $form->error($model,'Foto'); ?></td> </div>
	</tr>	
	</table>
	
	
	
	<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Simpan')); ?>
	
	

	

	
	
	
	
	
	
	
	<!--<div class="row buttons" style="margin-left: 20px;">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Save');  ?>
	</div>-->
	
<?php 
	$this->endWidget();
?>

</div><!-- form -->