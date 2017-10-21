<?php
$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Tanah'=>array('/sumur'),
	'Sumur',
);
?>
<b>Kelola Data Air Tanah (Sumur)</b>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
 
<?php echo $form->textFieldRow($model, 'nama_ws', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Go')); ?>
 
<?php $this->endWidget(); ?>
	
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?> | 
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'primary', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Tambah', 'url'=>'/siatab/sumur/tambah'),
        ),
    )); ?>
	<?php //$this->renderPartial('//sumurs/search', array('model'=>$model)); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('search',array(
	'model'=>$model,
)); ?>
</div>	
<?php endif ?>
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>	
	<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'summaryText'=>'',
			'type'=>'striped bordered condensed',
			'id'=>'sumur-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				array('name'=>'NoData', 'htmlOptions'=>array('style'=>'width: 40px')),
				'nama_ws', 
				'provinsi', 
				'kota', 
				array('name'=>'kodefikasi', 'htmlOptions'=>array('style'=>'width: 100px')),
				array('name'=>'kecamatan', 'htmlOptions'=>array('style'=>'width: 100px')),
				array('name'=>'Nama_sumur', 'value'=>'$data->teknissat->nama_sumur', 'htmlOptions'=>array('style'=>'width: 120px')),
				array('name'=>'manfaat_jiwa', 'value'=>'$data->manfaat->jiwa', 'htmlOptions'=>array('style'=>'width: 50px')),
				array('name'=>'debit_liter', 'value'=>'$data->manfaat->debit', 'htmlOptions'=>array('style'=>'width: 50px')),
				array('name'=>'kondisi_sumur', 'value'=>'$data->kondisi->sumur', 'htmlOptions'=>array('style'=>'width: 50px')),
				array('name'=>'tahun_bangun', 'value'=>'$data->teknisga->tahun_bangun', 'htmlOptions'=>array('style'=>'width: 50px')),
			array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("airbakus/detail/", array("id"=>$data->ID))'),
					), 
				),
			)

		); 		
	?>		
<?php else : ?>
	<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'summaryText'=>'',
			'type'=>'striped bordered condensed',
			'id'=>'Sumur',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				array('name'=>'NoData', 'htmlOptions'=>array('style'=>'width: 40px')),
				'nama_ws', 
				'provinsi', 
				'kota', 
				array('name'=>'kodefikasi', 'htmlOptions'=>array('style'=>'width: 100px')),
				array('name'=>'kecamatan', 'htmlOptions'=>array('style'=>'width: 100px')),
				array('name'=>'Nama_sumur', 'value'=>'$data->teknissat->nama_sumur', 'htmlOptions'=>array('style'=>'width: 120px')),
				array('name'=>'manfaat_jiwa', 'value'=>'$data->manfaat->jiwa', 'htmlOptions'=>array('style'=>'width: 50px')),
				array('name'=>'debit_liter', 'value'=>'$data->manfaat->debit', 'htmlOptions'=>array('style'=>'width: 50px')),
				array('name'=>'kondisi_sumur', 'value'=>'$data->kondisi->sumur', 'htmlOptions'=>array('style'=>'width: 50px')),
				array('name'=>'tahun_bangun', 'value'=>'$data->teknisga->tahun_bangun', 'htmlOptions'=>array('style'=>'width: 50px')),
			array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
					'viewButtonUrl'=>'Yii::app()->createUrl("airbakus/detail/", array("id"=>$data->ID))'),
					), 
				),
			)); 	
	?>
<?php endif ?>
