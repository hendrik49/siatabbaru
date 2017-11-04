		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'tahun_bangun',
			'rehab',
			'rencana_rehab',
			'nama_lembaga',
			'legalitas',
			//'tahun_berdiri',
			'perizinan',
			'no_kontrak',
			'status_kelola',
			'status_operasi',
			'keterangan',

				),
			)); 
		?>
