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
			$model->NoData = MataAir::getAvailableNoData();
		}
		$datakota = Provinsi::getKodeByProv($model->provinsi);
		$model->kodefikasi = "33060800000000" + ($datakota * 1000000) + $model->NoData;	
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
	$model->kriteria = "Mata Air";
	$model->nama_ws = Unitkerja::getNamaWS();
	$model->NamaBalai = Unitkerja::getNamaUnitKerjaByAdmin();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalai',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'kodefikasi',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoData',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'nama_ws');?>
	</div>
	</td>
</tr>
<td>

	<?php echo $form->textFieldRow($model,'data_dasar'); ?>
	<?php echo $form->dropDownListRow($model,'nama_sistem',SistemBaku::lookupNamaSistem()); ?>
	<?php echo $form->textFieldRow($model,'nama_objek'); ?>
	<?php echo $form->textFieldRow($model,'tahun_data',array('size'=>14,'maxlength'=>15)); ?>
	<?php echo $form->textFieldRow($model,'nama_das',array('size'=>25,'maxlength'=>30)); ?>
	<?php echo $form->textFieldRow($model,'nama_cat');?>
	<?php echo $form->dropDownListRow($model,'provinsi', CHtml::listData(Provinsi::model()->findAll(),'Nama_provinsi','Nama_provinsi'),
		array(
		'prompt'=>'Pilih Propinsi', 
		'value'=>'0',
		'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('MataAir/setKot'), // panggi filter kabupaten di controller
		'update'=>'#MataAir_kota', //selector to update
		'data'=>array('provinsi'=>'js:this.value'),
		))); ?>

	

</td>
<td>
	<!--<fieldset>-->
	<?php  echo $form->dropDownListRow($model,'kota', CHtml::listData(Kota::model()->findAll(),'id_prov','kab')); ?>
	<?php echo $form->textFieldRow($model,'kecamatan',array('size'=>30,'maxlength'=>60)); ?>
	<?php echo $form->textFieldRow($model,'desa'); ?>
	<?php echo $form->textFieldRow($model,'lintang_selatan'); ?>
	<?php echo $form->textFieldRow($model,'bujur_timur'); ?>
	<?php echo $form->textFieldRow($model,'elevasi'); ?>
	<?php echo $form->dropDownListRow($model,'status',
	array('Operasi'=>'Operasi', 'Rencana'=>array('Perlu Studi'=>'Perlu Studi', 'Sudah Studi'=>'Sudah Studi', 'Siap'=>'Siap'),
	'Berjalan'=>'Berjalan')); ?>

		
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