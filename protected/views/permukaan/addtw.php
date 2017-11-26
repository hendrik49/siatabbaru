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
<tr><td colspan="2"><?php 

	if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : 
		$model->ID_IDBalaiPat = (Yii::app()->user->uid - 1);
		if (isset($model->NoDataPat)){
			$model->NoDataPat = $model->NoDataPat;
		}
		else
		if($model->NoDataPat == ManfaatPermukaan::getNoDataByAdmin()){
			$model->NoDataPat = ManfaatPermukaan::getNoDataByAdmin();
		}
		else{
			$model->NoDataPat = TeknisPermukaan::getAvailableNoData();
		}
		//$model->kode_bidang = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'permukaan.kodefikasi',
				'NoDataPat',
				),
			)); 
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php $model->ID_IDBalaiPat = (Yii::app()->user->uid); 
	//$model->provinsi = Unitkerja::getProvByAdmin();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalaiPat',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php //echo $form->textFieldRow($model,'sumurs.kode_bidang',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoDataPat',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>
	<div style="/*margin-top: -35px;*/">
	<?php echo $form->dropDownListRow($model,'status_aset',array('Warga'=>'Warga', 'Hibah'=>'Hibah', 'Dibebaskan'=>'Dibebaskan')); ?>
	<?php echo $form->textFieldRow($model,'luas_bangunan'); ?>
	<?php echo $form->textFieldRow($model,'jumlah_bangunan'); ?>
	<?php echo $form->textFieldRow($model,'pj_airbaku'); ?>

	</div>
</td>
<td>
	<?php echo $form->textFieldRow($model,'reservoar'); ?>
	<?php echo $form->textFieldRow($model,'hidran_umum'); ?>
	<?php echo $form->dropDownListRow($model,'bendung',array('Tetap'=>'Tetap', 'Gerak'=>'Gerak', 'Karet'=>'Karet')); ?>
	<?php echo $form->dropDownListRow($model,'jenis_intake',array('Free Intake'=>'Free Intake', 'Jembatan'=>'Jembatan', 'Ponton'=>'Ponton', 'Sumuran'=>'Sumuran', 'Tyroller'=>'Tyroller')); ?>
	<?php //echo $form->textFieldRow($model,'jumlah_boxbagi',array('class'=>'input-small')); ?>
	<?php //echo $form->textFieldRow($model,'jumlah_splingker',array('class'=>'input-small')); ?>
	<table><td><?php //echo $form->textFieldRow($model, 'mt1', array('class'=>'input-small')); ?></td>
	<td><div style="margin-left:-140px;"><?php //echo $form->textFieldRow($model, 'mt2', array('class'=>'input-small')); ?></div></td>
	</td></table>
	<?php //echo $form->textFieldRow($model, 'mt3', array('class'=>'input-small')); ?>
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