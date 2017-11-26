<?php
/* @Bitartik Group */

$this->breadcrumbs=array(
	'Satker'=>array('index'),
	$model->ID,
);

?>

<b class="h-view"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Detail Data | <?php echo CHtml::link('Edit Data', array('PPK/update/','id'=>$model->ID)); ?><?php endif ?></b>
<br></br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			//'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'Nama', 'NIP', 'Email', 'Alamat', 'NoTelp', 'Golongan',
					array(
						'name'=>'Foto Profil',
						'type'=>'raw',
						'value'=>'<img width="100px" src="'.Yii::app()->request->baseUrl.'/data/PPK/'.$model->Foto.'"/>',
					),
				),
			)); 
		?>
		</tr>



</html>