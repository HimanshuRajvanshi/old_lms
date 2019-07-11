<?php
//session_start();
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
date_default_timezone_set('Asia/Kolkata');
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


<script type="text/javascript" >
function validateForm()
{
var emptype = document.getElementById("empid").value;
var monthtype = document.getElementById("gMonth").value;
var yeartype = document.getElementById("gYear").value;
  
 if(monthtype == "")
  {
  alert("Please select Month");
  return false;	
   }
   if(yeartype == "")
  {
  alert("Please select Year");
  return false;	
   }
  else   
return true;
}
</script>

<script>

        $(function() {
        $( "#startdate" ).datepicker({        	
            showOn: "button",			
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true,
			 onSelect: function(selected) { 
        
        }
        });
		
		   $( "#enddate" ).datepicker({
		   	 
            showOn: "button",			
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true,
            onSelect: function(){           	       	
            	  
                }      
        });       
              
    });
    </script>
   

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/cupertino/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <style type="text/css">
label{ display: block;}

.table tr.even {
    background-color: #E4E6F2;
    border-top: 1px solid #C0C0C0;
    color: #000000;
}
.table tr.odd {
    background: none repeat scroll 0 0 #FFFFFF;
    border-top: 1px solid #C0C0C0;
    color: #000E4D;
}
.table tr.over {
    background-color: #FFFEEB;
    border-bottom: 1px solid #C0C0C0;
    border-top: 1px solid #C0C0C0;
    color: #000000;
    cursor: pointer;
}
select {
	text-transform: none;
	padding: .25rem .5rem;
	line-height: .2rem;
	border: 1px solid #e6e6e6;
	color: #444;
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
    
	

  
    <div class="right_content" style="width:900px;">  <!-- Start of right content-->             
         
  
         <h2>View Attendance for <?php echo date('d-m-Y',strtotime('today'))  ?> |  
		 
		 <form style="display:inline" id="month_rep" action="" method="post" onSubmit="return validateForm()">
       
       
      <?php
     $sql = "Select * from employee where `userstatus` = 'active' order by fname asc ";
     $res = mysql_query($sql) or die(mysql_error());
	 ?>
	 <select id="empid" name="empid"><option value="" selected="selected">Select Employee</option>
	 <?php
     while($row = mysql_fetch_array($res)){
     	echo"<option value=".$row['empid'].">".$row['fname']." ".$row['lname']."</option>";
     	} 
     ?>       
       </select>
	   <select id='gMonth' name="sel_month">
		<option value=''>--Select Month--</option>
		<option value='1'>Janaury</option>
		<option value='2'>February</option>
		<option value='3'>March</option>
		<option value='4'>April</option>
		<option value='5'>May</option>
		<option value='6'>June</option>
		<option value='7'>July</option>
		<option value='8'>August</option>
		<option value='9'>September</option>
		<option value='10'>October</option>
		<option value='11'>November</option>
		<option value='12'>December</option>
		</select> 	   
	   
	   <select id='gYear' name="sel_year">
		<option value=''>--Select Year--</option>
		<?php 
		$i = date("Y")-1;
		for($i = date("Y")-1; $i <= date("Y"); $i++){?>
				<option value='<?php echo $i ?>'><?php echo $i ?></option>
		<?php	
		}
		?>
		</select> 	   
	   <button type="submit" value="Submit" id="submit" class="btn btn-outline-primary btn-sm"  name="submit">View</button>       
	   
	   <!-- <table class="" style="font-size:12px;height:35px;width: 100%;background: #e4e4e4;">
	   <tr id=""><td width="75" style="padding-left:12px;">Start Date</td>
	   <td width="120"><input type="text" name="startdate" style="width:100px; display:inline" id="startdate"   /></td>
	   <td style="width:50px;"></td>
	    <td width="55">End Date</td>
        <td colspan="0"><input type="text" name="enddate" style="width:100px; display:inline" id="enddate" onChange=""  /></td>
		</tr>         
	   </table>	   
       </form>	   
	   <form style="display:inline" action="report.php?sessid=<?php echo $_SESSION['sessid']; ?>" method="post" onSubmit="return validateForm()">
	   -->
	   <button type="submit" id="export" name="export" class="btn btn-outline-primary btn-sm">Export</button>
	   </form>
	   </h2>

        <table style="width:100%; border:1px solid #ccc;font-size:12px;margin-top:5px;" class="table">
<tr>
<td class="rowhead">Name</td>
<td class="rowhead">Date</td>
<td class="rowhead">Time</td>
</tr>

<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT distinct id,concat(a.fname,' ',a.lname) as name,date_format(b.date_time,'%d-%M-%Y') as date,date_format(b.date_time,'%H:%i:%s') as time FROM employee a,attendance b WHERE a.empcode=b.emp_code and a.username='".$empid."' order by id desc limit 60");
while($row = mysql_fetch_array($result))
{ 

?>
<tr>
<td><?php echo $row['name']?></td>

	<td><?php echo $row['date']?></td>

	<td><?php echo $row['time']?></td>


</tr>        
<?php

}
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
<script>
$(document).ready(function(){
	$("#submit").click(function(){
		$("#month_rep").attr("action", "monthreport.php");
	});
	$("#export").click(function(){
		$("#month_rep").attr("action", "report.php");
	});

});
</script>

</html>