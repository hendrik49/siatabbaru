<?php	// ---- Index Link ----
	$this->pageTitle=Yii::app()->name . ' - ATAB';
	$this->breadcrumbs=array(
		'Air Tanah'=>array('/sumur'),
		'Sumur',
	);
?>
<form method="POST" name="dataku">	
	<div class="span12" style="background: #fcd13c; height: auto; margin: -10px 0px 5px 0px; padding: 2px;">
	<h4 style="margin: 0 5px auto;">
	<div class="span7">
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>
		Kelola 
	<?php endif ?>	
		Data Air Tanah (Sumur)
		<!--<div class="span4" style="margin-left: 50px;">-->
		| <input type="button" value="Export" onClick="cetak()" class="btn btn-info">
		| <input type="button" value="Import" onClick="cetak2()" class="btn btn-danger">
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>  
		| <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
			'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
			'buttons'=>array( array('label'=>'Tambah', 'url'=>'/siatab/sumur/tambah')),
			)); ?> |
	<?php endif ?>
	</div>
	</h4>
	</div>

<<<<<<< HEAD
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>	
=======
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?> | 
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Tambah', 'url'=>'/siatab/sumur/tambah'),
        ),
    )); ?>	
<?php endif ?>
</h4></div>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>	
	<form method="POST" name="dataku">	
>>>>>>> 68b3e2c3b8078e19a40b818bd9afa31340424a31
	<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'summaryText'=>'',
			'type'=>'striped bordered condensed',
			'id'=>'sumur-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'htmlOptions'=>array('style'=>'font-size: 11px;'),
			'columns'=>array(
				/*array(
					'header'=>'',
					'value'=>'CHtml::checkBox("NamaSumur[$data->ID]",true,array("value"=>$data->ID))',
					'type'=>'raw',
					'htmlOptions'=>array('style'=>'width: 10px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				*/
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">
						No
						</p>',
					'name'=>'NoData',
					'filter'=>CHtml::activeTextField($model, 'NoData', array('id'=>false,'style'=>'display:none')),
					'value'=>'$data->NoData', 'htmlOptions'=>array('style'=>'width: 35px'), 
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
				array(
					'name'=>'Nama_sumur', 
					'type'=>'raw',
					'value'=>'CHtml::link($data->teknissat->nama_sumur, array("sumur/$data->ID"))',
					'htmlOptions'=>array('style'=>'width: 90px;'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Wilayah Sungai</p>',
					'name'=>'nama_ws', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">C A T</p>',
					'name'=>'nama_cat', 
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Provinsi</p>',
					'name'=>'provinsi', 
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kab/ Kota</p>',
					'name'=>'kota', 'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kecamatan</p>',		
					'name'=>'kecamatan', 'htmlOptions'=>array('style'=>'width: 85px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Desa/ Kel</p>',
					'name'=>'desa', 
					'htmlOptions'=>array('style'=>'width: 85px;'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.2px;
						margin: auto; text-align: center;">Manfaat (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> jiwa<b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #f9a124; 
							text-align: center; 
							font-size: 11.5px; 
							color: #fff;
							font-weight: bold;'),
					),
				array(
					'header'=>'<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Debit (l/dtk)</p>',
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"<p>".$model->getTotals('debit',$model->search()->getKeys()).
						" l/<b style='font-size: 10.5px;'>d<b></p>",
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #44abc9;  
							text-align: center; 
							font-size: 12px; 
							color: #fff;
							font-weight: bold;'),
					),
				array( 
					'header'=>'<p style="font-size: 10px; padding: 0px;
						margin: auto; text-align: center;">Tadah Hujan (Ha)</p>',
					'name'=>'tadah_saatini',
					'type'=>'raw',
					'value'=>function($data){
						if($data->manfaat->tadah_saatini != ""){
							return '<p><b>'.$data->manfaat->tadah_saatini.' 
							</b><strong style="font-size: 9px;"></strong>
							</p>';
							}
						},
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center; .d{height:100%;}'),
					'footer'=>"<p>".$model->getTotals('tadah_saatini',$model->search()->getKeys()).
						" h<b style='font-size: 10.5px;'>a<b></p>",
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #e35651; 
							text-align: center; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				array(
					'header'=>'
						<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Suplesi (Ha)</p>',
					'name'=>'suplesi_saatini', 
					'value'=>'$data->manfaat->suplesi_saatini', 
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footer'=>"<p>".$model->getTotals('suplesi_saatini',$model->search()->getKeys()).
					" h<b style='font-size: 10.5px;'>a<b></p>",
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #e35651; 
							text-align: right; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				array(
					'header'=>'
						<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Tahun Bangun</p>',
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #5dbb5d; 
							text-align: right; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				/*array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),*/
				))
			); 		
	?>	
<<<<<<< HEAD
	<?php else : ?>
	<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>
	<?php 
=======
		
<?php else : ?>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>
<?php 

>>>>>>> 68b3e2c3b8078e19a40b818bd9afa31340424a31
		$this->widget('bootstrap.widgets.TbGridView', array(
			'summaryText'=>'',
			'type'=>'striped bordered condensed',
			'id'=>'sumur-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'htmlOptions'=>array('style'=>'font-size: 11px;'),
			'columns'=>array(
				/*array(
					'header'=>'',
					'value'=>'CHtml::checkBox("NamaSumur[$data->ID]",true,array("value"=>$data->ID))',
					'type'=>'raw',
					'htmlOptions'=>array('style'=>'width: 10px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				*/
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">
						No
						</p>',
					'name'=>'NoData',
					'filter'=>CHtml::activeTextField($model, 'NoData', array('id'=>false,'style'=>'display:none')),
					'value'=>'$data->NoData', 'htmlOptions'=>array('style'=>'width: 35px'), 
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
				array(
					'name'=>'Nama_sumur', 
					'type'=>'raw',
					'value'=>'CHtml::link($data->teknissat->nama_sumur, array("sumur/$data->ID"))',
					'htmlOptions'=>array('style'=>'width: 90px;'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Wilayah Sungai</p>',
					'name'=>'nama_ws', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">C A T</p>',
					'name'=>'nama_cat', 
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Provinsi</p>',
					'name'=>'provinsi', 
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kab/ Kota</p>',
					'name'=>'kota', 'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kecamatan</p>',		
					'name'=>'kecamatan', 'htmlOptions'=>array('style'=>'width: 85px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Desa/ Kel</p>',
					'name'=>'desa', 
					'htmlOptions'=>array('style'=>'width: 85px;'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.2px;
						margin: auto; text-align: center;">Manfaat (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> jiwa<b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #f9a124; 
							text-align: center; 
							font-size: 11.5px; 
							color: #fff;
							font-weight: bold;'),
					),
				array(
					'header'=>'<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Debit (l/dtk)</p>',
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"<p>".$model->getTotals('debit',$model->search()->getKeys()).
						" l/<b style='font-size: 10.5px;'>d<b></p>",
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #44abc9;  
							text-align: center; 
							font-size: 12px; 
							color: #fff;
							font-weight: bold;'),
					),
				array( 
					'header'=>'<p style="font-size: 10px; padding: 0px;
						margin: auto; text-align: center;">Tadah Hujan (Ha)</p>',
					'name'=>'tadah_saatini',
					'type'=>'raw',
					'value'=>function($data){
						if($data->manfaat->tadah_saatini != ""){
							return '<p><b>'.$data->manfaat->tadah_saatini.' 
							</b><strong style="font-size: 9px;"></strong>
							</p>';
							}
						},
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center; .d{height:100%;}'),
					'footer'=>"<p>".$model->getTotals('tadah_saatini',$model->search()->getKeys()).
						" h<b style='font-size: 10.5px;'>a<b></p>",
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #e35651; 
							text-align: center; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				array(
					'header'=>'
						<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Suplesi (Ha)</p>',
					'name'=>'suplesi_saatini', 
					'value'=>'$data->manfaat->suplesi_saatini', 
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footer'=>"<p>".$model->getTotals('suplesi_saatini',$model->search()->getKeys()).
					" h<b style='font-size: 10.5px;'>a<b></p>",
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #e35651; 
							text-align: right; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				array(
					'header'=>'
						<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Tahun Bangun</p>',
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #5dbb5d; 
							text-align: right; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						'colspan'=> 2),
					),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{update},{delete}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("Sumur/delete", array("id"=>$data->ID))'),
					'htmlOptions'=>array('style'=>'width: 35px; text-align: center;'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				))
			); 		
	?>
	<?php else : ?>
	<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'summaryText'=>'',
			'type'=>'striped bordered condensed',
			'id'=>'sumur-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'htmlOptions'=>array('style'=>'font-size: 11px;'),
			'columns'=>array(
				/*array(
					'header'=>'',
					'value'=>'CHtml::checkBox("NamaSumur[$data->ID]",true,array("value"=>$data->ID))',
					'type'=>'raw',
					'htmlOptions'=>array('style'=>'width: 10px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				*/
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">
						No
						</p>',
					'name'=>'NoData',
					'filter'=>CHtml::activeTextField($model, 'NoData', array('id'=>false,'style'=>'display:none')),
					'value'=>'$data->NoData', 'htmlOptions'=>array('style'=>'width: 35px'), 
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
				array(
					'name'=>'Nama_sumur', 
					'type'=>'raw',
					'value'=>'$data->teknissat->nama_sumur',
					'htmlOptions'=>array('style'=>'width: 90px;', 'colspan'=> true),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Wilayah Sungai</p>',
					'name'=>'nama_ws', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">C A T</p>',
					'name'=>'nama_cat', 
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Provinsi</p>',
					'name'=>'provinsi', 
					'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kab/ Kota</p>',
					'name'=>'kota', 'htmlOptions'=>array('style'=>'width: 90px'),
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Kecamatan</p>',		
					'name'=>'kecamatan', 'htmlOptions'=>array('style'=>'width: 85px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.5px; padding: auto;
						margin: auto; text-align: center;">Desa/ Kel</p>',
					'name'=>'desa', 
					'htmlOptions'=>array('style'=>'width: 85px;'),
					//'footer'=>"Tanah :", 
					'footerHtmlOptions'=>array('style'=>'display: none;'),
					),
				array(
					'header'=>'<p style="font-size: 10.2px;
						margin: auto; text-align: center;">Manfaat (Jiwa)</p>',
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()).
						"<b style='font-size: 10px;'> jiwa<b></p>",
					'htmlOptions'=>array('style'=>'width: 65px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #f9a124; 
							text-align: center; 
							font-size: 11.5px; 
							color: #fff;
							font-weight: bold;'),
					),
				array(
					'header'=>'<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Debit (l/dtk)</p>',
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"<p>".$model->getTotals('debit',$model->search()->getKeys()).
						" l/<b style='font-size: 10.5px;'>d<b></p>",
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
					'footerHtmlOptions'=>array( 'style'=>'background-color: #44abc9;  
							text-align: center; 
							font-size: 12px; 
							color: #fff;
							font-weight: bold;'),
					),
				array( 
					'header'=>'<p style="font-size: 10px; padding: 0px;
						margin: auto; text-align: center;">Tadah Hujan (Ha)</p>',
					'name'=>'tadah_saatini',
					'type'=>'raw',
					'value'=>function($data){
						if($data->manfaat->tadah_saatini != ""){
							return '<p><b>'.$data->manfaat->tadah_saatini.' 
							</b><strong style="font-size: 9px;"></strong>
							</p>';
							}
						},
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center; .d{height:100%;}'),
					'footer'=>"<p>".$model->getTotals('tadah_saatini',$model->search()->getKeys()).
						" h<b style='font-size: 10.5px;'>a<b></p>",
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #e35651; 
							text-align: center; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				array(
					'header'=>'
						<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Suplesi (Ha)</p>',
					'name'=>'suplesi_saatini', 
					'value'=>'$data->manfaat->suplesi_saatini', 
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footer'=>"<p>".$model->getTotals('suplesi_saatini',$model->search()->getKeys()).
					" h<b style='font-size: 10.5px;'>a<b></p>",
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #e35651; 
							text-align: right; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				array(
					'header'=>'
						<p style="font-size: 10px; padding: 0px; 
						margin: auto; text-align: center;">Tahun Bangun</p>',
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 50px; text-align: center;'),
					'footerHtmlOptions'=>array(
						'style'=>'background-color: #5dbb5d; 
							text-align: right; 
							font-size: 12px;
							color: #fff;
							font-weight: bold;',
						),
					),
				/*array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),*/
				))
			); 		
	?>
	<?php endif ?>
	<?php endif ?>
</form>
<script>

function cetak()
{	
    document.dataku.action="/siatab/sumur/cetak";
<<<<<<< HEAD
	document.dataku.submit();
=======
    document.dataku.submit();
	<?php  ?>
>>>>>>> 68b3e2c3b8078e19a40b818bd9afa31340424a31
}
</script>
 