<?php

$this->pageTitle=Yii::app()->name . ' - ATAB';
$this->breadcrumbs=array(
	'Air Baku',
);
?>
<style type="text/css">
	.sungai { width: 220px; height: 235px; margin: 15px 15px 0 15px; 
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/sungai1.png'); background-size: 220px; }
	.sungai:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/sungai2.png'); }	
	.tekssungai { background-color: #e9e15e; color: rgba(233,225,94,0.5); text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #888111;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.tekssungai:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }
	.boxsungai { width: 220px; height: 235px; /*-webkit-border-radius: 90px; border: 1px solid #e9e15e; background-color: #e9e15e; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxsungai:hover { cursor:pointer; }

	.pah { width: 220px; height: 235px; margin: 15px 15px 0 15px; /*-webkit-border-radius: 90px; border: 10px solid #fff;*/
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/penampungan air hujan1.png'); background-size: 220px auto; }
	.pah:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/penampungan air hujan2.png'); }		
	.tekspah { background-color: #86ba3b; color: rgba(134,186,59,0.5); text-shadow: 2px 2px 1px rgba(119,171,44,0.5), 0 0 0 #4b6d1b;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.tekspah:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }	
	.boxpah { width: 220px; height: 235px; /*-webkit-border-radius: 90px; border: 1px solid #86ba3b; background-color: #86ba3b; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxpah:hover { cursor:pointer; }
	
	.bendung { width: 220px; height: 235px; margin: 15px 15px 0 15px; /*-webkit-border-radius: 90px; border: 10px solid #fff;*/
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/embung, waduk, bendungan1.png'); background-size: 220px auto; }
	.bendung:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/embung, waduk, bendungan2.png'); }	
	.teksbendung{ background-color: #3c9e8f; color: rgba(60,158,143,0.4); text-shadow: 2px 2px 1px rgba(56,189,169,0.5), 0 0 0 #1c6156;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.teksbendung:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }
	.boxbendung { width: 220px; height: 235px; /*-webkit-border-radius: 90px; border: 1px solid #3c9e8f; background-color: #3c9e8f; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxbendung:hover { cursor:pointer; }	
	
	.mataair { width: 220px; height: 235px; margin: 15px 15px 0 15px; /*-webkit-border-radius: 90px; border: 10px solid #fff;*/
		background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/mata air1.png'); background-size: 220px auto; }
	.mataair:hover { cursor:pointer;	background-image: url('<?php echo Yii::app()->baseUrl; ?>/images/Web-Images/mata air2.png'); }	
	.teksmataair{ font-family: Helvetica, Arial, sans-serif; font-weight: bold; font-size: 2.7em; line-height: 1.1em;
		background-color: #f48e39; color: rgba(244,142,57,0.4); text-shadow: 2px 2px 1px rgba(250,137,42,0.5), 0 0 0 #c3600d;
		-webkit-background-clip: text; -moz-background-clip: text; background-clip: text; }
	.teksmataair:hover { text-shadow: 2px 2px 1px rgba(225,216,70,0.6), 0 0 0 #7a7416; }
	.boxmataair { width: 220px; height: 235px; /*-webkit-border-radius: 90px; border: 1px solid #f48e39; background-color: #f48e39; box-shadow:0px 2px 2px #3f3f36;*/ }
	.boxmataair:hover { cursor:pointer; }

	
	h1 { font-family: Helvetica, Arial, sans-serif; font-weight: bold; font-size: 1.8em; line-height: 1.1em; }
	
</style>
	<div>
		<div class="span12">

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

		
	</div>	
