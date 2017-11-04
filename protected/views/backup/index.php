<?php
/* Bitartic Group */

$this->breadcrumbs=array(
	'Migrasi Data',
);


?>

<h2 class="h-view"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Backup/Simpan Data Kumulatif | <?php echo CHtml::link('Backup', array('backup/add')); ?><?php endif ?></h2>
<h2 class="h-view" style="padding-top:10px;"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>


 <form method="post" enctype="multipart/form-data" action="<?php echo Yii::app()->baseUrl; ?>/backup/view">
 <br/>
 Silakan Pilih File Excel : <input name="userfile" type="file">
 <input name="upload" type="submit" value="import">

</form>



<?php endif ?></h2>







