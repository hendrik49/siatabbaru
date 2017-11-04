<?php 
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
 
//****Silahkan atur konfigurasi database sesuai dengan kebutuhan dan keadaan server dan sistem****//

//Silahkan ganti nama server dibawah ini sesuai dengan nama server anda//
//Default untuk server lokal komputer adalah "localhost";
$SERVER = "localhost";


//Silahkan ganti nama user atau username dibawah ini sesuai dengan nama user pada server anda//
//Default untuk nama user pada localhost atau server komputer lokal adalah "root"//
$NAMAUSER = "bitartik";

//Silahkan isi password username anda, apabila tidak ada password kosongkan saja//
//Default password pada instalasi server lokal pertama adalah "Tidak ada" atau "kosong"//
$PASSWORDUSER = "sgt2014";

//Silahkan isi database sesuai dengan databse yang taelah adan buat pada server anda//
$DATABASE = "bitartik_webgis";

//$DB_KODE="2013";



//Dibawah ini akan dipanggil deklarasi dalam koneksi ke server dan databasa//
//Jika anda tidak paham atau tidak mengerti pemrograman php, saya sarankan jangan mengganti sedikitpun kode dibawah ini//
//mysql_connect ($SERVER, $NAMAUSER, $PASSWORDUSER) or die ("<h1>Tidak terkoneksi ke server</h1>");
//mysql_select_db ($DATABASE) or die ("<h1>Database tidak ditemukan</h1>");
$mysql_link = mysql_connect($SERVER, $NAMAUSER, $PASSWORDUSER);
//mysql_set_charset("utf8", $mysql_link);
mysql_select_db($DATABASE, $mysql_link) or die ("<h1>Database tidak ditemukan</h1>");

/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */


?>