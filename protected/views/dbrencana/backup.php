<?php
/* @Bitartik Group						*/
/** @var BootActiveForm $form 			*/
/*  include '../siatab/styles-css.php';	*/
/*	error_reporting(E_ALL ^ E_NOTICE);	*/
/*	echo $data->dump(1,1); 				*/

$this->breadcrumbs=array(
	'Import Data'=>array('index'),
	'Komparasi',
	);
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'inlineForm',
    'type'=>'inline',
    'htmlOptions'=>array('class'=>'well'),
	)); 

$itemrow = array();
?>
<style>
	.headname {
	margin: -5px -6px -5px -5px; 
	width: 90px; height: 18px;
	/*display: inline-block;
	text-decoration: none;
	outline: none;
	*/
	padding: 5px 0px;
	font-size: 13px;
	cursor: pointer;
	text-align: right;
	padding-right: 6px;
	
	color: #fff;
	background-color: #3d9140;
	border: none;
	border-radius: 2px;
	box-shadow: 0 1px #999;
	}

	.headname:hover {background-color: #307d33;}
	/*
	.button2:active {
	background-color: #307d33;
	box-shadow: 0 1px #666;
	transform: translateY(1px);
	}*/
</style>

<div style="background-color: #; height: 500px;">
	<h3 class="span7">Hasil Baca File Excel  
		</h3>
	<h3 class="span5">Pilih Data Excel Lain |
		<?php 
			$this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'Link',
				'type'=>'primary',
				'label'=>'Buka Data Baru',
				'url'=>array('dbrencana/'),
				));
			?>
		</h3>
		
	<?php
		include '../siatab/excel_reader2.php';
		include '../siatab/finn.css';
		/*  membaca file excel yang diupload    								
		*/
		$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
		/*  membaca jumlah baris dari data excel 								
		*/
		$baris = $data->rowcount($sheet_index=0);
		$kolom = $data->colcount($sheet_index=0);
		?>
	<center>
		<table class="span11">
		<?php
			for ($i=1; $i<=2; $i++){
				echo "<tr>";
				for($n=1; $n<=$kolom; $n++){
					if($n <= 19){
						$data1 = $data->val($i,$n);
						if($i < 2){
							echo "<th>".$data1."</th>";
						}
					}
				}
				echo "</tr>";
			} 
			for ($i=2; $i<=$baris; $i++){
				echo "<tr>";
				for($n=1; $n<=$kolom; $n++){
					if($i <=$baris){
						$data1 = $data->val($i,$n);
						$itemrow[$n] = $data1;
						//input_model($i);
						if($n <= 19){
							echo "<td>".$data1."</td>";
							
						}
					}
				}
				echo "</tr>";
			}
			echo "</table>";
			?>
		</center>
			
	<?php
	
	//function input_model(){
	$x = 1;
	for($x = 1; $x<= $baris; $baris++){
		$model->Tanggal = time();
		$model->kode_satker = $data->val($i,1);
		$model->NamaSatker = $itemrow[2];
		$model->kode_balai = $itemrow[3];
		$model->NamaBalai = $itemrow[4];
		$model->kode_provinsi = $itemrow[5];
		$model->nama_lokasi = $itemrow[6];
		$model->kode_kegiatan = $itemrow[7];
		$model->nama_kegiatan = $itemrow[8];
		$model->kode_output = $itemrow[9];
		$model->nama_output = $itemrow[10];
		
		$model->nama_paket = $itemrow[11];
		$model->vol_output = $itemrow[12];
		$model->sat_output = $itemrow[13];
		$model->vol_outcome = $itemrow[14];
		$model->sat_outcome = $itemrow[15];
		$model->rpm =$itemrow[16];
		$model->rmp = $itemrow[17];
		$model->apln = $itemrow[18];
		$model->Jumlah = $itemrow[19];
		$model->kode_kabupaten = $itemrow[20];

		$model->nama_kabkota = $itemrow[21];
		$model->kewenangan = $itemrow[22];
		$model->MYC = $itemrow[23];
		$model->tahun_mulai = $itemrow[24];
		$model->tahun_selesai = $itemrow[25];
		$model->tahun_ded = $itemrow[26];
		$model->tahun_dok = $itemrow[27];
		$model->tahun_pembebasan = $itemrow[28];
		$model->b_sp = $itemrow[29];
		$model->kode_dukungan_bap = $itemrow[30];

		$model->kode_dukungan_wps = $itemrow[31];
		$model->prioritas_nasional = $itemrow[32];
		$model->program_prioritas = $itemrow[33];
		$model->kegiatan_prioritas = $itemrow[34];
		$model->sasaran_kegiatan = $itemrow[35];
		?>		
	<div class="span10" style="margin-left: 0;">
		<?php 
			echo "<h3>Hasil Komparasi Data Excel</h3>"; 
			?>
		</div>
	
	<div class="span2">
		<?php 
			echo "<br><p>Jumlah baris : ".($baris-2)."<br>";
			echo "Jumlah kolom : ".$kolom."<p>";
		?>
		</div>
	<div style="visibility:hidden">
	<div class="span12" style="margin-left: 0;">
		<?php echo $form->textFieldRow($model, 'Tanggal', array('prepend'=>'<div class="headname">tanggal</div>', 'style'=>'width: 95px', 'readOnly'=>true)); ?>
		<?php echo $form->textFieldRow($model, 'kode_satker', array('prepend'=>'<div class="headname">kd satker</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'NamaSatker', array('prepend'=>'<div class="headname">nm satker</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'kode_balai', array('prepend'=>'<div class="headname">kd balai</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'NamaBalai', array('prepend'=>'<div class="headname">nm balai</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'kode_provinsi', array('prepend'=>'<div class="headname">kd provinsi</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'nama_lokasi', array('prepend'=>'<div class="headname">nm lokasi</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'kode_kegiatan', array('prepend'=>'<div class="headname">kd kegiatan</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'nama_kegiatan', array('prepend'=>'<div class="headname">nm kegiatan</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'kode_output', array('prepend'=>'<div class="headname">kd output</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'nama_output', array('prepend'=>'<div class="headname">nm output</div>', 'style'=>'width: 95px')); ?>

		<?php echo $form->textFieldRow($model, 'nama_paket', array('prepend'=>'<div class="headname">nm paket</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'vol_output', array('prepend'=>'<div class="headname">vol output</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'sat_output', array('prepend'=>'<div class="headname">sat output</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'vol_outcome', array('prepend'=>'<div class="headname">vol outcome</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'sat_outcome', array('prepend'=>'<div class="headname">sat outcome</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'rpm', array('prepend'=>'<div class="headname">r p m</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'rmp', array('prepend'=>'<div class="headname">r m p</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'apln', array('prepend'=>'<div class="headname">apln</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'Jumlah', array('prepend'=>'<div class="headname">jumlah</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'nama_kabkota', array('prepend'=>'<div class="headname">nm kab/kota</div>', 'style'=>'width: 95px')); ?>

		<?php echo $form->textFieldRow($model, 'kewenangan', array('prepend'=>'<div class="headname">kewenangan</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'MYC', array('prepend'=>'<div class="headname">M Y C</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'tahun_mulai', array('prepend'=>'<div class="headname">th mulai</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'tahun_selesai', array('prepend'=>'<div class="headname">th selesai</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'tahun_ded', array('prepend'=>'<div class="headname">th DED</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'tahun_dok', array('prepend'=>'<div class="headname">th Dok</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'tahun_pembebasan', array('prepend'=>'<div class="headname">th bebas</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'b_sp', array('prepend'=>'<div class="headname">b/sp</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'kode_dukungan_bap', array('prepend'=>'<div class="headname">kdd bappenas</div>', 'style'=>'width: 95px')); ?>

		<?php echo $form->textFieldRow($model, 'kode_dukungan_wps', array('prepend'=>'<div class="headname">kdd WPS</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'prioritas_nasional', array('prepend'=>'<div class="headname">p nasional</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'program_prioritas', array('prepend'=>'<div class="headname">p prioritas</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'kegiatan_prioritas', array('prepend'=>'<div class="headname">k prioritas</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'sasaran_kegiatan', array('prepend'=>'<div class="headname">s kegiatan</div>', 'style'=>'width: 95px')); ?>
		</div>
	</div>
	<?php } ?>
	<h3 class="span8">Simpan Data Hasil Komparasi | 
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'danger', 'label'=>'Import ke Database')); ?>
		<?php $this->endWidget(); ?>
		</h3>		
		</div>

		

	