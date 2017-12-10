
<li style="width:21%;">
	<p>
	<a href="<?php echo Yii::app()->createUrl("Berita/view", array("id"=>$data->ID))?>" class="thumbnail" rel="tooltip" data-title="Foto">
		<img height="150" src="<?php echo Yii::app()->request->baseUrl.'/data/images/SlideImage/'.$data->Link;?>" alt="">
	</a>
	</br>
	<b><?php echo $data->NamaBerita ?></b>
	<p class="date" style="font-size:12px;color:#999;">
	<i class="fa fa-clock-o"></i> <?php echo  date('d, M Y', $data->Tanggal);?> 
	<i class="fa fa-user"> created by Admin </i>
	</br>
	<?php echo substr($data->Deskripsi,0,35);  ?>
	</p>
	<a style="background: #0bb535 !important;
		color: #FFF;
		font-size: 11px;
		padding: 2px 7px ;	
		display:block;
		float:left;" href="<?php echo Yii::app()->createUrl("Berita/view", array("id"=>$data->ID))?>">Read More »</a>
	</p>
	</li>
