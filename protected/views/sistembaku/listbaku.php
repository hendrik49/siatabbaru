<?php

$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Baku',
);
?>
<style type="text/css">
	.sungai { width: 125px; height: 260px; margin: 15px 15px 0 15px; 
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/air_baku_permukaan1.png'); background-size: 125px; }
	.sungai:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/air_baku_permukaan2.png'); }	
	.tekssungai { background-color: #e9e15e; color: rgba(233,225,94,0.5); text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #888111;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.tekssungai:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }
	.boxsungai { width: 125px; height: auto; /*-webkit-border-radius: 90px; border: 1px solid #e9e15e; background-color: #e9e15e; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxsungai:hover { cursor:pointer; }	

	.pah { width: 125px; height: 260px; margin: 15px 15px 0 15px; /*-webkit-border-radius: 90px; border: 10px solid #fff;*/
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/tampungan_air_hujan1.png'); background-size: 125px auto; }
	.pah:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/tampungan_air_hujan2.png'); }		
	.tekspah { background-color: #86ba3b; color: rgba(134,186,59,0.5); text-shadow: 2px 2px 1px rgba(119,171,44,0.5), 0 0 0 #4b6d1b;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.tekspah:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }	
	.boxpah { width: 125px; height: auto; /*-webkit-border-radius: 90px; border: 1px solid #86ba3b; background-color: #86ba3b; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxpah:hover { cursor:pointer; }
	
	.bendung { width: 125px; height: 260px; margin: 15px 15px 0 15px; /*-webkit-border-radius: 90px; border: 10px solid #fff;*/
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/air_baku_tampungan1.png'); background-size: 125px auto; }
	.bendung:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/air_baku_tampungan2.png'); }	
	.teksbendung{ background-color: #3c9e8f; color: rgba(60,158,143,0.4); text-shadow: 2px 2px 1px rgba(56,189,169,0.5), 0 0 0 #1c6156;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.teksbendung:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }
	.boxbendung { width: 125px; height: auto; /*-webkit-border-radius: 90px; border: 1px solid #3c9e8f; background-color: #3c9e8f; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxbendung:hover { cursor:pointer; }	
	
	.mataair { width: 125px; height: 260px; margin: 15px 15px 0 15px; /*-webkit-border-radius: 90px; border: 10px solid #fff;*/
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/mata_air1.png'); background-size: 125px auto; }
	.mataair:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/mata_air2.png'); }	
	.teksmataair{ font-family: Helvetica, Arial, sans-serif; font-weight: bold; font-size: 2.7em; line-height: 1.1em;
		background-color: #f48e39; color: rgba(244,142,57,0.4); text-shadow: 2px 2px 1px rgba(250,137,42,0.5), 0 0 0 #c3600d;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.teksmataair:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }
	.boxmataair { width: 125px; height: auto; /*-webkit-border-radius: 90px; border: 1px solid #f48e39; background-color: #f48e39; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxmataair:hover { cursor:pointer; }

	
	h1 { font-family: Helvetica, Arial, sans-serif; font-weight: bold; font-size: 1.8em; line-height: 1.1em; }
	
</style>
	<div>
		<div class="span8">

			<div class="span3" style="padding-left:5px;">

				<div class="boxsungai" style="margin: 5px 30px 5px 0;"><a href="/siatab/permukaan">
					<div class="sungai">
						
					</div></a>
				</div>
			</div>
			<div class="span3" style="padding-left:5px;">
				<div class="boxpah" style="margin: 5px 30px 5px 0;"><a href="/siatab/hujan">
					<div class="pah">
						
					</div></a>
				</div>
			</div>
				<div class="span3" style="padding-left:5px;">

					<div class="boxbendung" style="margin: 5px 30px 5px 0;"><a href="/siatab/tampungan">
						<div class="bendung">
							
						</div></a>
					</div>
				</div>
				<div class="span3" style="padding-left:5px;">
					<div class="boxmataair" style="margin: 5px 30px 5px 0;"><a href="/siatab/mataair">
						<div class="mataair">
							
						</div></a>
					</div>
				</div>
		</div>

		<div class="span4" >
			<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_ADMIN)) :?> | 
			<?php $datacomp = 0;
				$this->widget('bootstrap.widgets.TbButton', array( 'type'=>'primary',
					'label'=>'Tambah Sistem',
					'url'=>'/siatab/sistembaku/add',
					'htmlOptions'=>array('data-dismiss'=>'CHtml'),
				)); 
			?>
			<?php endif ?>
			<?php //$this->renderPartial('//sumurs/search', array('model'=>$model)); ?>
			<?php 		
				$this->widget('bootstrap.widgets.TbGridView', array(
					'type'=>'striped bordered condensed',
					'id'=>'SistemBaku',
					//'dataProvider'=>$model->search(),
					'dataProvider'=>$dataProvider,
					//'filter'=>$model,
					'template'=>"{items}",
					'columns'=>array( 'Nama_Sistem',
					array('class'=>'bootstrap.widgets.TbButtonColumn', 'template'=>'{view}', 'buttons'=>array(
							'viewButtonUrl'=>'Yii::app()->createUrl("sistembaku/view", array("id"=>$data->ID_Balai_Sistem))'),
						), 
						),
					)

				); 		
			?>		
			
		</div>
	</div>	
