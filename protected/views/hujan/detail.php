<?php
/* @Bitartik Group */
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Baku'=>array('/sistembaku/listbaku'),
	'Air Hujan (PAH)'=>array('/hujan/index'),
	$model->ID,
);
?>

<div style="background: #fcd13c; width: 44%">  
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
<legend><span style="margin-left: 10px;">Anda Login Sebagai Admin Balai ini<span style="margin-left: 20px;">|<span style="margin-left: 20px;">
<?php //echo CHtml::link('Edit Data', array('unitKerja/update/','id'=>$model->ID));  
	$this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'Link',
		'type'=>'primary',
		'label'=>'Edit Data',
		'url'=>array('mataair/update/','id'=>$model->ID),
		
		));
?><?php endif ?></legend></div>
<div style="width: 1050px;">
	
	
	<?php //echo $this->renderPartial('add', array('model'=>$model)); 
		
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs',
		'placement'=>'left', // 'above', 'right', 'below' or 'left'
		'tabs'=>array(
			array('label'=>'Dasar    ', 'active'=>true, 'content'=>$this->renderPartial('//hujan/view', array('model'=>$model), true)),
			array('label'=>'Manfaat  ', 'content'=>$this->renderPartial('//hujan/viewm', array('model'=>$modelmanfaat), true)),
			array('label'=>'Teknis 1 ', 'content'=>$this->renderPartial('//hujan/viewt', array('model'=>$modelteknis), true)),
			//array('label'=>'Teknis 2 ', 'content'=>$this->renderPartial('//hujan/viewts', array('model'=>$modelteknisWa), true)),
			array('label'=>'Lembaga  ', 'content'=>$this->renderPartial('//hujan/viewtg', array('model'=>$modelteknisGa), true)),
			array('label'=>'Kondisi  ', 'content'=>$this->renderPartial('//hujan/viewk', array('model'=>$modelteknisPat), true)),
			array('label'=>'Info Lain', 'content'=>$this->renderPartial('//hujan/viewi', array('model'=>$modelInfoMa), true)),
			),
		)); 
		
	
	?>
	
	
	</div>