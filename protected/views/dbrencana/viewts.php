		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
					'pj_airbaku', 
					'pj_irigasi', 
					'reservoar', 
					'hidran_umum', 
					'luas_bangunan', 
					'jumlah_bangunan', 
					'jumlah_boxbagi', 
					'jumlah_splingker',
					'status_aset', 
					'sistem_jaringan', 
					'mt1',
					'mt2',
					'mt3',
				),
			)); 
		?>