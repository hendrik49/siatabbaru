<?php
/* @var $this UnitKerjaController */
/* @var $model UnitKerja */

$this->breadcrumbs=array(
	'Unit Kerja'=>array('index'),
	'Tambah Unit Kerja',
);


$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
'id'=>'unit-kerja-form',
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
<!--<p class="note">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>-->

<?php //echo $form->errorSummary($model); ?>
<div class="span4">
	<?php if (isset($model->NamaUnitKerja)) : ?>
	<?php echo $form->textFieldRow($model,'NamaUnitKerja',array('size'=>40,'maxlength'=>255, 'readOnly'=>true)); ?>
	<?php else : ?>
	<?php echo $form->textFieldRow($model,'NamaUnitKerja',array('size'=>40,'maxlength'=>255)); ?>
	<?php endif ?>

	<?php if (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN) : ?>
		<?php echo $form->dropDownListRow($model,'ID_Admin',User::lookupUsers()); ?>
	<?php endif ?>

	<?php echo $form->textAreaRow($model,'AlamatUnitKerja',array('rows'=>2,'cols'=>40)); ?>
	<?php echo $form->fileFieldRow($model,'Gambar',array('size'=>40,'maxlength'=>255)); ?>
	<?php if (isset($model->Gambar) AND $model->Gambar != '') : ?>
		 Upload jika ingin mengganti <?php echo $model->Gambar; ?>
	<?php endif ?>

<div style="visibility: hidden;">
<?php //echo $form->textFieldRow($model,'Provinsi', array('id'=>'_pr')); ?>
<?php echo $form->textFieldRow($model,'KodeProv',array('id'=>'KodeFikasi')); ?>
</div>	
</div>

<div class="span4">

	<?php echo $form->textFieldRow($model,'Lat',array('size'=>20,'maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'Lang',array('size'=>20,'maxlength'=>100)); ?>

	<?php echo $form->dropDownListRow($model,'Provinsi', Provinsi::lookupProvinsi(), array('id'=>'KodeProv')); ?>

	<?php echo $form->textAreaRow($model,'CakupanWilayahKerja',array('rows'=>2,'cols'=>40)); ?>

</div>
<div class="span11">
<?php  
$this->widget('bootstrap.widgets.TbButton', array(
	'id'=>'dasar',
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Simpan',
	));

?>
	<?php //echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Simpan', array('style'=>'background: #ffffff; font-weight: bold; color: green; border: 2px solid green; padding: 4px; width: 80px;')); ?>
</div>
<?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $this->endWidget(); ?>

<div style="visibility: hidden;">
	<div class="collapse">
	<?php 
		$_dataKode = array(); $_dataNama = array(); $ii = 0; $max = 0;
		$get = mysql_query("select * from t_provinsi order by No desc"); 
		while($show = mysql_fetch_array($get)){
			$ii++;
			if($show['No'] >= $max){
				$max = $show['No'];
			}
			$_dataKode[$ii]= $show['Kode_provinsi'];
			$_dataNama[$ii]= $show['Nama_provinsi'];
			echo "<input type='text' width='20px' id='Kode_".$ii."' value='".$_dataKode[$ii]."'/>";
			echo "<input type='text' width='20px' id='NamaProv".$ii."' value='".$_dataNama[$ii]."'/>";
		} ?>

	</div>
	</div>
<script>
var jum ="<?php echo $max; ?>"; 
var prov = new Array();
var kode = new Array();
var i = 0; var datap = 0;
var x = document.getElementById("KodeProv").value;
for(i=1;i<=jum;i++){
	prov[i] = document.getElementById('NamaProv'+i).value;
	kode[i] = document.getElementById('Kode_'+i).value;
	if(prov[i]==x){
		datap = kode[i];
	}
}
document.getElementById('KodeFikasi').value = datap;
</script>
</html>

