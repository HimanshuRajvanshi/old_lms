<?php
session_start();
//error_reporting(E_ALL);
error_reporting(0);
include_once('functions.php');
date_default_timezone_set('Asia/Kolkata');
require_once('class.phpmailer.php');
require_once('database.inc.php');

// Report all PHP errors
//error_reporting(-1);
 //$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
//mysql_select_db(DATABASE,$connection);

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
date_default_timezone_set('Asia/Kolkata');

if($connection)
	
date_default_timezone_set("Asia/Calcutta");


 $empid = trim($_POST['empid']);
 $issue = trim($_POST['issue']);
 $desc = trim($_POST['desc']);
 $date = trim($_POST['date']);
 $comment = trim($_POST['comment']);
 $closingdate = trim($_POST['closingdate']);
 $time = trim($_POST['time']);



$sql = "INSERT into`issue` (`issue`,  `desc`, `date`, `time`, `empid`,`closingdate`,`comment`)VALUES('$issue',  '$desc', '$date', '$time', '$empid','$closingdate','$comment');";
 $sql.' elseeee';
try 
{
 $res = mysqli_query($connection, $sql);
	
	//if($res==true)
	//	{echo 'True';}
	//else
	//	{echo 'False';}
	
	$row = mysqli_fetch_row($res);
     $row;
	
} catch (Exception $e)
{
    echo $e->getMessage();
}

echo "<h3>The registered successfully!</h3>";

if($res)

 "<h3>The issue (".$ticket.") has been registered successfully!</h3>";
$sq = "Select * from employee, issue where issue.empid = ".$_SESSION['empid']." and employee.empid = ".$_SESSION['empid']." ORDER BY 'issueid' LIMIT 1";
$rs = mysqli_query($connection, $sq);
 $newrow = mysqli_fetch_array($rs);


$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\"><br>
<img src='http://www.trilasoft.com/images/logo.png' />";
$body .= "<p style='font-weight:bold'>Issue: ".$issue."</p><p>Description: ".$desc."<br>Date: ".$date."<br>Sent By: $newrow[fname] $newrow[lname]";
$body .= "<br><a href='http://intranet.trilasoft.com'>Login Here</a></div>";


//$maxid = "Select max(issueid) as issueid from issue ";
//$maxidnew = mysqli_query($connection, $maxid);
//$newrowmax = mysqli_fetch_row($maxidnew);
//echo $highest_id = $newrowmax['issueid'];


$q = "Select max(issueid) from issue";
$result = mysqli_query($connection, $q);
$data = mysqli_fetch_array($result);

// echo $data[0];

//echo 'False1111111111111111';
$mail = new PHPMailer(); 
/* $mail->IsSMTP(); // telling the class to use SMTP


  $mail->Host       = "mail.trilasoft.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.trilasoft.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "info@trilasoft.com"; // SMTP account username
  $mail->Password   = "info@2017";        // SMTP account password */
  //$from = $rowreq->email;  
 // $mail->SetFrom($from, $rowreq->fname.' '.$rowreq->lname);
 // $mail->SetFrom($newrow->email);
  
 if(($issue != "General")||($issue != "Telephone Problem"))
{ 
  
  $getit = "SELECT * FROM employee WHERE department IN ('8') AND userstatus = 'active'";
  $resit = mysqli_query($connection, $getit);
  
  while($row = mysqli_fetch_array($resit))
  {
   
	
        $mail->AddAddress($row['email'], $row['fname'].' '.$row['lname']);	
		$mail->AddAddress('gchand@trilasoft.com', 'Govind');
		$mail->AddCC('pray@trilasoft.com', 'Pramod Ray');
		$mail->AddCC(HREMAIL, HRNAME);
		//$mail->AddCC('rajesh@starww.com', 'Rajesh Sharma');	
		//$mail->AddCC('adash@trilasoft.com', 'arbind');
	      
  }
  
  $getit1 = "SELECT * FROM employee where empid= '$empid' and userstatus = 'active'";
  $resit1 = mysqli_query($connection, $getit1);
	while($row = mysqli_fetch_array($resit1))
  {
	
	 $mail->SetFrom($row['email']); 
  }
   $mail->Subject = 'New Issue Registered #_'.$data[0].''; 
  $mail->MsgHTML($body);
  $mail->Send();
}

if(($issue == "General")||($issue == "Telephone Problem"))
{ 
  
  $getit = "SELECT * FROM employee WHERE department IN ('6') AND userstatus = 'active'";
  $resit = mysql_query($getit)or die(mysql_error());
  
  while($row = mysql_fetch_array($resit))
  {
   
	
        $mail->AddAddress($row['email'], $row['fname'].' '.$row['lname']);	    
		$mail->AddCC('pray@trilasoft.com', 'Pramod Ray');
		$mail->AddCC('gchand@trilasoft.com', 'Govind');
		$mail->AddCC('rajesh@starww.com', 'Rajesh Sharma');
	    $mail->AddCC(HREMAIL, HRNAME);
	  	    
  }
   $mail->Subject = 'New Issue Registered #_'.$data[0].''; 
  $mail->MsgHTML($body);
  $mail->Send();

}  
  
   


?>