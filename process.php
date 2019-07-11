<?php
ob_start();
session_start();
$action = $_GET['action'];
$sessid = $_SESSION['sessid'];
require_once('database.inc.php');

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
date_default_timezone_set('Asia/Kolkata');

// Leave Apply


if($action == 'apply')
{
	echo $action;
error_reporting(E_ALL);



$empid = trim($_POST['empid']);
$startdate = trim($_POST['startdate']);
$enddate = trim($_POST['enddate']);
$fromtime = trim($_POST['fromtime']);
$totime = trim($_POST['totime']);
$leavetype = trim($_POST['leavetype']);
$halfdaydetail = trim($_POST['halftype']);
$reasons = trim($_POST['reasons']);
$phone =trim($_POST['phone']);
$reqname = trim($_POST['reqname']);
$reqemail = trim($_POST['reqemail']);
$supemail = trim($_POST['supemail']);
$daycount = trim($_POST['daycount']);
$appdate = trim($_POST['appdate']);

	
		//$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
		//mysql_select_db(DATABASE,$connection);
		$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		
		
	$getleave = "select * from `leave` where fromdate='$startdate' and empid='$empid' and status = 0";
	$leaveres = mysqli_query($connection, $getleave);//mysql_query($getleave, $connection)or die(mysql_error());
	echo $getleave;
		if(mysqli_num_rows($leaveres) > 1)
	{
			echo 'if';
	echo'<script>alert("Leave already exists"); window.location.href="leaveapply.php?sessid='.$_SESSION['sessid'].'&mess=exist"</script>';
	exit();
	}
	else
	{
		echo $leavetype.' else<BR><BR>';
		if(($leavetype == "Optional Holiday")||($leavetype == "Short Leave")||($leavetype == "Comp Off")||($leavetype == "Work From Home"))
		{
		 $daycount = 0;
		}		
		
$sql = "INSERT INTO `leave` (`empid`,`fromdate`, `todate`,`fromtime`,`totime`,`leavetype`, `halfdaydetail`, `reason`, `phone`, `reqname`, `reqemail`, `supemail`, `daycount`, `appdate`, `comment`) VALUES ('$empid','$startdate', '$enddate','$fromtime','$totime','$leavetype','$halfdaydetail', '$reasons', '$phone', '$reqname', '$reqemail', '$supemail', '$daycount', '$appdate','-');";		
echo $sql.' elseeee';
try{
	$result = mysqli_query($connection,$sql); 
} catch (Exception $e)
{
    echo $e->getMessage();
}
if($result==true)
		{echo 'True';}
else
		{echo 'False';}
echo ' after resutl<BR><br>';
//$row = mysqli_fetch_row($result);
//echo $row;
		if($result) {
			echo $leavetype;

if($leavetype == "Half Day Leave")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>Half Day Detail: ".$halfdaydetail."<br/> Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;	
}

if($leavetype == "Sick Leave")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/> Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}

if($leavetype == "Casual Leave")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/> Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}

if($leavetype == "Short Leave")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>From Time: ".$fromtime."<br>To Time: ".$totime."<br/> Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}

if($leavetype == "Planned Leave")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/>Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}
if($leavetype == "Optional Holiday")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/>Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}
if($leavetype == "Emergency Leave")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/>Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}
if($leavetype == "Comp Off")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/>Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}

if($leavetype == "Work From Home")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/>Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}

if($leavetype == "Paternity Leave")
{
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold'>Leave Application from ".$reqname."</p><p>Leave Type: ".$leavetype."<br>Start Date: ".$startdate."<br>End Date: ".$enddate."<br/>Reasons: ".$reasons."</p>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;
}


//$getemp = mysql_query("Select fname, lname from employee where email = '$supemail'")or die(mysql_error());
$getemp = mysql_query("Select fname, lname from employee where email = '$supemail'")or die(mysql_error());
$rowemp = mysql_fetch_object($getemp);

$getreq = mysql_query("Select fname, lname, email from employee where email = '$reqemail'")or die(mysql_error());
$rowreq = mysql_fetch_object($getreq);


require_once('class.phpmailer.php');
$mail = new PHPMailer(); 

/* $mail->IsSMTP(); // telling the class to use SMTP


  $mail->Host       = "smtp.bizmail.yahoo.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "smtp.bizmail.yahoo.com"; // sets the SMTP server
  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "rbanerjee@trilasoft.com"; // SMTP account username
  $mail->Password   = "raja2010";        // SMTP account password */
 
  $from = $rowreq->email;
  
  //$from = 'rbanerjee@trilasoft.com';
  $mail->SetFrom($from, $rowreq->fname.' '.$rowreq->lname);
  $mail->AddAddress($supemail, $rowemp->fname.' '.$rowemp->lname); 
  $mail->Subject = 'Leave Application'; 
  
  $mail->MsgHTML($body);
  
  
  if($mail->Send())
  {    
  header('location:leaveapply.php?sessid='.$sessid.'&mess=success');
  mysql_close($connection);
  exit();
  }	
  else{
	
	 echo'Mail was not sent.'; 
  }  
}
	
	}
}



	
//Update Employee

if($action == 'editemp')
{
ini_set("display_errors", "1");
error_reporting(E_ALL);
var_dump($_POST);
$id = $_POST['id'];
	if($id)
	{
$doj = mysql_real_escape_string(trim($_POST['doj']));	
$empcode = mysql_real_escape_string(trim($_POST['empcode']));	
$supemail = mysql_real_escape_string(trim($_POST['supemail']));	
$type = mysql_real_escape_string(trim($_POST['usergroup']));	
$status = mysql_real_escape_string(trim($_POST['status']));	
$userstatus = mysql_real_escape_string(trim($_POST['userstatus']));	
$username = mysql_real_escape_string(trim($_POST['username'])); 
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

			



		$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
		mysql_select_db(DATABASE,$connection);
		$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		
		/* if( $userstatus == "inactive")
		{	
		// check if the rm is having emlpoyee under him
		$getrep = "Select * from employee where supemail = '$email' and userstatus = 'active'";
		$resrep = mysql_query($getrep) or die(mysql_error());
		$count = mysql_num_rows($resrep);
		
		if($count > 0)
		{
			header('location:editemployee.php?id='.$id.'&sessid='.$sessid.'&mess=userexist&count='.$count);
			mysql_close($connection);
			exit();
		}
		}
		//end of code checking
		else
		{	 */
		
		
		$sql = "UPDATE `employee` SET doj = '$doj', empcode = '$empcode', supemail ='$supemail', type='$type', status='$status', userstatus = '$userstatus', username='$username',  fname = '$fname', lname='$lname', email='$email', address='$address', coraddress = '$coraddress', contact='$contact', emergencyno = '$emergencyno', designation='$designation', dob = '$dob', department='$department' WHERE empid = '".$id."'"; 		
      $result = mysqli_query($connection,$sql) or die(mysql_error());
      if($result) { 
			
			header('location:editemployee.php?id='.$id.'&sessid='.$sessid.'&mess=success');
		
			mysql_close($connection);
			exit();
		} 
		else { 
		header('location:editemployee.php?id='.$id.'&sessid='.$sessid.'&mess=fail');
			mysql_close($connection);
			exit();
	     }  
				 
      		
		}
	
	}

// Delete leave

if(isset($_POST['delleave']))
{
	
	
$id= $_POST['leave'];
	
if($id == "")
{
echo'<script language="javascript">alert("Please select a leave."); window.location="viewleave.php?sessid='.$sessid.'"</script>';

	}
	else {	
foreach($id as $lid)
	{
		$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
		mysql_select_db(DATABASE,$connection);
		$sql = 'DELETE From `leave` where lid ="'.$lid.'"';
	   $result = mysql_query($sql, $link_identifier = $connection)or die(mysql_error($link_identifier = $connection));
	   if($result)
	   {
       	 header('location:viewleave.php?id='.$id.'&sessid='.$sessid.'&mess=delsuccess');
			 mysql_close($connection);
	   	} 
	}
}
}



// Leave Approval
if(isset($_POST['approve']))
{
	require_once('class.phpmailer.php');
	
$lid= $_POST['lid'];

$comm = $_POST['comments']; 
if($lid == "")
{
echo'<script language="javascript">alert("Please select a leave."); window.location="viewleave.php?sessid='.$sessid.'"</script>';

	}
	else {
        $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
		//$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
		mysqli_select_db($connection,DATABASE);
		$sql = "UPDATE `leave` SET status=1, comment='".$comm."' where lid ='$lid'";
	   $result = mysqli_query($link_identifier = $connection,$sql)or die(mysql_error($link_identifier = $connection));
	   if($result)
	   {
$getleave = 'SELECT * from `leave` WHERE lid ='.$lid.'';
$leaveres = mysqli_query($connection,$getleave)or die(mysql_error());
$row = mysqli_fetch_object($leaveres);	   	
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold; color:green'>Your ".$row->leavetype." has been approved</p>";
if($row->leavetype == "Planned Leave"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Short Leave"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "From Time : ".$row->fromtime."<br/>";
$body .= "To Time : ".$row->totime."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Half Day Leave"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "Half Day Details : ".$row->halfdaydetail."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Sick Leave"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Casual Leave"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Optional Holiday"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Emergency Leave"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Comp Off"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Work From Home"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
if($row->leavetype == "Paternity Leave"){
$body .= "Start Date : ".$row->fromdate."<br/>";
$body .= "End Date : ".$row->todate."<br/>";
$body .= "Reason : ".$row->reason."<br/>";
$body .= "Comment : ".$row->comment."<br/>";
}
$body .= "</div>" ;

//update balance on approval
$getbal = "Select * from balance where empid = ".$row->empid."";
$resbal = mysqli_query($connection,$getbal)or die(mysql_error());
$rowbal = mysqli_fetch_object($resbal);

if($row->leavetype == "Comp Off")
{
$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;
}


else if($row->leavetype == "Optional Holiday")
{
$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;
}

else if($row->leavetype == "Work From Home")
{
$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;
}


else if($row->leavetype == "Paternity Leave")
{
$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;
}

else
{
$availed = $rowbal->availed + $row->daycount;
$balance = $rowbal->balance - $row->daycount;
}


$updbal = "UPDATE balance SET availed = '$availed', balance = '$balance' where empid = ".$row->empid."";
$updbalres = mysql_query($updbal)or die(mysql_error());

//update balance on approval ends

$username = $_SESSION['username'];

$getemp = mysql_query("Select fname, lname, email from `employee` where username = '$username'");

$emprow = mysql_fetch_object($getemp);


$mail = new PHPMailer(); 
//$mail->IsSMTP(); // telling the class to use SMTP


 //$mail->Host       = "smtp.bizmail.yahoo.com"; // SMTP server
 // $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
 // $mail->SMTPAuth   = true;                  // enable SMTP authentication
 // $mail->Host       = "smtp.bizmail.yahoo.com"; // sets the SMTP server
//$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
//  $mail->Username   = "rbanerjee@trilasoft.com"; // SMTP account username
 // $mail->Password   = "raja2010";        // SMTP account password
   $mail->SetFrom($emprow->email, $emprow->fname.' '.$emprow->lname); 
  $mail->AddAddress($row->reqemail, $row->reqname);
  $mail->Subject = 'Leave Mgmt System: '.$row->reqname.' - Approved'; 
   
  $gethr = "Select * from `employee` where type ='4' and userstatus = 'active'";
 
  $reshr = mysql_query($gethr)or die(mysql_error());
  
  while($row=mysql_fetch_array($reshr))
  {
  $mail->AddCC($row['email'], $row['fname'].$row['lname']);
  }
 
 
  $mail->MsgHTML($body);
  $mail->Send();  	
  header('location:viewleave.php?sessid='.$sessid.'&mess=approve');
			 mysql_close($connection);
	   	} 

}
}


// Leave Rejection
if(isset($_POST['reject']))
{
require_once('class.phpmailer.php');	
$lid= $_POST['lid'];
$comm = $_POST['comments']; 
if($lid == "")
{
echo'<script language="javascript">alert("Please select a leave."); window.location="viewleave.php?sessid='.$sessid.'"</script>';

}	
else{

		$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
		mysql_select_db(DATABASE,$connection);
		
		
		$getleave = 'SELECT * from `leave` WHERE lid ='.$lid.'';
$leaveres = mysql_query($getleave)or die(mysql_error());
$row = mysql_fetch_object($leaveres);	 

if($row->status == "1")
{

$getbal = "Select * from balance where empid = ".$row->empid."";
$resbal = mysql_query($getbal)or die(mysql_error());
$rowbal = mysql_fetch_object($resbal);

if($row->leavetype == "Comp Off")
{
$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;
}

else if($row->leavetype == "Optional Holiday")
{
$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;
}
else if($row->leavetype == "Paternity Leave")
{
$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;
}
else
{
$availed = $rowbal->availed - $row->daycount;
$balance = $rowbal->balance + $row->daycount;
}


$updbal = "UPDATE balance SET availed = '$availed', balance = '$balance' where empid = ".$row->empid."";
$updbalres = mysql_query($updbal)or die(mysql_error());
  
}

//Balance Update on Rejection
if($row->status == "0")
{
echo'<script>alert('.$row->status.')</script>';
$getbal = "Select * from balance where empid = ".$row->empid."";
$resbal = mysql_query($getbal)or die(mysql_error());
$rowbal = mysql_fetch_object($resbal);


$availed = $rowbal->availed + 0;
$balance = $rowbal->balance - 0;

$updbal = "UPDATE balance SET availed = '$availed', balance = '$balance' where empid = ".$row->empid."";
$updbalres = mysql_query($updbal)or die(mysql_error());
  
}
		
		
		$sql = "UPDATE `leave` SET status='2', comment='".$comm."' where lid ='$lid'";
	   $result = mysql_query($sql, $link_identifier = $connection)or die(mysql_error($link_identifier = $connection));
	   
	   
	   if($result)
{
	   
  	
$body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;background-color:lightblue;padding: 15px;\">";
$body .= "<p style='font-weight:bold; color:red'>Your ".$row->leavetype." has been rejected</p>";
$body .= "<p style='font-weight:bold; color:red'>Start Date ".$row->fromdate." </p>";
$body .= "<p style='font-weight:bold; color:red'>End Date ".$row->todate." </p>";
$body .= "<p style='font-weight:bold; color:red'>Comment: ".$comm."</p>";
$body .= "</div>" ;


//Balance Update on Rejection after Approval




}

$username = $_SESSION['username'];
$getemp = mysql_query("Select fname, lname, email from `employee` where username = '$username'");
$emprow = mysql_fetch_object($getemp);


$mail = new PHPMailer(); 
//$mail->IsSMTP(); // telling the class to use SMTP


 //$mail->Host       = "smtp.bizmail.yahoo.com"; // SMTP server
 // $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
 // $mail->SMTPAuth   = true;                  // enable SMTP authentication
 // $mail->Host       = "smtp.bizmail.yahoo.com"; // sets the SMTP server
 // $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
//  $mail->Username   = "rbanerjee@trilasoft.com"; // SMTP account username
//  $mail->Password   = "raja2010";        // SMTP account password
  $mail->SetFrom($emprow->email, $emprow->fname.' '.$emprow->lname);  
  $mail->AddAddress($row->reqemail, $row->reqname);
  $mail->Subject = 'Leave Mgmt System: '.$row->reqname.'- Rejected'; 
  $gethr = "Select * from `employee` where type ='4' and userstatus = 'active'";
 
  $reshr = mysql_query($gethr)or die(mysql_error());
  
  while($row=mysql_fetch_array($reshr))
  {
  $mail->AddCC($row['email'], $row['fname'].$row['lname']);
  }

  
  $mail->MsgHTML($body);
  $mail->Send();  		   	
  header('location:viewleave.php?sessid='.$sessid.'&mess=reject');
			 mysql_close($connection);
	   	} 
	
}


if(isset($_POST['forgotpass']))
{
	//mail("rbanerjee@trilasoft.com","test","test mail");
	error_reporting(E_ALL);
  	$email = mysql_escape_string(trim($_POST['email']));
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
	mysql_select_db(DATABASE,$connection);
	$sql = 'SELECT * from `employee` where email = "'.$email.'"';
	$result = mysql_query($sql)or die(mysql_error($link_identifier = $connection));
	$count = mysql_num_rows($result);
	if($count > 0)
	{
	
  $row = mysql_fetch_object($result);  
 $body='Please reset you password using this link';
 $body .='<a href="http://intranet.trilasoft.com/resetpass.php?id='.$row->empid.'">Password Reset</a>';		
			require_once('class.phpmailer.php');
			$mail = new PHPMailer(); 
			//$mail->IsSMTP();
			//$mail->SMTPDebug  = 1;                     
			//$mail->SMTPAuth = false;
			//$mail->SMTPSecure = "SSL";
			//$mail->Host = "smtp.gmail.com";        // sets Gmail as the SMTP server
           // $mail->Port = "465";  
			//$mail->Username = "rahulorama@gmail.com";
			//$mail->Password = "Ruchira@1982";
			
   $mail->SetFrom('info@trilasoft.com', 'Admin');
  $mail->AddAddress($email, 'Password Request');
  $mail->Subject = 'Password Request';  
  $mail->MsgHTML($body); 
  if( $mail->Send())
  { 

    echo'<script>alert("Password has been mailed to your Email Id"); window.location.href="index.php" ;</script>';

 	}
	else{
		
		exit();
	}
 
  
			
		}		
		else{
			
			echo'<script>alert("Your email could not be found in our database"); window.location="index.php?val=0";</script>';
		}
	
}



		
	

?>