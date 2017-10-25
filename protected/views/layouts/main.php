<?php /* @var $this Con00troller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<?php Yii::app()->bootstrap->register(); ?>	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/themes/font-awesome/css/font-awesome.css" /> 
	<title><?php //echo CHtml::encode($this->pageTitle); ?></title>



</head>

<body>

		
	<div class="row-fluid" style="padding-top: 3.5%;">
		
		<?php 
			$this->widget('bootstrap.widgets.TbNavbar', array(
			'type'=>'inverse', // null or 'inverse'
			'brand'=>'Sistem Informasi Air Tanah & Air Baku',
			//'img'=>array('/site/images/LOGO-KEMENTERIAN-PEKERJAAN-UMUM.png'),
			'brandUrl'=>array('/site/'),
			'collapse'=>true, // requires bootstrap-responsive.css
			'items'=>array(
			    array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				),
				
				'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span12" placeholder="Search"></form>',
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right'),
					'items'=>array(
					//array('label'=>'Link', 'url'=>'#'),
						array('label'=>'Kelola Web', 'url'=>'#', 'items'=>array(
							array('label'=>'Kelola Peta', 'url'=>array('/peta')),
							array('label'=>'Manajemen Admin', 'url'=>array('/user'), 'visible'=>(isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN))), 
							array('label'=>'Kelola Balai', 'url'=>array('/unitKerja')),
							'---',
							array('label'=>'Kelola Galeri', 'url'=>'#'),
						), 'visible'=>(isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == (User::USER_SUPER_ADMIN AND User::USER_ADMIN)))
					),
					),
				),
			),
		));

		?>
	
	</div>
	<div class="row-fluid" >
			<?php echo $content; ?>	
	</div>		<!-- footer -->
	<footer class="modal-footer">
		<center>
			<div>
				Copyright &copy; <?php echo date('Y'); ?> by Pusat Air Tanah dan Air Baku<br/>
				All Rights Reserved.<br/><?php // echo Yii::powered(); ?>
			</div>
		</center>
		</footer>
</body>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/ckeditor/ckeditor.js"></script>

</html>
