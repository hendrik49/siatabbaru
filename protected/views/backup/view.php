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

	<h2 class="h-view" style="padding-top:8px;"><?php echo CHtml::link('Upload Data', array('backup/')); ?></h2>
	<div id="boxs" class="span9" style="background-size:100% 28px; padding-top:5px;padding-bottom:5px;">
	
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
 //echo $data->dump(1,1);
 echo "<br><br><table>";
 for ($i=1; $i<=$baris; $i++){
	echo "<tr>";
	for($n=1; $n<=$kolom; $n++){
		
		if($n <= 15){
			$data1 = $data->val($i,$n);
			if($i <= 1){
				echo "<th>".$data1."</th>";
			}else{
				echo "<td>".$data1."</td>";
			}
		}
	}
	echo "</tr>";
 }
 echo "</table>";
//nilai awal counter jumlah data yang sukses dan yang gagal diimport
 $sukses = 0;
 $gagal = 0;
//import data excel dari baris kedua, karena baris pertama adalah nama kolom
 for ($i=1; $i<=$baris; $i++) {
 //membaca data nip (kolom ke-1)
 //$ID = $data->val($i,1);
 //membaca data nama depan (kolom ke-2)

  $datas1= $data->val($i,2);
  $datas2= $data->val($i,3);
  $datas3= $data->val($i,4);
  $datas4= $data->val($i,5);
  $datas5= $data->val($i,6);
  $datas6= $data->val($i,7);
  $datas7= $data->val($i,8);
  $datas8= $data->val($i,9);
  $datas9= $data->val($i,10);
  $datas10= $data->val($i,11);
  $datas11= $data->val($i,12);
  $datas12= $data->val($i,13);
  $datas13= $data->val($i,14);
  $datas14= $data->val($i,15);
  $datas15= $data->val($i,16);
  $datas16= $data->val($i,17);
  $datas17= $data->val($i,18);
  $datas18= $data->val($i,19);
  $datas19= $data->val($i,20);
  
//setelah data dibaca, sisipkan ke dalam tabel pegawai
 $query = "INSERT INTO t_db_perencanaan values ('$datas1','$datas2','$datas3','$datas4','$datas5','$datas6','$datas7','$datas8','$datas9','$datas10','$datas11','$datas12','$datas13','$datas14','$datas15','$datas16','$datas17','$datas18','$datas19')";
 $hasil = mysql_query($query);

			
			if($hasil){
	
				$sukses++;
			}
			else {$gagal++;}

 
 
//menambah counter jika berhasil atau gagal
  
	


 
}
 //tampilkan report hasil import
 echo "<h3> Proses Import Data Sarana Kesling Selesai</h3>";
 echo "<p>Jumlah data sukses diimport : ".$baris."<br>";
 echo "Jumlah data gagal diimport : ".$kolom."<p>";
 

		
/*
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$table_name = "t_db_perencanaan";
$backup_file  = "/backupkesling/datakesling.sql";
$sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name (kdsatker, NamaSatker, NamaBalai, KdOutput, nmoutput, Kinerja, satm, vol1, SatuanOutcome)";

mysql_select_db('db_perpustakaan');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  echo('Could not load data : ' . mysql_error());
}
else{
	echo "Loaded  data successfully\n";
}
mysql_close($conn)
/*;*/
?>

</div>	

