<?php
/* @var $this UserController */
/* @var $model User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_User')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_User), array('view', 'id'=>$data->ID_User)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nama')); ?>:</b>
	<?php echo CHtml::encode($data->Nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HakAkses')); ?>:</b>
	<?php echo CHtml::encode($data->HakAkses); ?>
	<br />


</div>