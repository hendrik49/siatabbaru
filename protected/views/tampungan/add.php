<?php /** @var BootActiveForm $form */
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
<tr><td colspan="3"><?php 

	
	if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : 
		$model->ID_IDBalai = (Yii::app()->user->uid - 1);
		if (isset($model->NoData)){
			$model->NoData = $model->NoData;
		}
		else{
			$model->NoData = Tampungan::getAvailableNoData();
		}
		$model->kodefikasi = Unitkerja::getKodeProvByAdmin() + 107000000000 + (0 * 10000) + $model->NoData;
		
		$this->widget('bootstrap.widgets.TbDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'kodefikasi',
				'NoData',
				),
			)); 
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php $model->ID_IDBalai = (Yii::app()->user->uid); 
	$model->provinsi = Unitkerja::getProvByAdmin();
	$model->nama_ws = Unitkerja::getNamaWS();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalai',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'kodefikasi',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoData',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'nama_ws');?>
	<?php echo $form->textFieldRow($model,'provinsi',array('rows'=>3,'cols'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>

	<?php echo $form->textFieldRow($model,'data_dasar'); ?>
	<?php echo $form->dropDownListRow($model,'nama_sistem',SistemBaku::lookupNamaSistem()); ?>
	<?php echo $form->textFieldRow($model,'nama_objek'); ?>
	<?php echo $form->textFieldRow($model,'tahun_data',array('size'=>14,'maxlength'=>15)); ?>
	<?php echo $form->textFieldRow($model,'nama_das',array('size'=>25,'maxlength'=>30)); ?>
	<?php echo $form->dropDownListRow($model,'status',array('Rencana'=>'Rencana','Operasi'=>'Operasi')); ?>

</td>
<td>
	<!--<fieldset>-->
	
	<?php echo $form->dropDownListRow($model,'kota',Kota::lookupProvinsi()); ?>
	<?php echo $form->textFieldRow($model,'kecamatan',array('size'=>30,'maxlength'=>60)); ?>
	<?php echo $form->textFieldRow($model,'desa'); ?>
	<?php echo $form->textFieldRow($model,'lintang_selatan'); ?>
	<?php echo $form->textFieldRow($model,'bujur_timur'); ?>
	<?php echo $form->textFieldRow($model,'elevasi'); ?>

		
	<!--</fieldset>-->
</td>
<td>

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