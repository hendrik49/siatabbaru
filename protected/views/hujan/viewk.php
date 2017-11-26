<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
	'data'=>$model,
	'attributes'=>array(
		'broncaptering', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_broncaptering.''),
		'reservoar', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_reservoar.''),
		'pompa', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_pompa.''),
		'rumah_pompa', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_rumah_pompa.''),
		'hidran_umum', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_hidran_umum.''),
		'saluran_airbaku', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_saluran_airbaku.''),
		'saluran_irigasi', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_saluran_irigasi.''),
		'box_pembagi', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_box_pembagi.''),
		'springkler', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_springkler.''),
		'penggerak', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_penggerak.''),				
		),
	)); 
?>