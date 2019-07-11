<?php
require_once('functions.php');
if(isset($_SESSION['empid'])){
	$user=$_SESSION['empid'];
	$date=date('c');
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
    mysql_select_db(DATABASE,$connection);
	mysql_query("replace into navigation (empid,time) values('$user','$date')");
}
?>