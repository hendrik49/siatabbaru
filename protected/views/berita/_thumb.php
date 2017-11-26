
<li style="width:21%;">
	<p>
	<a href="<?php echo Yii::app()->createUrl("Berita/view", array("id"=>$data->ID))?>" class="thumbnail" rel="tooltip" data-title="Foto">
		<img height="150" src="<?php echo Yii::app()->request->baseUrl.'/data/images/SlideImage/'.$data->Link;?>" alt="">
	</a>
	</br>
	<b><?php echo $data->NamaBerita ?></b>
	<p class="date" style="font-size:12px;color:#999;">
	<?php echo  date('d, M Y', $data->Tanggal); echo '. '.substr($data->Deskripsi,32,25);  ?>
	</br>
	<i class="fa fa-user"> created by Admin </i>
	</p>
	</p>
	</li>
