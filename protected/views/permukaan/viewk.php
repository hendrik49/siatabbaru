
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'kondisi_sungai', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_kondisi_sungai.''),
				'kondisi_reservoir', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_kondisi_reservoir.''),
				'kondisi_pompa', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_kondisi_pompa.''),
				'kondisi_bangunan', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_kondisi_bangunan.''),
				'kondisi_penggerak', array( 'name'=>'Keterangan', 'type'=>'raw', 'value'=>''.$model->ket_kondisi_penggerak.''),
				'sumber_pendanaan', 
				'instansi_pembangun', 
				array(
					'name'=>'dokumen_pendukung',
					'type'=>'raw',
					'value'=>'<a width="180px" href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Permukaan/File/'.$model->dokumen_pendukung.'').'">'.$model->dokumen_pendukung.'</a>',
					),				
				),
			)); 
		?>
