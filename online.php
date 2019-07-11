<?php
date_default_timezone_set('Asia/Kolkata');
require_once('functions.php');
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
    mysql_select_db(DATABASE,$connection);
  $d=date('c',time()-5*60);//last 5 minutes
  

             $q=mysql_query("select fname, lname from employee, navigation where time>'$d' and navigation.empid = employee.empid");
             if(mysql_affected_rows()>0){
	             print "<ul>";
	             while($users=mysql_fetch_array($q)){
	             	print "<li>".$users['fname']." ".$users['lname']."</li>";
	             }
	             print "</ul>";
             }

?>