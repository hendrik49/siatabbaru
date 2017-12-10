
<li style="width:21%;">
	<p>
	<a href="<?php echo Yii::app()->createUrl("Galeri/view", array("id"=>$data->ID))?>" class="thumbnail" rel="tooltip" data-title="Foto">
		<img style="width:240px; height:180px;" src="<?php echo Yii::app()->request->baseUrl."/data/Galeri/".$data->Link; ?>" alt="">
	</a>
	<p class="date" style="font-size:12px;color:#FFF;background:rgb(69, 103, 141); padding: 5px 10px;">
	<b><?php echo $data->NamaGambar ?></b>
	</br>
	<i class="fa fa-clock-o"></i> <?php echo date('d, M Y', $data->Tanggal); ?>	
	<i class="fa fa-user"> created by Admin </i>
	</p>
	</p>
</li>