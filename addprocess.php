<?php
session_start();
$sessid = $_SESSION['sessid'];
require_once('database.inc.php');
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$username = mysql_real_escape_string(trim($_POST['username']));
$password = mysql_real_escape_string(trim(md5($_POST['password'])));
$doj = mysql_real_escape_string(trim($_POST['doj']));	
$empcode = mysql_real_escape_string(trim($_POST['empcode']));	
$supemail = mysql_real_escape_string(trim($_POST['supemail']));	
$type = mysql_real_escape_string(trim($_POST['usergroup']));
$status = mysql_real_escape_string(trim($_POST['status']));		
$fname = mysql_real_escape_string(trim($_POST['fname']));	
$lname = mysql_real_escape_string(trim($_POST['lname']));	
$email = mysql_real_escape_string(trim($_POST['email']));	
$address = mysql_real_escape_string(trim($_POST['address']));	
$coraddress = mysql_real_escape_string(trim($_POST['coraddress']));	
$contact = mysql_real_escape_string(trim($_POST['contact']));	
$emergencyno = mysql_real_escape_string(trim($_POST['emergencyno']));	
$designation = mysql_real_escape_string(trim($_POST['designation']));
$dob = mysql_real_escape_string(trim($_POST['dob']));
$department = mysql_real_escape_string(trim($_POST['department']));

$fields = array($username,$password, $doj, $type, $status, $fname, $lname, $email, $address, $coraddress, $contact, $emergencyno, $designation, $dob, $department);

if(empty($username))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 
 if(empty($password))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 
 if(empty($doj))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 
  if(empty($supemail))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($type))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($fname))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($lname))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($email))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 
 if(empty($address))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 
 
  if(empty($coraddress))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 
 if(empty($contact))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($emergencyno))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($designation))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($dob))
 {
 
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
 if(empty($department))
 {
 	
 	header('location:addemployee.php?sessid='.$sessid.'&mess=blank');
 	exit();
 }
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$getemp = mysql_query("SELECT * from employee where username = '".$username."'", $connection) or die(mysql_error());
	if(mysql_num_rows($getemp)>0)
	{
	header('location:addemployee.php?sessid='.$sessid.'&mess=exist');
 	exit();
	}
else{
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
		$result = mysql_query("INSERT into employee(username, password, doj, empcode, supemail, type, status, fname, lname, email, address, coraddress, contact, emergencyno, designation, dob, department,photo) VALUES('$username', '$password', '$doj', '$empcode', '$supemail', '$type', '$status', '$fname', '$lname', '$email', '$address', 
		'$coraddress', '$contact', '$emergencyno', '$designation','$dob', '$department','')", $connection) or die(mysql_error());
		if($result) {
		  header('location:addemployee.php?sessid='.$sessid.'&mess=success');
		  mysql_close($connection);
		}
	
}
?>