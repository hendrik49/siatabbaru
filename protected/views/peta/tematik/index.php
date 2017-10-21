<?php
/* @var $this PetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Peta Tematik',
);
?>

<h2 class="h-view">Peta Tematik</h2>

<form name="formcari" method="post" action="http://localhost/siatab/peta/indextematik">
<table width="330" border="5" align="center" cellpadding="0">
<tr bgcolor='orange'>
<td height="15" colspan="4">
<strong> Cari Peta <input size="40" type="text" name="NamaPeta">
<input size="10" type="SUBMIT" name="SUBMIT" id="SUBMIT" value="Search" >
</strong>
</td>
</tr>
</table>
</form>

<?php
$dbuser = 'root';
$dbpass = '';
$dbhost = 'localhost';
$dbname = 'db_siatab';
/*mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname)
or die ("Connect Failed !! : ".mysql_error());*/

mysql_connect($dbhost, $dbuser, $dbpass) OR die('can\'t connect to database');
mysql_select_db($dbname) OR die('cant access database');
?>

<?php 
//include "connect.php";
if (isset($_POST['NamaPeta'])) {
$NamaPeta = $_POST['NamaPeta']; //get the nama value from form

} else
{
	$NamaPeta = '';
}
$q = "SELECT * from t_peta where NamaPeta like '%$NamaPeta%' "; //query to get the search result
$result = mysql_query($q); //execute the query $q
echo "<table border='1' cellpadding='5' cellspacing='8'>";
echo "";
while ($data = mysql_fetch_array($result)) {  //fetch the result from query into an array
echo "
<tr>
<td >".CHtml::link(CHtml::encode($data['NamaPeta']),Yii::app()->createUrl("peta/tematik", array("id"=>$data['ID'])))."</td>
</tr>";
}
echo "</table>";

?>
