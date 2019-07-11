<?php
session_start();
//error_reporting(E_ALL);
error_reporting(0);
include_once('functions.php');
$issueid = $_POST['issueid'];
$action = $_POST['action'];
$comment = $_POST['comment'];
$empid = $_POST['empid'];
date_default_timezone_set('Asia/Kolkata');
$closingdate = date('Y-m-d h:i:s');

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

//$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
//date_default_timezone_set('Asia/Kolkata');

if (!$connection)
{
 "Please try later.";
}else
{
"Connected.";
}

$sql = "UPDATE `issue` SET issuestatus='$action', comment='$comment', closingdate='$closingdate' WHERE issueid = '$issueid'";
$res = mysql_query($sql, $connection)or die(mysql_error());

if($res)
  
$getemp = "Select * from issue, employee where issue.empid = ".$empid." and employee.empid=".$empid." ORDER BY issue.issueid DESC ";
$empres = mysql_query($getemp)or die(mysql_error());
$row = mysql_fetch_object($empres);

require_once('class.phpmailer.php');


$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\"><br>
<img src='http://www.trilasoft.com/images/logo.png' />";
$body .= "<p style='font-weight:bold'>Issue: ".$row->issue."</p><p>Description: ".$comment."<br>Date: ".$row->date."<br>Issue Status: ".$row->issuestatus."<br>         <a href='http://intranet.trilasoft.com'>Login here</a></div>";



$mail = new PHPMailer(); 
/* $mail->IsSMTP(); // telling the class to use SMTP


  $mail->Host       = "mail.trilasoft.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.trilasoft.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "info@trilasoft.com"; // SMTP account username
  $mail->Password   = "info@2017";        // SMTP account password */
   $mail->SetFrom('pray@trilasoft.com');
  $mail->AddAddress($row->email, 'Supervisor');
  $mail->AddCC(HREMAIL, HRNAME);
  $mail->AddCC('gmitra@trilasoft.com', 'Giten Mitra'); 
//$mail->AddCC('adash@trilasoft.com', 'Arabinda Dash');	    
  $mail->Subject = 'Issue Updated #_'.$row->issueid.''; 
  $mail->MsgHTML($body);
  $mail->Send();  

echo'<script>alert("Status has been updated successfully."); 
window.location.href="viewissue.php?sessid='.$_SESSION['sessid'].'";
</script>';
	

?>