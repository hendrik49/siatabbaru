<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array('Dashboard');
include '../siatab/connect.php';
?>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'site-form',
        'type'=>'horizontal',
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'enctype'=>'multipart/form-data',
            ),
        )); 
    ?>

<script src="highcharts.js"></script>
<script src="exporting.js"></script>


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
                    <li class="active">
                        <div class="span7" style="margin-top: 10px;">
                        
                            <?php echo $form->dropDownListRow($model,'provinsi', 
                                CHtml::listData(Provinsi::model()->findAll(),'Nama_provinsi','Nama_provinsi'), array('id'=>'Pprovi')); 
                            ?>
                        </div>
                        <div class="span4" style="margin-top: 10px;">
                            <?php echo CHtml::button("Lihat Grafik", array('onclick'=>'js:getDataKota();', 
                            'class'=>'btn btn-primary',
                            )); ?>
                        </div>
                        <div id="container" style="width: 99.9%; height: 370px; margin: 5px -1px auto"></div>
                    </li>
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
            
<div class="span8" style="visibility: hidden; position:absolute;">
<div class=collapse>

<button type="button" id="click1" onclick="getDataKota()" style="visibility:hidden;"></button>
<script>
setTimeout(myTimeout1, 100)
function myTimeout1() {
	document.getElementById("Pprovi").value = "Bali";
	var button=document.getElementById("click1");
	button.click();
}

function getDataKota(){
    var kotas = new Array();
    var kodes = new Array();
    var datas = new Array();
    var provs = new Array();
    var i = 0; var jdata = 0;
    <?php $ii = 0; $max=0;?>
    <?php $_dkot = array(); $_dkod = array(); $_data = array();
    if (isset($_POST['provinsi'])) {
        $pprov = $_POST['provinsi']; //get the nama value from form
    }else{
        $pprov = 'Jawa Tengah';
    }?>
    var x = document.getElementById("Pprovi").value;

    <?php 
        $gets = mysql_query("SELECT * FROM t_kab_kota p order by no desc"); 
        while($show = mysql_fetch_array($gets)) : 
            
            if($show['no'] >= $max){ $max = $show['no']; }
            $ii++;
            $_dkode[$ii]=$show['kode'];
            $_dkot[$ii]=$show['kab']; 
    ?> i++;
        
        provs[i]='<?php echo $show['provinsi']; ?>';
        
        if(provs[i]==x){
            
            datas[jdata]=<?php echo $show['kode']; ?>;
            kodes[jdata]=['<?php echo $show['kab']; ?>',datas[jdata]];    
            jdata++;
        }
        
    <?php endwhile ?>
   
    
    Highcharts.chart('container', {
        chart: { type: 'column' },
        title: { text: 'Neraca Air Provinsi '+ x },
        subtitle: {},
        xAxis: { type: 'category', 
            labels: { rotation: -45, style: { fontSize: '13px', fontFamily: 'Verdana, sans-serif' }
            }
        },
        yAxis: { min: 0, title: { text: 'Debit (Liter)' }
        },
        legend: { enabled: false },
        tooltip: { pointFormat: 'Debit: <b>{point.y:.1f} liter</b>' },
        series: [{
            name: 'Debit',
            data: kodes, datas,
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
}
</script>    

</div>
</div>        
<?php $this->endWidget(); ?>  








