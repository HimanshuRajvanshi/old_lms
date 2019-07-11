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
label{ display: block !important;}
</style>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script src="js/lib/jquery.validate.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script>
    $(function() {
        $( "#doj" ).datepicker({
        	 beforeShowDay: $.datepicker.noWeekends, 
            showOn: "button",
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true,
			yearRange: "2000:2020",
			dateFormat:"yy-mm-dd"
        });
        $( "#dob" ).datepicker({
        	
            showOn: "button",
            buttonImage: "images/calendar.gif",
            buttonImageOnly: true,
             changeMonth: true,
            changeYear: true,
			yearRange: "1901:2012",
			dateFormat:"yy-mm-dd"
        });
    });
    </script>
    
    <script type="text/javascript">

$().ready(function() {
	// validate the comment form when it is submitted
	$("#employeeform").validate();	
});
</script>
<script language="javascript" type="text/javascript">
function copyadd()
{
	var sameadd = document.getElementById('sameadd');
	
	if(sameadd.checked == true)
	{
		
	var a = document.getElementById('address');
	var b = document.getElementById('coraddress');
		if(a != null)
		{
		b.value = a.value;
	
		}
	
	}
	
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
  <label class="error-message"><?php
  
  $mess = $_GET['mess'];
  if($mess == 'blank')
  {
   echo'Please fill all the fields';  	
  }

   if($mess == 'exist')
  {
   echo'The user already exists';  	
  }
  ?></label>
  <?php
    if($mess == 'success')
  {
   echo'<h3>The Employee has been added successfully</h3>';  	
  }
  ?>
  
         <h2>Add Employee</h2>
         <form action="addprocess.php?sessid=<?php echo $_SESSION['sessid'] ?>" method="post" id="employeeform" class="niceform cmxform">
         
         <div id="inputArea">
        <label for="username">
            Username *</label>
        <input type="text" id="username" name="username"  value="" required/>
        <label for="password">
            Password *</label>
        <input  type="password" id="password" name="password"  value="" required />
         <label for="empcode">
            Employee Code *</label>
        <input id="empcode" type="text" name="empcode" value="" style="width:100px; display:inline" required />
        <label for="doj">
            Date of Joining *</label>
        <input id="doj" type="text" name="doj" value="" style="width:100px; display:inline" required />
        
         <label for="supemail">
            Supervisor's Email *</label>
        <input id="supemail" type="email"  name="supemail" value="" required  />
        
          <label for="group">Select User Type *</label>
        <select name="usergroup" id="group" style="margin-bottom:5px;width:200px;" required>
        <option selected="selected" value="">Select User Type</option>
        <?php               
 getgroup();      
  ?>
        </select>
        
         <label for="status">Select Employment Status *</label>
        <select name="status" id="status" style="margin-bottom:5px;width:200px;" required>
        <option selected="selected" value="">Select Status</option>
       <option value="conf">Confirmed</option>
       <option value="prob">Probation</option>
        </select>
 
      
        <label for="fname">
            First Name *</label>
        <input id="fname" type="text"  name="fname" value="" required />
        <label for="lname">
            Last Name *</label>
        <input id="lname" name="lname" type="text"  value="" required />
<label for="email">
            Email *</label>
        <input id="email"  name="email" type="email"   value="" required  />
        <label for="address">
            Permanent Address *</label>
        <textarea id="address" name="address"  cols="40" rows="4"  value="" required></textarea>
        
       <div style="height:33px"><label for="sameadd" style="float:left; ">
            Same as above</label> <input type="checkbox" name="sameadd" id="sameadd" style="width:20px; display:inline"  onClick="copyadd()"/>
        
        </div>
        <label for="coraddress">
            Correspondence Address *</label>
        <textarea id="coraddress" name="coraddress"  cols="40" rows="4"  value="" required> </textarea> 
        <label for="contact">
            Contact *</label>
             <input id="contact" type="text" name="contact" value="" required  />
<label for="emergencyno">
            Emergency No. *</label>
             <input id="emergencyno" type="text" name="emergencyno"  value="" required  />
<label for="designation">
            Designation *</label>
             <input id="designation" name="designation" type="text" value="" required />
<label for="dob">
            Date of Birth *</label>
             <input id="dob" type="text"  name="dob" value="" style="width:100px; display:inline" required />
        <label for="department">Department *</label>
             <select id="department" style="width:200px;" name="department" required><option selected="selected" value="">-----Select Department-----</option>
             <?php
               getdepartment();
             ?>
             
             </select>

        <div class="clear" style="padding-top:5px;"></div>
        
        <div class="buttons" style="padding-left:15px;">
   		 <button type="submit" class="positive" name="save" id="save"><img src="images/apply2.png" alt=""/>Save</button>
      	 <a href="javascript:;" id="reset" class="negative"><img src="images/cross.png" alt=""/>Cancel</a>
		 </div>
         
        </div>
                
         </form>
         
          
      
     
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