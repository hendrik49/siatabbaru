<?php
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Baku'=>array('/sistembaku/listbaku'),
	'Mata Air'=>array('/mataair/index'),
	'Tambah data',
);

?>
<div style="float:right; margin-top:-53px; margin-right: 185px;">

    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'success', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
		
        'buttons'=>array(
            /*array('label'=>'Otomatis', 'url'=>''),*/
            array('items'=>array(
                array('label'=>'Data Terisi Otomatis', 'url'=>''),
				'---',
				array('label'=>'Nama-WS  : '.Unitkerja::getNamaWS(), 'url'=>''),
                array('label'=>'Provinsi : '.Unitkerja::getProvByAdmin(), 'url'=>''),
                '---',
            )),
        ),
    )); ?>
</div>
<div style="width: 1050px;">
	
	
	<?php //echo $this->renderPartial('add', array('model'=>$model)); 
		
	$this->widget('bootstrap.widgets.TbTabs', array(
		'type'=>'tabs',
		'placement'=>'left', // 'above', 'right', 'below' or 'left'
		'tabs'=>array(
			array('label'=>'Dasar    ', 'active'=>true, 'content'=>$this->renderPartial('//mataair/add', array('model'=>$model), true)),
			array('label'=>'Manfaat  ', 'content'=>$this->renderPartial('//mataair/addm', array('model'=>$modelmanfaat), true)),
			array('label'=>'Teknis 1 ', 'content'=>$this->renderPartial('//mataair/addts', array('model'=>$modelteknis), true)),
			array('label'=>'Teknis 2 ', 'content'=>$this->renderPartial('//mataair/addtw', array('model'=>$modelteknisWa), true)),
			array('label'=>'Lembaga  ', 'content'=>$this->renderPartial('//mataair/addtg', array('model'=>$modelteknisGa), true)),
			array('label'=>'Kondisi  ', 'content'=>$this->renderPartial('//mataair/addtp', array('model'=>$modelteknisPat), true)),
			array('label'=>'Info Lain', 'content'=>$this->renderPartial('//mataair/addinfo', array('model'=>$modelInfoMa), true)),
			),
		)); 
		
	
	?>
	
	
	</div>