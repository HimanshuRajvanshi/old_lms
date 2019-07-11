<?php
session_start();
error_reporting(E_ALL);
include_once('functions.php');

$empid = $_POST['empid'];
$cl = $_POST['cl'];
$el = $_POST['el'];
$total = $_POST['total'];

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$query = "Select total from balance where empid = '$empid'";
$result = mysql_query($query)or die(mysql_error());

$row = mysql_fetch_object($result);
$balance = $el+$cl;
$availed = $total-$balance;

$sql = "UPDATE `balance` SET cl='$cl', el='$el', balance='$balance', availed='$availed', total ='$total' WHERE empid = '$empid'";
$res = mysql_query($sql, $connection)or die(mysql_error());

$q1 = "Select * from balance where empid = '$empid'";
$res1 = mysql_query($q1)or die(mysql_error());

$arr = mysql_fetch_array($res1);

echo json_encode($arr);
?>