<?php
include('database.inc.php');
require_once('class.phpmailer.php');
$connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
//$sql = "SELECT * FROM `employee` WHERE userstatus = 'active' AND DAYOFYEAR( CURDATE( ) ) = DAYOFYEAR( `dob` )";
$sql="SELECT * FROM `employee` WHERE userstatus = 'active' and MONTH(`dob`) = MONTH(NOW()) AND DAYOFMONTH(`dob`) = DAYOFMONTH(NOW())";
$res = mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($res) >0)
{
while($row = mysql_fetch_array($res))
 {
 
 $mail = new PHPMailer(); 
 $mail->SetFrom(HREMAIL, HRNAME);
// $mail->AddAddress($row['email'], $row['fname'].' '.$row['lname']);
 // $mail->AddAddress('rbanerjee@trilasoft.com', $row['fname'].' '.$row['lname']);
$mail->AddAddress('team@trilasoft.com', 'Team Trilasoft');
// $mail->AddCC('team@redskymobility.com', 'Redsky Mobility');
  
  $mail->Subject = 'Happy Birthday to you!!'; 
  
  $body = '<div style="text-align:center; width:65%; padding:10px; font-family:arial; font-size:14px; margin-left:150px auto; color:#0071ba">Dear '.$row['fname'].' '.$row['lname'].',';
$body .= '<p>On your birthday I wish you much pleasure and joy I hope all of your wishes come true. May each hour and minute be filled with delight,And your birthday be perfect for you!' ;
$body .= 'all the joy you can ever have and may you be blessed abundantly today, tomorrow and the days to come!' ;
$body .= 'May you have a fantastic birthday and many more to come... </p><p>';
$body .= '<br>HAPPY BIRTHDAY!!!!</p><p></p><img src="images/bday_image.png"></div>';
  
  
  
  $mail->MsgHTML($body);
  if($mail->Send())
  {
    echo 'mail sent';
  }  
 }
 
 
}

?>