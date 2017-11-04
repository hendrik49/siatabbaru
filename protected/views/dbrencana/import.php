<?php
/* @bitartik Group */
$this->breadcrumbs=array(
	'DT-Base'=>array('index'),
	$model->ID=>array('import','id'=>$model->ID),
	'import',
);
?>

<div class="span4"> 
	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
			'cssFile'=>Yii::app()->baseUrl . '/css/dtgrid/detailview/styles.css',
			'data'=>$model,
			'attributes'=>array(
				array(
					'name'=>'file_',
					'type'=>'raw',
					'value'=>'<a width="180px" href="'.Yii::app()->createUrl('/data/File/'.$model->file_.'').'">'.$model->file_.'</a>',
					),
				),
			)); 
	?>
</div>
<div class="span11" style="background-size:100% 28px; padding-top:5px;padding-bottom:5px;">	
<script>
	var userfile = "<?php echo $model->file_ ?>";
</script>
<?php

include '../siatab/excel_reader2.php';
//include '../siatab/connect.php';

error_reporting(E_ALL ^ E_NOTICE);
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
//membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);
$kolom = $data->colcount($sheet_index=0); 
//echo $data->dump(1,1); 
?>

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
 echo "Jumlah kolom : ".Yii::app()->params->baseMapPath."/File/".$model->file_."<p>";
?>

</div>	

<?php 
$this->widget('bootstrap.widgets.TbButton', array(
	'id'=>'dasar',
	'buttonType'=>'submit',
	'type'=>'primary',
	'label'=>'Upload',
	));
?>
