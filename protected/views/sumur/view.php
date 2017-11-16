	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'nama_das', 'nama_ws', 'nama_cat', 
				'provinsi', 'kota', 'kecamatan', 'desa', 'bujur_timur', 'lintang_selatan', 'elevasi_sumur',
					/*
					array(
						'name'=>'Foto Kantor Unit Kerja',
						'type'=>'raw',
						'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/data/sumur/'.$model->Link.'"/>',
					),*/
				),
			)); 
		?>
