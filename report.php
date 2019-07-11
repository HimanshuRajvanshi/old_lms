<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
require_once('database.inc.php');
  
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
	mysql_select_db(DATABASE,$connection); 
	$empid = trim(mysql_escape_string($_POST['empid'])) ;
	$sel_month = $_POST['sel_month'] ;
	$sel_year = $_POST['sel_year'] ;
	
	if($empid){ 
		$emp_where = "and a.empid=".$empid;
	}else{
		$emp_where = '';
	}
	
	$sql = "SELECT distinct concat(a.fname,'_',a.lname) as name,date_format(b.date_time,'%d-%M-%Y') as date,date_format(b.date_time,'%H:%i:%s') as time, b.date_time FROM employee a,attendance b WHERE a.empcode=b.emp_code " .$emp_where. " AND MONTH(b.date_time) = '".$sel_month."' AND YEAR(b.date_time) = '".$sel_year."' order by id desc";
	
	$res = mysql_query($sql);
	//$columnHeader = '';  
	$columnHeader =  "Employee " . "\t" . "Date " . "\t" . "Time" . "\t" . " Date_Time";  
	$setData = '';  
	while($row = mysql_fetch_array($res)){
		
		$setData .= str_replace(' ', '_',$row["name"]) . " \t" .$row['date'] . " \t" .$row['time'] . " \t" .str_replace(' ', '_',$row['date_time']) . "\n" ;
		
	}
	
      
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n";  
      
    ?>  
