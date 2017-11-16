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
		$model->ID_IDBalaiNam = (Yii::app()->user->uid - 1);
		if (isset($model->NoDataMa)){
			$model->NoDataNam = $model->NoDataNam;
		}
		else
		if($model->NoDataNam == TeknisWaMa::getNoDataByAdmin()){
			$model->NoDataNam = TeknisWaMA::getNoDataByAdmin();
		}
		else{
			$model->NoDataNam = TeknisGaMA::getAvailableNoData();
		}
		//$model->kode_bidang = Unitkerja::getKodeProvByAdmin() + 109000000000 + $model->NoDataWa;
		$this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'balai.NamaUnitKerja',
				'balai.AlamatUnitKerja',
				'mataair.kodefikasi',
				'NoDataNam',
				),
			)); 
	endif
	?>
	<div style="visibility:hidden; position:absolute;"><?php $model->ID_IDBalaiNam = (Yii::app()->user->uid); 
	//$model->provinsi = Unitkerja::getProvByAdmin();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalaiNam',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php //echo $form->textFieldRow($model,'sumurs.kode_bidang',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'NoDataNam',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>
	<div>
	<?php echo $form->dropDownListRow($model,'broncaptering',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'reservoar',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'pompa',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'rumah_pompa',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'hidran_umum',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	</div>
</td>
<td>
	<div style="margin-left: -175px;">
	<?php $model->ket_broncaptering = 'Keterangan';
		echo $form->textFieldRow($model,'ket_broncaptering',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_reservoar',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_pompa',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_rumah_pompa',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_hidran_umum',array('class'=>'input-small')); ?>
	</div>
</td>
<td>
	<div style="margin-left: 35px;">
	<?php echo $form->dropDownListRow($model,'box_pembagi',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'saluran_airbaku',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'saluran_irigasi',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'springkler',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	<?php echo $form->dropDownListRow($model,'penggerak',
		array('Baik'=>'Baik', 'Rusak Ringan'=>'Rusak Ringan', 'Rusak Berat'=>'Rusak Berat'),
		array('class'=>'input-small')); 
	?>
	</div>
</td>
<td>
	<div style="margin-left: -175px;">
	<?php echo $form->textFieldRow($model,'ket_saluran_airbaku',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_saluran_irigasi',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_box_pembagi',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_springkler',array('class'=>'input-small')); ?>
	<?php echo $form->textFieldRow($model,'ket_penggerak',array('class'=>'input-small')); ?>
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