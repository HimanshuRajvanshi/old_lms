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
         <h2 style="padding-left:10px !important;">Monthly Salary Slip</h2>
		 <hr style="margin-bottom:0px !important;">
        <?php
		date_default_timezone_set("Asia/Calcutta");
		?>
         
        <div class="container-fluid">	
        <div class="row" style="padding-left:0px !important;">            
            <div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">January</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div>
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">February</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
				<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">March</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">April</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">May</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">June</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">July</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">Auguest</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">September</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">October</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">Novermber</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
			<div class="col-sm-6 col-md-4 col-lg-2 mt-4">
                <div class="card card-inverse card-info">                    
                    <div class="card-block">                        
                        <h2 class="card-title font-weight-normal" style="padding:10px;">December</h2>                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-outline-success btn-sm">Download</button>
                    </div>
                </div>
            </div> 
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