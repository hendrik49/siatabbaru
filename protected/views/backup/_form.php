<?php

?>
<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Backup-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'enctype'=>'multipart/form-data',
	),
)); ?>

	<p class="note">Tersimpan di Drive C pada folder BackupKesling <span class="required">*</span>.</p>



<?php $this->endWidget(); ?>

</div><!-- form -->