<?php      
/* Forum Multimedia Edukasi www. formulasi.or.id cms.formulasi.or.id
 * @copyright	Copyright (C) 2013 CMS Formulasi Open Source, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * Ari Rusmanto ariecupu@ymail.com
 * Fauzan A Mahanani fauzan.mahanani@formulasi.or.id
 */
// session_start(); error_reporting(0);


function UploadFile($fileName, $extensionList, $namaDir,$data){
//$extensionList = array("bmp", "jpg", "gif");

//$fileName = $_FILES['fupload']['name'];
$pecah = explode(".", $fileName);
$ekstensi = $pecah[1];

// nama direktori upload
//$namaDir = '../../../../file/';

// membuat path nama direktori + nama file.
$pathFile = $namaDir . $fileName;

if (in_array($ekstensi, $extensionList))
{
    // memindahkan file ke temporary
    $tmpName  = $_FILES['fupload']['tmp_name'];
global $data;
    // proses upload file dari temporary ke path file
    if (move_uploaded_file($_FILES['fupload']['tmp_name'], $pathFile))
    {
         $data= 1;
    }
    else
    {
         $data= 0;
    }
	//return $data=1;
}
}



}else{
header ('location:../index.php');
}
?>