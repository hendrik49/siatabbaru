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
			for ($i=1; $i<=3; $i++){
				echo "<tr>";
				for($n=1; $n<=$kolom; $n++){
					if($n <= 20){
						$data1 = $data->val($i,$n);
						if($i < 2){
							echo "<th>".$data1."</th>";
						}
					}
				}
				echo "</tr>";
			} 
			for ($i=4; $i<=$baris; $i++){
				echo "<tr>";
				for($n=1; $n<=$kolom; $n++){
					if($i < 5){
						$data1 = $data->val($i,$n);
						$itemrow[$n] = $data1;
						if($n <= 20){
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

		$model->Tanggal = time();
		$model->kdsatker = $itemrow[1];
		$model->NamaSatker = $itemrow[2];
		$model->NamaBalai = $itemrow[3];
		$model->KdOutput = $itemrow[4];
		$model->nmoutput = $itemrow[5];
		$model->Kinerja = $itemrow[6];
		$model->Strategis = $itemrow[7];
		$model->satm = $itemrow[8];
		$model->vol1 = $itemrow[9];
		$model->st_outcome = $itemrow[10];
		$model->vol2 = $itemrow[11];
		$model->rpm =$itemrow[12];
		$model->rmp = $itemrow[13];
		$model->apln = $itemrow[14];
		$model->Jumlah = $itemrow[15];
		$model->nmkabkota = $itemrow[16];
		$model->kewenangan = $itemrow[17];
		$model->jk2 = $itemrow[18];
		$model->b_sp = $itemrow[19];
		$model->swakelola = $itemrow[20];
		$model->RTRW = $itemrow[21];
		$model->SIPPA = $itemrow[22];
		$model->Permohonan = $itemrow[23];
		$model->RKP_Renstra = $itemrow[24];
		$model->DokumenLH = $itemrow[25];
		$model->DokumenkesiapanLahan = $itemrow[26];
		$model->FS_SID_DED = $itemrow[27];
		$model->KAK_RAB = $itemrow[28];
		$model->Keterangan = $itemrow[29];
		?>		
	<div class="span10" style="margin-left: 0;">
		<?php 
			echo "<h3>Hasil Komparasi Data Excel</h3>"; 
			?>
		</div>
	
	<div class="span2">
		<?php 
			echo "<br><p>Jumlah baris : ".$baris."<br>";
			echo "Jumlah kolom : ".$kolom."<p>";
			?>
		</div>

	<div class="span12" style="margin-left: 0;">
		<?php echo $form->textFieldRow($model, 'Tanggal', array('prepend'=>'<div class="headname">tanggal</div>', 'style'=>'width: 95px', 'readOnly'=>true)); ?>
		<?php echo $form->textFieldRow($model, 'kdsatker', array('prepend'=>'<div class="headname">kd satker</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'NamaSatker', array('prepend'=>'<div class="headname">nm satker</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'NamaBalai', array('prepend'=>'<div class="headname">nm balai</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'KdOutput', array('prepend'=>'<div class="headname">kd output</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'nmoutput', array('prepend'=>'<div class="headname">nm output</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'Kinerja', array('prepend'=>'<div class="headname">kinerja</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'Strategis', array('prepend'=>'<div class="headname">strategis</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'satm', array('prepend'=>'<div class="headname">satm</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'vol1', array('prepend'=>'<div class="headname">vol 1</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'st_outcome', array('prepend'=>'<div class="headname">st outcome</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'vol2', array('prepend'=>'<div class="headname">vol 2</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'rpm', array('prepend'=>'<div class="headname">r p m</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'rmp', array('prepend'=>'<div class="headname">r m p</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'apln', array('prepend'=>'<div class="headname">apln</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'Jumlah', array('prepend'=>'<div class="headname">jumlah</div>', 'style'=>'width: 95px')); ?>	
		<?php echo $form->textFieldRow($model, 'nmkabkota', array('prepend'=>'<div class="headname">nm kab kota</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'kewenangan', array('prepend'=>'<div class="headname">kewenangan</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'jk2', array('prepend'=>'<div class="headname">jk 2</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'b_sp', array('prepend'=>'<div class="headname">b sp</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'swakelola', array('prepend'=>'<div class="headname">swakelola</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'RTRW', array('prepend'=>'<div class="headname">r t r w</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'SIPPA', array('prepend'=>'<div class="headname">sippa</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'Permohonan', array('prepend'=>'<div class="headname">permohonan</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'RKP_Renstra', array('prepend'=>'<div class="headname">rkp renstra</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'DokumenLH', array('prepend'=>'<div class="headname">dok LH</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'DokumenkesiapanLahan', array('prepend'=>'<div class="headname">dokes lahan</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'FS_SID_DED', array('prepend'=>'<div class="headname">FS SID DED</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'KAK_RAB', array('prepend'=>'<div class="headname">kak & rab</div>', 'style'=>'width: 95px')); ?>
		<?php echo $form->textFieldRow($model, 'Keterangan', array('prepend'=>'<div class="headname">keterangan</div>', 'style'=>'width: 95px')); ?>
		</div>

	<h3 class="span8">Simpan Data Hasil Komparasi | 
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'danger', 'label'=>'Import ke Database')); ?>
		<?php $this->endWidget(); ?>
		</h3>		
		</div>

		

	