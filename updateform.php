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
  
         <h2>Update Issue</h2>
         <?php
  
          $issueid= $_GET['issueid'];  
	  $sql = "Select * from issue where issueid = '$issueid' ";
	  $res = mysql_query($sql)or die(mysql_error());
	  $row = mysql_fetch_object($res);
	  
  ?>
         <form action="updateissue.php" method="post" >
         <div id="inputArea">
         <table width="100%" cellspacing="4" style="width:600px ; padding:10px" >
          <tr>
           <td>Issue</td>
           <td width="119"><?php echo $row->issue; ?></td>
        
         </tr>
         <tr>
           <td>Description</td>
           <td width="119"><?php echo $row->desc; ?></td>
        
         </tr>
          <tr>
           <td>Assign Action</td>
           <td width="119"><select name="action" required>
           
           <option value="" selected="selected">-------Select-------</option>
           
           <?php 
           if($row->issuestatus == "resolved")
           echo '<option value="resolved" selected="selected">Resolved</option> <option value="pending">Pending</option>';
           
           else if($row->issuestatus == "pending")
           echo'<option value="pending" selected="selected">Pending</option>;
           <option value="resolved">Resolved</option>';
           else
           echo'<option value="pending">Pending</option>
           <option value="resolved">Resolved</option>';
           ?>
           
           </select></td>
        
         </tr>
          <tr>
           <td>Comment</td>
           <td width="119"><textarea name="comment" id="comment" cols="45" rows="5"></textarea></td>
        <input type="hidden" name="empid" value="<?php echo $row->empid ?>" />
         <input type="hidden" name="issueid" value="<?php echo $row->issueid?>" />
         </tr>
        
         <tr>
           <td>&nbsp;</td>
           <td colspan="2"><div class="buttons" style="padding-left:0px;">
             <button type="submit" class="positive" name="save" id="save"><img src="images/apply2.png" alt=""/>Apply</button>
              <button type="reset" class="negative" name="save" id="save"><img src="images/cross.png" alt=""/>Cancel</button> </div></td>
         </tr>
         </table>
         </div>

        <div class="clear" style="padding-top:5px;"></div>
      
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