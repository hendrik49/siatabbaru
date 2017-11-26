<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'Sumur-form',
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
		$model->ID_IDBalaiWa = (Yii::app()->user->uid - 1);
		if (isset($model->NoDataWa)){
			$model->NoDataWa = $model->NoDataWa;
		}
		else
		if($model->NoDataWa == Sumur::getNoDataByAdmin()){
			$model->NoDataWa = Sumur::getNoDataByAdmin();
		}
		else{
			$model->NoDataWa = ManfaatSumur::getAvailableNoData();
		}
		//$model->kodefikasi = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				//'admin.ID_User',
				'balai.AlamatUnitKerja',
				'sumur.kodefikasi',
				'NoDataWa',
				),
			)); 
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php $model->ID_IDBalaiWa = (Yii::app()->user->uid); 
	//$model->provinsi = Unitkerja::getProvByAdmin();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalaiWa',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php //echo $form->textFieldRow($model,'sumurs.kode_bidang',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoDataWa',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>
	<?php echo $form->textFieldRow($model,'jiwa'); ?>
	<?php echo $form->textFieldRow($model,'debit'); ?>
	<?php echo $form->textFieldRow($model,'desa1'); ?>
	<?php echo $form->textFieldRow($model,'kecamatan1'); ?>	
	<?php echo $form->textFieldRow($model,'tadah_awal'); ?>
	<?php echo $form->textFieldRow($model,'tadah_saatini'); ?>
</td>
<td>
	<?php echo $form->textFieldRow($model,'suplesi_awal'); ?>
	<?php echo $form->textFieldRow($model,'suplesi_saatini'); ?>
	<?php echo $form->textFieldRow($model,'desa2'); ?>
	<?php echo $form->textFieldRow($model,'kecamatan2'); ?>	
	<?php echo $form->fileFieldRow($model,'catchment_area',array('size'=>40,'maxlength'=>255)); ?>
	<?php if (isset($model->catchment_area) AND $model->catchment_area != '') : ?>
		 Upload jika ingin mengganti <?php echo $model->catchment_area; ?>
	<?php endif ?>
	<?php echo $form->fileFieldRow($model,'catchment_area1',array('size'=>40,'maxlength'=>255)); ?>
	<?php if (isset($model->catchment_area1) AND $model->catchment_area1 != '') : ?>
		 Upload jika ingin mengganti <?php echo $model->catchment_area1; ?>
	<?php endif ?>	
</td>
</table>
<?php  
	$this->widget('bootstrap.widgets.TbButton', array(
		'id'=>'manfaat',
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Simpan',
		));
	
	?>


<?php $this->endWidget(); ?>
</html>