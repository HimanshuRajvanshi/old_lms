<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
include_once('functions.php');
require_once('database.inc.php');
date_default_timezone_set("Asia/Calcutta");
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
     <script language="javascript">
          $(document).ready(function(){
        var url = "viewmyissue.php?sessid=<?php echo $_SESSION['sessid']; ?>";
          $('#register').click(function(){
          
           var empid = $("#empid").val();
         var issue  = $("#issue").val();                  
         var desc  = $("#desc").val();      
         var date = $("#date").val();   
		  var time = $("#time").val();   
		  var ticket = $("#ticket").val();   
			var comment = $("#comment").val(); 
			var closingdate = $("#closingdate").val();

		  
         $.post("issueproc.php",{empid:empid, ticket:ticket, issue:issue, desc:desc, date:date, time:time,closingdate:closingdate,comment:comment}, function(data){
         
        $(".result").html(data);
		if (data.length>0) {
			top.location.href = url;
		}
		
                    
         })
         
          });
		  
		 
		 
          })
		  
		
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

  <div class="result"></div>
         <h2>Register An Issue</h2>
        <?php
		date_default_timezone_set("Asia/Calcutta");
		?>
         
         <div id="inputArea">
             
     
      
<label for="issue">
            Issue *</label>
            <select id="issue"  name="issue" required>
            <option value="" selected="selected">Select an Issue</option>
            
            <option value="Logon Problem">Logon Problem</option>
             <option value="Printing Problem">Printing Problem</option>
             <option value="Hardware Fault">Hardware Fault</option>
             <option value="Hardware Replacement">Hardware Replacement</option>
             <option value="Hardware Purchase Request">Hardware Purchase Request</option>
<option value="Software Problem">Software Problem</option>
<option value="Software Purchase Request">Software Purchase Request</option>
<option value="Software Update Request">Software Update Request</option>
<option value="Equipment/Accessory Request">Equipment/Accessory Request</option>
<option value="Training Request">Training Request</option>
<option value="Server Access Request">Server Access Request</option>
<option value="Server Access Problem">Server Access Problem</option>
<option value="SVN Issue">SVN Issue</option>
<option value="Local Network Problem">Local Network Problem</option>
<option value="WiFi Problem">WiFi Problem</option>
<option value="Telephone Problem">Telephone Problem</option>
<option value="WebSite Access Issue">WebSite Access Issue</option>
<option value="Email Issue">Email Issue</option>
<option value="Internet Access Issue">Internet Access Issue</option>
<option value="Timesheet Access Issue">Timesheet Access Issue</option>
<option value="Security/Permission Issue">Security/Permission Issue</option>
<option value="Electrical Power Problem">Electrical Power Problem</option>
<option value="General">General</option>
 </select>
       
        <label for="desc">Issue Description*</label>
        <textarea id="desc" name="desc"  cols="40" rows="4" required></textarea> 
      <input type="hidden" id="empid" value="<?php echo $_SESSION['empid']; ?>" />
	  <input type="hidden" id="ticket" value="<?php echo mt_rand(1000, 999999); ?>" />
      <input type="hidden" id="date" value="<?php echo date('Y-m-d'); ?>" />
      <input type="hidden" id="time" value="<?php echo date('h:i:s'); ?>" />
	  
	  <input type="hidden" id="comment" value="<?php echo $_SESSION['comment']; ?>" />
	  <input type="hidden" id="closingdate" value="0000-00-00 00:00:00" />

        <div class="clear" style="padding-top:5px;"></div>
        
        <div class="buttons" style="padding-left:145px;">
   		 <button type="submit" class="positive" name="register" id="register"><img src="images/apply2.png" alt=""/>Save</button>
      	 <a href="javascript:;" id="reset" class="negative"><img src="images/cross.png" alt=""/>Cancel</a>
		 </div>
         
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