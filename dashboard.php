<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include_once('functions.php');
echo '<h1 style="text-align:center"> Trilasoft Intranet Dashboard</h1>';

?>

<h4>Upcoming Birthdays</h4>

<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$sql = "SELECT * FROM  `employee` WHERE DAYOFYEAR( CURDATE( ) ) <= DAYOFYEAR(  `dob` ) AND DAYOFYEAR( CURDATE( ) ) +7 >= DAYOFYEAR(  `dob` ) LIMIT 0 , 30";
$res = mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($res)>0)
{
	
	echo"<ul>"

while($row = mysql_fetch_array($res)) {
	
	echo"<li>".$row['fname']." ".$row['lname']." <img src='images/bday.png' />&nbsp;".date($row['dob'], "d/m/Y")."</li>";
	
	
}
}
else {
	echo"There are no birthdays in the next 7 days."
}

