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
                        <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
                        <script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Neraca\'s Air Provinsi Bali'
    },
    subtitle: {
        text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Population in 2008: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['jawa', 23.7],
            ['jawa barat', 16.1],
            ['cianjur', 14.2],
            ['bali', 14.0],
            ['denpasar', 12.5],
            ['buleleng', 12.1],
            ['klungkung', 11.8],
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
                        </script>
                       
                        </li>
                  
                <li  data-toggle="collapse" data-target="#tabel" class="collapsed">
                    <a href="#"><i class="fa fa-table fa-lg" style="margin-top:0px;"></i><strong> Tabel Kondisi </strong><span class="arrow"></span></a>
                </li>  
                    <!--<ul class="sub-menu collapse" id="tabel">
                        <li class="active"><i>Kondisi Infrastuktur Sumur</i>
                            
                        </li>
                    </ul> -->
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
      
        
    










