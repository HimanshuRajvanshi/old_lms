<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include_once('functions.php');
$empid = $_SESSION['empid'];
$type = $_SESSION['type'];
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
  
label{ display: block;} 
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
        <table style="width:100%; border:1px solid #ccc">
<tr>
<td class="rowhead"><input type="checkbox" onchange="checkedAll(leavereport);" id="toggle" /></td>

<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestor's Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Reason</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Status</td>
<td>&nbsp;</td>
</tr>

<?php

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `leave` where leave.empid = ".$empid."", $connection) or die(mysql_error());
while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td><input type="checkbox" name="leave[]" value="<?php echo $row['lid']; ?>" /></td>
<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
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
        
  <?php } ?> 
        
        
        
        
      <?php
	  if($type=="3"){	  
	  ?>
	    <h2>My Leaves</h2>
	  
	  <table style="width:100%; border:1px solid #ccc">
<tr>


<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestor's Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>

<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>
<td class="rowhead">Status</td>
<td>&nbsp;</td>
</tr>

<?php

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `leave` where leave.empid = ".$empid."", $connection) or die(mysql_error());
while($row = mysql_fetch_array($result))
{ 

?>
<tr>

<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
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
	 <p>&nbsp;</p>
	       
	       <h2>Your Team's Leaves</h2>
	          <form method="post" action="process.php" name="leavereport" id="leavereport">
	    <table style="width:100%; border:1px solid #ccc">
<tr>
<td class="rowhead"><input type="checkbox" onchange="checkedAll(leavereport);" id="toggle" /></td>

<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestor's Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>

<td class="rowhead">Status</td>
</tr>

<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$result = mysql_query("SELECT *,leave.status as lstatus FROM  `leave`, `employee` where leave.supemail = employee.email and employee.empid = ".$empid."", $connection) or die(mysql_error());
while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td><input type="checkbox" name="leave[]" value="<?php echo $row['lid']; ?>" /></td>
<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
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
<td><?php echo $row['reason']; ?></td>

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


</tr>        
<?php

}
mysql_close($link_identifier = $connection);
?>
        </table>
         <?php
	  if($type=="3"){	  
	  ?>
	   <div class="buttons" style="padding-left:145px;">
	  <button type="submit" class="positive" name="approve" id="save"><img src="images/apply2.png" alt=""/>Approve</button>
      	 <button type="submit" class="positive" name="reject" id="save"><img src="images/denied.png" alt=""/>Reject</button>
   		 </div>
      	 <?php } ?>
	 </form>
   		
      	 <?php } ?>
      	 
      	   <?php
	  if($type=="1"){	  
	  ?>
      	 
      	  <h2>View Leaves</h2>
<form method="post" action="process.php" name="leavereport" id="leavereport">
	    <table style="width:100%; border:1px solid #ccc">
<tr>
<td class="rowhead"><input type="checkbox" onchange="checkedAll(leavereport);" id="toggle" /></td>

<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestor's Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>

<td class="rowhead">Status</td>
</tr>

<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `leave`", $connection) or die(mysql_error());
while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td><input type="checkbox" name="leave[]" value="<?php echo $row['lid']; ?>" /></td>
<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
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


</tr>        
<?php

}
mysql_close($link_identifier = $connection);
?>
        </table>
         <?php
	  if($type=="1"){ 
	  ?>  <div class="buttons" style="padding-left:145px;">
   		 <button type="submit" class="positive" name="delleave" id="save"><img src="images/trash.png" alt=""/>Delete</button>
      	 <button type="submit" class="positive" name="approve" id="save"><img src="images/apply2.png" alt=""/>Approve</button>
      	 <button type="submit" class="positive" name="reject" id="save"><img src="images/denied.png" alt=""/>Reject</button>
      	 </div>
     <?php 
     }
     ?>
        </form>
        <?php } ?>
     
      <?php
	  if($type=="4"){	  
	  ?>
      	 
      	  <h2>View Leaves</h2>
<form method="post" action="process.php" name="leavereport" id="leavereport">
	    <table style="width:100%; border:1px solid #ccc">
<tr>
<td class="rowhead"><input type="checkbox" onchange="checkedAll(leavereport);" id="toggle" /></td>

<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestor's Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">From Time</td>
<td class="rowhead">To Time</td>
<td class="rowhead">Half Day Detail</td>
<td class="rowhead">Reason</td>

<td class="rowhead">Status</td>
</tr>

<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `leave`", $connection) or die(mysql_error());
while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td><input type="checkbox" name="leave[]" value="<?php echo $row['lid']; ?>" /></td>
<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
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


</tr>        
<?php

}
mysql_close($link_identifier = $connection);
?>
        </table>
         <?php
	  if($type=="4"){ 
	  ?>  <div class="buttons" style="padding-left:145px;">
   		 <button type="submit" class="positive" name="delleave" id="save"><img src="images/trash.png" alt=""/>Delete</button>
      	 <button type="submit" class="positive" name="approve" id="save"><img src="images/apply2.png" alt=""/>Approve</button>
      	 <button type="submit" class="positive" name="reject" id="save"><img src="images/denied.png" alt=""/>Reject</button>
      	 </div>
     <?php 
     }
     ?>
        </form>
        <?php } ?>  
     
	 
	
     <?php
	  if($type=="2"){	  
	  ?>
   		
    <?php } ?>
    

		
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
		<td id="tbl-border-bottom"></td>
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
