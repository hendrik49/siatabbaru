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
	<!--<div class="row-fluid" style="padding-top: 3.5%;">-->
		
		<?php 
			$this->widget('bootstrap.widgets.TbNavbar', array(
			'type'=>'inverse', // null or 'inverse'
			'brand'=>'S.I. PUSAT ATAB',
			'brandUrl'=>array('/site/'),
			'htmlOptions'=>array('style'=>'position:relative;'),
			'collapse'=>true, // requires bootstrap-responsive.css
			'items'=>array(
				//'<div class="brand">Sistem Informasi Air Tanah & Air Baku</div>',
				'<div style="float:right; margin-right:-80px;"><img style="width:30px; height:30px; -moz-border-radius: 50%;
				-webkit-border-radius: 50%; border-radius: 50%;margin: 5px 5px 0 5px;" src="'.Yii::app()->baseUrl.'/data/Unit Kerja/'.UnitKerja::getNamaUnitKerjaByAdmin().'/Gambar.jpg"></img></div>',
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right', 'style'=>'margin-right:-50px;'),
					'items'=>array(
						array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				),
	
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array('class'=>'pull-right', 'style'=>'float:right;'),
					'items'=>array(
					//array('label'=>'Link', 'url'=>'#'),
						array('label'=>'Web', 'url'=>'#', 'items'=>array(
							array('label'=>'Kelola Peta', 'url'=>array('/peta')),
							array('label'=>'Manajemen Admin', 'url'=>array('/user'), 'visible'=>(isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN))), 
							array('label'=>'Kelola Balai', 'url'=>array('/unitKerja')),
							'---',
							array('label'=>'Kelola Galeri', 'url'=>'#'),
						), 'visible'=>(isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == (User::USER_SUPER_ADMIN AND User::USER_ADMIN)))
					),
					),
				),
				
				//'/siatab/site/indexdata', onkeyup="showHint(this.value)"
				'<form class="navbar-search pull-left" method="post" action="http://localhost/siatab/site/indexdata">
				<input type="text" id="txt1" class="search-query" name="dataIndex"
				placeholder="Cari | Data Air Tanah & Air Baku" style="width:400px; margin-left: -20px;">
				</form>',
				
				
			),
		));

		?>
	
	<!--</div>-->
	<div class="row-fluid" >
	
			<?php echo $content; ?>	
	</div>		<!-- footer -->
	<footer class="modal-footer">
		<center><p>Suggestions: <span id="txtHint"></span></p>
			<div>
				Copyright &copy; <?php echo date('Y'); ?> by Pusat Air Tanah dan Air Baku<br/>
				All Rights Reserved.<br/><?php // echo Yii::powered(); ?>
			</div>
		</center>
		</footer>


		
<script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?q="+str, true);
  xhttp.send();   
}
</script>

</body>
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/themes/ckeditor/ckeditor.js"></script>

</html>
