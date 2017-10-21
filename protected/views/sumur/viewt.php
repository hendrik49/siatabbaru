
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'sistem','jenis_pompa','head_pompa','tahun_pengadaan', 'listrik','genset', 'solar_cell', 'lain_lain','debit_andal', 'debit_awal', 'debit_idle',
					/*
					array(
						'name'=>'Foto Kantor Unit Kerja',
						'type'=>'raw',
						'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/data/sumur/'.$model->Link.'"/>',
					),*/
				),
			)); 
		?>