<style type='text/css'>

 #background_page{
    background: url(../images/bgtik.png) no-repeat;
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
    height:350px;
    width:100%;
    /* border: solid;     */
    /* background: url(../images/guyangan.png) no-repeat;
    background-size: cover; */
    margin-bottom:50px;
  } 
  
.img-carousel {
    height: 350px;
    width :100%;
}
.container-air{
    /* border: solid red; */
    height:100px;
    width:1000px;
    margin-left:auto;
    margin-right:auto;
    margin-top:10px;
    padding-left:50px;

}
.container-menu{
    width:1000px;
    margin-left:auto;
    margin-right:auto;
    /* border: solid blue; */
    padding-left:50px;
    margin-top:20px;
    margin-bottom:60px;
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
  transition: .5s ease;
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
            <img class="logo" src="../images/LOGO-KEMENTERIAN-PEKERJAAN-UMUM.png">
            <p class="homey">SISTEM INFORMASI AIR TANAH DAN AIR BAKU<p>

        </div>

        <div class="kanan">
            <a href="#">
                <div class="cssLogin">
                    <p style="font-size:16px;color:white">SIGN IN</p>
                </div>
            </a>
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
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
      <li data-target="#myCarousel" data-slide-to="8"></li>
      <li data-target="#myCarousel" data-slide-to="9"></li>
      </ol>

    <!-- Wrapper for slides -->
    <!-- di folder images -->
    <div class="carousel-inner">
      <div class="item active img-carousel">
        <img src="../images/picture1.jpg" alt="pic1" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture2.jpg" alt="pic2" style="width:100%;">
      </div>
    
      <div class="item img-carousel">
        <img src="../images/picture3.png" alt="pic3" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture4.png" alt="pic4" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture5.png" alt="pic5" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture6.jpg" alt="pic6" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture7.png" alt="pic7" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture8.png" alt="pic8" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture9.png" alt="pic9" style="width:100%;">
      </div>

      <div class="item img-carousel">
        <img src="../images/picture10.png" alt="pic10" style="width:100%;">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


    </div>
    <div class="container-air">
        <a href="#">
            <div class="airtanah">
                <img src="../images/airtanahlogo.png">
            </div>
        </a>
        <a href="#">
            <div class="airbaku">
                <img src="../images/airbakulogo.png">
            </div>
        </a>
    </div> 

    <div class="container-menu">
        <table class="center">
           <tr>
            <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#4d99d2; color:white"> 
                        <img class="pic" src="../images/icon-balai.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word">Balai</p>    
                            </div>
                        </div>
                    </div>
                    <!-- <div class="box" style="background-color:#4d99d2; color:white;">
                        <img class="pic" src="../images/icon-balai.png">
                        <p style="text-align:center;"><b><Balai></Balai></b></p>
                    </div> -->

                </a>
            </th>
            <th>
                <a href="#">        
                     <div class="box" alt="Avatar" style="background-color:#8dba4f; color:white"> 
                        <img class="pic" src="../images/icon-pemetaan.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>Pemetaan</b></p>    
                            </div>
                        </div>
                    </div>
                    <!-- <div class="box" style="background-color:#8dba4f; color:white;">
                        <img class="pic" src="../images/icon-pemetaan.png">
                        <p style="text-align:center;"><b>Pemetaan</b></p>
                    </div> -->
                </a>        
            </th>
            <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#fd687c; color:white"> 
                        <img class="pic" src="../images/icon-peraturan.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>Peraturan</b></p>    
                            </div>
                        </div>
                    </div>
                    <!-- <div class="box" style="background-color:#fd687c; color:white;">
                        <img class="pic" src="../images/icon-peraturan.png">
                        <p style="text-align:center;"><b>Peraturan</b></p>
                    </div> -->
                </a>        
            </th>
            <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#9850ba; color:white"> 
                        <img class="pic" src="../images/icon-berita.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>Berita</b></p>    
                            </div>
                        </div>
                    </div>
                    <!-- <div class="box" style="background-color:#9850ba; color:white;">
                        <img class="pic" src="../images/icon-berita.png">
                        <p style="text-align:center;"><b>Berita</b></p>
                    </div> -->
                </a>        
            </th>
            <th>
                <a href="#">
                     <div class="box" alt="Avatar" style="background-color:#da8b0f; color:white"> 
                        <img class="pic" src="../images/icon-galeri.png">
                        <div class="middle">
                            <div class="text">
                                <p class="word"><b>galeri</b></p>    
                            </div>
                        </div>
                    </div>
                    <!-- <div class="box" style="background-color:#da8b0f; color:white;">
                        <img class="pic" src="../images/icon-galeri.png">
                        <p style="text-align:center;"><b>galeri</b></p>
                    </div> -->
                </a>        
            </th>
            </tr>
        </table>
    </div> 



</body>