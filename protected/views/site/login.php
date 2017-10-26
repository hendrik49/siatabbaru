<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
include('styles-css.php'); 
?>
<style type='text/css'>
#background_pagess{
	/*background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/bgtik.png') no-repeat;*/
    background: url(../siatab/images/bgtik.png) no-repeat;
    background-size: cover;
} 
.logo-page{
	width:90px;
}
.logo-page:hover{
	cursor:pointer;
}
</style>
<body>
	<img style="width:100%; position:absolute;" src="<?php echo Yii::app()->baseUrl; ?>/images/bgtik.png">
	<div class="google-header-bar  centered">
	</div>
	<div class="banner">
		<h1>
			<strong>Sistem Informasi PUSAT ATAB</strong>
		</h1>
	</div>
			
	<div id="rsi-card" class="card signin-card">
		<center>
		<img class="logo-page" src="<?php echo Yii::app()->baseUrl; ?>/images/LOGO-KEMENTERIAN-PEKERJAAN-UMUM.png">
		</center>
			<p class="profile-name">Balai | SDA | Pusat</p>
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				'id'=>'gaia_loginform',
				'type'=>'inline',
				'enableClientValidation'=>true,
				'htmlOptions'=>array('class'=>'well'),
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
			<div style="padding-top:10px;">
				<?php echo $form->textFieldRow($model,'username'); ?>
			</div>
				<?php echo $form->passwordFieldRow($model,'password',array(
					//'hint'=>'Hint: mungkin dengan <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>',
				)); ?>
				<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

			<div class="rc-button rc-button-submit" style="margin-top:10px;">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'htmlOptions'=>array('class'=>'rc-button rc-button-submit'),
					'type'=>'primary',
					'label'=>'Login',
				)); ?>

			</div>
		
		<?php $this->endWidget(); ?>	
	</div>
	
	

</body>