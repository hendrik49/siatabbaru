		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'jiwa','debit', 'kecamatan1','desa1',
				'head_pompa', 'listrik', 'genset', 'solar_cell', 'lain_lain',
				'sistem', 'jenis_pompa', 'tahun_pengadaan',
				array(
					'name'=>'catchment_area',
					'type'=>'raw',
					'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Hujan/Catch/'.$model->catchment_area.'').'">'.$model->catchment_area.'</a>',
					),
				array(
					'name'=>'catchment_area1',
					'type'=>'raw',
					'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Hujan/Catch/'.$model->catchment_area1.'').'">'.$model->catchment_area1.'</a>',
					),
				),
			)); 
		?>