<?php ob_start(); ?>
<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
ini_set('session.gc_maxlifetime', 86400);
ini_set('date.timezone', 'Asia/Calcutta');
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
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/cupertino/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
  $(function() {
    $( "#tabs" ).tabs();
	 $( "#team" ).tabs();
  });
  
 

  </script>
  
 <style>
 .btn {
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  text-shadow: 1px 1px 3px #666666;
  font-family: Arial;
  color: #ffffff !important;
  font-size: 11px;
   background: #078a07;
  padding: 5px 5px 5px 5px;
  text-decoration: none;
}

.btn:hover {
  background: #48b581;
  text-decoration: none;
}

label {display:block}
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
    

    <div class="right_content">  <!-- Start of right content-->    
    

     <h2>Send Award Nominations</h2>
    
        

        <div class="form">
        <div id="inputArea">
        <form method="post" action="">
        <?php 
		$nomid = $_GET['empid'];
		$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
        mysql_select_db(DATABASE,$connection);

$sql = "SELECT * FROM  employee WHERE empid = '$nomid'";
$res = mysql_query($sql)or die(mysql_error());

$row = mysql_fetch_object($res);

echo'<label><strong> Employee Name: '.$row->fname.' '.$row->lname.'</strong></label>';
		
		?>
      <?php
	  if(isset($_POST['sendnomination']))
	  {
	  require_once('class.phpmailer.php');
	  $sessid = $_SESSION['sessid'];
	  
	 $awardtype = trim($_POST['awardtype']);
	 $quarter = trim($_POST['quarter']);
 	 $remarks  = trim(stripslashes($_POST['remarks']));
	  
	  $body = " <div style=\"width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 12px;background-color:lightblue;padding: 15px;\">";
$body .="<strong>Employee Name: </strong>".$row->fname." ".$row->lname."<br>";
$body .="<strong>Award Type: </strong>".$awardtype."<br>";
$body .="<strong>Quarter: </strong>".$quarter."<br>";
$body .="<strong>Remarks: </strong>".$remarks."<br>";
$body .= "<br/><a href=\"http://intranet.trilasoft.com\">Login here</a></div>" ;	
	  
	  
	  $empid = $_SESSION['empid'];
	  $sql = "SELECT * FROM  employee WHERE empid = '$empid'";
$res = mysql_query($sql)or die(mysql_error());

$getemp = mysql_fetch_object($res);
	  
	  $mail = new PHPMailer(); 
 /*    $mail->IsSMTP(); // telling the class to use SMTP
  $mail->Host       = "mail.trilasoft.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.trilasoft.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "rbanerjee@trilasoft.com"; // SMTP account username
  $mail->Password   = "Banrah@2013";        // SMTP account password */
   $mail->SetFrom($getemp->email , $getemp->fname.' '.$getemp->lname);
  $mail->AddAddress(HREMAIL, HRNAME);
  $mail->Subject = 'Award Nomination'; 
  $mail->MsgHTML($body);
 if( $mail->Send() )
 {
	 $date = date('Y-m-d');
	$sql = "INSERT INTO nominations (empid, sentby, awardtype, quarter, remarks, date,result) VALUES('$nomid', '$empid', '$awardtype', '$quarter', '$remarks', '$date', '$result')";
    $res = mysql_query($sql)or die(mysql_error()); 
	header('location:securearea.php?sessid='.$sessid.'');
  }

  mysql_close($connection);
  exit();
	  
	  
	  }
	  ?>
        <?php ob_flush(); ?>
        
        <p>&nbsp;</p>
        <label for="quarter">
            Quarter *</label>
            <select id="quarter"  name="quarter" required>
            <option value="" selected="selected">Select a Quarter</option>
            <option value="Quarter 1 (Jan - Mar)" >Quarter 1 (Jan - Mar)</option>
            <option value="Quarter 2 (Apr - Jun)" >Quarter 2 (Apr - Jun)</option>
            <option value="Quarter 3 (Jul - Sep)">Quarter 3 (Jul - Sep)</option>
            <option value="Quarter 4 (Oct - Dec)" >Quarter 4 (Oct - Dec)</option>
            </select>
            
            <label for="quarter">
            Award Type *</label>
            <select id="awardtype"  name="awardtype" required>
            <option value="" selected="selected">Select Award Type</option>
            <option value="Employee of the Quarter" >Employee of the Quarter</option>
            <option value="Pat on the Back" >Pat on the Back</option>
          
            </select>
            
            
         <label for="remarks">Remarks *</label>
         <textarea name="remarks" id="remarks" required></textarea>   
         <input type="submit" value="Submit" name="sendnomination" style="width:auto">
            
        </form>
        
        </div>
        
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