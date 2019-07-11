<?php

include_once 'login.class.php';

$securearea = new Login();

$response = $securearea->session_check();

ini_set('session.gc_maxlifetime', 86400);

ini_set('date.timezone', 'Asia/Calcutta');

require_once('class.phpmailer.php');

?>



<?php

$file = fopen("Attlog.txt","r");

$count = 0;

include('database.inc.php');

$conn = mysql_connect(HOSTNAME,USERNAME,PASSWORD);//mysqli_connect('127.0.0.1', 'root', 'root', 'test');

mysql_select_db(DATABASE,$connection);



while(! feof($file))

  {

	  $count = $count+1;

  $test = fgets($file);

  $a = $test;

  	$pieces[] = explode(" ", $a);

	



	$sql = "INSERT INTO attendance (emp_code, date_time,dept) VALUES('".trim($pieces[0])."','".$pieces[1]."',".$pieces[2].")";   

		//mysqli_query($conn,$sql) or die(mysql_error());

	$res = mysql_query($sql);

  }



fclose($file);

//mysqli_close($conn);

?> 

<center>Total attendance uploaded: <b><i><?php echo $count; ?></i></b></center>