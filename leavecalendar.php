<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TrilaSoft</title>
<link rel="stylesheet" href="css/login-screen.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="css/form.css" type="text/css" media="screen" title="default" />

<link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />

<!--  jquery core -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/cupertino/jquery-ui.css" />
<script src="js/jquery-1.8.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://jzaefferer.github.com/jquery-validation/jquery.validate.js"></script>
<script type='text/javascript' src='js/fullcalendar.js'></script>

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


<?php

$type = $_SESSION['type'];
include_once('functions.php');
	
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `leave` where status = 1", $connection) or die(mysql_error());
	
	$row = mysql_fetch_array($result);
	
	$start = strtotime($row['fromdate']);
	$end = strtotime($row['todate']);
    

	
	
?>


 <script type="text/javascript">
        $(document).ready(function(){
       
	    $("input, textarea").addClass("idle");
            $("input, textarea").focus(function(){
                $(this).addClass("activeField").removeClass("idle");
	    }).blur(function(){
                $(this).removeClass("activeField").addClass("idle");
	    });
	    
		
		
		
})
    </script>
    
    
    <?php include("myfeed.php"); ?>

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
    

     <h2>Leave Calendar.</h2>
      

      <?php
      
      if($type == "1")
      {
       	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
			mysql_select_db(DATABASE,$connection);
			
			$q1 = "Select * from `employee` where userstatus = 'active'";
			$r1 = mysql_query($q1, $connection)or die(mysql_error());
			echo'<h4>Filter By Employee Name</h4> <div id="loading"><div style="margin-left:31px; margin-top:10px">Please wait loading...</div></div><select name="emp" id="emp">';
			echo'<option value="">Select Employee Name</option>';
			echo'<option value="all">All Employees</option>';
			while($row=mysql_fetch_array($r1))
			{
       
       	echo '<option value='.$row['empid'].'>'.$row['fname'].' '.$row['lname'].'</option>';
       }
       echo'</select><p>&nbsp;</p>';
       
    }
    
     if($type == "4")
      {
       	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
			mysql_select_db(DATABASE,$connection);
			
			$q1 = "Select * from `employee` where userstatus = 'active'";
			$r1 = mysql_query($q1, $connection)or die(mysql_error());
			echo'<h4>Filter By Employee Name</h4> <div id="loading"><div style="margin-left:31px; margin-top:10px">Please wait loading...</div></div><select name="emp" id="emp">';
			echo'<option value="">Select Employee Name</option>';
			echo'<option value="all">All Employees</option>';
			while($row=mysql_fetch_array($r1))
			{
       
       	echo '<option value='.$row['empid'].'>'.$row['fname'].' '.$row['lname'].'</option>';
       }
       echo'</select><p>&nbsp;</p>';
       
    }
    
	 if($type == "3")
      {
       	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
			mysql_select_db(DATABASE,$connection);
			$sql = "Select * from `employee` where employee.empid =".$_SESSION['empid']." and userstatus = 'active'";
			$res = mysql_query($sql, $connection)or die(mysql_error());
			$newrow = mysql_fetch_object($res);
			
			$email = $newrow->email;
			
			
			
			$q1 = "Select * from `employee` where supemail = '$email' and userstatus = 'active' ";
        $r1 = mysql_query($q1, $connection)or die(mysql_error());
			echo'<h4>Filter By Employee Name</h4> <div id="loading"><div style="margin-left:31px; margin-top:10px">Please wait loading...</div></div><select name="emp" id="emp">';
			echo'<option value="">Select Employee Name</option>';
			while($row=mysql_fetch_array($r1))
			{
       
       	echo '<option value='.$row['empid'].'>'.$row['fname'].' '.$row['lname'].'</option>';
		
       }
	   
	   echo'<option value="myteam">My Team</option>';
       echo'</select><p>&nbsp;</p>';
       
    }
       ?>
         
       
         <div id='calendar'></div>

         
          
      
     
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
 $(document).ready(function() {

 	
	  $( "#loading" ).hide();
 	 
      $("#emp").change(function(event){
      
      	var empid = $("#emp").val();
      	
      	
          $.post( 
             "myfeed.php",
             { empid: empid },
             function(data) {
             	
                 $('#calendar').html(data);
             }

          );
      });
      
      
      
   });
   
   $(document).ajaxStart(function() {
      $( "#loading" ).fadeIn("fast");
});
$(document).ajaxStop(function() {
      $( "#loading" ).fadeOut("fast");
});
   
   
</script>
</body>
</html>