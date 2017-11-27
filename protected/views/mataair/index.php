<?php
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Baku'=>array('/sistembaku/listbaku'),
	'Mata Air',
);
?>
<form method="POST"  enctype="multipart/form-data" name="dMataair">
	<div class="span12" style="background: #fcd13c; height: auto; margin: -10px 0px 5px 0px; padding: 2px;">
	<h5 style="margin: 0 5px auto;">
	<div class="span7">
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
		Kelola 
	<?php endif ?>	
		Data Air Baku (Mata Air)
		| <input type="button" value="Export" onClick="emataair()" class="btn btn-info">
		| <input type="file" name="inputatab" value="Pilih File" class="btn btn-success">
		| <input type="button" value="Import" onClick="imataair()" class="btn btn-danger">


	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>  
		| <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
				array('label'=>'Tambah', 'url'=>'/siatab/mataair/tambah'),
				array('items'=>array(
					array('label'=>'Sumber Air/ Reservoar', 'url'=>'/siatab/mataair/tambah'),
					array('label'=>'Sistem Air Baku', 'url'=>'/siatab/sistembaku/add'),
					'---',
					)),
				),
			)); ?> |
	<?php endif ?>
	</div>
	</h4>
	</div>

	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN OR Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>
	<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'DataMataair',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'htmlOptions'=>array('style'=>'font-size: 11px;'),
			'columns'=>array(
				array(	// No Data
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">
						No
					</p>',
					'name'=>'NoData', 
					'filter'=>CHtml::activeTextField($model, 'NoData', array('id'=>false,'style'=>'display:none')),
					'htmlOptions'=>array('style'=>'width: 32px'),
					'footer'=>"Total : ",
					'footerHtmlOptions'=>
						array(
							'style'=>'background-color: #5dbb5d; 
								text-align: right; 
								font-size: 13px;
								color: #fff;
								font-weight: bold;',
							'colspan'=> 8,
						),
					),
				array(	// Nama Objek
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Objek</p>',
					'name'=>'nama_objek', 
					'type'=>'raw',
					'value'=>'CHtml::link($data->nama_objek, array("mataair/$data->ID"))',
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Nama Sistem
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Sistem</p>',
					'name'=>'nama_sistem', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// WS
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Wilayah Sungai</p>',
					'name'=>'nama_ws', 
					'htmlOptions'=>array('style'=>'width: 75px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				/*array(	// Nama Sungai Belum direlasikan
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Sungai</p>',
					'name'=>'nama_sungai', 
					'value'=>'$data->manfaat->nama_sungai',
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),*/
				array(	// Provinsi
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Provinsi</p>',
					'name'=>'provinsi', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Kab/ Kota
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kab/ Kota</p>',
					'name'=>'kota', 'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Kecamatan
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kecamatan</p>',		
					'name'=>'kecamatan', 'htmlOptions'=>array('style'=>'width: 80px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Desa
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Desa/ Kel</p>',
					'name'=>'desa', 
					'htmlOptions'=>array('style'=>'width: 80px;'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Jiwa
					'header'=>'<p style="font-size: 10.8px;
						margin: auto; text-align: center;">Manfaat (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> jiwa<b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #e35651; 
							text-align: center; 
							font-size: 11.5px; 
							color: #fff;
							font-weight: bold;'),
					),
				array(	// Debit
					'header'=>'<p style="font-size: 10.8px; padding: 0px; 
						margin: auto; text-align: center;">Debit (l/dtk)</p>',
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"<p>".$model->getTotals('debit',$model->search()->getKeys()).
						" l/<b style='font-size: 10.5px;'>d<b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #44abc9;  
							text-align: center; 
							font-size: 12px; 
							color: #fff;
							font-weight: bold;'),
					),
				array(	// Tahun
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Tahun Bangun</p>',
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 65px; text-align:center;'),
					//'footer'=>"".$model->getTotal($model->search()->getData(), 'tahun_bangun'),
					'footerHtmlOptions'=>array('style'=>'background-color: #5dbb5d;'),
					),
				),
			)
		); 		
	?>		
<?php else : ?>
<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'DataSumur',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'htmlOptions'=>array('style'=>'font-size: 11px;'),
			'columns'=>array(
				array(	// No Data
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">
						No
					</p>',
					'name'=>'NoData', 
					'filter'=>CHtml::activeTextField($model, 'NoData', array('id'=>false,'style'=>'display:none')),
					'htmlOptions'=>array('style'=>'width: 32px'),
					'footer'=>"Total : ",
					'footerHtmlOptions'=>
						array(
							'style'=>'background-color: #5dbb5d; 
								text-align: right; 
								font-size: 13px;
								color: #fff;
								font-weight: bold;',
							'colspan'=> 8,
						),
					),
				array(	// Nama Objek
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Objek</p>',
					'name'=>'nama_objek', 
					'type'=>'raw',
					'value'=>'$data->nama_objek',
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Nama Sistem
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Sistem</p>',
					'name'=>'nama_sistem', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// WS
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Wilayah Sungai</p>',
					'name'=>'nama_ws', 
					'htmlOptions'=>array('style'=>'width: 75px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				/*array(	// Nama Sungai Belum direlasikan
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Sungai</p>',
					'name'=>'nama_sungai', 
					'value'=>'$data->manfaat->nama_sungai',
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				*/
				array(	// Provinsi
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Provinsi</p>',
					'name'=>'provinsi', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Kab/ Kota
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kab/ Kota</p>',
					'name'=>'kota', 'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Kecamatan
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kecamatan</p>',		
					'name'=>'kecamatan', 'htmlOptions'=>array('style'=>'width: 80px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Desa
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Desa/ Kel</p>',
					'name'=>'desa', 
					'htmlOptions'=>array('style'=>'width: 80px;'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Jiwa
					'header'=>'<p style="font-size: 10.8px;
						margin: auto; text-align: center;">Manfaat (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> jiwa<b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #e35651; 
							text-align: center; 
							font-size: 11.5px; 
							color: #fff;
							font-weight: bold;'),
					),
				array(	// Debit
					'header'=>'<p style="font-size: 10.8px; padding: 0px; 
						margin: auto; text-align: center;">Debit (l/dtk)</p>',
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"<p>".$model->getTotals('debit',$model->search()->getKeys()).
						" l/<b style='font-size: 10.5px;'>d<b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #44abc9;  
							text-align: center; 
							font-size: 12px; 
							color: #fff;
							font-weight: bold;'),
					),
				array(	// Tahun
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Tahun Bangun</p>',
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 65px; text-align:center;'),
					//'footer'=>"".$model->getTotal($model->search()->getData(), 'tahun_bangun'),
					'footerHtmlOptions'=>array('style'=>'background-color: #5dbb5d;'),
					),
				),
			)

		); 		
	?>
<?php endif ?>

</form>
<script>
function emataair()
{	
    document.dMataair.action="/siatab/mataair/emataair";
	document.dMataair.submit();
}


function imataair()
{	
    document.dMataair.action="/siatab/mataair/imataair";
	document.dMataair.submit();
}
</script>