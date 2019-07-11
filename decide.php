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
    

     <h2>Approve or Reject Leave.</h2>
    
<form action="process.php" method="post">  
   <?php
    $lid = $_GET['lid'];
    $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
    mysql_select_db(DATABASE,$connection);
    $sql = "Select balance.balance, employee.fname, employee.lname, leave.fromdate, leave.daycount, leave.todate, leave.leavetype, leave.reason, leave.status from `leave`,`employee`, `balance` where leave.lid = ".$lid." and leave.empid = employee.empid and balance.empid=employee.empid ";
    $res = mysql_query($sql)or die(mysql_error());
    $row = mysql_fetch_object($res);
	?> 
<?php 


echo '<strong>Available Leave Balance: ';
if($row->balance < 0) {
	echo '<span style="color:#ff3300; font-size:14px">'.$row->balance.'</span><br/>';
	}
	else
	{
		echo '<span style="color:#006600; font-size:14px">'.$row->balance.'</span><br/></strong> ';	
	}
echo '<strong>Name:</strong> '.$row->fname.' '.$row->lname.'<br/>';
echo '<strong>Start Date:</strong> '.$row->fromdate.'<br/>';
echo '<strong>End Date:</strong> '.$row->todate.'<br/>';
echo '<strong>Day Count:</strong> '.$row->daycount.'<br/>';
echo '<strong>Leave Type:</strong> '.$row->leavetype.'<br/>';
echo '<strong>Leave Type:</strong> '.$row->reason.'<br/><p>&nbsp;</p><hr><p>&nbsp;</p>';



?>	
      <div style="float:left; width:400px">
	  <textarea name="comments" cols="40" rows="4"></textarea>
       <input type="hidden" value="<?php echo $lid; ?>" name="lid" />
      <div class="buttons" style="padding-left:145px;">
   		
      	<?php 
	
	    if( $row->status == "1")
		{
				echo'<button type="submit" class="positive" name="reject" id="save"><img src="images/denied.png" alt=""/>Reject</button>';
		}
		else if($row->status == "2")
		{
        		echo'<button type="submit" class="positive" name="approve" id="save"><img src="images/apply2.png" alt=""/>Approve</button>';			
		}
		else
		{
		echo'<button type="submit" class="positive" name="approve" id="save"><img src="images/apply2.png" alt=""/>Approve</button>';
				echo'<button type="submit" class="positive" name="reject" id="save"><img src="images/denied.png" alt=""/>Reject</button>';
		}

		?>
         
         
      	 
      	 </div>
		 </div>
		 
		 <div style="float:left; width:310px">
		 <?php
		
		 
		  $lid = $_GET['lid'];
    $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
    mysql_select_db(DATABASE,$connection);
	
	$sql = "Select *  from `leave` where leavetype ='Optional Holiday' and reqname = '$row->fname $row->lname' AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') > date_format(now(),'%Y-01-01') AND STR_TO_DATE(`fromdate`, '%m/%d/%Y') < date_format(now(),'%Y-12-31') and status = 1";
	
	$res = mysql_query($sql)or die(mysql_error());
	
	$count = mysql_num_rows($res);
		
	echo '<strong>Optional Holidays Availed : </strong>'.$count.'</br><p> &nbsp; </p>';
	
	while($row = mysql_fetch_array($res))
	{
		echo $row['fromdate'].' '.$row['todate'].' '.$row['reason'];
	}
	
?>
	</div>
    </form>
    
  
 

       
         <?php
 
		 if($type == "4")
  {
	  echo' <div style="clear:both"></div>  
  <div style="margin-top:30px"><h2>Employees applying leave on similar dates</h2></div><table style="width:100%; border:1px solid #ccc">
         <tr>
         <td class="rowhead">Employee Name</td>
          <td class="rowhead">Leave Type</td>
         <td class="rowhead">From Date</td>
          <td class="rowhead">To Date</td>
         </tr>';
		 
		 $lid = $_GET['lid'];
		  $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
         mysql_select_db(DATABASE,$connection);
		 $getleave = mysql_query("Select * from `leave` where lid = '$lid' ");
		 $leavedet = mysql_fetch_object($getleave);
		 
		 
		 
		
		  $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
         mysql_select_db(DATABASE,$connection);
		 $sql = mysql_query("Select * from `leave` where fromdate = '$leavedet->fromdate' ")or die( mysql_error());
		 while($getemp = mysql_fetch_array($sql))
		 {
		 echo'<tr><td>'.$getemp['reqname'].'</td><td>'.$getemp['leavetype'].'</td><td>'.$getemp['fromdate'].'</td><td>'.$getemp['todate'].'</td> </tr>';
		 }
		 echo'</table>';
  }
		 ?>
        
         

      
     
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