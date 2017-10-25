<style type='text/css'>

 #background_page{
    background: url(../images/bgtik.png) no-repeat;
    background-size: cover;
  } 

.header {
    background-color: #2f4d58;
    width:100%;
    height:50px;
}
.logo {
    width:30px;
    height:30px;
    padding-left : 20px;
    margin-top: 8px;
    
}
.loginCss {
    float:right;
    background-color:#19556b;
    height:100%;
    padding-left:10px;
    padding-right:10px;
}
 .carousel{
    height:350px;
    width:100%;
    /* border: solid;     */
    background: url(../images/guyangan.png) no-repeat;
    background-size: cover;
  } 
.container-air{
    /* border: solid; */
    height:100px;
    width:1000px;
    margin-left:auto;
    margin-right:auto;
    margin-top:10px;
}
.container-menu{
    width:1000px;
    margin-left:auto;
    margin-right:auto;
    /* margin-top:400px; */
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
    margin-right:auto;
    height:100px;
    width:100px;
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

.container {
    position: relative;
    width: 50%;
    height: 100px;
    border:solid;
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
}
</style>

 <body  id="background_page"> 
<!-- <body> -->
    <div class="header">
        <img class="logo" src="../images/LOGO-KEMENTERIAN-PEKERJAAN-UMUM.png">
        <label style="color:white; font-size:24px;">SISTEM INFORMASI AIR TANAH DAN AIR BAKU<label>
        <a href="http://localhost/siatab/site/login">
            <div class="loginCss">
                <p style="font-size:16px;color:white">SIGN IN</p>
            </div>
        </a>
    </div>

    <div class="carousel">
        
    </div>
    <div class="container-air">
        <a href="http://localhost/siatab/sumur">
            <div class="airtanah">
                <img src="../images/airtanahlogo.png">
            </div>
        </a>
        <a href="http://localhost/siatab/sistembaku/listbaku">
            <div class="airbaku">
                <img src="../images/airbakulogo.png">
            </div>
        </a>
    </div> 

    <div class="container-menu">
        <table class="center">
           <tr>
            <th>
                <a href="http://localhost/siatab/unitKerja">
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
                <a href="http://localhost/gis/">   
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
                <a href="http://localhost/siatab/Peraturan">
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
                <a href="http://localhost/siatab/Berita">
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
                <a href="http://localhost/siatab/Galeri">
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