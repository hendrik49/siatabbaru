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
		$model->ID_IDBalaiGa = (Yii::app()->user->uid - 1);
		if (isset($model->NoDataGa)){
			$model->NoDataGa = $model->NoDataGa;
		}
		else
		if($model->NoDataGa == ManfaatPermukaan::getNoDataByAdmin()){
			$model->NoDataGa = ManfaatPermukaan::getNoDataByAdmin();
		}
		else{
			$model->NoDataGa = TeknisPermukaan::getAvailableNoData();
		}
		//$model->kode_bidang = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'permukaan.kodefikasi',
				'NoDataGa',
				),
			)); 
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php $model->ID_IDBalaiGa = (Yii::app()->user->uid); 
	//$model->provinsi = Unitkerja::getProvByAdmin();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalaiGa',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php //echo $form->textFieldRow($model,'sumurs.kode_bidang',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoDataGa',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>
	<?php echo $form->dropDownListRow($model,'sistem',array('Pompa'=>'Pompa', 'Gravitasi'=>'Gravitasi')); ?>
	<?php echo $form->dropDownListRow($model,'jenis_pompa',array('Sentrifugal'=>'Sentrifugal', 'Turbin'=>'Turbin', 'Submersible'=>'Submersible')); ?>
	<?php echo $form->textFieldRow($model,'head_pompa'); ?>
	<?php echo $form->textFieldRow($model,'tahun_pengadaan'); ?>
	<?php echo $form->textFieldRow($model,'listrik'); ?>
	<?php echo $form->textFieldRow($model,'genset'); ?>
</td>
<td>
	<div style="margin-top: -35px;">
	<?php echo $form->textFieldRow($model,'solar_cell'); ?>
	<?php echo $form->textFieldRow($model,'lain_lain'); ?>
	<?php echo $form->textFieldRow($model,'debit_andal'); ?>
	<?php echo $form->textFieldRow($model,'debit_awal'); ?>
	<?php //echo $form->textFieldRow($model,'his_ID'); ?>
	<?php echo $form->textFieldRow($model,'debit_idle'); ?>
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