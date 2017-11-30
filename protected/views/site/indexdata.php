<?php
/* @var $this PetaController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle=Yii::app()->name . ' - Index - Data';
$this->breadcrumbs=array(
	'kata kunci',
);
include '../siatab/connect.php';
?> 
<p id="dd"></p>
<?php $datacek = 0;
if (isset($_POST['dataIndex'])) {
	$KeyData = $_POST['dataIndex']; //get the nama value from form
	} else { $KeyData = ''; }
	
	$qairtanah="SELECT	t_sumur1.nama_ws, t_sumur1.ID, t_sumur1.desa, t_sumur1.kecamatan, t_sumur1.kota, 
				t_sumur1.provinsi, t_sumur1.status, t_sumur2.jiwa, t_sumur2.debit, t_sumur1.kriteria, 
				t_sumur3.nama_sumur, t_sumur5.tahun_bangun, t_sumur6.sumur 
		FROM t_sumur1 
				JOIN t_sumur2 ON t_sumur1.ID = t_sumur2.ID JOIN t_sumur3 ON t_sumur1.ID = t_sumur3.ID
				JOIN t_sumur5 ON t_sumur1.ID = t_sumur5.ID JOIN t_sumur6 ON t_sumur1.ID = t_sumur6.ID
		WHERE t_sumur1.nama_ws LIKE '%$KeyData%' OR t_sumur3.nama_sumur LIKE '%$KeyData%'
				OR t_sumur1.desa LIKE '%$KeyData%' OR t_sumur1.kecamatan LIKE '%$KeyData%' 
				OR t_sumur1.kota LIKE '%$KeyData%' OR t_sumur1.provinsi LIKE '%$KeyData%'
				OR t_sumur5.tahun_bangun LIKE '%$KeyData%' OR t_sumur6.sumur LIKE '%$KeyData%'
				OR t_sumur1.kriteria LIKE '%$KeyData%'
		";				
	
	//query to get the search result Air Tanah
	$result = mysql_query($qairtanah); //execute the query $q
		echo "<div id='datagrid' class='grid-view'>";
		echo "<table class='items table table-striped table-bordered table-condensed' border='1' cellpadding='5' cellspacing='8'>";
		echo "<thead style='background-color:#91f76d; font-color: #fff;'>";
		echo "<tr>";
		echo "<th width='120px'>Sumur/ID Sistem</th>";
		echo "<th width='110px'>Wilayah Sungai</th>";
		echo "<th width='90px'>Desa</th>";
		echo "<th width='90px'>Kecamatan</th>";
		echo "<th width='90px'>Kab/Kota</th>";
		echo "<th width='90px'>Provinsi</th>";
		echo "<th>Jiwa</th>";
		echo "<th>Debit</th>";
		echo "<th width='90px'>Kondisi</th>";
		echo "<th width='60px'>Tahun</th>";
		//echo "<th width='60px'>AT & AB</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody id='myTable'>";		
		/*
		echo "<th><a class='sort-link' href=''>No<span class='caret'></span></a></th>";
		*/
	while ($data = mysql_fetch_array($result)) {  //fetch the result from query into an array
		echo "<tr>";
		echo "<td>".CHtml::link(CHtml::encode($data['nama_sumur']),Yii::app()->createUrl("sumur/view", array("id"=>$data['ID'])))."</td>";
		echo "<td>".$data['nama_ws']."</td>";	
		echo "<td>".$data['desa']."</td>";
		echo "<td>".$data['kecamatan']."</td>";
		echo "<td>".$data['kota']."</td>";
		echo "<td>".$data['provinsi']."</td>";
		echo "<td>".$data['jiwa']."</td>";
		echo "<td>".$data['debit']." l/d</td>";
		echo "<td>".$data['sumur']."</td>";
		echo "<td>thn ".$data['tahun_bangun']."</td>";
		//echo "<td>".$data['kriteria']."</td>";
		echo "</tr>";
		$datacek++;
	}

	$dmataair="SELECT t_mataair1.nama_ws, t_mataair1.ID, t_mataair1.desa, t_mataair1.kecamatan, t_mataair1.kota, 
					t_mataair1.provinsi, t_mataair1.status,	t_mataair2.jiwa, t_mataair2.debit, 
					t_mataair1.kriteria, t_mataair1.nama_sistem, t_mataair5.tahun_bangun, t_mataair6.broncaptering 
		FROM t_mataair1 
				JOIN t_mataair2 ON t_mataair1.ID = t_mataair2.ID JOIN t_mataair3 ON t_mataair1.ID = t_mataair3.ID
				JOIN t_mataair5 ON t_mataair1.ID = t_mataair5.ID JOIN t_mataair6 ON t_mataair1.ID = t_mataair6.ID
		WHERE t_mataair1.nama_ws LIKE '%$KeyData%' OR t_mataair1.nama_sistem LIKE '%$KeyData%'
				OR t_mataair1.desa LIKE '%$KeyData%' OR t_mataair1.kecamatan LIKE '%$KeyData%' 
				OR t_mataair1.kota LIKE '%$KeyData%' OR t_mataair1.provinsi LIKE '%$KeyData%'
				OR t_mataair5.tahun_bangun LIKE '%$KeyData%' OR t_mataair6.broncaptering LIKE '%$KeyData%'
				OR t_mataair1.kriteria LIKE '%$KeyData%'
		";	

	//query to get the search result Air Baku
	$result1 = mysql_query($dmataair); //execute the query $mataair
	while ($dmataair = mysql_fetch_array($result1)) {  //fetch the result from query into an array
		echo "<tr>";
		echo "<td>".CHtml::link(CHtml::encode($dmataair['nama_sistem']),Yii::app()->createUrl("mataair/view", array("id"=>$dmataair['ID'])))."</td>";
		echo "<td>".$dmataair['nama_ws']."</td>";	
		echo "<td>".$dmataair['desa']."</td>";
		echo "<td>".$dmataair['kecamatan']."</td>";
		echo "<td>".$dmataair['kota']."</td>";
		echo "<td>".$dmataair['provinsi']."</td>";
		echo "<td>".$dmataair['jiwa']."</td>";
		echo "<td>".$dmataair['debit']." l/d</td>";
		echo "<td>".$dmataair['broncaptering']."</td>";
		echo "<td>thn ".$dmataair['tahun_bangun']."</td>";
		//echo "<td>".$dmataair['kriteria']."</td>";
		echo "</tr>";
		$datacek++;
	}

	$dtampungan="SELECT t_tampungan1.nama_ws, t_tampungan1.ID, t_tampungan1.desa, t_tampungan1.kecamatan, t_tampungan1.kota, 
	t_tampungan1.provinsi, t_tampungan1.status,	t_tampungan2.jiwa, t_tampungan2.debit, 
	t_tampungan1.kriteria, t_tampungan1.nama_sistem, t_tampungan5.tahun_bangun, t_tampungan6.kondisi_sungai 
	FROM t_tampungan1 
	JOIN t_tampungan2 ON t_tampungan1.ID = t_tampungan2.ID JOIN t_tampungan3 ON t_tampungan1.ID = t_tampungan3.ID
	JOIN t_tampungan5 ON t_tampungan1.ID = t_tampungan5.ID JOIN t_tampungan6 ON t_tampungan1.ID = t_tampungan6.ID
	WHERE t_tampungan1.nama_ws LIKE '%$KeyData%' OR t_tampungan1.nama_sistem LIKE '%$KeyData%'
	OR t_tampungan1.desa LIKE '%$KeyData%' OR t_tampungan1.kecamatan LIKE '%$KeyData%' 
	OR t_tampungan1.kota LIKE '%$KeyData%' OR t_tampungan1.provinsi LIKE '%$KeyData%'
	OR t_tampungan5.tahun_bangun LIKE '%$KeyData%' OR t_tampungan6.kondisi_sungai LIKE '%$KeyData%'
	OR t_tampungan1.kriteria LIKE '%$KeyData%'
	";	

	//query to get the search result Air Baku
	$resultwa = mysql_query($dtampungan); //execute the query $tampungan
	while ($dtampungan = mysql_fetch_array($resultwa)) {  //fetch the result from query into an array
	echo "<tr>";
	echo "<td>".CHtml::link(CHtml::encode($dtampungan['nama_sistem']),Yii::app()->createUrl("tampungan/view", array("id"=>$dtampungan['ID'])))."</td>";
	echo "<td>".$dtampungan['nama_ws']."</td>";	
	echo "<td>".$dtampungan['desa']."</td>";
	echo "<td>".$dtampungan['kecamatan']."</td>";
	echo "<td>".$dtampungan['kota']."</td>";
	echo "<td>".$dtampungan['provinsi']."</td>";
	echo "<td>".$dtampungan['jiwa']."</td>";
	echo "<td>".$dtampungan['debit']." l/d</td>";
	echo "<td>".$dtampungan['kondisi_sungai']."</td>";
	echo "<td>thn ".$dtampungan['tahun_bangun']."</td>";
	//echo "<td>".$dtampungan['kriteria']."</td>";
	echo "</tr>";
	$datacek++;
	}

	$dpermukaan="SELECT t_permukaan1.nama_ws, t_permukaan1.ID, t_permukaan1.desa, t_permukaan1.kecamatan, t_permukaan1.kota, 
	t_permukaan1.provinsi, t_permukaan1.status,	t_permukaan2.jiwa, t_permukaan2.debit, 
	t_permukaan1.kriteria, t_permukaan1.nama_sistem, t_permukaan5.tahun_bangun, t_permukaan6.kondisi_sungai 
	FROM t_permukaan1 
	JOIN t_permukaan2 ON t_permukaan1.ID = t_permukaan2.ID JOIN t_permukaan3 ON t_permukaan1.ID = t_permukaan3.ID
	JOIN t_permukaan5 ON t_permukaan1.ID = t_permukaan5.ID JOIN t_permukaan6 ON t_permukaan1.ID = t_permukaan6.ID
	WHERE t_permukaan1.nama_ws LIKE '%$KeyData%' OR t_permukaan1.nama_sistem LIKE '%$KeyData%'
	OR t_permukaan1.desa LIKE '%$KeyData%' OR t_permukaan1.kecamatan LIKE '%$KeyData%' 
	OR t_permukaan1.kota LIKE '%$KeyData%' OR t_permukaan1.provinsi LIKE '%$KeyData%'
	OR t_permukaan5.tahun_bangun LIKE '%$KeyData%' OR t_permukaan6.kondisi_sungai LIKE '%$KeyData%'
	OR t_permukaan1.kriteria LIKE '%$KeyData%'
	";	

	//query to get the search result Air Baku
	$resultga = mysql_query($dpermukaan); //execute the query $permukaan
	while ($dpermukaan = mysql_fetch_array($resultga)) {  //fetch the result from query into an array
	echo "<tr>";
	echo "<td>".CHtml::link(CHtml::encode($dpermukaan['nama_sistem']),Yii::app()->createUrl("permukaan/view", array("id"=>$dpermukaan['ID'])))."</td>";
	echo "<td>".$dpermukaan['nama_ws']."</td>";	
	echo "<td>".$dpermukaan['desa']."</td>";
	echo "<td>".$dpermukaan['kecamatan']."</td>";
	echo "<td>".$dpermukaan['kota']."</td>";
	echo "<td>".$dpermukaan['provinsi']."</td>";
	echo "<td>".$dpermukaan['jiwa']."</td>";
	echo "<td>".$dpermukaan['debit']." l/d</td>";
	echo "<td>".$dpermukaan['kondisi_sungai']."</td>";
	echo "<td>thn ".$dpermukaan['tahun_bangun']."</td>";
	//echo "<td>".$dpermukaan['kriteria']."</td>";
	echo "</tr>";
	$datacek++;
	}

	$dhujan="SELECT t_hujan1.nama_ws, t_hujan1.ID, t_hujan1.desa, t_hujan1.kecamatan, t_hujan1.kota, 
	t_hujan1.provinsi, t_hujan1.status,	t_hujan2.jiwa, t_hujan2.debit, 
	t_hujan1.kriteria, t_hujan1.nama_sistem, t_hujan4.tahun_bangun, t_hujan5.saringan 
	FROM t_hujan1 
	JOIN t_hujan2 ON t_hujan1.ID = t_hujan2.ID JOIN t_hujan3 ON t_hujan1.ID = t_hujan3.ID
	JOIN t_hujan4 ON t_hujan1.ID = t_hujan4.ID JOIN t_hujan5 ON t_hujan1.ID = t_hujan5.ID
	WHERE t_hujan1.nama_ws LIKE '%$KeyData%' OR t_hujan1.nama_sistem LIKE '%$KeyData%'
	OR t_hujan1.desa LIKE '%$KeyData%' OR t_hujan1.kecamatan LIKE '%$KeyData%' 
	OR t_hujan1.kota LIKE '%$KeyData%' OR t_hujan1.provinsi LIKE '%$KeyData%'
	OR t_hujan4.tahun_bangun LIKE '%$KeyData%' OR t_hujan5.saringan LIKE '%$KeyData%'
	OR t_hujan1.kriteria LIKE '%$KeyData%'
	";	

	//query to get the search result Air Baku
	$resultpat = mysql_query($dhujan); //execute the query $hujan
	while ($dhujan = mysql_fetch_array($resultpat)) {  //fetch the result from query into an array
	echo "<tr>";
	echo "<td>".CHtml::link(CHtml::encode($dhujan['nama_sistem']),Yii::app()->createUrl("hujan/view", array("id"=>$dhujan['ID'])))."</td>";
	echo "<td>".$dhujan['nama_ws']."</td>";	
	echo "<td>".$dhujan['desa']."</td>";
	echo "<td>".$dhujan['kecamatan']."</td>";
	echo "<td>".$dhujan['kota']."</td>";
	echo "<td>".$dhujan['provinsi']."</td>";
	echo "<td>".$dhujan['jiwa']."</td>";
	echo "<td>".$dhujan['debit']." l/d</td>";
	echo "<td>".$dhujan['saringan']."</td>";
	echo "<td>thn ".$dhujan['tahun_bangun']."</td>";
	//echo "<td>".$dhujan['kriteria']."</td>";
	echo "</tr>";
	$datacek++;
	}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
?>
	<div id="cekdata" class="pagination">
		<ul class="yiiPager" id="myPager"></ul>
	</div>

<script type="text/javascript">
	var dgrid = "<?php echo $datacek; ?>";	
	var keywords = "<?php echo $KeyData; ?>";
	if(Number(dgrid) == 0){
		document.getElementById("dd").innerHTML = '<div>Penelusuran Anda - <strong>'+keywords+'</strong> - tidak cocok dengan indeks data apa pun.<br></br>'+
		'<b>saran :</b><br></br><div class="span3" style="width: 300px;"><ul><li>Pastikan semua kata dieja dengan benar.</li><li>Coba kata kunci yang lain.</li>'+
		'<li>Coba kata kunci seperti "kondisi".</li><li>Coba kurangi satu kata.</li></ul><div>';
		document.getElementById("datagrid").innerHTML = "-";
	}else{
		document.getElementById("dd").innerHTML =  '<div style="padding: -30px 20px -30px 0;">'+Number(dgrid)+' indeks data terkait kata kunci - <b><strong>'+keywords+'.</strong></b></div>';
	}

	$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
      pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
	
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:5});
    
});
</script>

