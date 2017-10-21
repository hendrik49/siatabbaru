	<div class="span12">
		<div class="span6">
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
					array(
						'name'=>'Foto 1',
						'type'=>'raw',
						'value'=>'<img width="300px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
						.UnitKerja::getNamaUnitKerjaByAdmin().'/Tampungan/Foto/'.$model->foto1.'"/>',
					),
					array(
						'name'=>'Foto 2',
						'type'=>'raw',
						'value'=>'<img width="300px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
							.UnitKerja::getNamaUnitKerjaByAdmin().'/Tampungan/Foto/'.$model->foto2.'"/>',
					),
					array(
						'name'=>'Foto 3',
						'type'=>'raw',
						'value'=>'<img width="300px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
						.UnitKerja::getNamaUnitKerjaByAdmin().'/Tampungan/Foto/'.$model->foto3.'"/>',
					),
				),
			)); 
		?>
		</div>
		<div class="span6">
		<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
					array(
						'name'=>'Foto 4',
						'type'=>'raw',
						'value'=>'<img width="255px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
						.UnitKerja::getNamaUnitKerjaByAdmin().'/Tampungan/Foto/'.$model->foto4.'"/>',
					),
					array(
						'name'=>'Foto 5',
						'type'=>'raw',
						'value'=>'<img width="255px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
						.UnitKerja::getNamaUnitKerjaByAdmin().'/Tampungan/Foto/'.$model->foto5.'"/>',
					),
				),
			)); 
		?>
		</div>		
	</div>
