<?php /* @var $this Con00troller */ ?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css_dashboard/bootstrap.css" />
 	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" /> 
	<title><?php //echo CHtml::encode($this->pageTitle); ?></title>

	<?php //Yii::app()->bootstrap->register(); ?>

</head>

<body>
		<!--<nav class="col-md-1 d-none d-sm-block bg-light sidebar" >
				<?php /*
				$this->widget('bootstrap.widgets.TbMenu', array(
					'type'=>'list',
					'items'=>array(
						//array('label'=>'LIST HEADER'),
						array('label'=>'Home', 'icon'=>'home', 'url'=>'#', ),
						array('label'=>'Library', 'icon'=>'book', 'url'=>'#','active'=>true),
						array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
						//array('label'=>'ANOTHER LIST HEADER'),
						array('label'=>'Profile', 'icon'=>'user', 'url'=>'#', 'type'=>'list', 'items'=>array( array('label'=>'Application', 'icon'=>'home', 'url'=>'/dataSumur/'),
						)),
						array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
						array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
					),
				));	*/
				?>
		</nav>-->
	  
    
		<?php 	//********* NAVBAR HORIZONTAL (Bootstrap) **************
			
			$this->widget('bootstrap.widgets.TbNavbar',array(
			'type'=>'list',
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'items'=>array(
						array('label'=>'Beranda', 'url'=>array('/site/index')),
						//**********************************************************************
						//******** menu Atab  ***********
						array('label'=>'Pusat', 'url'=>array('/site/contact'), 'items'=>array(
							array('label'=>'Air Tanah', 'url'=>array('#')), 
							array('label'=>'Air Baku', 'url'=>array('#')),
						)),
						//**********************************************************************
						//******** menu Wilayah  *********** 				
						array('label'=>'Bidang', 'url'=>array('/#'), 'items'=>array(
							array('label'=>'Perencanaan dan TU', 'url'=>array('#'),'items'=>array(
							array('label'=>'Perencanaan', 'url'=>array('#'),'items'=>array(
								array('label'=>'DT-Base', 'url'=>array('#')),
								)),
							array('label'=>'Tata Usaha', 'url'=>array('#'),'items'=>array(
								array('label'=>'Struktur Organisasi', 'url'=>array('#')),
								array('label'=>'Profil Pegawai', 'url'=>array('#')),
								array('label'=>'Profil Satker', 'url'=>array('#')),
								array('label'=>'Persuratan', 'url'=>array('#')),
								)),
							)),					
							array('label'=>'ATAB Barat', 'url'=>array('#'), 'items'=>array(
							array('label'=>'Rekapitulasi', 'url'=>array('#')), 
							array('label'=>'Detail', 'url'=>array('#')),					
							)),	
							array('label'=>'ATAB Timur', 'url'=>array('#'),	'items'=>array(
							array('label'=>'Rekapitulasi', 'url'=>array('#')), 
							array('label'=>'Detail', 'url'=>array('#')),					
							)),
							array('label'=>'Konservasi', 'url'=>array('#'),	'items'=>array(
							array('label'=>'Air Tanah', 'url'=>array('#')), 
							array('label'=>'Air Baku', 'url'=>array('#')),					
							)),
						),'visible'=>(isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN))),
						array('label'=>'Balai', 'url'=>array('/unitKerja/')),
						array('label'=>'Pemetaan', 'url'=>array('/#')),
						array('label'=>'Peraturan', 'url'=>array('/site/peraturan')),
						array('label'=>'Berita', 'url'=>array('/#')),
						array('label'=>'Galeri', 'url'=>array('/#')),
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				),
			),
		)); 
		
				//*********************************
		?>
	
	
	<div class="container-fluid" id="page">
	    <div class="row">
		
			<?php echo $content; ?>
	


			<div class="clear"></div>
			
			<center>
			<div id="footer">
				<div style="width:1090px; margin-top:-10px; margin-left:-80px;">
				<hr style="background-color: #3b3535;"></hr>
				Copyright &copy; <?php echo date('Y'); ?> by Pusat Air Tanah dan Air Baku<br/>
				All Rights Reserved.<br/>
				<?php // echo Yii::powered(); ?>
				</div>
			</div><!-- footer -->
			</center>			
	
	
		</div>
		

	
	</div><!-- page -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_dashboard/jquery-3.2.1.slim.min.js" ></script>
    <script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_dashboard/js/vendor/jquery.min.js"><\/script>')</script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_dashboard/bootstrap.min.js" /></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_dashboard/js/vendor/popper.min.js" /></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js_dashboard/js/ie10-viewport-bug-workaround.js" /></script>
</body>
</html>
