<?php
/* @var $this PetaController */
/* @var $model Peta */
?>

<style type="text/css">
	.view {
		
	}

	.view a {
		font-weight: bold;
	}
</style>

<div class="view">


	<?php echo CHtml::link(CHtml::encode($data->NamaPeta), Yii::app()->createUrl("peta/view", array("id"=>$data->ID))); ?>


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Url')); ?>:</b>
	<?php echo CHtml::encode($data->Url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->Keterangan); ?>
	<br />

	*/ ?>

</div>