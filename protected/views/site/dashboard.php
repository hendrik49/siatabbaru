<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array('Dashboard');
include '../siatab/connect.php';
?>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'tinstrument-form',
        'enableAjaxValidation'=>false,
    )); ?>
    <div class="span12" style="height:465px; border: 0px solid red; background-color:#fff;">

    <!-- List Info Tengah -->
    <div class="span8" style="border: 0px solid red; margin-top:-10px;">
        <div class="nav-side-menu" style="margin-top: 92px; height: 74.1%; background-color: #3d9140; width: 55%;">
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
                <ul id="menu-content" class="menu-content">
                <li  data-toggle="collapse" data-target="#kondisi" class="collapsed">
                    <a href="#"><i class="fa fa-bar-chart fa-lg" style="margin-top:0px;"></i><strong> Hasil Neraca Air </strong><span class="arrow"></span></a>
                </li>
                        <ul class="sub-menu collapse" id="kondisi">
                            
                        </ul>
                        <li class="active">
                        <div class="span6" style="width:50%;">
                            <?php $bb=array();
                            foreach($dataProvider->getData() as $i=>$ii)
                                $bb[$i]=array($ii['sumur'],(int)$ii['count(id)']);

                            $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options'=>array(
                                'series' => array( array('type'=>'pie','data' =>$bb)),
                                'title'=>'Kondisi Sumur Air Tanah',
                                'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
                                'plotOptions'=>array('pie'=>(array('allowPointSelect'=>true,'showInLegend'=>true,'cursor'=>'pointer'))),
                                'credits'=>array('enabled'=>false),
                            )));
                            ?>
                        </div>
                        <div class="span6" style="width:50%; margin-left:0px;">
                            <?php $cc=array();
                            foreach($dataProvider1->getData() as $x=>$nn)
                                $cc[$x]=array($nn['reservoar'],(int)$nn['count(id)']);

                            $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options'=>array(
                                'series' => array( array('type'=>'pie','data' =>$cc)),
                                'title'=>'Kondisi Reservoar Air Tanah',
                                'tooltip' => array('formatter' => 'js:function(){ return "<b>"+this.point.name+"</b> :"+this.y; }'),
                                'plotOptions'=>array('pie'=>(array('allowPointSelect'=>true,'showInLegend'=>true,'cursor'=>'pointer'))),
                                'credits'=>array('enabled'=>false),
                            )));
                            ?>
                        </div>
                       
                        </li>
                  
                <li  data-toggle="collapse" data-target="#tabel" class="collapsed">
                    <a href="#"><i class="fa fa-table fa-lg" style="margin-top:0px;"></i><strong> Tabel Kondisi </strong><span class="arrow"></span></a>
                </li>  
                    <ul class="sub-menu collapse" id="tabel">
                        <li class="active"><i>Kondisi Infrastuktur Sumur</i>
                            <?php echo $this->renderPartial('//sumur/index', array('model'=>$model)); ?>
                        </li>
                    </ul> 
                </ul>
            </div>
        </div>
    </div>



    <!-- List Info Kolom Kanan -->
    <div class="span4" style="border: 0px solid red; margin-top:-10px;">
        <div class="nav-side-menu" style="margin-top: 92px; height: 74.1%; background-color: #3d9140; width: 25.9%;">
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
            <div class="menu-list">
                <ul id="menu-content" class="menu-content">
                <li  data-toggle="collapse" data-target="#sumur" class="collapsed">
                    <a href="#"><i class="fa fa-trello fa-lg"></i> Kondisi Air Tanah (Sumur) <span class="arrow"></span></a>
                </li>
                        <ul class="sub-menu collapse" id="sumur">
                            
                        </ul>
                        <li class="active">
                            <div style="width: 330px;">
                            <?php $aa=array(); $xx=array();
                                foreach($dataProvider2->getData() as $s=>$rr)
                                    $aa[$s]=array($rr['pompa'],(int)$rr['count(id)']);
                                    $xx[$s]=array($rr['rumah_pompa'],(int)$rr['count(id)']);
                                $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                                'options'=>array(
                                    'series' => array( array('type'=>'pie','data'=>$aa), array('type'=>'pie','data'=>$xx)),
                                    'title'=>'Kondisi Pompa dan Rumah Pompa Air Tanah',
                                    'tooltip' => array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> :"+this.y+"%"; }'),
                                    'plotOptions'=>array(
                                        'pie'=>(array(
                                            'allowPointSelect'=>true, 'showInLegend'=>true, 'plotShadow'=>false,
                                            'plotBackgroundColor'=>null, 'plotBorderWidth'=> null,'cursor'=>'pointer'))),
                                    'credits'=>array('enabled'=>false),
                                )));
                                ?>
                                </div>
                            </li>
                <li  data-toggle="collapse" data-target="#mataair" class="collapsed">
                    <a href="#"><i class="fa fa-tint fa-lg"></i> Kondisi Mata Air (Air Baku) <span class="arrow"></span></a>
                </li> 
                <li  data-toggle="collapse" data-target="#hujan" class="collapsed">
                    <a href="#"><i class="fa fa-inbox fa-lg"></i> Kondisi Infrastruktur PAH (Air Baku) <span class="arrow"></span></a>
                </li>    
                    <ul class="sub-menu collapse" id="hujan">
                        <li class="active">
                        <div style="width: 330px; margin-left:3px;">
                        <?php $broncap=array(); $reserv=array(); $pompa=array(); $r_pompa=array();
                            foreach($dataProvider3->getData() as $s=>$rr)
                                //$brondcap[$s]=array($rr['broncaptering'],(int)$rr['count(id)']);
                                //$reserv[$s]=array($rr['reservoar'],(int)$rr['count(id)']);
                                $pompa[$s]=array($rr['pompa'],(int)$rr['count(id)']);
                                //$r_pompa[$s]=array($rr['rumah_pompa'],(int)$rr['count(id)']);
                            $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options'=>array(
                                'series' => array( 
                                    array('type'=>'pie','data'=>$pompa)), 
                                    //array('type'=>'pie','data'=>$r_pompa),
                                    // array('type'=>'pie','data'=>$reserv),                                         //array('type'=>'pie','data'=>$brondcap)),
                                'title'=>'Kondisi Pompa dan Rumah Pompa Air Tanah',
                                'tooltip' => array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> :"+this.y+"%"; }'),
                                'plotOptions'=>array(
                                    'pie'=>(array(
                                        'allowPointSelect'=>true, 'showInLegend'=>true, 'plotShadow'=>false,
                                        'plotBackgroundColor'=>null, 'plotBorderWidth'=> null,'cursor'=>'pointer'))),
                                'credits'=>array('enabled'=>false),
                            )));
                            ?>
                        </div>
                        </li>
                    </ul> 
                <li  data-toggle="collapse" data-target="#permukaan" class="collapsed">
                    <a href="#"><i class="fa fa-building fa-lg"></i> Kondisi Permukaan (Air Baku) <span class="arrow"></span></a>
                </li>
                <li  data-toggle="collapse" data-target="#tampungan" class="collapsed">
                    <a href="#"><i class="fa fa-building fa-lg"></i> Kondisi Tampungan (Air Baku) <span class="arrow"></span></a>
                </li>    
                </ul>
            </div>
        </div>
    </div>    
    

    </div> 
        <?php $this->endWidget(); ?>        
      
        
    










