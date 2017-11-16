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
	<div style="visibility:hidden; position:absolute;">
    <?php 
	?>
	</div>
	<?php echo $form->dropDownListRow($model,'KabKota',Kota::lookupProvinsi(),array('empty'=>'-pilih-',
      'ajax'=>array(
       'type'=>'POST',
       'beforeSend'=>'function(data){if($(this+ ":selected").val()==""){alert("Pilih Kabupaten");return false;}}',
       'dataType'=>'json',
	   'success'=>'function(data){$("#Neraca_TargetJiwa").val(data.debitidle);$("#Neraca_JiwaTerlayani").val(data.debit_awal);}
	   
	   ',
      ),
    )); ?>

<?php $this->endWidget(); 
	
?>
</html>