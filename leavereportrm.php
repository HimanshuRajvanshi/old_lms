<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
ini_set('session.gc_maxlifetime', 86400);
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
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
		
 
	
function nationalDays(date){   
    var natDays = [[1, 1, 'New Years Day'],[3, 27, 'Holi'],[8, 15, 'Independence Day'],
		   [8, 20, 'Raksha Bandhan'],
		   [10, 2, 'Mahatma Gandhis Birthday'],
		   [10, 14, 'Dussehra'],
		   [11, 4, 'Diwali-Govardhan Puja'],
		   [12, 25, 'Christmas Day']];	
    for (i = 0; i < natDays.length; i++) {
        if (date.getMonth() == natDays[i][0] - 1 &&
            date.getDate() == natDays[i][1] ) {
                return [false, natDays[i][2] + '_day'];
            }
    }
    return [true, ''];
}

function noWeekendsOrHolidays(date){
    var noWeekend = $.datepicker.noWeekends(date);
    if (noWeekend[0]) {
        return nationalDays(date);  
    }
    else {
        return noWeekend;
    }
}    
   
        $(function() {
        	
        
        	
      
      
        $( "#startdate" ).datepicker({
        	 beforeShowDay: noWeekendsOrHolidays, 
            showOn: "button",
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true
        });
		
		
		   $( "#enddate" ).datepicker({
		   	 beforeShowDay: noWeekendsOrHolidays, 
            showOn: "button",
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true,
            onSelect: function(){
            	       	
            		var startdate = new Date($("#startdate").val());
        	var enddate = new Date($("#enddate").val());      
        
                  	//var days  = calcBusinessDays(startdate, enddate);
			dateCount();
                  	//$("#totdate").html(days);
			//$("#daycount").val(days);
                }      
        });
        
        
      
 
      
    });
  </script>
<style>
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
    

    <div class="right_content" style="width:80%">  <!-- Start of right content-->    
    

     <h2>Leave Report</h2>
       

<div style="padding:10px">
<form method="post">
<select name="emp">
<?php

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$getuser = "Select email from employee where empid = '".$_SESSION['empid']."'";
$resuser = mysql_query($getuser) or die(mysql_error());
$user = mysql_fetch_object($resuser);

$sql = "SELECT * FROM  `employee` where userstatus = 'active' and supemail = '".$user->email."' order by fname ";
$res = mysql_query($sql)or die(mysql_error());
while($row = mysql_fetch_array($res))
{

echo '<option value='.$row['empid'].'>'.$row['fname'].' '.$row['lname'].'</option>';
}
?>
</select>

<input type="text" id="startdate" name="startdate"> <input type="text" id="enddate" name="enddate">

<input type="submit" value="Generate Report" name="submit">
</form>   
</div>
<div class="CSSTableGenerator" >
 <table style="width:100%; border:1px solid #ccc">
<tr>


<td class="rowhead">Leave Type</td>
<td class="rowhead">Requestor's Name</td>
<td class="rowhead">From Date</td>
<td class="rowhead">To Date</td>
<td class="rowhead">Reason</td>

</tr>
<?php
if(isset($_POST['submit']))
{
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$sql = "SELECT * FROM  `leave` WHERE empid = '".$_POST['emp']."' AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') BETWEEN str_to_date('".$_POST['startdate']."','%m/%d/%Y') AND str_to_date('".$_POST['enddate']."','%m/%d/%Y') ";
$res = mysql_query($sql)or die(mysql_error());
while($row = mysql_fetch_array($res))
{ 
?>
<tr>

<td><?php echo $row['leavetype']; ?></td>
<td><?php echo $row['reqname']; ?></td>
<td><?php echo $row['fromdate']; ?></td>
<td><?php echo $row['todate']; ?></td>
<td><?php echo stripslashes($row['reason']); ?></td>
</tr>      
<?php

}
}

?>
         
  
  
  

</div>      
          

     
     	</div><!-- end of right content-->
			
			</div>
			<!--  end table-content  -->
	
			<div class="clear"> </div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		
	</tr>
	
	</table>
	    </div>  
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