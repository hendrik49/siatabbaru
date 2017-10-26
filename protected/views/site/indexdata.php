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
		echo "<th width='60px'>Berdiri</th>";
		echo "<th width='60px'>AT & AB</th>";
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
		echo "<td>".$data['kriteria']."</td>";
		echo "</tr>";
		$datacek++;
	}

	$dmataair="SELECT t_mataair1.nama_ws, t_mataair1.ID, t_mataair1.desa, t_mataair1.kecamatan, t_mataair1.kota, 
					t_mataair1.provinsi, t_mataair1.status,	t_mataair2.jiwa, t_mataair2.debit, 
					t_mataair1.kriteria1, t_mataair1.nama_sistem, t_mataair5.tahun_bangun, t_mataair6.broncaptering 
		FROM t_mataair1 
				JOIN t_mataair2 ON t_mataair1.ID = t_mataair2.ID JOIN t_mataair3 ON t_mataair1.ID = t_mataair3.ID
				JOIN t_mataair5 ON t_mataair1.ID = t_mataair5.ID JOIN t_mataair6 ON t_mataair1.ID = t_mataair6.ID
		WHERE t_mataair1.nama_ws LIKE '%$KeyData%' OR t_mataair1.nama_sistem LIKE '%$KeyData%'
				OR t_mataair1.desa LIKE '%$KeyData%' OR t_mataair1.kecamatan LIKE '%$KeyData%' 
				OR t_mataair1.kota LIKE '%$KeyData%' OR t_mataair1.provinsi LIKE '%$KeyData%'
				OR t_mataair5.tahun_bangun LIKE '%$KeyData%' OR t_mataair6.broncaptering LIKE '%$KeyData%'
				OR t_mataair1.kriteria1 LIKE '%$KeyData%'
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
		echo "<td>".$dmataair['kriteria1']."</td>";
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

