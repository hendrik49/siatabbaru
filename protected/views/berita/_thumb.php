
<li style="width:21.5%;">
	<p>
	<a href="<?php echo Yii::app()->createUrl("Berita/view", array("id"=>$data->ID))?>" class="thumbnail" rel="tooltip" data-title="Foto">
		<img height="150" src="<?php echo Yii::app()->request->baseUrl.'/images/SlideImage/'.$data->Link;?>" alt="">
	</a>
	</br>
	<b><?php echo $data->NamaBerita ?></b>
	</br>
	<?php echo  substr($data->Deskripsi,0,100);  ?>
	</br>
	<?php echo date('d, M Y', $data->Tanggal); ?>	
	<i> created by Admin </i>
	</p>
	</li>
