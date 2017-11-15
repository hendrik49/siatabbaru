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
		if($model->NoDataJu == TeknisGaTampungan::getNoDataByAdmin()){
			$model->NoDataJu = TeknisGaTampungan::getNoDataByAdmin();
		}
		else{
			$model->NoDataJu = KondisiTampungan::getAvailableNoData();
		}
		//$model->kode_bidang = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'tampungan.kodefikasi',
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
	<?php echo $form->fileFieldRow($model,'foto1',array('size'=>30,'maxlength'=>255)); ?>
	<?php if (isset($model->foto1) AND $model->foto1 != '') : ?>
		Upload jika ingin mengganti <?php echo $model->foto1; ?>
	<?php endif ?>
	
	<?php echo $form->fileFieldRow($model,'foto2',array('size'=>30,'maxlength'=>255)); ?>
	<?php if (isset($model->foto2) AND $model->foto2 != '') : ?>
		Upload jika ingin mengganti <?php echo $model->foto2; ?>
	<?php endif ?>

	<?php echo $form->fileFieldRow($model,'foto3',array('size'=>30,'maxlength'=>255)); ?>
	<?php if (isset($model->foto3) AND $model->foto3 != '') : ?>
		Upload jika ingin mengganti <?php echo $model->foto3; ?>
	<?php endif ?>

	<?php echo $form->fileFieldRow($model,'foto4',array('size'=>30,'maxlength'=>255)); ?>
	<?php if (isset($model->foto4) AND $model->foto4 != '') : ?>
		Upload jika ingin mengganti <?php echo $model->foto4; ?>
	<?php endif ?>

	<?php echo $form->fileFieldRow($model,'foto5',array('size'=>30,'maxlength'=>255)); ?>
	<?php if (isset($model->foto5) AND $model->foto5 != '') : ?>
		Upload jika ingin mengganti <?php echo $model->foto5; ?>
	<?php endif ?>

	<?php echo $form->fileFieldRow($model,'video',array('')); ?>
	<?php if (isset($model->video) AND $model->video != '') : ?>
		Upload jika ingin mengganti <?php echo $model->video; ?>
	<?php endif ?>


	</div>
</td>
<td>
	<div style="/*margin-left: -175px;*/">

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