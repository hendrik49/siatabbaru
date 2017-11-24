		
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'jiwa','debit', 'nama_sungai', 'luas_dta', 'tadah_awal','tadah_saatini', 'suplesi_awal', 'suplesi_saatini',
				'kecamatan1','desa1','kecamatan2','desa2',
				array(
					'name'=>'catchment_area',
					'type'=>'raw',
					'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Mata Air/Catch/'.$model->catchment_area.'').'">'.$model->catchment_area.'</a>',
					),
				array(
					'name'=>'catchment_area1',
					'type'=>'raw',
					'value'=>'<a href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Mata Air/Catch/'.$model->catchment_area1.'').'">'.$model->catchment_area1.'</a>',
					),
				),
			)); 
		?>