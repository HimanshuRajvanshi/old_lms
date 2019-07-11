<?php
include('database.inc.php');
require_once('class.phpmailer.php');
$connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
//$sql = "SELECT * FROM `employee` WHERE userstatus = 'active' AND DAYOFYEAR( CURDATE( ) ) = DAYOFYEAR( `doj` )";
$sql = "SELECT * FROM `employee` WHERE userstatus = 'active' AND  MONTH(`doj`) = MONTH(NOW()) AND DAYOFMONTH(`doj`) = DAYOFMONTH(NOW())";
$res = mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($res) >0)
{
while($row = mysql_fetch_array($res))
 {
 
 $mail = new PHPMailer(); 

   $mail->SetFrom(HREMAIL, HRNAME);
 //$mail->AddAddress($row['email'], $row['fname'].' '.$row['lname']);
 //$mail->AddAddress('rbanerjee@trilasoft.com', $row['fname'].' '.$row['lname']);

 $mail->AddAddress('team@trilasoft.com', 'Team Trilasoft');
 //$mail->AddCC('team@redskymobility.com', 'Redsky Mobility');
  
  $mail->Subject = 'Happy Anniversary!!'; 
  
  $body = '<div style="text-align:center; width:65%; padding:10px; font-family:arial; font-size:14px; margin-left:150px auto; color:#ad3e07">Dear '.$row['fname'].' '.$row['lname'].',';
$body .= '<p>Congratulations on  your Employment Anniversary at TrilaSoft Solutions! Wishing you many more years of success... ' ;
$body .= '<br>HAPPY ANNIVERSARY!!!!</p><p><img src="images/anniv_image.png"/></p></div>';
  
  
  
  $mail->MsgHTML($body);
   if($mail->Send())
  {
    echo 'mail sent';
  }  
 }
 
 
}

?>