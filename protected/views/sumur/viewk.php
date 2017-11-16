		<table><td>
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'sumur', 
				'reservoar', 
				'pompa', 
				'rumah_pompa', 
				'hidran_umum',  
				'saluran_airbaku', 
				'saluran_irigasi', 
				'box_pembagi', 
				'springkler', 
				'penggerak', 
				
				/*
					array(
						'name'=>'Foto Kantor Unit Kerja',
						'type'=>'raw',
						'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/data/sumur/'.$model->Link.'"/>',
					),*/
				),
			)); 
		?></td>
		<td>
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'ket_broncaptering', 
				'ket_reservoar', 
				'ket_pompa', 
				'ket_rumah_pompa', 
				'ket_hidran_umum', 
				'ket_saluran_airbaku', 
				'ket_saluran_irigasi', 
				'ket_box_pembagi', 
				'ket_springkler', 
				'ket_penggerak',
				
				/*
					array(
						'name'=>'Foto Kantor Unit Kerja',
						'type'=>'raw',
						'value'=>'<img width="700px" height="300px" src="'.Yii::app()->request->baseUrl.'/data/sumur/'.$model->Link.'"/>',
					),*/
				),
			)); 
		?>
		</td>
		</table>