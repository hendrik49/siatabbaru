<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Galeri Foto',
);
?>

<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'itemView'=>'_thumb',
    
)); ?>





