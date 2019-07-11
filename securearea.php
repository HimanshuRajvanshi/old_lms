<?php
date_default_timezone_set('Asia/Kolkata');
include_once 'login.class.php';
include_once('navigate.php');
$securearea = new Login();
$response = $securearea->session_check();
ini_set('session.gc_maxlifetime', 86400);
ini_set('date.timezone', 'Asia/Calcutta');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TrilaSoft</title>
<link rel="stylesheet" href="css/login-screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/form.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/jqModal.css" type="text/css" media="screen" title="default" />
<link rel="shortcut icon"  href="http://www.trilasoft.com/favicon2.ico" type="image/x-icon" />

<!--  jquery core -->

<script src="http://intranet.trilasoft.com/js/jquery-1.8.1.min.js" type="text/javascript"></script>
<script src="http://intranet.trilasoft.com/js/jqModal.js" type="text/javascript"></script>

<script src="http://intranet.trilasoft.com/js/custom_jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="http://intranet.trilasoft.com/js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
 <script type="text/javascript">
        $(document).ready(function(){
       
	    $("input, textarea").addClass("idle");
            $("input, textarea").focus(function(){
                $(this).addClass("activeField").removeClass("idle");
	    }).blur(function(){
                $(this).removeClass("activeField").addClass("idle");
	    });
        });
    </script>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/cupertino/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
  $(function() {
    $( "#tabs" ).tabs();
	 $( "#team" ).tabs();
	 $("#events").tabs();
  });
  
  $('.dialogs').jqm({ajax:'@href',modal:true});

  </script>
  
 <style>
 .btn {
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  text-shadow: 1px 1px 3px #666666;
  font-family: Arial;
  color: #ffffff !important;
  font-size: 11px;
   background: #078a07;
  padding: 5px 5px 5px 5px;
  text-decoration: none;
}

.btn:hover {
  background: #48b581;
  text-decoration: none;
}

#lean_overlay {
    position: fixed;
    z-index:100;
    top: 0px;
    left: 0px;
    height:100%;
    width:100%;
    background: #000;
    display: none;
}
 </style>

</head>
<body >

<!-- start logo -->


<!-- end logo -->
<!--  start top-search -->
	
   
 <?php include('includes/header.php'); ?>
 	<div class="clear"></div>
<!-- Start: login-holder -->
<!-- start content-outer ....................START -->
<div id="content-outer">
<!-- start content -->
<div id="content">
	
	<!--  start page-heading -->
	<div id="page-heading">
		<h1>Employee Intranet</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="http://intranet.trilasoft.com/images/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="http://intranet.trilasoft.com/images/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		 
			<!--  start table-content  -->
			<div id="table-content">			
			<div class="left_content">
          
           <?php include('includes/leftpanel.php'); ?>
           
			</div>
    

    <div class="right_content" style="width:1000px">  <!-- Start of right content-->    
    

     <h2>Upcoming Events.</h2>
       
        

<div style="float:left; width:600px">
         
   <div id="tabs">
  <ul>
    <li><a href="#tabs-1"> <h4>Birthdays</h4></a></li>
    <li><a href="#tabs-2"> <h4>Employment Anniversaries</h4></a></li>
	
	<?php 
	if(($_SESSION['type'] == '1')||($_SESSION['type'] == '4'))
{
	echo '<li><a href="#tabs-3"> <h4>Due for Confirmation</h4></a></li>';
}
	?>

  </ul>
  <div id="tabs-1">
   <?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$sql = "SELECT * FROM  employee WHERE userstatus = 'active' AND  DATE_ADD(STR_TO_DATE(dob, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(dob, '%Y-%m-%d')) YEAR)  BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY) LIMIT 0 , 30";
$res = mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($res)>0)
{
	
	

	
	
	echo'<ul style="list-style:none">';

while($row = mysql_fetch_array($res)) 
{
	$datetime = strtotime($row['dob']);
   $mysqldate = date("d F", $datetime);
	echo"<li><img src='images/bday.png'/>&nbsp;".$row['fname']." ".$row['lname']."&nbsp;<span style='color:green; font-style:italic; font-size:12px'>".$mysqldate."</span></li>";
 }	
 
 
 
}
else {
	echo"There are no birthdays in the next 7 days.";
}



?>



  </div>
  <div id="tabs-2">
   <?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$sql = "SELECT * FROM  employee WHERE userstatus = 'active' AND  DATE_ADD(STR_TO_DATE(doj, '%Y-%m-%d'), INTERVAL YEAR(CURDATE())-YEAR(STR_TO_DATE(doj, '%Y-%m-%d')) YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)  LIMIT 0 , 30";
$res = mysql_query($sql)or die(mysql_error());
if(mysql_num_rows($res)>0)
{
	
	echo'<ul style="list-style:none">';

while($row = mysql_fetch_array($res)) 
{
	$datetime = strtotime($row['doj']);
   $mysqldate = date("d F", $datetime);
   $curyear =  date("Y");
   $mysqlyear = date("Y", $datetime);
   
   if($mysqlyear == $curyear)
   {
	   echo "";
	}
	else
	{
echo"<li><img src='images/bday.png'/>&nbsp;".$row['fname']." ".$row['lname']."&nbsp;<span style='color:green; font-style:italic; font-size:12px'>".$mysqldate."</span></li>";
	}
	
}
}
else {
	echo"There are no anniversaries in the next 7 days.";
}




?>
  </div>
  
  <div id="tabs-3">
  <?php
  if(($_SESSION['type'] == '1')||($_SESSION['type'] == '4'))
{
  $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
  mysql_select_db(DATABASE,$connection);

$sql = 'SELECT fname, lname, doj FROM  employee WHERE userstatus="active" and status = "prob"';
$res = mysql_query($sql)or die(mysql_error());

while($getdoj = mysql_fetch_array($res))
{
	   $dStart = new DateTime(''.$getdoj['doj'].'');
   $dEnd  = new DateTime();
   $dDiff = $dStart->diff($dEnd);
   //echo $dDiff->format('%R'); // use for point out relation: smaller/greater
   
   if( ($dDiff->days > 173) )
   {   
	echo '<span style="background-color:#f7bd62">'.$getdoj['fname'].' '.$getdoj['lname'].' <span><br>';
   }   
}

}
  ?>
  </div>

</div>      
         
         
<?php

if(($_SESSION['type'] == '3')||($_SESSION['type'] == '4'))
{

echo'<p>&nbsp;</p>
<div id="team">
  <ul>
    <li><a href="#myteam"> <h4>My Team</h4></a></li>
  </ul>';

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);



$sql = 'SELECT email FROM  employee WHERE empid = '.$_SESSION['empid'].' and userstatus="active"';
$res = mysql_query($sql)or die(mysql_error());

$row1 = mysql_fetch_object($res);

$getemp = 'SELECT * from employee where employee.supemail = "'.$row1->email.'" and userstatus = "active" ORDER BY fname ASC';
$resemp = mysql_query($getemp)or die(mysql_error());


echo'<div id="team-1">';
  
 while($row2 = mysql_fetch_array($resemp)) 
 {
echo '<div style="width:150px; text-align:center;  padding:10px; border:1px solid #ccc; background-color:#efefef; margin-bottom: 10px;
margin-top: 10px; margin-right:15px; float:left; height:134px">';

if($row2['photo'] != '')
{

echo '<img src="http://intranet.trilasoft.com/photos/'.$row2['photo'].'" style="width:48px; height:48px; display:block; margin:0px auto">';
}
else
{
echo '<img src="http://intranet.trilasoft.com/images/noimage.png" style="width:48px; height:48px; display:block; margin:0px auto">';	
}

echo $row2['fname'].' '.$row2['lname'].'<br><i style="font-size:11px">'.$row2['designation'].'</i><br><br><a class="btn" href="sendnom.php?empid='.$row2['empid'].'&sessid='.$_SESSION['sessid'].'">Send Nomination</a></div>';	 

}
  echo '<div style="clear:both"></div>';

 echo' </div>';
  echo '<div style="clear:both"></div>';
 echo '<a href="viewnom.php?sessid='.$_SESSION['sessid'].'">View/Edit Nominations</a>'; 
echo '</div>';
mysql_close($connection );
}
?>
   </div>
   
   <!-- Events Panel-->
   <div style="float: left;width: 350px;margin-left: 41px;">
   <div id="events">
   
   <ul>
    <li><a href="#events-1"> <h4>Award Announcements</h4></a></li>
  </ul>
  <div id="events-1">
<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$sql = "SELECT employee.fname, employee.lname, employee.photo, employee.photo, nominations.awardtype, nominations.quarter, employee.userstatus FROM  employee, nominations WHERE employee.userstatus='active' and nominations.result='Selected' and employee.empid = nominations.empid ORDER BY employee.fname ASC";
$res = mysql_query($sql)or die(mysql_error());

while($row = mysql_fetch_array($res))
{
  echo '<div style="float:left; padding:2px; width:250px; margin-bottom:5px"><img src="photos/'.$row['photo'].'" style="width:48px; height:48px; float:left; padding-right:5px"/>';
  echo '<p style="font-weight:bold">'.$row['fname'].' '.$row['lname'].'</p>';	
   echo '<p style="font-style:italic">'.$row['quarter'].'</p>';	
  echo '<p style="font-style:italic">'.$row['awardtype'].'</p></div>';	
}
	?>
    <div style="clear:both"></div>
  </div>
   
   </div></div>      
   <!-- Events Panel Ends-->          
      
     
     	</div><!-- end of right content-->
			
			</div>
			<!--  end table-content  -->
	
			<div class="clear"> </div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
    
<!-- End: login-holder -->
</body>
</html>