<?php
/* @Bitartik Group */

$this->breadcrumbs=array(
	'Ambil Data dari Folder'=>array('index'),
	'Load Data',
);

include '../siatab/finn.css';
?>
<style>
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
	<h3 class="h-view" style="padding-top:8px;"><?php echo CHtml::link('Upload Data', array('dbrencana/addm')); ?></h3>
	<div class="span11" style="background-size:100% 28px; padding-top:5px;padding-bottom:5px;">	
<?php

include '../siatab/excel_reader2.php';
include '../siatab/connect.php';
//koneksi ke db mysql
 //mysql_connect("localhost","root","");
 //mysql_select_db("db_diskes");
 error_reporting(E_ALL ^ E_NOTICE);
//membaca file excel yang diupload
 $data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
 //membaca jumlah baris dari data excel
 $baris = $data->rowcount($sheet_index=0);
 $kolom = $data->colcount($sheet_index=0); 
 //echo $data->dump(1,1); ?>

<table class="span12">
 <?php
 for ($i=1; $i<=3; $i++){
	echo "<tr>";
	for($n=1; $n<=$kolom; $n++){
		if($n <= 29){
			$data1 = $data->val($i,$n);
			if($i <= 3){
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
			if($n <= 29){
				$data1 = $data->val($i,$n);
				echo "<td>".$data1."</td>";
			}
		}
	}
	echo "</tr>";
 }
 echo "</table>";

 //tampilkan report hasil import
 echo "<h3>File Excel Berhasil dibaca</h3>";
 echo "<p>Jumlah baris : ".$baris."<br>";
 echo "Jumlah kolom : ".$kolom."<p>";
?>

</div>	
