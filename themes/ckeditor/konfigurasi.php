<?php 
$host = "localhost";
$user = "bitartik";
$pass = "sgt2014";
$database = "bitartik_webgis";
$koneksi = mysql_connect ($host,$user,$pass);
mysql_select_db($database) or die ("Failed to Load Database");
?>