<?php 
$host = "localhost";
$user = "root";
$pass = "";
$database = "db_siatab";
$koneksi = mysql_connect ($host,$user,$pass);
mysql_select_db($database) or die ("Failed to Load Database");
?>