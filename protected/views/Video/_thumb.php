

<li style="width:21%;">
	<p>
	<a href="<?php echo Yii::app()->createUrl("Video/view", array("id"=>$data->ID))?>" class="thumbnail" rel="tooltip" data-title="video">
	<?php if ($data->Link) : ?> 
		<video width="230" height="180" controls id="video">
    	<source  src="<?php echo Yii::app()->request->baseUrl."/data/Video/".$data->Link;?>" type="video/mp4">
		</video>
	<?php else : ?>
	<iframe width="230" height="180"  src=<?php echo $data->Youtube; ?> frameborder="0" gesture="media" allowfullscreen></iframe>
		<?php endif ?>	
	</a>
	<p class="date" style="font-size:12px;color:#999; background:rgb(58, 58, 58);padding: 5px 10px;">
	<b><?php echo $data->NamaVideo ?></b>
	</br>
	<?php echo date('d, M Y', $data->Tanggal);?>	
	<i> created by Admin </i>
	</p>
	</p>

</li>