<?php
session_start();
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include_once('functions.php');	

$connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);

mysql_select_db(DATABASE,$connection);

$result = mysql_query("select fname as title,(SELECT intime  FROM `attendance` where attendance.empid=employee.empid and attid in(SELECT min(attid) FROM `attendance` where  date(intime)=CURDATE() group by attendance.empid) ) As start,
(SELECT outtime  as end FROM `attendance` where attendance.empid=employee.empid and attid in(SELECT min(attid) FROM `attendance` where date(outtime)=CURDATE() group by attendance.empid) ) As end
FROM `employee` group by employee.empid", $connection) or die(mysql_error());

echo'<script type="text/javascript">
$(document).ready(function(){

$("#calendar").fullCalendar({

   	header: {

				left: "prev,next, today",

				center: "title",

				right: "basicDay"

			},
			
			
events: [';

while($rows = mysql_fetch_assoc($result)) {

  

{
echo '{
	
	title : "rahul"
},';
}

}

echo']

});

});

</script>';

?>

			

			

		

				





