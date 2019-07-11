<?php
include('database.inc.php');
require_once('class.phpmailer.php');
$connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$sql = "SELECT * FROM `employee` WHERE userstatus = 'active'";
$res = mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($res) > 0)
{
while($row = mysql_fetch_array($res))
 {
 
 $mail = new PHPMailer(); 
 /* $mail->IsSMTP(); // telling the class to use SMTP


  $mail->Host       = "mail.trilasoft.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.trilasoft.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "rbanerjee@trilasoft.com"; // SMTP account username
  $mail->Password   = "Banrah@2013";        // SMTP account password */  
   $mail->SetFrom('hr@trilasoft.com', 'hr');
   $mail->AddAddress($row['email'], $row['fname'].' '.$row['lname']);
 // $mail->AddAddress('rbanerjee@trilasoft.com', $row['fname'].' '.$row['lname']);
  $mail->Subject = 'Merry Christmas to all!!'; 
  $body = '<div style="text-align:center; width:65%; padding:10px; font-family:arial; font-size:14px; margin-left:150px auto; color:#ad3e07"><br>Merry Christmas!!!!</p></div><p></p><img src="images/xmas_image.png"></div>';
  
  
  
  $mail->MsgHTML($body);
  $mail->Send();  
 }
 
 
}

?>