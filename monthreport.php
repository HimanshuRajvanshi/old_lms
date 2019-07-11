<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
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
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>

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
    

    <div class="right_content">  <!-- Start of right content-->    
    <?php
    $empid = trim(mysql_escape_string($_POST['empid'])) ;
	$sel_month = $_POST['sel_month'] ;
	$sel_year = $_POST['sel_year'] ;
	
	//$getemp = mysql_query("Select * from employee where empid='$empid'")or die(mysql_error());
    //$emprow = mysql_fetch_object($getemp);
    ?>

        <table  style="width:100%; border:1px solid #ccc;padding:15px;height:35px;">
		<tr>
		<td>
		<h2>&nbsp;Monthly Attendance Report for <?php //echo $emprow->fname.' '.$emprow->lname; ?> </h2>
		</td>
		<td></td>
        <td style="font-size:14px;">
		<a href="attendance.php?sessid=<?php echo $_SESSION['sessid']; ?>">Back to Attendance</a>
		</td>
		</tr>
		</table>
        <table style="width:100%; border:1px solid #ccc" class="table">
<tr>
<td class="rowhead">Name</td><td class="rowhead">Date</td><td class="rowhead">Time</td><td class="rowhead">Date-Time</td>
</tr>
<?php

if($empid){ 
$emp_where = "and a.empid=".$empid;
}else{
	$emp_where = '';
}

	$sql = "SELECT distinct id,concat(a.fname,' ',a.lname) as name,date_format(b.date_time,'%d-%M-%Y') as date,date_format(b.date_time,'%H:%i:%s') as time , b.date_time FROM employee a,attendance b WHERE a.empcode=b.emp_code " .$emp_where. " AND MONTH(b.date_time) = '".$sel_month."' AND YEAR(b.date_time) = '".$sel_year."' order by id desc";
	
	$res = mysql_query($sql);
	$count = mysql_num_rows($res);
	while($row = mysql_fetch_array($res)){
		echo '<tr><td>'. $row['name'].'</td><td>'. $row['date'] .'</td><td>'.$row['time'].'</td><td>'.$row['date_time'].'</td></tr>'; 	
	}     
   
	if($count==0) {
		echo "<tr><td colspan='2'>No record found for this month.</td></tr>";
	}
//}
?>

</table>


         
  

</div>      
          
      
     
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