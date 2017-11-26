<div class="row" style="margin-left: 200px;">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'unit-kerja-form',
    'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); 
?>
<script>
	/*	$(document).ready(function(){
			$("#propinsi").change(function(){
				var provinsi = $("#provinsi").val();
				$.ajax({
					url: "<?php echo Yii::app()->createUrl('Sumur/setKota')?>",
					data: "provinsi=" + provinsi,
					success: function(data){
						$("#Sumur_kota").html(data);
				}
			});
		});
	}); */
</script>

	<?php echo $form->labelEx($model,'provinsi'); ?>
	<?php echo $form->dropDownList('provinsi','',
		CHtml::listData(Provinsi::model()->findAll(),'No','Nama_provinsi'),
        array(  
       'prompt'=>'Pilih Propinsi',          //
       'value'=>'0',
       'ajax' => array(
       'type'=>'POST', //request type
       'url'=>CController::createUrl('Sumur/setKota'), // panggi filter kabupaten di controller
       'update'=>'#Sumur_'.kota, //selector to update
       'data'=>array('No'=>'js:this.value'),
       ))); ?>
		<?php echo $form->error($model,'provinsi'); ?>
	</div>

	<div class="row" style="margin-left: 200px;">
		<?php echo $form->labelEx($model,'kota'); ?>
		<?php echo $form->dropDownList($model,'kota', CHtml::listData(Kota::model()->findAll(),'id_prov','kab')); ?>
		<?php echo $form->error($model,'kota'); ?>
	</div>

    <?php $this->endWidget(); ?>