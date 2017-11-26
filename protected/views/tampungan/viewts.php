		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'status_aset', 'luas_bangunan', 'jumlah_bangunan', 'pj_airbaku', 
				'reservoar', 'bendung', 'jenis_intake', 'hidran_umum', 			
					
				),
			)); 
		?>