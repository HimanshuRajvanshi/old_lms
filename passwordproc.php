<?php
session_start();
error_reporting(E_ALL);
include_once('functions.php');
$pass= trim(md5($_POST['pass']));
$empid = $_POST['empid'];
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$sql = "UPDATE `employee` SET password='$pass' WHERE empid = '$empid'";
$res = mysql_query($sql, $connection)or die(mysql_error());
if($res)
echo'Password has been updated successfully';
?>