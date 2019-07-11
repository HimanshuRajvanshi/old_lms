<?php
session_start();
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include_once('functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TrilaSoft</title>
<link rel="stylesheet" href="css/login-screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/form.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>

<script src="js/custom_jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
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
<style type="text/css">
  @media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) {
  .right_content{ width:740px; float:left}
}
 
label{ display: block;} 

a.paginate {
border: 1px solid #000080;
padding: 2px 6px 2px 6px;
text-decoration: none;
color: #000080;
}
a.current {
border: 1px solid #000080;
font: bold .7em Arial,Helvetica,sans-serif;
padding: 2px 6px 2px 6px;
cursor: default;
background: #000080;
color: #FFF;
text-decoration: none;
}

ul.nice_paging{
	padding:10px 0 10px 0;
	text-align:left;
	font-weight:bold;
	color:#777;
}

ul.nice_paging li{
	padding:5px 10px;
	margin:3px;
	border:1px solid #aaa;
	background-color:#eee;
	display:inline;
	list-style:none;
}

ul.nice_paging li.current{
	background-color:#35baf8;
	color:#fff
}

ul.nice_paging li a{
	font-weight:bold;
	color:#777;
}


</style> 
</head>
<body>

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
		<h1>Dashboard</h1>
	</div>
	<!-- end page-heading -->

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		 
			<!--  start table-content  -->
			<div id="table-content">			
			<div class="left_content">
             
           <?php
           include('includes/leftpanel.php');
           ?>
			</div>
    
  
    <div class="right_content" style="width:1000px;">  <!-- Start of right content-->    
    

     
       
         
         <h3></h3>
  
         <h2>View All Issues</h2>
       
        <table style="width:100%;" class="table table-bordered table-hover table-striped">
<tr>
<td class="rowhead">Ticket ID</td>
<td class="rowhead">Issue</td>


<td class="rowhead">Employee Name</td>

<td class="rowhead">Description</td>

<td class="rowhead">Date</td>
<td class="rowhead">Time</td>
<td class="rowhead">Closing Date</td>
<td class="rowhead">Status</td>

<td class="rowhead">&nbsp;</td>
</tr>

<?php
include("nicePaging.php");
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$empid = $_SESSION['empid'];

$paging=new nicePaging($connection);
$rowsPerPage=10; 

$getemp = $paging->pagerQuery("SELECT department FROM  employee where employee.empid = '$empid' and employee.userstatus = 'active'" , $rowsPerPage);
$resemp = mysql_fetch_object($getemp);

$dep = $resemp->department;

if( $dep == "8")
{
  $result = $paging->pagerQuery("SELECT * FROM  issue, employee where issue.empid = employee.empid and issue != 'General' and employee.userstatus = 'active'  order by issueid DESC",  $rowsPerPage);	
}
else
{
$result = $paging->pagerQuery("SELECT * FROM  issue, employee where issue.empid = employee.empid and employee.userstatus = 'active' order by issueid DESC",  $rowsPerPage);
}

while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td><?php echo $row['issueid']; ?></td>
<td><?php echo $row['issue']; ?></td>
<td><?php echo $row['fname']." ".$row['lname']; ?></td>

<td><?php echo $row['desc']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php 
	date_default_timezone_set('Asia/Kolkata');
$timestamp = strtotime($row['time']);
echo date('h:i ', $timestamp);

  ?></td>
<td>
<?php 
if($row['closingdate'] == '0000-00-00 00:00:00')
{
 echo '';	
}
else
{
echo $row['closingdate']; 
}
?>
</td>  
  
<td>
<?php 
if($row['issuestatus'] == "pending")
echo '<img src="images/pending.png" />';
if($row['issuestatus'] == "resolved")
echo '<img src="images/approved.png" />';
?>
</td>
<td>
<?php 
if($row['issuestatus']="pending")
{
echo '<a href="updateform.php?&issueid='.$row[issueid].'&empid='.$row['empid'].'">Update</a>';
}

?>
</td>
</tr>        
<?php

}

$link= $_SERVER['REQUEST_URI'];

$paging->setSeparator("&");
echo $paging->createPaging($link);
mysql_close($link_identifier = $connection);
?>

        </table> 
          
      
     
     	</div><!-- end of right content-->
			
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
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