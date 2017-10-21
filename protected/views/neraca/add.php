<?php
/* @Bitartik Group */
$this->breadcrumbs=array(
	'Neraca Air'=>array('index'),
	'Tambah',
);
include '../siatab/connect.php';
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/neraca-form',
	),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnChange' => true,
		'validateOnType' => true,
		/*'validateOnSubmit' => true,
		'errorCssClass' => 'has-error',
		'successCssClass' => 'has-success',
		'afterValidate' => 'js:function(form, data, hasError){
		}'*/
	),

)); 
$model->NamaBalai = Unitkerja::getNamaUnitKerjaByAdmin();
$model->Provinsi = Unitkerja::getProvByAdmin();

?>
	<div class="10"><center><legend><h3>NERACA PEMENUHAN PENYEDIAAN AIR BAKU PER KABUPATEN</h3></legend></center></div>
	<p id="demo"></p>
	<?php /* echo $this->renderPartial('addts', array('model'=>$modelSumur)); */?>
	<div class="span5">
	<?php echo $form->textFieldRow($model,'NamaBalai',array('readOnly'=>true)); ?>
	<?php echo $form->textFieldRow($model,'Provinsi', array('readOnly'=>true), array('id'=>'Provinsi')); ?>
	<?php echo $form->DropDownListRow($model,'KabKota',Kota::lookupProvinsi(), array('id'=>'KabKota')
	/*array('empty'=>'-pilih-Kab',
      'ajax'=>array(
       'type'=>'POST',
       'beforeSend'=>'function(data){if($(this+ ":selected").val()==""){alert("Pilih Kabupaten");return false;}}',
       'dataType'=>'json',
	   'success'=>'function(data){$("#Neraca_TargetJiwa").val(data.TargetJiwa);$("#Neraca_JiwaTerlayani").val(data.JiwaTerlayani);}',
      ),
    )*/
	); ?>
	<?php echo $form->textFieldRow($model,'PopulasiKabKota', array('append'=>'Jiwa', 'id'=>'PopulasiKab')); ?>
	<?php echo $form->textFieldRow($model,'TotalABKabKota',array('append'=>'m3/thn','id'=>'TotalABKabKota')); ?>
	
	</div>
	<div class="span6">
	
	<?php echo $form->textFieldRow($model,'TargetJiwa', array('append'=>'Jiwa', 'id'=>'Target'));?>
	<?php echo $form->textFieldRow($model,'JiwaTerlayani', array('append'=>'Jiwa','id'=>'dilayani')); ?>
	<?php echo $form->textFieldRow($model,'KebutuhanAirBaku', array('append'=>'m3/thn', 'id'=>'kebutuhanAB')); ?>
	<?php echo $form->textFieldRow($model,'JiwaBelumTerlayani',array('append'=>'Jiwa','id'=>'belumdilayani')); ?>
	<?php echo $form->textFieldRow($model,'RencanaLayanan',array('append'=>'m3/thn', 'id'=>'rencana')); ?>
	</div>
	<div class="span8" style="visibility: hidden; position:absolute;">
	<div class=collapse>
	
	<?php echo $form->textFieldRow($model,'JTOL',array('size'=>14,'maxlength'=>15)); ?>
	<?php echo $form->textFieldRow($model,'Nrw', array('id'=>'nrw'));?>	
	

	
	<?php 
	$max = 0;  $i = 0; $ii = 0;
	$_dtem = array(); $_dtemk = array();
	$_terlayani= array(); $_dbt_awal= array();
	$get = "select * from t_sumur3 order by NoDataGa desc"; 
	$exe = mysql_query($get);
	while($show = mysql_fetch_array($exe)) :
		$i++;
		if($show['ID'] >= $max){
			$max = $show['NoDataGa'];
		}
		$_dtem[$i]= $show['debit_idle'];
		$_dtemk[$i]= $show['KabKota'];
		$_dbt_awal[$i]= $show['debit_awal'];
		echo "<input type='text' width='20px' id='debit".$i."' value='".$_dtem[$i]."'/>";
		echo "<input type='text' width='20px' id='dbtawal".$i."' value='".$_dbt_awal[$i]."'/>";
		echo "<input type='text' width='20px' id='kota".$i."' value='".$_dtemk[$i]."'/>";
		
		$gets = "select * from t_sumur2 order by NoDataWa desc"; 
		$exes = mysql_query($gets);
		while($shows = mysql_fetch_array($exes)) :
			$ii++;
			$_terlayani[$ii]= $shows['jiwa'];
			echo "<input type='text' width='20px' id='jiwa".$ii."' value='".$_terlayani[$ii]."'/>";
		endwhile ?>

	<?php endwhile ?>
	<?php 
	//echo "<input type='text' value='".$max."'/>";
	?>	
		</div>
	</div>
	<div class="span1"></div>
	<div class="span7"><?php echo CHtml::button("Kalkulasi",array('onclick'=>'js:getDataKota();')); ?></div>
	<div class="span1">
	<?php 
		
		$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); 
		
	?>
	</div>
	<div class="span1">
	<?php  
	$this->widget('bootstrap.widgets.TbButton', array(
		'id'=>'dasar',
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>'Simpan',
		));
	
	?>

	</div>
	

<script type="text/javascript">
function getDataKota(){
	var jum ="<?php echo $max; ?>"; 
	var tot = 0; 
	var totterlayani = 0;
	var totaldbtawal = 0;
	var kotas = new Array();
	var debit = new Array();
	var debitawal = new Array();
	var terlayani = new Array();
	var i = 0;
	var x = document.getElementById("KabKota").value;
	
	for(i=1;i<=jum;i++){
		kotas[i] = document.getElementById('kota'+i).value;
		debit[i] = document.getElementById('debit'+i).value;
		terlayani[i] = document.getElementById('jiwa'+i).value;
		debitawal[i] = document.getElementById('dbtawal'+i).value;
		if(kotas[i]==x){
			tot = Number(tot) + Number(debit[i]);
			totaldbtawal = Number(totaldbtawal) + Number(debitawal[i]);
			totterlayani = Number(totterlayani) + Number(terlayani[i]);
		}
		//document.getElementById('debit'+i).value = debit[i];
	}
	tot = Number(tot) * Number(86400) * Number(365);
	tot = Number(tot)/ Number(1000);
	totaldbtawal = (Number(totaldbtawal) * Number(86400) * Number(60) * Number(365))/ Number(1000); 
	document.getElementById("TotalABKabKota").value = tot;
	document.getElementById("dilayani").value = totterlayani;
	document.getElementById("kebutuhanAB").value = totaldbtawal;
	document.getElementById("Target").value = (totaldbtawal/ Number(60))/Number(365)  ;
}



</script>  
	<?php $this->endWidget(); ?>
