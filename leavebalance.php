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
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="js/lib/jquery.validate.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
 
    
   
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
	 
	 $sql = "Select * from balance, employee where balance.empid = '".$_SESSION['empid']."' and employee.empid = '".$_SESSION['empid']."' ";
    $res = mysql_query($sql)or die(mysql_error());
    $row = mysql_fetch_object($res);
   
  
  ?>
  
  
         <h2>Leave Balance for <?php echo $row->fname.' '.$row->lname ?></h2>
         
           <div class="CSSTableGenerator" >
     
     <table class="table" style="width:100%; border:1px solid #ccc;margin-top:5px;">
<tr>

<?php 
if(mysql_num_rows($res)>0)
{
if($row->status == "conf")
{
?>
<td class="rowhead">Leaves Total</td>


<td class="rowhead">Leaves Availed</td>
<td class="rowhead">Leaves Balance</td>
</tr>
<tr>     
     <td><?php echo $row->total; ?></td>
<td><?php echo $row->availed; ?></td>
<td><?php echo $row->balance; ?></td>
<?php
}
?>

<?php 
if($row->status == "prob")
{
?>


<td class="rowhead">Leaves Total</td>


<td class="rowhead">Leaves Availed</td>
<td class="rowhead">Leaves Balance</td>
</tr>
<tr>     
     <td><?php echo $row->total; ?></td>
<td><?php echo $row->availed; ?></td>
<td><?php echo $row->balance; ?></td>

</tr>
<tr>     
   



<?php
}
}
else {
?>
<td>Leaves have not been entitled yet.</td>
<?php
}
?>
</tr>
</table>
</div>



<?php
if($_SESSION['type'] == 3)
{
 $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
	 mysql_select_db(DATABASE,$connection);
	 
	 $getuseremail = "Select email from employee where employee.empid = ".$_SESSION['empid']."";
    $resuseremail = mysql_query($getuseremail)or die(mysql_error());
    $rowuseremail = mysql_fetch_object($resuseremail);
	
	$getteam = "Select * from  employee where employee.supemail = '".$rowuseremail->email."' ";
	$resteam = mysql_query($getteam) or die(mysql_error());
	
	
	
echo '<p>&nbsp;</p><h2>Leave Balance of My Team</h2>';
echo '  <div class="CSSTableGenerator" >';
echo '<table class="table" style="width:100%; border:1px solid #ccc;margin-top:5px;">';	
echo'<tr><td class="rowhead">Employee Name</td><td class="rowhead">Leaves Total</td>


<td class="rowhead">Leaves Availed</td>
<td class="rowhead">Leaves Balance</td></tr>';

	while($rowteam = mysql_fetch_array($resteam))
	{
	   $getbal = "Select * from balance where balance.empid = '".$rowteam['empid']."'";
	   $resbal = mysql_query($getbal)or die(mysql_error());
	    $rowbal = mysql_fetch_array($resbal); 
	
	   echo '<tr><td>'.$rowteam['fname'].' '.$rowteam['lname'].'</td><td>'.$rowbal['total'].'</td><td>'.$rowbal['availed'].'</td><td>'.$rowbal['balance'].'</td></tr>';
	}
	echo'</table>';
	echo '</div>';
	}
	?>

    
       
                <?php
    
?>          
      
     
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