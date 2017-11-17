<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'Sumur-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
)); 
include '../siatab/connect.php';
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
			$model->NoData = Sumur::getAvailableNoData();
		}

		
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
	//$model->provinsi = Unitkerja::getProvByAdmin();
	$model->nama_ws = Unitkerja::getNamaWS();
	$model->NamaBalai = Unitkerja::getNamaUnitKerjaByAdmin();
	$model->kriteria = "Air Tanah";
	$datakota = Provinsi::getKodeByProv($model->provinsi);
	?>
		<div class="span8" style="visibility: hidden; position:absolute;">
		<div class="collapse">
		<?php  
			$model->kodefikasi = "33060900000000" + ($datakota * 1000000) + $model->NoData;	
		?>
		</div>
		</div>
	<?php echo $form->textFieldRow($model,'ID_IDBalai',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'kodefikasi',array('id'=>'KodeFikasi')); ?>
	<?php echo $form->textFieldRow($model,'NoData',array('id'=>'NoUData')); ?>
	<?php echo $form->textFieldRow($model,'nama_ws');?>
	<?php echo $form->textFieldRow($model,'NamaBalai');?>
	<?php echo $form->textFieldRow($model,'kriteria');?>
	</div>
	</td>
</tr>
<td>
	<?php $test =""; ?>
	<?php echo $form->textFieldRow($model,'nama_ws'); ?>
	<?php echo $form->textFieldRow($model,'nama_das',array('size'=>25,'maxlength'=>30)); ?>
	<?php echo $form->textFieldRow($model,'nama_cat');?>

	<?php echo $form->dropDownListRow($model,'provinsi', CHtml::listData(Provinsi::model()->findAll(),'Nama_provinsi','Nama_provinsi'),
		array(
		'prompt'=>'Pilih Propinsi', 
		'value'=>'0',
		'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('Sumur/setKot'), // panggil filter kabupaten di controller
		'update'=>'#Sumur_kota', //selector to update
		'data'=>array('provinsi'=>'js:this.value'),
		))); ?>

	<?php  echo $form->dropDownListRow($model,'kota', CHtml::listData(Kota::model()->findAll(),'id_prov','kab')); ?>
	
</td>
<td>
	<!--<fieldset>-->
	
	
	<?php echo $form->textFieldRow($model,'kecamatan',array('size'=>30,'maxlength'=>60)); ?>
	<?php echo $form->textFieldRow($model,'desa'); ?>
	<?php echo $form->textFieldRow($model,'lintang_selatan'); ?>
	<?php echo $form->textFieldRow($model,'bujur_timur'); ?>
	<?php echo $form->textFieldRow($model,'elevasi_sumur'); ?>
	<?php echo $form->dropDownListRow($model,'status',array('Rencana'=>'Rencana','Operasi'=>'Operasi')); ?>
		
	<!--</fieldset>-->
</td>
<td>


</td>
</table>

	<?php  
	$this->widget('bootstrap.widgets.TbButton', array(
		'id'=>'dasar',
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Simpan',
		));
	
	?>

<?php $this->endWidget(); 
	
?>



<script>
	
</script>
</html>