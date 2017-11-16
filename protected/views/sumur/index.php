<?php
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Tanah'=>array('/sumur'),
	'Sumur',
);

?>
<div class="span6">
<h4>Kelola Data Air Tanah (Sumur)

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
	
	<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'summaryText'=>'',
			'type'=>'striped bordered condensed',
			'id'=>'sumur-grid',
			'dataProvider'=>$model->search(),
			//'dataProvider'=>$dataProvider,
			'filter'=>$model,
			'columns'=>array(
				array(
					'header'=>'',
					'value'=>'CHtml::checkBox("NamaSumur[$data->ID]",true,array("value"=>$data->ID))',
					'type'=>'raw',
					'htmlOptions'=>array('style'=>'width: 10px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'NoData', 'htmlOptions'=>array('style'=>'width: 40px'), 
				'footer'=>"".$model->getTotal($model->search()->getData(), 'NoData'),
				'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'Nama_sumur', 
					'type'=>'raw',
					'value'=>'CHtml::link($data->teknissat->nama_sumur, array("sumur/$data->ID"))',
					'htmlOptions'=>array('style'=>'width: 120px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'nama_ws', 'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'provinsi', 'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kota', 
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kodefikasi', 'htmlOptions'=>array('style'=>'width: 120px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kecamatan', 
					'htmlOptions'=>array('style'=>'width: 100px'),
					'footer'=>"Tanah :", 
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()),
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;')
					),
				array(
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"".$model->getAvarage('debit',$model->search()->getKeys()),
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kondisi_sumur', 
					'value'=>'$data->kondisi->sumur', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;')
					),
				array(
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footer'=>"".$model->getTotal($model->search()->getData(), 'tahun_bangun'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				/*array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),*/
				))
			); 		
	?>	
		
<?php else : ?>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN)) : ?>
<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'summaryText'=>'',
			'type'=>'striped bordered condensed',
			'id'=>'sumur-grid',
			'dataProvider'=>$model->search(),
			//'dataProvider'=>$dataProvider,
			'filter'=>$model,
			'columns'=>array(
				array(
					'header'=>'',
					'value'=>'CHtml::checkBox("NamaSumur[$data->ID]",true,array("value"=>$data->ID))',
					'type'=>'raw',
					'htmlOptions'=>array('style'=>'width: 10px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'NoData', 'htmlOptions'=>array('style'=>'width: 40px'), 
				'footer'=>"".$model->getTotal($model->search()->getData(), 'NoData'),
				'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'Nama_sumur', 
					'type'=>'raw',
					'value'=>'CHtml::link($data->teknissat->nama_sumur, array("sumur/$data->ID"))',
					'htmlOptions'=>array('style'=>'width: 120px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'nama_ws', 'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'provinsi', 'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kota', 
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kodefikasi', 'htmlOptions'=>array('style'=>'width: 120px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kecamatan', 
					'htmlOptions'=>array('style'=>'width: 100px'),
					'footer'=>"Tanah :", 
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()),
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;')
					),
				array(
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"".$model->getAvarage('debit',$model->search()->getKeys()),
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kondisi_sumur', 
					'value'=>'$data->kondisi->sumur', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;')
					),
				array(
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footer'=>"".$model->getTotal($model->search()->getData(), 'tahun_bangun'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				/*array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),*/
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
			//'dataProvider'=>$dataProvider,
			'filter'=>$model,
			'htmlOptions'=>array('style'=>'font-size:11px;'),
			'columns'=>array(
				array(
					'header'=>'',
					'value'=>'CHtml::checkBox("NamaSumur[$data->ID]",true,array("value"=>$data->ID))',
					'type'=>'raw',
					'htmlOptions'=>array('style'=>'width: 10px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'NoData', 'htmlOptions'=>array('style'=>'width: 40px'), 
				'footer'=>"".$model->getTotal($model->search()->getData(), 'NoData'),
				'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'Nama_sumur', 
					'type'=>'raw',
					'value'=>'$data->teknissat->nama_sumur',
					'htmlOptions'=>array('style'=>'width: 120px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'nama_ws', 'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array('name'=>'provinsi', 'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kota', 
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kodefikasi', 'htmlOptions'=>array('style'=>'width: 120px'),
					'footer'=>"Total Manfaat Air-",
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kecamatan', 
					'htmlOptions'=>array('style'=>'width: 100px'),
					'footer'=>"Tanah :", 
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'manfaat_jiwa', 
					'value'=>'number_format($data->manfaat->jiwa,0)',
					'footer'=>"".$model->getTotals('jiwa',$model->search()->getKeys()),
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;')
					),
				array(
					'name'=>'debit_liter', 
					'value'=>'number_format($data->manfaat->debit,0)', 'type'=>'raw', 
					'footer'=>"".$model->getAvarage('debit',$model->search()->getKeys()),
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
					),
				array(
					'name'=>'kondisi_sumur', 
					'value'=>'$data->kondisi->sumur', 
					'htmlOptions'=>array('style'=>'width: 80px'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;')
					),
				array(
					'name'=>'tahun_bangun', 
					'value'=>'$data->teknisga->tahun_bangun', 
					'htmlOptions'=>array('style'=>'width: 50px'),
					'footer'=>"".$model->getTotal($model->search()->getData(), 'tahun_bangun'),
					'footerHtmlOptions'=>array('style'=>'background-color: #f5d525;'),
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
<div class="span6">
		<h4>Anda dapat filter dan Cetak <input type="button" value="Cetak Data" onClick=cetak()></h4>
	</div>
</form>
<script>
function cetak()
{	
    document.dataku.action="/siatab/sumur/cetak";
    document.dataku.submit();
}
</script>
