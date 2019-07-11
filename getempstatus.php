<?php
include_once('functions.php');
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$empid = $_POST['empid'];
$sql = "select status from employee where empid = ".$empid."";
$res = mysql_query($sql)or die(mysql_error());
if($res) {
$row = mysql_fetch_object($res);

echo $row->status;	
}	
?>
