<?php ob_start();?>
<?php
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
label{ display: block;}
</style>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="js/lib/jquery.validate.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
 
    
    <script type="text/javascript">

$(document).ready(function() {

$("#employee").change(function(){
	
	var empid = $("#employee").attr("value");
	  $.post( 
             "getempstatus.php",
             { empid: empid },
             function(data) {
             	
                 if(data == "conf")
                 {
                   $("#leavesection").html("<label>Total Leaves</label><input type='text' name='total' style='width:50px'><label>Casual Leaves</label><input style='width:50px' type='text' name='cl'><label>Earned Leaves</label><input style='width:50px' type='text' name='el'>");             	
                 	}
                 	else if(data == "prob")
                 	{
                   $("#leavesection").html("<label>Casual Leaves</label><input type='text' style='width:50px' name='cl'>")  
                 	}
             });
	});
	
});
</script>
</head>
<body>
<?php 
include('includes/header.php');
?>
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
    
  
    <div class="right_content">  <!-- Start of right content-->    
    

     
       
         
<div class="form">
<?php
 function message()
{
$mess = $_GET['mess'];
switch($mess)
{
case  'success': echo'<h3>The Leave balance was updated successfully</h3>';
}
}

?>
<h2>Leave Entitlement</h2>
        
<form action="" method="post" id="entitle" class="niceform cmxform">      
<table class="table table-sm" style="width:100%; border:1px solid #ccc">
<tr>
<td class="rowhead">First Name</td>
<td class="rowhead">Last Name</td>
<td class="rowhead">Entitled Leaves</td>
<td class="rowhead">Availed Leaves</td>
<td class="rowhead">Balance Leaves</td>
</tr>
      
<?php
        $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
		  mysql_select_db(DATABASE,$connection);
		   $empq = "INSERT IGNORE INTO balance (empid) Select empid from employee";
		   $resultemp = mysql_query($empq)or die(mysql_error());
		   
		   
		  $sql = "Select * from employee, balance where balance.empid = employee.empid and userstatus = 'active' order by fname";		  
		  $res = mysql_query($sql)or die(mysql_error());
		  $count=mysql_num_rows($res);
		  while($row=mysql_fetch_array($res)) {
			
		//calculate balance
		$row['balance'] = $row['total']-$row['availed'];	  
			echo'
			
			<tr>
<td >'.$row['fname'].'</td>
<td >'.$row['lname'].'</td>




<td ><input type="number"  max="100" step="any" style="width:50px" value="'.$row['total'].'" name="total[]"/></td>
<td >
<input type="number"  max="100" step="any" style="width:50px" value="'.$row['availed'].'" name="availed[]"/>
</td>



<td ><input type="number"  max="100" step="any" style="width:50px" value="'.$row['balance'].'" name="balance[]"/></td>
<td><input type="hidden" name="balid[]" value="'.$row['balid'].'" /></td>
</tr>';  
		  	
		  } 
?> 
          <tr><td colspan="5"></td></tr>
      </table>   
      
     
  
     <div class="buttons" style="text-align:center;">
   		 <button type="submit" class="btn btn-sm positive" name="addent" id="addleave"><img src="images/apply2.png" alt=""/>Save</button>
      
		 </div>
<?php
  if(isset($_POST['addent']))
  {
	 $balid = $_POST['balid'];
	 $total = $_POST['total'];
	 $availed = $_POST['availed']; 
	
	for($i = 0; $i<$count; $i++)
	{
	$balance[$i] = $total[$i]-$availed[$i];
	 	  
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
	mysql_select_db(DATABASE,$connection);
		
		$q = "UPDATE `balance` SET `total` ='$total[$i]', `balance`='$balance[$i]', `availed`='$availed[$i]' where `balid` = '$balid[$i]' ";
		$balres = mysql_query($q) or die(mysql_error());
		if($balres)	
		{
			//var_dump($balres);
			//header('location:'.$_SERVER['PHP_SELF'].'?sessid='.$_SESSION['sessid'].'&mess=success');
			
       
		}
	}
	
	echo'<h3>The Leave balance was updated successfully</h3> ';
}
?>        
</form>	 
        <div id="leavesection"></div>
        
        <div class="clear" style="padding-top:5px;"></div>
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

<script type="text/javascript" >

</script>
</body>
</html>
<?php ob_end_flush();?>