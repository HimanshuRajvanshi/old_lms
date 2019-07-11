<?php
include_once('functions.php');
	
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `leave` where status = 1", $connection) or die(mysql_error());
	
	$row = mysql_fetch_array($result);
	
	$start = strtotime($row['fromdate']);
	$end = strtotime($row['todate']);
    
	$arr = array('start'=>$start, 'end'=>$end);
	
	echo json_encode($arr);
?>