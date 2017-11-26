<?php 
$this->breadcrumbs=array(
	'Galleri',
);
include '../webgis/connect.php'; ?>

<h2 class="h-view"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Album Galeri | <?php echo CHtml::link('Kelola Album', array('album/')); ?><?php endif ?></h2>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/popup/css/twd-base.css" />	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/popup/css/style.css" />
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/popup/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/popup/js/jquery.lightbox-0.5.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/popup/css/jquery.lightbox-0.5.css" media="screen" />

		<style type="text/css">
			#boxs {
					width: 630px;
					/*height: 365px;*/
					
					font-weight: bold;
					text-decoration:none;
					font-size: 16px;
					//padding-left: 10px;
					color: #F3F2C0;
					border-radius: 10px;
					-webkit-border-radius: 10px;
					border: 2px solid #75832C;
					margin-bottom: 10px;
					background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/bg_head.png');
					background-size:100% 90px;
					background-repeat:no-repeat;
					//background-position:center; 
					box-shadow:0px 1px 3px #000;
			}

			#boxss {
			
					width: 610px;
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
			
			#boxs a, #boxs a:visited {
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
				color: #758327;
				
			}
			
			#boxs a:hover {
				color: #A9941E;
			}
			#boxs e, #box e:visited {
				font-weight: bold;
				text-decoration:none;
				font-size: 10px;
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
		</style>
	<br>
	<div id="boxs" >
		<center><h2 style="background: #E2EB90; text-shadow: 0px 2px 1px  #F8F7E8;">Kegiatan Survey Lapangan Topografi</h2>
			<h2 style="background: #E2EB90; text-shadow: 0px 2px 1px  #F8F7E8;">Kabupaten Rokan Hilir Riau</h2></center>
	<div class="demo-container" style="margin-left: -10px;">
		
		<section>

			<div id="gallery">
				<?php $no = 1; 
					
					$get = "select * from t_galleri order by ID desc"; // ambil berita dari table berita dan diurutkan dari berita terbaru
					$exe = mysql_query($get); // jalankan perintah $get 
					?>
					<ul>
						<?php while($show = mysql_fetch_array($exe)){ 
							if($no <= 1200){	?>
							<li>	
								<a href="<?php echo Yii::app()->baseUrl; ?>/images/Kegiatan/<?php echo "$show[Link]";?>">
								<img width="150px" height="90px" src="<?php echo Yii::app()->baseUrl; ?>/images/Kegiatan/<?php echo "$show[Link]";?>"/>
								</a>
							</li>
						<?php $no++; } } ?>
					</ul>
				
			</div>
		
		</section>
		
		
	</div>
	
	</div>
<script type="text/javascript">
	$(function() {
		$('#gallery a').lightBox();
	});
</script>