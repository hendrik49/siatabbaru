<?php
$dbhost = "webgis.forda-mof.org";
$dbuser = "webgis";
$dbpass = "webgis";
$dbname = "webgis";
mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname)
or die ("Connect Failed !! : ".mysql_error());
?>