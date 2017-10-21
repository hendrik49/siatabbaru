<?php
	$this->breadcrumbs=array(
	'Sumur'=>array('index'),
	$model->ID,
);
?>
<div class="span12">
		<div class="span6">
		<?php 
			$this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'baku_mutuair', 
				'konduktivitas', 
				'nilai_storativitas', 
				array(
					'name'=>'dokumen_pendukung',
					'type'=>'raw',
					'value'=>'<a width="180px" href="'.Yii::app()->createUrl('/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Sumur/File/'.$model->dokumen_pendukung.'').'">'.$model->dokumen_pendukung.'</a>',
					),
				array(
					'name'=>'Foto 1',
					'type'=>'raw',
					'value'=>'<img width="180px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
					.UnitKerja::getNamaUnitKerjaByAdmin().'/Sumur/Foto/'.$model->foto1.'"/>',
				),
				array(
					'name'=>'Foto 2',
					'type'=>'raw',
					'value'=>'<img width="180px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
						.UnitKerja::getNamaUnitKerjaByAdmin().'/Sumur/Foto/'.$model->foto2.'"/>',
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
				'nilai_tranmisivitas', 
				'sumber_pendanaan', 
				'instansi_pembangun',
				array(
					'name'=>'Foto 3',
					'type'=>'raw',
					'value'=>'<img width="180px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
					.UnitKerja::getNamaUnitKerjaByAdmin().'/Sumur/Foto/'.$model->foto3.'"/>',
				),
				array(
					'name'=>'Foto 4',
					'type'=>'raw',
					'value'=>'<img width="180px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
					.UnitKerja::getNamaUnitKerjaByAdmin().'/Sumur/Foto/'.$model->foto4.'"/>',
				),
				array(
					'name'=>'Foto 5',
					'type'=>'raw',
					'value'=>'<img width="180px" src="'.Yii::app()->request->baseUrl.'/data/Unit Kerja/'
					.UnitKerja::getNamaUnitKerjaByAdmin().'/Sumur/Foto/'.$model->foto5.'"/>',
				),
				),
			)); 
		?>
		</div>		
	</div>
<?php

function getUKByAdmin()
{
	//$id = Yii::app()->$model->ID_IDBalaiJu;
	//$id = array($model, 'ID_IDBalaiJu');
	
	if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN))
	{
		if (!isset($model->ID_IDBalaiJu)){
		$id = 2;
		$command = Yii::app()->db->createCommand("SELECT * FROM t_unitkerja WHERE ID_Admin='$id'");
		$query = $command->query();
		$data = $query->read();
		return $data['NamaUnitKerja'];	
		}else {
			return '';
		}
	}
}
?>