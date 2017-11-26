<?php /** @var BootActiveForm $form */
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Baku'=>array('/sistembaku/listbaku'),
	'Tambah Sistem Air Baku',
);


$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">

<table style="background-color: #ffffff;">
<tr><td colspan="2"><?php 

	if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : 
		
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php 
		$model->ID_Balai_Sistem = Yii::app()->user->uid; 
		$model->ID_Sistem = SistemBaku::getAvailableSistemId();
	?>
	<?php echo $form->textFieldRow($model,'ID_Balai_Sistem',array('size'=>25,'maxlength'=>30)); ?>
	<?php echo $form->textFieldRow($model,'ID_Sistem',array('size'=>25,'maxlength'=>30)); ?>
	</div>
	</td>
</tr>
<td>
	<fieldset>
	<?php echo $form->textFieldRow($model,'Nama_Sistem',array('size'=>25,'maxlength'=>30)); ?>
	</fieldset>
</td>

</table>
	<?php  
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Simpan',
		));
	
	?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
<?php $this->endWidget(); ?>
</html>