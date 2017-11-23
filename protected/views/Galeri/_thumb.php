
<li style="width:21%;">
	<p>
	<a href="<?php echo Yii::app()->createUrl("Galeri/view", array("id"=>$data->ID))?>" class="thumbnail" rel="tooltip" data-title="Foto">
		<img style="width:240px; height:180px;" src=<?php echo Yii::app()->request->baseUrl."/data/Galeri/".$data->Link; ?> alt="">
	</a>
	<b><?php echo $data->NamaGambar ?></b>
	<p class="date" style="font-size:12px;color:#999;">
	<?php echo substr($data->Deskripsi,32,67);  ?>
	<?php echo date('d, M Y', $data->Tanggal); ?>	
	<i> created by Admin </i>
	</p>
	</p>
</li>