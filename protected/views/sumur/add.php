<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'Sumur-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
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
	$model->provinsi = Unitkerja::getProvByAdmin();
	$model->nama_ws = Unitkerja::getNamaWS();
	?>
	<?php echo $form->textFieldRow($model,'ID_IDBalai',array('size'=>25,'maxlength'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'kodefikasi',array('id'=>'KodeFikasi')); ?>
	<?php echo $form->textFieldRow($model,'NoData',array('id'=>'NoUData')); ?>
	<?php echo $form->textFieldRow($model,'nama_ws');?>
	<?php echo $form->textFieldRow($model,'provinsi',array('rows'=>3,'cols'=>30, 'readOnly'=>true)); ?>
	</div>
	</td>
</tr>
<td>

	<?php echo $form->textFieldRow($model,'nama_ws'); ?>
	<?php //echo $form->dropDownListRow($model,'nama_sistem',SistemBaku::lookupNamaSistem()); ?>
	<?php //echo $form->textFieldRow($model,'nama_objek'); ?>
	<?php //echo $form->textFieldRow($model,'tahun_data',array('size'=>14,'maxlength'=>15)); ?>
	<?php echo $form->textFieldRow($model,'nama_das',array('size'=>25,'maxlength'=>30)); ?>
	<?php echo $form->textFieldRow($model,'nama_cat');?>
	<?php echo $form->textFieldRow($model,'provinsi',array('rows'=>3,'cols'=>30, 'readOnly'=>true)); ?>
	<?php echo $form->dropDownListRow($model,'kota',Kota::lookupProvinsi(),array('id'=>'kodeeKab')); ?>
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
<div class="span8" style="visibility: hidden; position:absolute;">
<div class="collapse">
<?php $_dataKode = array(); $_dataKab = array(); $ii = 0; $max = 0;
	$get = mysql_query("select * from t_kab_kota order by no desc"); 
	while($show = mysql_fetch_array($get)){
		$ii++;
		if($show['no'] >= $max){
			$max = $show['no'];
		}
		$_dataKode[$ii]= $show['kode'];
		$_dataKab[$ii]= $show['kab'];
		echo "<input type='text' width='20px' id='KodeKab".$ii."' value='".$_dataKode[$ii]."'/>";
		echo "<input type='text' width='20px' id='NamaKab".$ii."' value='".$_dataKab[$ii]."'/>";
	} ?>
</div>
</div>


<script>
	<?php $kp = Unitkerja::getKodeProvByAdmin(); ?>
	var jum ="<?php echo $max; ?>"; 
	var kota = new Array();
	var kode = new Array();
	var getKode = 0;
	var i = 0; var kp = "<?php echo $kp; ?>";
	var x = document.getElementById("kodeeKab").value;
	var nod = document.getElementById("NoUData").value;
	for(i=1;i<=jum;i++){
		kota[i] = document.getElementById('NamaKab'+i).value;
		kode[i] = document.getElementById('KodeKab'+i).value;
		if(kota[i]==x){
			kp = Number(kp) * Number(10000000);
			getKode = (Number(100000) * Number(kode[i])) + Number(109000000000) + Number(kp) + Number(nod);
		}
	}
	document.getElementById('KodeFikasi').value = getKode;
</script>
</html>