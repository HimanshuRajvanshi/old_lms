<?php
require_once('database.inc.php');

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$probsql = "Select * from employee where status = 'prob'";
$resprob = mysql_query($probsql)or die(mysql_error());

while($probrow = mysql_fetch_array($resprob))
{
  $probempid = $probrow['empid'];  
 $add = "UPDATE balance SET total = total + 0.66, balance = balance + 0.66 where empid = '$probempid'";
 $probadd = mysql_query($add)or die(mysql_error());
 
}


$confsql = "Select * from employee where status = 'conf'";
$resconf = mysql_query($confsql)or die(mysql_error());

while($confrow = mysql_fetch_array($resconf))
{
  $confempid = $confrow['empid'];  
 $add = "UPDATE balance SET total = total + 1.8, balance = balance + 1.8 where empid = '$confempid'";
 $confadd = mysql_query($add)or die(mysql_error());
 
}

?>