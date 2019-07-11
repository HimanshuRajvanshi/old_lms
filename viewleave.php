<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include_once('functions.php');
$empid = $_SESSION['empid'];
$type = $_SESSION['type'];

include("nicePaging.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TrilaSoft</title>
<link rel="stylesheet" href="css/login-screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/form.css" type="text/css" media="screen" title="default" />
<link type="text/css" rel="stylesheet" href="css/simplePagination.css"/>
<!--  jquery core -->
<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.simplePagination.js"></script>

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



checked=false;
function checkedAll (frm1) {
	var aa= document.getElementById('leavereport');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
      }


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
	padding:3px 7px 3px 7px;
	margin:3px;
	border:1px solid #aaa;
	background-color:#eee;
	display:inline;
	list-style:none;
}

ul.nice_paging li.current{
	background-color:#369;
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
			
			<div id="content-table-inner">
		 
			<!--  start table-content  -->
			<div id="table-content">			
			<div class="left_content">
             
           <?php
           include('includes/leftpanel.php');
           ?>
			</div>
    
  
    <div class="right_content" style="width:900px;">  <!-- Start of right content-->    
    

       <h3>
         <?php
         $mess = $_GET['mess'];
         if($mess=="delsuccess") {
         	echo'The leave has been deleted successfully.';
         }
         if($mess=="approve") {
         	echo'The leave has been approved.';
         }
         if($mess=="reject") {
         	echo'The leave has been rejected. ';
         }
         ?>
         </h3>
         
          
           <?php
	  if($type=="2"){	  
	  ?>

         <h2>My Leaves</h2>
       <form method="post" action="process.php" name="leavereport" id="leavereport">
	   
	 
        <table class="table table-sm table-bordered" style="width:100%;" >


<?php

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$paging=new nicePaging($connection);
$rowsPerPage=10; 


	$result = $paging->pagerQuery("SELECT * FROM  `leave` where leave.empid = ".$_SESSION['empid']." AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') > date_format(now(),'%Y-01-01') AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') < date_format(now(),'%Y-12-31') order by STR_TO_DATE( appdate, '%m/%d/%Y' ) DESC ", $rowsPerPage);
	
$num_rows = mysql_num_rows($result);




echo'<tr>


<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestors Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">No. of Days</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Reason</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Status</td>
<td>&nbsp;</td>
</tr>';
	
while($row = mysql_fetch_array($result))
{ 

?>
<tr>

<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
<td><?php echo $row['fromdate']; ?></td>
<td><?php echo $row['todate']; ?></td>
<td><?php echo $row['daycount']; ?></td>
<td><?php

if($row['leavetype'] == "Short Leave")
{
 echo $row['fromtime'];
}
?>
 </td>
<td><?php 
if($row['leavetype'] == "Short Leave")
{

echo $row['totime']; 
}

?></td>
<td>
<?php 
if($row['leavetype'] == "Half Day Leave")
{
echo $row['halfdaydetail']; 
}
?>
</td>
<td><?php echo stripslashes($row['reason']); ?></td>

<td><?php if($row['status'] == 0)
{
echo'<img src="images/pending.png"/>';	
	}
	else if($row['status'] == 1)
	{
		echo'<img src="images/approved.png"/>';
		}
		else if($row['status'] == 2)
	{
		echo'<img src="images/denied.png"/>';
	}
		
 ?></td>
<td><?php if($row['status'] == 0)
{
echo'<a href="editleave.php?lid='.urlencode("'".$row['lid']."'").'">Edit</a>';	
	}?></td>

</tr>        
<?php

}

echo '<tr>
<td style="background-color:#cccccc; font-weight:bold; padding:5px;"></td>
<td style="background-color:#cccccc; font-weight:bold; padding:5px;"></td>
<td style="background-color:#cccccc; font-weight:bold; padding:5px;"></td>

<td colspan="10" style="background-color:#cccccc; font-weight:bold; padding:5px;">';

$gettot = mysql_query("SELECT SUM(daycount) FROM  `leave`  where  status = '1' and leave.empid = ".$_SESSION['empid']." order by STR_TO_DATE( appdate, '%m/%d/%Y' ) DESC ", $connection) or die(mysql_error());
$restot = mysql_fetch_object($gettot);

foreach ($restot as $total) {
 echo "Total Days: ".$total;
}
echo'</td></tr>';

echo '<tr><td colspan = "12">';
echo $paging->createPaging($link);
echo '</td></tr>';

mysql_close($link_identifier = $connection);
?>
        </table> 
        </form>
  <?php } ?> 
        
        
        
        
      <?php
	  if($type=="3"){	  
	  ?>
	    <h2>My Leaves</h2>
		
		
	 
	 <table class="table table-sm table-bordered" style="width:100%;" >


<?php

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);




$paging=new nicePaging($connection);
$rowsPerPage=10; 

$result=$paging->pagerQuery("SELECT * FROM  `leave`  where leave.empid = ".$_SESSION['empid']."  AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') > date_format(now(),'%Y-01-01') AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') < date_format(now(),'%Y-12-31') order by STR_TO_DATE( appdate, '%m/%d/%Y' ) DESC", $rowsPerPage);





echo'   <tr>


<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestors Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">No. of Days</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>

<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>
<td class="rowhead">Status</td>
<td>&nbsp;</td>
</tr>';

while($row = mysql_fetch_array($result))
{ 

?>

<tr>

<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
<td><?php echo $row['fromdate']; ?></td>
<td><?php echo $row['todate']; ?></td>
<td><?php echo $row['daycount']; ?></td>
<td><?php

if($row['leavetype'] == "Short Leave")
{
 echo $row['fromtime'];
}
?>
 </td>
<td><?php 
if($row['leavetype'] == "Short Leave")
{

echo $row['totime']; 
}

?></td>
<td>
<?php 
if($row['leavetype'] == "Half Day Leave")
{
echo $row['halfdaydetail']; 
}
?>
</td>
<td><?php echo stripslashes($row['reason']); ?></td>

<td><?php if($row['status'] == 0)
{
echo'<img src="images/pending.png"/>';	
	}
	else if($row['status'] == 1)
	{
		echo'<img src="images/approved.png"/>';
		}
		else if($row['status'] == 2)
	{
		echo'<img src="images/denied.png"/>';
	}
		
 ?></td>

<td><?php if($row['status'] == 0)
{
echo'<a href="editleave.php?lid='.urlencode("'".$row['lid']."'").'">Edit</a>';	
	}?></td>
</tr>  


      
<?php

}


echo '<tr>
<td style="background-color:#cccccc; font-weight:bold; padding:5px;"></td>
<td style="background-color:#cccccc; font-weight:bold; padding:5px;"></td>
<td style="background-color:#cccccc; font-weight:bold; padding:5px;"></td>

<td colspan="12" style="background-color:#cccccc; font-weight:bold; padding:5px;">';

$gettot = mysql_query("SELECT SUM(daycount) FROM  `leave`  where  status = '1' and  leave.empid = ".$_SESSION['empid']." order by STR_TO_DATE( appdate, '%m/%d/%Y' ) DESC", $connection) or die(mysql_error());
$restot = mysql_fetch_object($gettot);

foreach ($restot as $total) {
 echo "Total Days: ".$total;
}
echo'</td></tr>';
echo '<tr><td colspan = "12">';
echo $paging->createPaging($link);
echo '</td></tr>';
mysql_close($link_identifier = $connection);
?>

        </table> 
		
		
		
	 <p>&nbsp;</p>
	       
	       <h2>Your Team's Leaves</h2>
	          
		 
			  
	     <table class="table table-sm table-bordered" style="width:100%;" >

<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$paging=new nicePaging($connection);
$rowsPerPage=10; 

$result = $paging->pagerQuery("SELECT *,leave.status as lstatus FROM  `leave`, `employee` where leave.supemail = employee.email and employee.empid = ".$_SESSION['empid']."  order by STR_TO_DATE( appdate, '%m/%d/%Y' ) DESC", $rowsPerPage);

$num_rows = mysql_num_rows($result);

echo'<tr>


<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestors Name</td>
<td class="rowhead">Applied On</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>

<td colspan="2">Status</td>
</tr>
';



while($row = mysql_fetch_array($result))
{ 

?>
<tr>

<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
<td><?php echo $row['appdate']; ?></td>
<td><?php echo $row['fromdate']; ?></td>
<td><?php echo $row['todate']; ?></td>
<td><?php

if($row['leavetype'] == "Short Leave")
{
 echo $row['fromtime'];
}
?>
 </td>
<td><?php 
if($row['leavetype'] == "Short Leave")
{

echo $row['totime']; 
}

?></td>
<td>
<?php 
if($row['leavetype'] == "Half Day Leave")
{
echo $row['halfdaydetail']; 
}
?>
</td>
<td><?php echo stripslashes($row['reason']); ?></td>

<td><?php


 if($row['lstatus'] == 0)
{
echo'<img src="images/pending.png"/>';	
	}
	else if($row['lstatus'] == 1)
	{
		echo'<img src="images/approved.png"/>';
		}
		else if($row['lstatus'] == 2)
	{
		echo'<img src="images/denied.png"/>';
	}
		
 ?></td>

<td><a href="decide.php?sessid=<?php echo $_SESSION['sessid']?>&lid=<?php echo $row['lid']; ?>">Approve/Reject</a></td>
</tr>        
<?php

}
echo '<tr><td colspan = "12">';
echo $paging->createPaging($link);
echo '</td></tr>';
mysql_close($link_identifier = $connection);


?>



        </table>
		
   
	 
   		
      	
      	 
      	   <?php
	  if($type=="1"){	  
	  ?>
      	 
      	  <h2>View Leaves</h2>

<form method="post" action="">
<select name="status" onChange="this.form.submit()">
<option value="">Select Status</option>
<option value="0">Applied</option>
<option value="1">Approved</option>
<option value="2">Rejected</option>
</select>
</form>


<form method="post" action="process.php" name="leavereport" id="leavereport">


	     <table class="table table-sm table-bordered" style="width:100%;" >


<?php

$status = $_POST['status'];

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
if($status == ""){


$paging=new nicePaging($connection);
$rowsPerPage=10; 
$result = $paging->pagerQuery("SELECT * FROM  `leave` where status = '0' order by appdate DESC", $connection);	

$num_rows = mysql_num_rows($result);



echo'<tr>
<td class="rowhead"></td>

<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestors Name</td>
<td class="rowhead">Applied On</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">No. of Days</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>

<td class="rowhead">Status</td>
</tr>';
} 
else {
$result = mysql_query("SELECT * FROM  `leave` where status = $status", $connection) or die(mysql_error());

$num_rows = mysql_num_rows($result);

echo '<tr><td colspan="10">';

echo'</td></tr>';	

echo'<tr>
<td class="rowhead"></td>

<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestors Name</td>
<td class="rowhead">Applied On</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">No. of Days</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>

<td class="rowhead">Status</td>
</tr>';

}	
while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td></td>
<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
<td><?php echo $row['appdate']; ?></td>
<td><?php echo $row['fromdate']; ?></td>
<td><?php echo $row['todate']; ?></td>
<td><?php echo $row['daycount']; ?></td>
<td><?php

if($row['leavetype'] == "Short Leave")
{
 echo $row['fromtime'];
}
?>
 </td>
<td><?php 
if($row['leavetype'] == "Short Leave")
{

echo $row['totime']; 
}

?></td>
<td>
<?php 
if($row['leavetype'] == "Half Day Leave")
{
echo $row['halfdaydetail']; 
}
?>
</td>
<td><?php echo $row['reason']; ?></td>

<td><?php if($row['status'] == 0)
{
echo'<img src="images/pending.png"/>';	
	}
	else if($row['status'] == 1)
	{
		echo'<img src="images/approved.png"/>';
		}
		else if($row['status'] == 2)
	{
		echo'<img src="images/denied.png"/>';
	}
		
 ?></td>
<td><a href="decide.php?sessid=<?php echo $_SESSION['sessid']?>&lid=<?php echo $row['lid']; ?>">Approve/Reject</a></td>

</tr>      

<?php
 }
 echo '<tr><td colspan = "12">';
echo $paging->createPaging($link);
echo '</td></tr>';
}
?>
        </table>
		
	
       
        </form>
  <?php } ?>   
        
     
      <?php
	  if($type=="4"){	  
	  ?>
      	 
	  <h2>My Leaves</h2>
	  
	   <table class="table table-sm table-bordered" style="width:100%;" >


<?php

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `leave` where leave.empid = ".$_SESSION['empid']." AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') > date_format(now(),'%Y-01-01') AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') < date_format(now(),'%Y-12-31') order by STR_TO_DATE( appdate, '%m/%d/%Y' ) DESC", $connection) or die(mysql_error());
	
	$num_rows = mysql_num_rows($result);

echo '<tr><td colspan="10">';

echo'</td></tr>';	

	
	echo'<tr>


<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestors Name</td>
<td class="rowhead">Applied On</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">No. of Days</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>

<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>
<td class="rowhead">Status</td>
<td>&nbsp;</td>
</tr>';
	
while($row = mysql_fetch_array($result))
{ 

?>
<tr>

<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
<td><?php echo $row['appdate']; ?></td>
<td><?php echo $row['fromdate']; ?></td>
<td><?php echo $row['todate']; ?></td>
<td><?php echo $row['daycount']; ?></td>
<td><?php

if($row['leavetype'] == "Short Leave")
{
 echo $row['fromtime'];
}
?>
 </td>
<td><?php 
if($row['leavetype'] == "Short Leave")
{

echo $row['totime']; 
}

?></td>
<td>
<?php 
if($row['leavetype'] == "Half Day Leave")
{
echo $row['halfdaydetail']; 
}
?>
</td>
<td><?php echo stripslashes($row['reason']); ?></td>

<td><?php if($row['status'] == 0)
{
echo'<img src="images/pending.png"/>';	
	}
	else if($row['status'] == 1)
	{
		echo'<img src="images/approved.png"/>';
		}
		else if($row['status'] == 2)
	{
		echo'<img src="images/denied.png"/>';
	}
		
 ?></td>

<td><?php if($row['status'] == 0)
{
echo'<a href="editleave.php?lid='.urlencode("'".$row['lid']."'").'">Edit</a>';	
	}?></td>
</tr>        
<?php

}
mysql_close($link_identifier = $connection);
?>
        </table> 	 
		 
<?php
function select_structure($val_array, $select_name) {
    $str = "<select name=\"" . $select_name . "\">";
    foreach ($val_array as $value){    
        if ( isset( $_POST[$select_name] ) && $value == $_POST[$select_name]) {
            $str .= "<option value=\"$value\" selected=\"selected\">$value</option>\n";
        } else {
            $str .= "<option value=\"$value\">$value</option>\n";
        }
    }
    $str .= "</select>";
    return $str;
}

?>		 
		 
      	  <h2>View Leaves</h2>
      	  
<form method="post" action="viewleave.php?sessid=<?php echo $_SESSION['sessid']; ?>">



<select name="status" onChange="this.form.submit()">
<option value="">Select Status</option>
<option <?php if ($_POST['status'] == '0') print 'selected '; ?> value="0">Applied</option>
<option <?php if ($_POST['status'] == '1') print 'selected '; ?> value="1">Approved</option>
<option <?php if ($_POST['status'] == '2') print 'selected '; ?> value="2">Rejected</option>
</select>
</form>      	  
      	
<form method="POST" action="decide.php?sessid=<?php echo $_SESSION['sessid']?>" >
 <table class="table table-sm table-bordered" style="width:100%;" >
<tr>
<td class="rowhead"></td>

<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestor's Name</td>
<td class="rowhead">Applied On</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">No. of Days</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>

<td class="rowhead">Status</td>
</tr>

<?php
$status = $_POST['status'];	
$newstatus = $_GET['status'];
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
if($status == ""){
$paging=new nicePaging($connection);
$rowsPerPage=10; 
$result = $paging->pagerQuery("SELECT * FROM  `leave` where status = '0' ORDER BY leave.lid DESC", $rowsPerPage);
} 
else
{
$paging=new nicePaging($connection);
$rowsPerPage=10; 
$result = $paging->pagerQuery("SELECT * FROM  `leave` where status = '$status' ORDER BY leave.lid DESC", $rowsPerPage);
	
}

if($newstatus != ""){
$paging=new nicePaging($connection);
$rowsPerPage=10; 
$result = $paging->pagerQuery("SELECT * FROM  `leave` where status = '$newstatus'   ORDER BY leave.lid DESC", $rowsPerPage);
}	

while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td></td>
<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
<td><?php echo $row['appdate']; ?></td>
<td><?php echo $row['fromdate']; ?></td>
<td><?php echo $row['todate']; ?></td>
<td><?php echo $row['daycount']; ?></td>
<td><?php

if($row['leavetype'] == "Short Leave")
{
 echo $row['fromtime'];
}
?>
 </td>
<td><?php 
if($row['leavetype'] == "Short Leave")
{

echo $row['totime']; 
}

?></td>
<td>
<?php 
if($row['leavetype'] == "Half Day Leave")
{
echo $row['halfdaydetail']; 
}
?>
</td>
<td><?php echo stripslashes($row['reason']); ?></td>

<td><?php if($row['status'] == 0)
{
echo'<img src="images/pending.png"/>';	
	}
	else if($row['status'] == 1)
	{
		echo'<img src="images/approved.png"/>';
		}
		else if($row['status'] == 2)
	{
		echo'<img src="images/denied.png"/>';
	}
		
 ?></td>
<td><a href="decide.php?sessid=<?php echo $_SESSION['sessid']?>&lid=<?php echo $row['lid']; ?>">Approve/Reject</a></td>
</tr>    




   
<?php

}

if($newstatus != '')
{
	
	$link= $_SERVER['REQUEST_URI'].'?sessid='.$_SESSION['sessid'].'&status='.$newstatus; // Page name

}
else
{
	$link= $_SERVER['REQUEST_URI'].'?sessid='.$_SESSION['sessid'].'&status='.$_POST['status']; // Page name

}

$paging->setSeparator("&"); //Separator between page name and query string for page number
// Create links for paging

echo '<tr><td colspan = "12">';
echo $paging->createPaging($link);
echo '</td></tr>';
 

mysql_close($link_identifier = $connection);
?>
       
           </form>
           
           </table>
        
        
        <?php } ?>  
       </td>
       
        
        
        		
		<td id="tbl-border-right"></td>
	
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom"></td>
		<th class="sized bottomright"></th>
	</tr>

	
</table>     
<div class="clear">&nbsp;</div>



</div>  
		
        </div>	
</div>
</div>
</div>    
        

			<!--  end table-content  -->

		 
		
		<!--  end content-table-inner ............................................END  -->

	


<!-- End: login-holder -->

 
 