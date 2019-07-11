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
    
  
    <div class="right_content">  <!-- Start of right content-->    
    

     
       
         
          <div class="form">
  <label class="error-message"></label>
  <?php
  
  	
  	 $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
	 mysql_select_db(DATABASE,$connection);
	 
   $q1 = "Select * from balance, employee where balance.empid = employee.empid";
   $getemp = mysql_query($q1)or die(mysql_error());
   
  ?>
  
         <h2>View/Edit Entitlement</h2>
         <table style="width:100%; border:1px solid #ccc">
<tr>
<td class="rowhead">Employee Name</td>
<td class="rowhead">Status</td>

<td class="rowhead">Casual Leaves</td>
<td class="rowhead">Earned Leaves</td>
<td class="rowhead">Total Leaves </td>
</tr>
<?php 
 while($row=mysql_fetch_array($getemp)) {
?> 
<tr> 
<td ><?php echo $row['fname'].' '.$row['lname']  ?></td>
<td>
<?php 
if($row['status'] == "prob")
echo"Probation";
else 
echo"Confirmed";  
?></td> 
<form action="updateentitle.php" method="post">
<td class="cl"><input name="cl" id="cl_<?php echo $row['balid']; ?>" class="cl_<?php echo $row['balid']; ?>"  type="text" value="<?php echo $row['cl'];  ?>"  style="width:50px" /></td>
<td class="el"> <input name="el" id="el_<?php echo $row['balid']; ?>" type="text" class="el_<?php echo $row['balid']; ?>" value="<?php echo $row['el'];  ?>" style="width:50px" /></td>
<td class="total_<?php echo $row['balid']; ?>"><?php echo $row['total'];  ?> <input id="empid_<?php echo $row['balid']; ?>" name="empid" type="hidden" value="<?php echo $row['empid']; ?>" ></td>
<td ><button id="up_<?php echo $row['balid']; ?>" class="updateent" style="background:transparent; border:0px" type="submit" > <img src="images/approved.png"></button></td>

</tr>
<script type="text/javascript" >
$(document).ready(function(){


	
$("#up_<?php echo $row['balid']; ?>").click(function()
{
event.preventDefault();
var cl = $("#cl_<?php echo $row['balid']; ?>").val();
var el = $("#el_<?php echo $row['balid']; ?>").val();
var empid = $("#empid_<?php echo $row['balid']; ?>").val(); 

	$.post("updateentitle.php",{cl:cl, el:el, empid:empid},function(result){
  $(".total_<?php echo $row['balid']; ?>").html(result).effect("pulsate", { times:4 }, 1500);
   
  });
	
});


	
	
})

	



</script>
 </form>
<?php
      }
      ?>  
</table>      
      
         <div class="clear" style="padding-top:5px;"></div>
        
      
          
       </div> 
        
         
          
      
     
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