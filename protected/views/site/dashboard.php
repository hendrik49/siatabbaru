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
                                $aa[$s]=array($rr['kinerja'],(int)$rr['count(id)']);
                                //$xx[$s]=array($rr['rumah_pompa'],(int)$rr['count(id)']);

                        $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                        'options'=>array(
                            'series' => array( array('type'=>'pie','data'=>$aa)),
                            'title'=>'Kondisi Sumur',
                            'tooltip' => array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> :"+this.y+"."; }'),
                            'plotOptions'=>array(
                                'pie'=>(array(
                                    'allowPointSelect'=>true, 'showInLegend'=>true, 'plotShadow'=>false,
                                    'plotBackgroundColor'=>null, 'plotBorderWidth'=> null,'cursor'=>'pointer',
                                    'dataLabels'=>array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> : "+this.y+""; }'),
                                ))),
                            'credits'=>array('enabled'=>false),
                        )));
                        ?>
                        </div>
                    </li>
                <li  data-toggle="collapse" data-target="#mataair" class="collapsed">
                    <a href="#"><i class="fa fa-tint fa-lg"></i> Kondisi Mata Air (Air Baku) <span class="arrow"></span></a>
                </li> 
                <ul class="sub-menu collapse" id="mataair">
                        <li class="active">
                        <div style="width: 330px; margin-left:3px;">
                        <?php $broncap=array(); $reserv=array(); $pompa=array(); $r_pompa=array();
                            foreach($dataProvider->getData() as $s=>$rr)
                                
                                $pompa[$s]=array($rr['kinerja'],(int)$rr['count(id)']);
                                
                            $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options'=>array(
                                'series' => array( 
                                    array('type'=>'pie','data'=>$pompa)), 
                                'title'=>'Kondisi',
                                'tooltip' => array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> :"+this.y+"."; }'),
                                'plotOptions'=>array(
                                    'pie'=>(array(
                                        'allowPointSelect'=>true, 'showInLegend'=>true, 'plotShadow'=>false,
                                        'plotBackgroundColor'=>null, 'plotBorderWidth'=> null,'cursor'=>'pointer',
                                        'dataLabels'=>array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> : "+this.y+""; }'),
                                    ))),
                                'credits'=>array('enabled'=>false),
                            )));
                            ?>                        
                        </div>
                        </li>
                    </ul>
                <li  data-toggle="collapse" data-target="#hujan" class="collapsed">
                    <a href="#"><i class="fa fa-inbox fa-lg"></i> Kondisi Infrastruktur PAH (Air Baku) <span class="arrow"></span></a>
                </li>    
                    <ul class="sub-menu collapse" id="hujan">
                        <li class="active">
                        <div style="width: 330px; margin-left:3px;">
                        <?php $broncap=array(); $reserv=array(); $pompa=array(); $r_pompa=array();
                            foreach($dataProvider3->getData() as $s=>$rr)
                                
                                $pompa[$s]=array($rr['kinerja'],(int)$rr['count(id)']);
                                
                            $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options'=>array(
                                'series' => array( 
                                    array('type'=>'pie','data'=>$pompa)), 
                                'title'=>'Kondisi Kinerja Infrastruktur',
                                'tooltip' => array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> :"+this.y+"."; }'),
                                'plotOptions'=>array(
                                    'pie'=>(array(
                                        'allowPointSelect'=>true, 'showInLegend'=>true, 'plotShadow'=>false,
                                        'plotBackgroundColor'=>null, 'plotBorderWidth'=> null,'cursor'=>'pointer',
                                        'dataLabels'=>array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> : "+this.y+""; }'),
                                    
                                    ))),
                                
                                        'credits'=>array('enabled'=>false),
                            )));
                            ?>
                        </div>
                        </li>
                    </ul> 
                <li  data-toggle="collapse" data-target="#permukaan" class="collapsed">
                    <a href="#"><i class="fa fa-building fa-lg"></i> Kondisi Permukaan (Air Baku) <span class="arrow"></span></a>
                </li>
                    <ul class="sub-menu collapse" id="permukaan">
                        <li class="active">
                        <div style="width: 330px; margin-left:3px;">
                        <?php $broncap=array(); $reserv=array(); $pompa=array(); $r_pompa=array();
                            foreach($dataProvider1->getData() as $s=>$rr)
                                
                                $pompa[$s]=array($rr['kinerja'],(int)$rr['count(id)']);
                                
                            $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options'=>array(
                                'series' => array( 
                                    array('type'=>'pie','data'=>$pompa)), 
                                'title'=>'Kondisi Intake ',
                                'tooltip' => array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> :"+this.y+"."; }'),
                                'plotOptions'=>array(
                                    'pie'=>(array(
                                        'allowPointSelect'=>true, 'showInLegend'=>true, 'plotShadow'=>false,
                                        'plotBackgroundColor'=>null, 'plotBorderWidth'=> null,'cursor'=>'pointer', 
                                        'dataLabels'=>array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> : "+this.y+""; }'),
                                    ))),
                                'credits'=>array('enabled'=>false),
                            )));
                            ?>
                        </div>
                        </li>
                    </ul>
                <li  data-toggle="collapse" data-target="#tampungan" class="collapsed">
                    <a href="#"><i class="fa fa-building fa-lg"></i> Kondisi Tampungan (Air Baku) <span class="arrow"></span></a>
                </li>   
                <ul class="sub-menu collapse" id="tampungan">
                        <li class="active">
                        <div style="width: 330px; margin-left:3px;">
                        <?php $broncap=array(); $reserv=array(); $pompa=array(); $r_pompa=array();
                            foreach($dataProvider4->getData() as $s=>$rr)
                                
                                $pompa[$s]=array($rr['kinerja'],(int)$rr['count(id)']);
                                
                            $this->widget('application.extensions.highcharts.HighchartsWidget', array(
                            'options'=>array(
                                'series' => array( 
                                    array('type'=>'pie','data'=>$pompa)), 
                                'title'=>'Kondisi Intake ',
                                'tooltip' => array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> :"+this.y+"."; }'),
                                'plotOptions'=>array(
                                    'pie'=>(array(
                                        'allowPointSelect'=>true, 'showInLegend'=>true, 'plotShadow'=>false,
                                        'plotBackgroundColor'=>null, 'plotBorderWidth'=> null,'cursor'=>'pointer',
                                        'dataLabels'=>array('formatter' => 'js:function(){ return "<p>"+this.point.name+"</p> : "+this.y+""; }'),
                                    ))),
                                'credits'=>array('enabled'=>false),
                            )));
                            ?>
                        </div>
                        </li>
                    </ul>
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
    var rencana = new Array();
    var layanan = new Array();
    var totalab = new Array();
    var selisih = new Array();
    var provs = new Array();
    var i = 0; var jdata = 0;
    <?php $ii = 0; $max=0;?>
    <?php $_dkot = array(); $_dkod = array(); $_data = array();
    $_drencana = array();
    if (isset($_POST['provinsi'])) {
        $pprov = $_POST['provinsi']; //get the nama value from form
    }else{
        //$pprov = 'Jawa Tengah';
    }?>
    var x = document.getElementById("Pprovi").value;
    
    <?php 
        $gets = mysql_query("SELECT * FROM t_neraca_air p order by ID desc"); 
        while($show = mysql_fetch_array($gets)) : 
            
            if($show['ID'] >= $max){ $max = $show['ID']; }
            $ii++;
    ?> i++;
        
        provs[i]='<?php echo $show['provinsi']; ?>';
        
        if(provs[i]==x){
            
            datas[jdata]=<?php echo $show['ID']; ?>;
            totalab[jdata]=<?php echo $show['TotalABKabKota']; ?>;
            rencana[jdata]=<?php echo $show['RencanaLayanan']; ?>;
            layanan[jdata]=<?php echo $show['KebutuhanAirBaku']; ?>;
            kodes[jdata]=['<?php echo $show['KabKota']; ?>'];     
            //selisih[jdata]= (totalab[jdata] + rencana[jdata]) - layanan[jdata];
            selisih[jdata]=<?php echo $show['Selisih']; ?>;
            jdata++;
            

        }
        
    <?php endwhile ?>
   
 
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Neraca Air Provinsi '+ x 
    },
    subtitle: {
        //text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: kodes, 
        
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Liter (m3/thn)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} m3/thn</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total Air Baku Kab/ Kota',
        data: totalab,
    }, {
        name: 'Kebutuhan Air Baku',
        data: layanan,
    }, {
        name: 'Rencana Layanan',
        data: rencana,
    }, {
        name: 'Selisih atau Defisit',
        data: selisih,
    }]
});





}
</script>    

</div>
</div>        
<?php $this->endWidget(); ?>  





