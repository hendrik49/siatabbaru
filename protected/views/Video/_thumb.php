

<li style="width:21%;">
	<p>
	<a href="<?php echo Yii::app()->createUrl("Video/view", array("id"=>$data->ID))?>" class="thumbnail" rel="tooltip" data-title="video">
		<video width="230" height="180" controls id="video">
    	<source  src=<?php echo Yii::app()->request->baseUrl."/data/Video/".$data->Link;?> type="video/mp4">
		</video>
	</a>
	<p class="date" style="font-size:12px;color:#999;">
	<b><?php echo $data->NamaVideo ?></b>
	</br>
	<?php echo substr($data->Deskripsi,32,67);?>
	<?php echo date('d, M Y', $data->Tanggal);?>	
	<i> created by Admin </i>
	</p>
	</p>

</li>