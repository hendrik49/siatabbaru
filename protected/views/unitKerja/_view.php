<?php
/* @var $this UnitKerjaController */
/* @var $model UnitKerja */
?>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				'NamaUnitKerja',
				'admin.Nama',
				'AlamatUnitKerja',
				'CakupanWilayahKerja',
				//'Profile',
				//'Lat',
				//'Lang',
				),
			)); 
?>
