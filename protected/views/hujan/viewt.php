
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
			'debit_andalan', 'debit_awal', 'debit_idle', 'curah_hujan', 'durasi_hujan', 'luas_atap', 'luas_bangunan',
			'jumlah_bangunan', 'kapasitas_tampung', 'hidran_umum', 'pj_airbaku', 'bahan', 'jenis_saringan', 'jenis_penampung', 'status_aset',
				),
			)); 
		?>