<?php


$this->breadcrumbs=array(
'StrukturOrganisasi',
);




?>
<style type="text/css">
/*Now the CSS*/
* { 
  margin: 0; 
  padding: 0;
}

.tree {
  font-family: 'Avenir Book', sans-serif;
  width:1000px;
  margin:0 auto;
}

.tree ul {
  padding-top: 20px; 
  position: relative;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

.tree li {
  float: left; 
  text-align: center;
  list-style-type: none;
  position: relative;
  padding: 20px 5px 0 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
  content: '';
  position: absolute; top: 0; right: 50%;
  border-top: 1px solid #ccc;
  width: 50%; height: 20px;
}
.tree li::after{
  right: auto; left: 50%;
  border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
  display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
  border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
  border-right: 1px solid #ccc;
  border-radius: 0 5px 0 0;
  -webkit-border-radius: 0 5px 0 0;
  -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
  border-radius: 5px 0 0 0;
  -webkit-border-radius: 5px 0 0 0;
  -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
  content: '';
  position: absolute; top: 0; left: 50%;
  border-left: 1px solid #ccc;
  width: 0; height: 20px;
}

/************************************************
 * Third Level Styles
 ************************************************/

.tree ul ul ul {
  max-width:140px;
}
.tree ul ul ul li {
  float: left; 
  text-align: center;
  list-style-type: none;
  position: relative;
  padding: 0 5px 10px 5px;
  border-left: 1px solid #ccc;
  border-left:0;
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
  margin-left:10px;
  top:-10px;
}

/*We will use ::before and ::after to draw the connectors*/

.tree ul ul ul li:before {
  border-top: 1px solid #ccc;
  position:relative;
  top:20%;
  width:10%;
}
.tree ul ul ul li::after{
  right: auto; 
  left: -1px;
  border-left: 1px solid #ccc;
  border-bottom:1px;
  height:70px;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree ul ul ul li:only-child::after, .tree ul ul ul li:only-child::before {
  display: none;
}

/*Remove space from the top of single children*/
.tree ul ul ul li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree ul ul ul li:first-child::before, 
.tree ul ul ul li:last-child::after{
  border:none;
  
}

.tree ul ul ul li:last-child::after {
  border-bottom:1px solid #ccc;
  top:-52px;
  width:7px;
}
/*Adding back the vertical connector to the last nodes*/
.tree ul ul ul li:last-child::before{
  border-right: 0;
    border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  -moz-border-radius: 0 0 0 0;

}
.tree ul ul ul li:first-child::after{
  border-radius: 0 0 0 0;
  -webkit-border-radius: 0 0 0 0;
  -moz-border-radius: 0 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul ul::before{
  content: '';
  position: absolute; 
  top: 0; 
  left:9px;
  border-left: 1px solid #ccc;
  width: 0; 
  height: 100;
}

.tree ul ul ul li img {
  margin:0;
  padding:0;
  padding-right:3px;
}

/*******************************/

.tree li a{
  border: 1px solid #ccc;
  padding: 5px 10px;
  text-decoration: none;
  color: #666;
  font-family: 'Fira Sans', sans-serif;
  font-size: 12px;
  display: inline-block;
  
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  
  transition: all 0.5s;
  -webkit-transition: all 0.5s;
  -moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
  background: #ea1519; color: #fff; border: 1px solid #ea1519;
}

.tree ul ul ul li a:hover {
  border-color: #ccc;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before {
  border-color:  #ea1519;
}

.tree li a {
  max-width:200px;
}
.tree li a img {
  float:left;
  margin-bottom:5px;
  padding-right:5px;
  border-radius:5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;  
}
//<?php echo CHtml::link('Membuat Struktur Organisasi', array('StrukturOrganisasi/add'));


?>
</style>
<h2 class="h-view" style="text-align:center;"><?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>Struktur Organisasi <?php endif ?></h2>
	
<?php if (isset(Yii::app()->user->hakAkses) AND (Yii::app()->user->hakAkses == User::USER_SUPER_ADMIN OR Yii::app()->user->hakAkses == User::USER_ADMIN)) : ?>

<div class="tree">
<ul>
	<li>
	<a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$ketuapusat['ID'] ?> ><img height="20" src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$ketuapusat['Foto'] ?>"  alt="CEO">
	KEPALA PUSAT AIR TANAH DAN AIR BAKU </br><b> <?php echo $ketuapusat['Nama'] ?> </b>
	</a>
		<ul>
			<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalabidang[2]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalabidang[3]['Foto'] ?>" alt="BIDANG AIR TANAH DAN AIR BAKU WILAYAH BARAT">KEPALA BIDANG AIR TANAH DAN AIR BAKU WILAYAH TIMUR  </br><b> <?php echo $kepalabidang[3]['Nama'] ?> </b></a>
				<ul>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalasubbidang[0]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalasubbidang[5]['Foto'] ?>" alt="SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH BARAT I">SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH TIMUR I </br><b> <?php echo $kepalasubbidang[5]['Nama'] ?> </b></img></a></li>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalasubbidang[1]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalasubbidang[4]['Foto'] ?>" alt="SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH BARAT II">SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH TIMUR II </br><b> <?php echo $kepalasubbidang[4]['Nama'] ?> </b></img></a></li>
				</ul>
			</li>
			<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalabidang[3]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalabidang[2]['Foto'] ?>" alt="BIDANG AIR TANAH DAN AIR BAKU WILAYAH TIMUR">KEPALA BIDANG AIR TANAH DAN AIR BAKU WILAYAH BARAT  </br><b> <?php echo $kepalabidang[2]['Nama'] ?> </b></a>
				<ul>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalasubbidang[2]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalasubbidang[3]['Foto'] ?>" alt="SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH TIMUR I">SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH BARAT I </br><b> <?php echo $kepalasubbidang[3]['Nama'] ?> </b></img></a></li>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalasubbidang[3]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalasubbidang[2]['Foto'] ?>" alt="SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH TIMUR II">SUBBIDANG AIR TANAH DAN AIR BAKU WILAYAH BARAT II </br><b> <?php echo $kepalasubbidang[2]['Nama'] ?> </b></img></a></li>
				</ul>
			</li>
			<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalabidang[1]['ID'] ?>><img height="50" src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalabidang[1]['Foto']; ?>" alt="BIDANG KONSERVASI AIR TANAH DAN AIR BAKU" />KEPALA BIDANG KONSERVASI AIR TANAH DAN AIR BAKU  </br><b> <?php echo $kepalabidang[1]['Nama'] ?> </b></a>
				<ul>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalasubbidang[4]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalasubbidang[1]['Foto'] ?>" alt="">SUBBIDANG KONSERVASI AIR TANAH DAN AIR BAKU WILAYAH BARAT </br><b> <?php echo $kepalasubbidang[1]['Nama'] ?> </b></img></a></li>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalasubbidang[5]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalasubbidang[0]['Foto'] ?>" alt="">SUBBIDANG KONSERVASI AIR TANAH DAN AIR BAKU WILAYAH TIMUR </br><b> <?php echo $kepalasubbidang[0]['Nama'] ?> </b> </img></a></li>
				</ul>
			</li>
			<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$kepalabidang[0]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$kepalabidang[0]['Foto'] ?>" alt="BAGIAN PERENCANAAN DAN TATA USAHA" />KEPALA BAGIAN PERENCANAAN DAN TATA USAHA </br><b> <?php echo $kepalabidang[0]['Nama'] ?> </b>  </a>
				<ul>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$subbagian[1]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$subbagian[1]['Foto'] ?>" alt="">SUBBAGIAN BIMBINGAN TEKNIK </br><b> <?php echo $subbagian[1]['Nama'] ?> </b></img></a></li>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$subbagian[0]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$subbagian[0]['Foto'] ?>" alt="">SUBBAGIAN PERENCANAAN </br><b> <?php echo $subbagian[0]['Nama'] ?> </b></img></a></li>
					<li><a href=<?php echo Yii::app()->request->baseUrl.'/pegawai/'.$subbagian[2]['ID'] ?>><img src="<?php echo Yii::app()->request->baseUrl.'/data/pegawai/'.$subbagian[2]['Foto'] ?>" alt="">SUBBAGIAN TATA USAHA </br><b> <?php echo $subbagian[2]['Nama'] ?> </b></img></a></li>
          </ul>
			</li>
		</ul>
	</li>
</ul>
	</div>
<?php else : ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
'type'=>'striped bordered condensed',
'cssFile'=>Yii::app()->baseUrl . '/css/gridview/styles.css',
'summaryText'=>'',
'columns'=>array(
array(
'name'=>'Tanggal',
'value'=>'date("d / m / Y", $data->Tanggal)',
),
'NamaJabatan',
'status',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{Lihat}',
'buttons'=>array(
'Lihat'=>array(
'label'=>'Lihat',
'url'=>'Yii::app()->createUrl("StrukturOrganisasi/view", array("id"=>$data->ID))',

),
),
),
),
));


?>

<?php endif ?>
