<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
ini_set('session.gc_maxlifetime', 86400);
ini_set('date.timezone', 'Asia/Calcutta');
require_once('class.phpmailer.php');
?>

<?php
include('database.inc.php');
$conn = mysql_connect(HOSTNAME,USERNAME,PASSWORD);//mysqli_connect('127.0.0.1', 'root', 'root', 'test');
mysql_select_db(DATABASE,$conn);
	
	$empcode=$_GET['empcode'];
	$sql = "SELECT distinct concat(a.fname,' ',a.lname) as name,date_format(b.date_time,'%d-%M-%Y') as date,date_format(b.date_time,'%H:%i:%s') as time,date_time FROM employee a,attendance b WHERE a.empcode=b.emp_code and a.username='".$empcode."' order by date_time desc limit 60";   
		//mysqli_query($conn,$sql) or die(mysql_error());
	$res = mysql_query($sql);
	?>
<center><table class="table table-sm table-bordered table-striped table-hover" style="width:100%;">
<tr valign="top" align="center">
	<td>Name</td>
	<td>Date</td>
	<td>Time</td>
</tr>
	<?php
	while($emp = mysql_fetch_array($res)){
	
?>
	<tr  valign="top" align="center">
	<td><?php echo $emp['name']?></td>
	<td><?php echo $emp['date']?></td>
	<td><?php echo $emp['time']?></td>
</tr>

<?php
	}
	?> 

</table></center>
