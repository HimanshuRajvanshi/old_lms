<?php
require_once('class.phpmailer.php');
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$body= "Test Mail";
  $mail->Host       = "mail.trilasoft.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.trilasoft.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "rbanerjee@trilasoft.com"; // SMTP account username
  $mail->Password   = "raja2010";        // SMTP account password
   $mail->SetFrom('rahulorama@gmail.com', 'Supervisor');
  $mail->AddAddress('rahulorama@gmail.com', 'Recipient');
  $mail->Subject = 'Test Mail';  
  $mail->MsgHTML($body);
  $mail->Send();  	
?>