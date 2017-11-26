<style type='text/css'>

 #background_page{
    background: url(../siatab/images/bgtik.png) no-repeat;
    background-size: cover;
  } 

    .header1 {
        background-color: #2f4d58;
        width:100%;
        height:60px;
        margin-bottom:5px;
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
        background-color:grey;
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
        width :72%;
    }
    .container-air{
        /* border: solid red; */
        height:100px;
        width:1000px;
        margin-left:auto;
        margin-right:auto;
        margin-top:-5px;
        padding-left:50px;
        

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
   
        <!-- <img class="logo" src="../images/LOGO-KEMENTERIAN-PEKERJAAN-UMUM.png">
        <p class="homey">SISTEM INFORMASI AIR TANAH DAN AIR BAKU<p>
        <p>SISTEM INFORMASI AIR TANAH DAN AIR BAKU<p>
        <a href="#" class="cssLogin">
                <p style="font-size:16px;color:white">SIGN IN</p>
        </a> -->
    </div>

    <div class="carousel">
    

    <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      </ol>
    
    <!-- Wrapper for slides -->
    <!-- di folder images -->
    <center>
    <div class="carousel-inner">
    <div class="item active img-carousel">
        <img src="../siatab/images/Web-Images/3.jpg" alt="pic1" style="width:100%;">
        
      </div>

    </div>
    </center>
    <!-- Left and right controls  -->

   

    </div>
    <div class="container-air">
        <a href="<?php echo Yii::app()->baseUrl; ?>/sumur">
            <div class="box airtanah">
                <img src="../siatab/images/airtanahlogo.png">
            </div>
        </a>
        <a href="http://localhost/siatab/sistembaku/listbaku">
            <div class="box airbaku">
                <img src="../siatab/images/airbakulogo.png">
            </div>
        </a>
    </div> 


</body>