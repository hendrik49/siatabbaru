<?php
	$this->pageTitle=Yii::app()->name . ' - ATAB';
	$this->breadcrumbs=array(
		'Air Baku'=>array('/sistembaku/listbaku'),
		'(Sungai)',
	);
?>
<?php 
	$this->widget('bootstrap.widgets.TbAlert', array(
		'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
		'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
		'alerts'=>array( // configurations per alert type
			'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
			),
		)
	); 
?>
<form method="POST" enctype="multipart/form-data" name="dSungai">
	<div class="span12" style="background: #fcd13c; height: auto; margin: -10px 0px 5px 0px; padding: 2px;">
	<h5 style="margin: 0 5px auto;">
	<div class="span11">
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
		Kelola Data Air Baku (Sungai)
		<!--<div class="span4" style="margin-left: 50px;">-->
		| <input type="button" value="Export" onClick="esungai()" class="btn btn-info">
		| <input type="file" name="inputatab" value="Pilih File" class="btn btn-success">
		| <input type="button" value="Import" onClick="isungai()" class="btn btn-danger">
		| <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array(
				array('label'=>'Tambah', 'url'=>'/siatab/permukaan/tambah'),
				array('items'=>array(
					array('label'=>'Sumber Air/ Reservoar', 'url'=>'/siatab/permukaan/tambah'),
					array('label'=>'Sistem Air Baku', 'url'=>'/siatab/sistembaku/add'),
					'---',
					)),
				),
			)); ?> 
		| <input type="button" value="Update Dashboard" onClick="usungai()" class="btn btn-inverse">
	<?php endif ?>
	<?php if (!isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->isGuest)) : ?>
		Data Air Baku (Sungai)
		<!--<div class="span4" style="margin-left: 50px;">-->
		| <input type="button" value="Export" onClick="esungai()" class="btn btn-info">
	<?php endif ?>
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>  
		Data Air Baku (Sungai)
		<!--<div class="span4" style="margin-left: 50px;">-->
		| <input type="button" value="Export" onClick="esungai()" class="btn btn-info">
	<?php endif ?>
	</div>
	</h4>
	</div>
	
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
	<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'permukaan-grid',
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
							'colspan'=> 10,
						),
					),
				array(	// Nama Objek
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Objek</p>',
					'name'=>'nama_objek', 
					'type'=>'raw',
					'value'=>'CHtml::link($data->nama_objek, array("permukaan/$data->ID"))',
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
				array(	// Nama Sungai Belum direlasikan
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Sungai</p>',
					'name'=>'nama_sungai', 
					'value'=>'$data->manfaat->nama_sungai',
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
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
				array(	// Tahun
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Tahun Bangun</p>',
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 65px; text-align:center;'),
					//'footer'=>"".$model->getTotal($model->search()->getData(), 'tahun_bangun'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(	// Debit
					'header'=>'<p style="font-size: 10.8px; padding: 0px; 
						margin: auto; text-align: center;">Debit (l/dtk)</p>',
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"<p>".$model->getTotals('debit',$model->search()->getKeys()).
						" <b style='font-size: 10.5px;'><b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #44abc9;  
							text-align: center; 
							font-size: 12px; 
							color: #fff;
							font-weight: bold;'),
					),
				
				array(	// Jiwa
					'header'=>'<p style="font-size: 10.8px;
						margin: auto; text-align: center;">Air Baku (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> <b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #e35651; 
							text-align: center; 
							font-size: 11.5px; 
							color: #fff;
							font-weight: bold;'),
					),
				array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{update}{delete}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("unitKerja/view", array("id"=>$data->ID))'),
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #5dbb5d; 
							text-align: right; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				),
			)

		); 		
	?>		
<?php else : ?>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>
<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'permukaan-grid',
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
							'colspan'=> 9,
						),
					),
				array(	// Nama Objek
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Objek</p>',
					'name'=>'nama_objek', 
					'type'=>'raw',
					'value'=>'CHtml::link($data->nama_objek, array("permukaan/$data->ID"))',
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
				array(	// Nama Sungai Belum direlasikan
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Sungai</p>',
					'name'=>'nama_sungai', 
					'value'=>'$data->manfaat->nama_sungai',
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
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
				array(	// Tahun
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Tahun Bangun</p>',
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 65px; text-align:center;'),
					//'footer'=>"".$model->getTotal($model->search()->getData(), 'tahun_bangun'),
					'footerHtmlOptions'=>array('style'=>'background-color: #5dbb5d;', 'colspan'=> 2),
					),
				array(	// Jiwa
					'header'=>'<p style="font-size: 10.8px;
						margin: auto; text-align: center;">Air Baku (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> <b></p>",
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
						" <b style='font-size: 10.5px;'><b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #44abc9;  
							text-align: center; 
							font-size: 12px; 
							color: #fff;
							font-weight: bold;'),
					),
				
				),
			)

		); 		
	?>		
<?php else : ?>
<?php 		
		$this->widget('bootstrap.widgets.TbGridView', array(
			'type'=>'striped bordered condensed',
			'id'=>'permukaan-grid',
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
							'colspan'=> 9,
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
				array(	// Nama Sungai Belum direlasikan
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Nama Sungai</p>',
					'name'=>'nama_sungai', 
					'value'=>'$data->manfaat->nama_sungai',
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
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
				array(	// Debit
					'header'=>'<p style="font-size: 10.8px; padding: 0px; 
						margin: auto; text-align: center;">Debit (l/dtk)</p>',
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"<p>".$model->getTotals('debit',$model->search()->getKeys()).
						" <b style='font-size: 10.5px;'><b></p>",
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
				array(	// Jiwa
					'header'=>'<p style="font-size: 10.8px;
						margin: auto; text-align: center;">Air Baku (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> <b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #e35651; 
							text-align: center; 
							font-size: 11.5px; 
							color: #fff;
							font-weight: bold;'),
					),
				
				),
			)

		); 		
	?>
<?php endif ?>
<?php endif ?>
</form>
<script>
function esungai()
{	
    document.dSungai.action="/siatab/permukaan/esungai";
	document.dSungai.submit();
}

function isungai()
{	
    document.dSungai.action="/siatab/permukaan/isungai";
	document.dSungai.submit();
}

function usungai()
{	
    document.dSungai.action="/siatab/permukaan/usungai";
	document.dSungai.submit();
}
</script>


