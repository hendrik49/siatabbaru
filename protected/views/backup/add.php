<?php
/* @Bitartik Group */

$this->breadcrumbs=array(
	'Query ke Folder'=>array('index'),
	'Backup Data',
);

?>
<style type="text/css">
			#boxs {
			
					width: 640px;
					text-decoration:none;
					font-size: 12px;
					padding-left: 10px;
					padding-right: 10px;
					color: #3A3711;
					border-radius: 10px;
					-webkit-border-radius: 10px;
					border: 2px solid #75832C;
					margin-bottom: 10px;
					background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/bg_head.png');
					background-repeat:no-repeat;
					//background-position:center; 
					box-shadow:0px 1px 3px #000;
					
			}
			#boxss {
			
					width: 630px;
					text-decoration:none;
					font-size: 12px;
					padding-left: 10px;
					padding-right: 10px;
					color: #758327;
					//color: #605B19;
					border-radius: 7px;
					-webkit-border-radius: 7px;
					border: 2px solid #75832C;
					margin-bottom: 10px;
					background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/bg_head.png');
					background-repeat:no-repeat;
					box-shadow:0px 1px 3px #000;
					
			}
			
			

			
			#boxs c, #boxs c:visited {
				font-weight: bold;
				text-decoration:none;
				font-size: 14px;
				padding-left: 10px;
				
				color: #758327;
				
			}
			#boxs b, #box b:visited {
				font-weight: bold;
				text-decoration:none;
				font-size: 12px;
				padding-left: 10px;
				padding-bottom: 12px;
				color: #758327;
			}

			
			#boxs c:hover {
				color: #A9941E;
			}
			
			#boxs d, #box d:visited {
				font-weight: bold;
				text-decoration:none;
				font-size: 14px;
				color: #112F02;
			}
			#boxs e, #box e:visited {
				font-weight: bold;
				text-decoration:none;
				font-size: 15px;
				//padding-left: 10px;
				color: #112F02;
			}
			
			#boxs h2, #box h2:visited {
				font-weight: bold;
				text-decoration:none;
				font-size: 28px;
				//color: #3A3711;
				color: #69631A;
				border-radius: 10px;
				-webkit-border-radius: 10px;
				border: 2px;
				margin-bottom: 10px;
			}
		
		table{margin:0 auto;width:80%;border-collapse:collapse;background:#ecf3eb; font-size: 10.4px;}
		caption h4{}
		th, td{border:1px solid #999;}
		th{padding:6px 3px;background: #0cf;}
		td{padding:3px 4px;}
		</style>


<h2 class="form-add">Info File dari Query</h2>
<div id="boxs" style="background-size:100% 28px; padding-top:5px;padding-bottom:5px;">	
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$table_name = "t_kesling";
$backup_file  = "/backupkesling/datakesling.xls";
$sql = "SELECT ID,Puskes,Desa,Judul,RT,RW,Stat,Kon1,Kon3,Kon4,JenSan1,JenSan2,JenSan3,JenSan4,JenSan5,Ctps,Pammrt,TmpSmph,TmpSmph2,Adsplrt INTO OUTFILE '$backup_file' FROM $table_name";

//IGNORE         INTO TABLE $table_name FIELDS TERMINATED BY ',' ENCLOSED BY '"' ESCAPED BY '"' LINES TERMINATED BY '\n' (judul & Tanggal)
mysql_select_db('db_perpustakaan');


$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  echo('Could not load data : ' . mysql_error()); 

  }
else{
echo "Backedup  data successfully\n";
}
mysql_close($conn);
?>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>