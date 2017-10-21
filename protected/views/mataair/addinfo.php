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
<tr><td colspan="4"><?php 

	if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : 
		$model->ID_IDBalaiJu = (Yii::app()->user->uid - 1);
		if (isset($model->NoDataJu)){
			$model->NoDataJu = $model->NoDataJu;
		}
		else
		if($model->NoDataJu == TeknisGaMa::getNoDataByAdmin()){
			$model->NoDataJu = TeknisGaMA::getNoDataByAdmin();
		}
		else{
			$model->NoDataJu = KondisiMA::getAvailableNoData();
		}
		//$model->kode_bidang = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'mataair.kodefikasi',
				'NoDataJu',
				),
			)); 
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php $model->ID_IDBalaiJu = (Yii::app()->user->uid); 
	//$model->provinsi = Unitkerja::getProvByAdmin();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalaiJu',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php //echo $form->textFieldRow($model,'sumurs.kode_bidang',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoDataJu',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>
	<div>
	<?php echo $form->dropDownListRow($model,'baku_mutuair',
	array('Kelas 1'=>'Kelas 1', 'Kelas 2'=>'Kelas 2', 'Kelas 3'=>'Kelas 3', 'Kelas 4'=>'Kelas 4')); ?>
	<?php echo $form->textFieldRow($model,'konduktivitas'); ?>
	<?php echo $form->textFieldRow($model,'nilai_storativitas'); ?>
	<?php echo $form->textFieldRow($model,'nilai_tranmisivitas'); ?>
	<?php echo $form->textFieldRow($model,'sumber_pendanaan'); ?>
	<?php echo $form->textFieldRow($model,'instansi_pembangun'); ?>
	</div>
</td>
<td>
	<div style="/*margin-left: -175px;*/">
	<?php echo $form->fileFieldRow($model,'dokumen_pendukung',array('class'=>'input-small')); ?>
	<?php echo $form->fileFieldRow($model,'foto1');?>
	<?php echo $form->fileFieldRow($model,'foto2');?>
	<?php echo $form->fileFieldRow($model,'foto3');?>
	<?php echo $form->fileFieldRow($model,'foto4');?>
	<?php echo $form->fileFieldRow($model,'foto5');?>
	</div>
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