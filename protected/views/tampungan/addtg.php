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
		$model->ID_IDBalaiMa = (Yii::app()->user->uid - 1);
		if (isset($model->NoDataMa)){
			$model->NoDataMa = $model->NoDataMa;
		}
		else
		if($model->NoDataMa == TeknisTampungan::getNoDataByAdmin()){
			$model->NoDataMa = TeknisTampungan::getNoDataByAdmin();
		}
		else{
			$model->NoDataMa = TeknisWaTampungan::getAvailableNoData();
		}
		//$model->kode_bidang = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'tampungan.kodefikasi',
				'NoDataMa',
				),
			)); 
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php $model->ID_IDBalaiMa = (Yii::app()->user->uid); 
	//$model->provinsi = Unitkerja::getProvByAdmin();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalaiMa',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php //echo $form->textFieldRow($model,'sumurs.kode_bidang',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoDataMa',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>	
	<?php echo $form->textFieldRow($model,'tahun_bangun'); ?>
	<?php echo $form->textFieldRow($model,'rehab'); ?>
	<?php echo $form->textFieldRow($model,'rencana_rehab'); ?>
	<?php echo $form->textFieldRow($model,'nama_lembaga'); ?>
	<?php echo $form->textFieldRow($model,'legalitas'); ?>
	<?php //echo $form->textFieldRow($model,'tahun_berdiri'); ?>
</td>
<td>
	<div style="margin-top: -35px;">
	<?php echo $form->textFieldRow($model,'perizinan'); ?>
	<?php echo $form->textFieldRow($model,'no_kontrak'); ?>
	<?php echo $form->dropDownListRow($model,'status_kelola',array('Sudah'=>'Sudah', 'Belum'=>'belum', 'dihibahkan'=>'dihibahkan')); ?>
	<?php echo $form->dropDownListRow($model,'status_operasi',array('Operasi'=>'Operasi', 'Tidak Operasi'=>'Tidak Operasi', 'Tidak Aktif'=>'Tidak Aktif')); ?>
	<?php echo $form->textFieldRow($model,'keterangan'); ?>
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