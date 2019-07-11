<?php
session_start();
include_once('functions.php');

	$emid = $_POST['empid'];

	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);

mysql_select_db(DATABASE,$connection);

if($_SESSION['type'] == "2")
{
   
	$result = mysql_query("SELECT * FROM  `leave` where status = 1 and leave.empid = ".$_SESSION['empid']."", $connection) or die(mysql_error());

}

else if($_SESSION['type'] == "3") {

if($emid)
	$result = mysql_query("SELECT * FROM  `leave` where status = 1 and leave.empid = '$emid'", $connection) or die(mysql_error());
	else		
	$result = mysql_query("SELECT * FROM  `leave` where status = 1 and leave.empid = ".$_SESSION['empid']."", $connection) or die(mysql_error());
}

else if($_SESSION['type'] == "4")
{
	
if($emid)
	$result = mysql_query("SELECT * FROM  `leave` where status = 1 and leave.empid = '$emid'", $connection) or die(mysql_error());
	else	
     $result = mysql_query("SELECT * FROM  `leave` where status = 1 ", $connection) or die(mysql_error());	
}
else if($_SESSION['type'] == "1")
{
	if($emid)
	$result = mysql_query("SELECT * FROM  `leave` where status = 1 and leave.empid = '$emid'", $connection) or die(mysql_error());
	else
     $result = mysql_query("SELECT * FROM  `leave` where status = 1 ", $connection) or die(mysql_error());	
}

else {
	
	
		}
	

	
echo "<script type='text/javascript'>





	$(document).ready(function() {

		

		$('#calendar').fullCalendar({

			header: {

				left: 'prev,next today',

				center: 'title',

				right: 'month,basicWeek,basicDay'

			},

			

			events: ["

			

			?>

			

			

		

				

<?php   

while($row = mysql_fetch_array($result))



	{

		   echo "{ 

		   title: '".$row['reqname']."-(".$row['leavetype'].")',  

		   start: '".$row['fromdate']."',  

		   end: '".$row['todate']."'

		   },";	

   

	 } 

	

?>



<?php

echo"	

				]		

			

		});

	});



</script>";

?>

