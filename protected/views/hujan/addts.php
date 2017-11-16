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
		$model->ID_IDBalaiGa = (Yii::app()->user->uid - 1);
		if (isset($model->NoDataGa)){
			$model->NoDataGa = $model->NoDataGa;
		}
		else
		if($model->NoDataGa == ManfaatHujan::getNoDataByAdmin()){
			$model->NoDataGa = ManfaatHujan::getNoDataByAdmin();
		}
		else{
			$model->NoDataGa = TeknisHujan::getAvailableNoData();
		}
		//$model->kode_bidang = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'hujan.kodefikasi',
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
<tr>
<td><div style="">
		<div style="padding-top: 5px;"><?php echo $form->textFieldRow($model,'curah_hujan',array('class'=>'input-small')); ?></div>
		<div style="margin-top: -20px;"><?php echo $form->textFieldRow($model,'durasi_hujan',array('class'=>'input-small')); ?></div>
		<div style="margin-top: -20px;"><?php echo $form->textFieldRow($model,'luas_atap',array('class'=>'input-small')); ?></div>
		<div style="margin-top: -20px;"><?php echo $form->textFieldRow($model,'debit_andalan',array('class'=>'input-small')); ?></div>
		<div style=""><?php echo $form->textFieldRow($model,'debit_awal',array('class'=>'input-small')); ?></div>
	</div>
</td>
<td>
	<div style="">
		<div style="padding-top: 5px;"><?php echo $form->textFieldRow($model,'debit_idle',array('class'=>'input-small')); ?></div>
		<div><?php echo $form->dropDownListRow($model,'status_aset',array('Warga'=>'Warga',
		'Hibah'=>'Hibah', 'Dibebaskan'=>'Dibebaskan'),array('class'=>'input-small')); ?></div>
		<div><?php echo $form->textFieldRow($model,'jumlah_bangunan',array('class'=>'input-small')); ?></div>
		<div><?php echo $form->textFieldRow($model,'luas_bangunan',array('class'=>'input-small')); ?></div>
		<div><?php echo $form->textFieldRow($model,'kapasitas_tampung',array('class'=>'input-small')); ?></div>
	</div>
</td>
<td>
	<div style="margin-top: -20px;">
	
	<div  style="padding-top: 5px;"><?php echo $form->dropDownListRow($model,'jenis_penampung',array('Tandon'=>'Tandon', 
		'Bak'=>'Bak'),array('class'=>'input-small')); ?>
		</div>
	<div><?php echo $form->dropDownListRow($model,'bahan',array('Ferro Semen'=>'Ferro Semen', 'Pasangan Bata'=>'Pasangan Bata',
		'Fiberglass Reinforced Plastic'=>'Fiberglass Reinforced Plastic'),array('class'=>'input-small')); ?>
		</div>
	<div><?php echo $form->dropDownListRow($model,'jenis_saringan',array('Saringan Kasar Naik Turun'=>'Saringan Kasar Naik Turun', 
		'Saringan Pasir Cepat'=>'Saringan Pasir Cepat', 'Saringan Pasir Lambat'=>'Saringan Pasir Lambat', 'Ijuk'=>'Ijuk',
		'Karbon Aktif'=>'Karbon Aktif', 'Fiber Filter'=>'Fiber Filter'),array('class'=>'input-small')); ?>
		</div>
	<div><?php echo $form->textFieldRow($model,'pj_airbaku',array('class'=>'input-small')); ?></div>
	<div style="margin-top: -20px;"><?php echo $form->textFieldRow($model,'hidran_umum',array('class'=>'input-small')); ?></div>
	</div>
</td>
</tr>
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