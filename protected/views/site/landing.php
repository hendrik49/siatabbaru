<style type='text/css'>

 #background_page{
    background: url(../siatab/images/bgtik.png) no-repeat;
    background-size: cover;
  }
.header1 {
    background-color: #2f4d58;
    width:100%;
    height:60px;
    /*margin-bottom:5px;*/
    /* border:solid; */
}
.logo {
    width:40px;
    height:40px;
    float:left;
    /* border:solid; */
    
}
.cssLogin {
    float:right;
    background-color:#195561;
    height:60px;
    padding-top:15px;
    padding-left:10px;
    padding-right:10px;
}
 .carousel{
    height:550px;
    width:100%;
    /* border: solid;     */
    /* background: url(../images/guyangan.png) no-repeat;
    background-size: cover; */
    margin-bottom:50px;
  } 
  
.img-carousel {
    height: 550px;
    width :100%;
}
.container-air{
    /* border: solid red; */
    height:100px;
    width:1000px;
    margin-left:auto;
    margin-right:auto;
    padding-left:50px;
    margin-bottom:50px;
    

}
.container-menu{
    width:1000px;
    margin-left:auto;
    margin-right:auto;
    /* border: solid blue; */
    padding-left:50px;
    /* margin-top:20px; */
    /* margin-bottom:60px; */
}
.box {
    height: 150px;
    width: 130px;
    margin-left:auto;
    margin-right:auto;
    background-color:white;
    position: relative;
}
.pic {
    margin-left:auto;
    margin-left:15px;
    margin-right:auto;
    height:100px;
    width:100px;
    /* border: solid red; */
}
.homey {
    color:white; 
    font-size:24px;
    /* border:solid; */
}
.airtanah{
    float: left;
    height:100px;
    width: 48%;
}
.airbaku{
    float: right;
    height:100px;
    width: 48%;
}
table.center {
    margin-left: auto;
    margin-right: auto;
}

.image {
background: red;
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .35s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.box:hover .image {
  opacity: 0.3;
}

.box:hover .middle {
  opacity: 1;
}

.text {
    background-color: rgba(255,255,255,0.2);
    color: white;
    font-size: 16px;
    height: 150px;
    width: 130px;
}
p.word{
    padding-top:100px;
    text-align:center;
}
.kiri{
    float:left;
    width:75%;
    padding-left:100px;
    height:50px;
    /* border: solid; */
    padding-top:10px;
}
.kanan{
    float:right;
    width:25%;
    height:50px;
    /* border: solid; */
}
#myCarousel, .carousel {
    height:420px;
}
.judul {
    /* float:left; */
    background:black;
    /* margin-top:-100px; */
    font-size:20px;
    color:white;
    /* z-index:10; */
    padding-left:30px;
}
.container-pic {
    height:500px;
    width:100%;
    /*margin-bottom:50px;*/
    /*border:solid;*/
}
.pic-a {   
    height:400px;
    width:100%;
    /*border:solid;*/
}
.container-footer {
    padding-top:50px;
    /*padding-bottom:50px;*/
    width:100%;
    background:rgba(61,111,130,0.8);
}
.footer {
    width:900px;
    height:300px;
    /*border:solid;*/
    margin-left:auto;
    margin-right:auto;
}
.left-footer {
    width:50%;
    float:left;
    margin-left:300px;
    /*border:solid;*/
}
.right-footer {
    width:50%;
    float:left;
}
.logo-footer {
    height:20px;
    width:20px;
}
</style>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

 <body  id="background_page"> 
<!-- <body> -->
    <div class="header1">
        <div class="kiri">
            <img class="logo" src="../siatab/images/LOGO-KEMENTERIAN-PEKERJAAN-UMUM.png">
            <p class="homey">SISTEM INFORMASI AIR TANAH DAN AIR BAKU<p>

        </div>

        <div class="kanan">
            <?php if(Yii::app()->user->isGuest) : ?>
            <a href="<?php echo Yii::app()->baseUrl; ?>/site/login">
                <div class="cssLogin">
                    <p style="font-size:16px;color:white">SIGN IN</p>
                </div>
            </a>
            <?php else : ?>
            <a href="<?php echo Yii::app()->baseUrl; ?>/site/logout">
                <div class="cssLogin">
                    <p style="font-size:16px;color:white">SIGN OUT</p>
                </div>
            </a>
            <?php endif ?>
        </div>
    </div>




    </div>

    <div class="container-pic">
        <img class="pic-a" src="../siatab/data/Unit Kerja/PUSAT Air Tanah dan Air Baku/Foto-landingPage/picture-home.jpg">        
    </div>

    <div class="container-air">
        <a href="<?php echo Yii::app()->baseUrl; ?>/sumur">
            <div class="box airtanah">
                <img src="../siatab/images/airtanahlogo.png">
            </div>
        </a>
        <a href="../siatab/sistembaku/listbaku">
            <div class="box airbaku">
                <img src="../siatab/images/airbakulogo.png">
            </div>
        </a>
    </div> 
<!--menu-menu air-->
     <div class="container-menu">
        <table class="center">
           <tr>
<!--             <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#4d99d2; color:white"> 
                        <img class="pic" src="../siatab/images/icon-balai.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word">Balai</p>    
                            </div>
                        </div>
                    </div>
                </a>
            </th>
 -->            <th>
                <a href="#">        
                     <div class="box" alt="Avatar" style="background-color:#8dba4f; color:white"> 
                        <img class="pic" src="../siatab/images/icon-pemetaan.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>Pemetaan</b></p>    
                            </div>
                        </div>
                    </div>
                </a>        
            </th>
            <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#fd687c; color:white"> 
                        <img class="pic" src="../siatab/images/icon-peraturan.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>Peraturan</b></p>    
                            </div>
                        </div>
                    </div>
                </a>        
            </th>
            <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#9850ba; color:white"> 
                        <img class="pic" src="../siatab/images/icon-berita.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>Berita</b></p>    
                            </div>
                        </div>
                    </div>
                </a>        
            </th>
            <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#da8b0f; color:white"> 
                        <img class="pic" src="../siatab/images/icon-galeri.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>galeri</b></p>    
                            </div>
                        </div>
                    </div>
                </a>        
            </th>
            </tr>
        </table>
    </div>  

    <div class="container-footer">
        <div class="footer">
            <div class="left-footer">
                <h2 style="color:white">KONTAK</h2>
                <p style="color:white">Direktorat Jendral Sumber Daya Air<br>
                    Gd. Ditjen Sumber Daya Air<br>
                    Kementrian PUPR
                    </p>
                <div style="color:white"> 
                <img class="logo-footer" src="../siatab/images/placeholder.png">
                    Jl. Pattimura 20, Kebayoran Baru<p style="padding-left:25px;">Jakarta 12110</p>
                </div>
                <div style="color:white"> 
                <img class="logo-footer" src="../siatab/images/phone.png">
                    (0231)-7396616
                </div>
                <div style="color:white"> 
                <img class="logo-footer" src="../siatab/images/printer.png">
                    (0231)-7396616
                </div>
                <div style="color:white"> 
                <img class="logo-footer" src="../siatab/images/email.png">
                    kompusda@pu.go.id<p style="padding-left:25px">kompu.sda@gmail.com</p>
                </div>
            </div>
<!--             <div class="right-footer">
                <h2 style="color:white;">ORGANISASI</h2>              
                <div style="color:white;margin-top:-20px;">
                    <br>Organisasi
                    <br>Sekretriat Jendral
                    <br>Inspektorat Jendral
                    <br>Ditjen Sumber Daya Air
                    <br>Ditjen Bina Marga
                    <br>Ditjen Cipta Karya
                    <br>Ditjen Penyediaan Perumahan
                    <br>Ditjen Bina Konstruksi
                    <br>Ditjen Pembiayaan Perumahan
                    <br>BPIW
                    <br>BALITBANG
                    <br>BPSDM
                    <br>BPJT
                    <br>BPPSPAM
                </div>
            </div>
 -->        </div>
    </div>

</body>