<?php
session_start();
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include_once('functions.php');
require_once('database.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TrilaSoft</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
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
  <style type="text/css">
label{ display: block;}

</style>
  
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script src="js/lib/jquery.validate.js" type="text/javascript"></script>
    <script>

   
        $(function() {
        	
        
        	
      
      
        $( "#startdate" ).datepicker({
        	 beforeShowDay: $.datepicker.noWeekends, 
            showOn: "button",
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true
        });
		
		
		   $( "#enddate" ).datepicker({
		   	 beforeShowDay: $.datepicker.noWeekends, 
            showOn: "button",
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true,
            onSelect: function(){
            	       	
         var startdate = new Date($("#startdate").val());
        	var enddate = new Date($("#enddate").val());      
        
                  	var days  = calcBusinessDays(startdate, enddate);
                  	$("#totdate").html(days);
                }      
        });
        
        
      
 
      
    });
    
  
    </script>
   <script type="text/javascript" >
 function calcBusinessDays(dDate1, dDate2) {         // input given as Date objects

  var iWeeks, iDateDiff, iAdjust = 0;

  if (dDate2 < dDate1) return -1;                 // error code if dates transposed

  var iWeekday1 = dDate1.getDay();                // day of week
  var iWeekday2 = dDate2.getDay();

  iWeekday1 = (iWeekday1 == 0) ? 7 : iWeekday1;   // change Sunday from 0 to 7
  iWeekday2 = (iWeekday2 == 0) ? 7 : iWeekday2;

  if ((iWeekday1 > 5) && (iWeekday2 > 5)) iAdjust = 1;  // adjustment if both days on weekend

  iWeekday1 = (iWeekday1 > 5) ? 5 : iWeekday1;    // only count weekdays
  iWeekday2 = (iWeekday2 > 5) ? 5 : iWeekday2;

  // calculate differnece in weeks (1000mS * 60sec * 60min * 24hrs * 7 days = 604800000)
  iWeeks = Math.floor((dDate2.getTime() - dDate1.getTime()) / 604800000)

  if (iWeekday1 <= iWeekday2) {
    iDateDiff = (iWeeks * 5) + (iWeekday2 - iWeekday1)
  } else {
    iDateDiff = ((iWeeks + 1) * 5) - (iWeekday1 - iWeekday2)
  }

  iDateDiff -= iAdjust                            // take into account both days on weekend

  return (iDateDiff + 1);                         // add 1 because dates are inclusive

}
 
     
   

function selleave()
{
	
	var e = document.getElementById("leavetype");
	
	
   var strUser = e.options[e.selectedIndex].value;
    
  
   
   if(strUser == "Half Day Leave" )
   {
   	
       	document.getElementById('enddaterow').style.display="none";
       	document.getElementById('totalrow').style.display="none";
       	document.getElementById('halftype').style.display="";
       	document.getElementById('fromtime').style.display="none";
   	document.getElementById('totime').style.display="none";
               
   	   
   }
   else if( strUser == "Short Leave")
   {
   	
   	document.getElementById('enddaterow').style.display="none";
       	document.getElementById('totalrow').style.display="none";
   	document.getElementById('fromtime').style.display="";
   	document.getElementById('totime').style.display="";
   	document.getElementById('halftype').style.display="none";
   }
   else
   {
   	
   	document.getElementById('enddaterow').style.display="";
   	document.getElementById('totalrow').style.display="";
   	document.getElementById('halftype').style.display="none";
   	document.getElementById('fromtime').style.display="none";
   	document.getElementById('totime').style.display="none";
   }
  
}

$(document).ready(function(){
	
	var leavetype = $("#leavetype").val();
	
	if(leavetype == "Half Day Leave" )
   {
   	
       	document.getElementById('enddaterow').style.display="none";
       	document.getElementById('totalrow').style.display="none";
       	document.getElementById('halftype').style.display="";
       	document.getElementById('fromtime').style.display="none";
   	document.getElementById('totime').style.display="none";
               
   	   
   }
   else if( leavetype == "Short Leave")
   {
   	
   	document.getElementById('enddaterow').style.display="none";
       	document.getElementById('totalrow').style.display="none";
   	document.getElementById('fromtime').style.display="";
   	document.getElementById('totime').style.display="";
   	document.getElementById('halftype').style.display="none";
   }
   else
   {
   	
   	document.getElementById('enddaterow').style.display="";
   	document.getElementById('totalrow').style.display="";
   	document.getElementById('halftype').style.display="none";
   	document.getElementById('fromtime').style.display="none";
   	document.getElementById('totime').style.display="none";
   }
	
	})



</script>

<script type="text/javascript" >
function validateForm()
{
var leavetype = document.getElementById("leavetype").value;
var fromtime = document.getElementById("fromtime").value;
var totime = document.getElementById("totime").value;
var halftype = document.getElementById("halftype").value;
var startdate = document.getElementById("startdate").value;
var enddate = document.getElementById("enddate").value;
var reasons = document.getElementById("reasons").value.length;
var phone = document.getElementById("phone").value;

  if(leavetype=="")
  {
  alert("Please select leave type");
  return false;	
   }

if(leavetype == "Short Leave")
  {  	
   		if(fromtime == "")
   			{
  					alert("Please select fromtime");
  					return false;
  				}
 			if(totime == "")
  				{
  					alert("Please select totime");
  					return false;
  				}
  					if(startdate == "")
   			{
  					alert("Please select start date");
  					return false;	
  				}
  		if(reasons == 0)
   		{
  					alert("Please enter reason");
  					return false;	
  			} 
  		if(phone == "")
   			{
  					alert("Please enter contact no.");
  					return false;	
  				} 

  return true;	
   }
   
    if(leavetype == "Half Day Leave")
  {  	
   		if(halftype == "")
   			{
  					alert("Please select half day type");
  					return false;	
  				} 
  			if(startdate == "")
   			{
  					alert("Please select start date");
  					return false;	
  				}
  		if(reasons == 0)
   		{
  					alert("Please enter reason");
  					return false;	
  			} 
  		if(phone == "")
   			{
  					alert("Please enter contact no.");
  					return false;	
  				} 
  			
 return true;	
   }
   
     if(leavetype == "Casual Leave")
  {  	
   		if(startdate == "")
   			{
  					alert("Please select start date");
  					return false;	
  				} 
  				
  				if(enddate == "")
   			{
  					alert("Please select end date");
  					return false;	
  				} 
  					if(reasons == 0)
   			{
  					alert("Please enter reason");
  					return false;	
  				} 
  					if(phone == "")
   			{
  					alert("Please enter contact no.");
  					return false;	
  				} 
  return true;	
   }
       if(leavetype == "Sick Leave")
  {  	
   		if(startdate == "")
   			{
  					alert("Please select start date");
  					return false;	
  				} 
  				
  				if(enddate == "")
   			{
  					alert("Please select end date");
  					return false;	
  				} 
  						if(reasons == 0)
   			{
  					alert("Please enter reason for leave");
  					return false;	
  				} 
  					if(phone == "")
   			{
  					alert("Please enter contact no.");
  					return false;	
  				} 
 return true;	
   }
   
     if(leavetype == "Planned Leave")
  {  	
   		if(startdate == "")
   			{
  					alert("Please select start date");
  					return false;	
  				} 
  				
  				if(enddate == "")
   			{
  					alert("Please select end date");
  					return false;	
  				} 
  						if(reasons == 0)
   			{
  					alert("Please enter reason for leave");
  					return false;	
  				} 
  					if(phone == "")
   			{
  					alert("Please enter contact no.");
  					return false;	
  				} 
 return true;	
   }
   
  
   
return true;
}
</script>
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
  
         <h2>Edit Leave</h2>
         <?php
  $lid = urldecode("".stripslashes($_GET['lid'])."");
 

  $mess = $_GET['mess'];
  if($mess == 'blank')
  {
   echo'Please fill all the fields';  	
  }
  if($mess == 'success')
  {
	  echo'<h3>Your Leave Application has been updated successfully!</h3>';
	  }
	  
//fetching leaves
if($lid)
{	  
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$sql = "Select * from `leave` where lid = ".$lid."";
$getleave = mysql_query($sql)or die(mysql_error());

$row = mysql_fetch_object($getleave);

//updating leaves
 if(isset($_POST['update']))
        {

		$startdate = mysql_real_escape_string(trim($_POST['startdate']));
		$enddate = mysql_real_escape_string(trim($_POST['enddate']));
		$fromtime = mysql_real_escape_string(trim($_POST['fromtime']));
		$totime = mysql_real_escape_string(trim($_POST['totime']));
		$leavetype = mysql_real_escape_string(trim($_POST['leavetype']));
		$halfdaydetail = mysql_real_escape_string(trim($_POST['halftype']));
		$reasons = mysql_real_escape_string(trim($_POST['reasons']));
		$phone = mysql_real_escape_string(trim($_POST['phone']));
		
        	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
		   mysql_select_db(DATABASE,$connection);
		   
		   $query = "UPDATE `leave` SET `fromdate` = '$startdate' ,`todate` = '$enddate' , `fromtime`= '$fromtime' , `totime`= '$totime' , `leavetype`= '$leavetype' , `halfdaydetail`= '$halfdaydetail' , `reason`= '$reasons' ,`phone`= '$phone'  WHERE `lid` = $lid";
		   
		   $result = mysql_query($query, $connection) or die(mysql_error());
		   if($result) {
		   	 echo'<script>alert("Your Leave Application has been updated successfully!"); window.location.href="viewleave.php?sessid='.$sessid.'"</script>';
		   
       }
    }
//code ends for updating leaves

?>
         <form action="" method="post" id="leaveform" onsubmit="return validateForm()">
         <div id="inputArea">
         <table width="100%" cellspacing="4" style="width:600px ; padding:10px" >
          <tr>
           <td>Leave Type</td>
           <td width="119"><select name="leavetype" id="leavetype" onchange="selleave()" onload="selleave()"  > 
          <option value="Short Leave" <?php echo ($row->leavetype == 'Short Leave')?"selected='selected'":"" ?>>Short Leave</option>
            
             <option value="Half Day Leave" <?php echo ($row->leavetype == 'Half Day Leave')?"selected='selected'":"" ?>>Half Day Leave</option>
             <option value="Casual Leave" <?php echo ($row->leavetype == 'Casual Leave')?"selected='selected'":"" ?>>Casual Leave</option>
             <option value="Sick Leave" <?php echo ($row->leavetype == 'Sick Leave')?"selected='selected'":"" ?>>Sick Leave</option>
             <option value="Planned Leave" <?php echo ($row->leavetype == 'Planned Leave')?"selected='selected'":"" ?>>Planned Leave</option>
              <option value="Optional Holiday" <?php echo ($row->leavetype == 'Optional Holiday')?"selected='selected'":"" ?>>Optional Holiday</option>
           </select></td>
           <td width="237"><select name="halftype" id="halftype" style="display:none" > 
             <option selected value=""> </option>
             <option value="First Half" <?php echo ($row->halfdaydetail == 'First Half')?"selected='selected'":"" ?> >10:00 am - 2:00 pm</option>
             <option  value="Second Half" <?php echo ($row->halfdaydetail == 'Second Half')?"selected='selected'":"" ?>">2:00 pm - 7:00 pm</option>
             </select>
             
<select name="fromtime" id="fromtime" style="display:none" > 
             <option selected value=""> </option>
             <option value="10" <?php echo ($row->fromtime == '10')?"selected='selected'":"" ?>>10:00</option>
             <option value="11" <?php echo ($row->fromtime == '11')?"selected='selected'":"" ?>>11:00</option>
             <option  value="12" <?php echo ($row->fromtime == '12')?"selected='selected'":"" ?>>12:00</option>
             <option value="1" <?php echo ($row->fromtime == '1')?"selected='selected'":"" ?>>1:00</option>
             <option value="2" <?php echo ($row->fromtime == '2')?"selected='selected'":"" ?>>2:00</option>
             <option value="3" <?php echo ($row->fromtime == '3')?"selected='selected'":"" ?>>3:00</option>
             <option value="4" <?php echo ($row->fromtime == '4')?"selected='selected'":"" ?>>4:00</option>
             <option value="5" <?php echo ($row->fromtime == '5')?"selected='selected'":"" ?>>5:00</option>
             <option value="6" <?php echo ($row->fromtime == '6')?"selected='selected'":"" ?>>6:00</option>
             <option  value="7" <?php echo ($row->fromtime == '7')?"selected='selected'":"" ?>>7:00</option>
             
             </select>       
             
             <select name="totime" id="totime" style="display:none" > 
             <option selected value=""> </option>
             <option value="10" <?php echo ($row->totime == '10')?"selected='selected'":"" ?>>10:00</option>
             <option value="11" <?php echo ($row->totime == '11')?"selected='selected'":"" ?>>11:00</option>
             <option  value="12" <?php echo ($row->totime == '12')?"selected='selected'":"" ?>>12:00</option>
             <option value="1" <?php echo ($row->totime == '1')?"selected='selected'":"" ?>>1:00</option>
             <option value="2" <?php echo ($row->totime == '2')?"selected='selected'":"" ?>>2:00</option>
             <option value="3" <?php echo ($row->totime == '3')?"selected='selected'":"" ?>>3:00</option>
             <option value="4" <?php echo ($row->totime == '4')?"selected='selected'":"" ?>>4:00</option>
             <option value="5" <?php echo ($row->totime == '5')?"selected='selected'":"" ?>>5:00</option>
             <option value="6" <?php echo ($row->totime == '6')?"selected='selected'":"" ?>>6:00</option>
             <option  value="7" <?php echo ($row->totime == '7')?"selected='selected'":"" ?>>7:00</option>
             
             </select>             
             </td>
         </tr>
         <tr><td width="139">Start Date</td><td colspan="2"><input type="text" name="startdate" value="<?php echo $row->fromdate; ?>" style="width:100px; display:inline" id="startdate"   />
           </td>
  </tr>
         <tr id="enddaterow">
           <td width="139">End Date</td>
           <td colspan="2"><input type="text" name="enddate" value="<?php echo $row->todate; ?>" style="width:100px; display:inline" id="enddate" onchange=""  /></td>
           </tr>
         <tr id="totalrow">
           <td>Total Days</td>
           <td colspan="2">
          <label id="totdate"></label>
           </td>
         </tr>
        
         <tr>
           <td align="left" valign="top">Reason For Leave</td>
           <td colspan="2"><textarea name="reasons" id="reasons" cols="45" rows="5"><?php echo $row->reason; ?></textarea></td>
           </tr>
         <tr>
           <td align="left" valign="top">Contact no. during leave</td>
           <td colspan="2"><input type="text" name="phone" value="<?php echo $row->phone; ?>" id="phone" /></td>
         </tr>
      <?php 
           $sql = "Select * from employee where username = '".$_SESSION['username']."'";
           $res = mysql_query($sql, $connection)or die(mysql_error());
           $row = mysql_fetch_object($res);
           
           $reqname =  $row->fname.' '.$row->lname;
           
           echo '<input type="hidden" name="reqname" value="'.$reqname.'" >';
           
           ?>
           
         
      
          <?php
       
   echo ' <input type="hidden" name="reqemail" id="reqemail" value="'.$row->email.'"> <input type="hidden" name="empid" value="'.$row->empid.'" />';          
           ?>
          
           
        
     
          <?php echo '<input type="hidden" name="supemail" id="supemail" value="'.$row->supemail.'">' ?>
          
         <tr>
           <td>&nbsp;</td>
           <td colspan="2"><div class="buttons" style="padding-left:0px;">
             <button type="submit" class="positive" name="update" id="save"><img src="images/apply2.png" alt=""/>Update</button>
              <button type="reset" class="negative" name="reset" id="save"><img src="images/cross.png" alt=""/>Cancel</button> </div></td>
         </tr>
         </table>
         </div>

        <div class="clear" style="padding-top:5px;"></div>
      
         </form>
        <?php
        
       
         
      }//end of fetch leave code
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
</body>
</html>