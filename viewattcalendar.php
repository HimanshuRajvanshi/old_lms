<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include"functions.php";
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
$connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);

mysql_select_db(DATABASE,$connection);

$result = mysql_query("select fname, lname,(SELECT intime  FROM `attendance` where attendance.empid=employee.empid and attid in(SELECT min(attid) FROM `attendance` where  date(intime)=CURDATE() group by attendance.empid) ) As start,
(SELECT outtime  as end FROM `attendance` where attendance.empid=employee.empid and attid in(SELECT min(attid) FROM `attendance` where date(outtime)=CURDATE() group by attendance.empid) ) As end
FROM `employee` group by employee.empid", $connection) or die(mysql_error());

echo'<script type="text/javascript" >

$(document).ready(function(){

$("#calendar").fullCalendar({

   	header: {

				left: "prev,next, today",

				center: "title",

				right: "basicDay"

			},
			defaultView: "basicDay",
			events: [
			
			';

while($getrow = mysql_fetch_array($result)) {

	if($getrow['end'] != NULL) {
	
	echo'{
	
	title : "'.$getrow['fname'].' '.$getrow['lname'].' (Intime: '. date("H:i:s", strtotime($getrow['start'])) .') (Outtime: '. date("H:i:s", strtotime($getrow['end'])).')",
	start : "'.$getrow['start'].'",
	end : "'.$getrow['end'].'"
},';
}
else {
	
	echo'{
	
	title : "'.$getrow['fname'].' '.$getrow['lname'].' (Intime: '. date("H:i:s", strtotime($getrow['start'])) .') (Outtime: )",
	start : "'.$getrow['start'].'",
	end : "'.$getrow['end'].'"
},';
	
}
}
?>

<?php		
			

echo'
]

});

});
</script>';
?>

    
 

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
    

     <h2>Attendance Calendar.</h2>
     

     
         
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


</body>
</html>