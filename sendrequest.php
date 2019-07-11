<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
ini_set('session.gc_maxlifetime', 86400);
ini_set('date.timezone', 'Asia/Calcutta');
require_once('class.phpmailer.php');
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
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/cupertino/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
  $(function() {
    $( "#tabs" ).tabs();
	
  });
  
 
$(function() {
$(".reqtype").change(function(){
if($( ".reqtype" ).val() == "book")
 
 {
 $('#booklabel').show();
 $('#bookname').show();
 }
 else
 {
 $('#booklabel').hide();
 $('#bookname').hide();
 }

 })


});
  
  </script>

  

<style>

#bookname, #booklabel{ display:none}
.msgform fieldset p.error label { color: red; }
div.container {
	background-color: #eee;
	border: 1px solid red;
	margin: 5px;
	padding: 5px;
}
div.container ol li {
	list-style-type: disc;
	margin-left: 20px;
}
div.container { display: none }
.container label.error {
	display: inline;
}
form.msgform { width: 30em; }
form.msgform label.error {
	display: block;
	margin-left: 1em;
	width: auto;
	color:#ff0000;
}
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
	
	<h2>Send Request</h2>
    <?php 

	include('database.inc.php');
	
	


	if(isset($_POST['submit']))
	{
$message = trim($_POST['comments']);
$subject = trim($_POST['issuetype']);	
$bookid = trim($_POST['bookname']);


$connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$empid = $_SESSION['empid'];
$sql = "Select email, fname, lname from employee where empid = '$empid'";
$res = mysql_query($sql);


$reqdate = trim($_POST['reqdate']);
$addreq = "INSERT INTO request(bookid, issuetype, comments, reqdate,  empid) VALUES('$bookid','$subject',  '$message', '$reqdate', '$empid')";
$resreq = mysql_query($addreq);


$booksql = "Select bookname from books where bookid = '$bookid'";
$bookres = mysql_query($booksql);
$bookrow = mysql_fetch_object($bookres);


$row = mysql_fetch_array($res);

  $mail = new PHPMailer(); 
 /*  $mail->IsSMTP(); // telling the class to use SMTP
  $mail->Host       = "mail.trilasoft.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->Host       = "mail.trilasoft.com"; // sets the SMTP server
  $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "rbanerjee@trilasoft.com"; // SMTP account username
  $mail->Password   = "Banrah@2013";        // SMTP account password */
  $mail->SetFrom($row['email'], $row['fname'].' '. $row['lname']);
 $mail->AddAddress(HREMAIL, HRNAME);
 $mail->AddCC('agupta@trilasoft.com', 'Anil Gupta');
   
  
   
   if($subject == 'book')
   {
   $mail->Subject = 'Request from '.$row['fname'].' '. $row['lname']. ' ('.stripslashes($bookrow->bookname).')'; 
   $body = 'Message: '. stripslashes($message);
   $body .= '<br/><p>You have received a Book Request for: '.$bookrow->bookname.'</p>';
   }
   if($subject == 'datacard')
   {
$mail->Subject = 'Request from '.$row['fname'].' '. $row['lname']. ' (Datacard)'; 
	$body = 'Message: '. stripslashes($message);   
   $body .= '<br/><p>You have received a Data Card Request </p>';	  
   }
     if($subject == 'ipad')
   {
$mail->Subject = 'Request from '.$row['fname'].' '. $row['lname']. ' (IPAD)'; 
	$body = 'Message: '. stripslashes($message);   
   $body .= '<br/><p>You have received a IPAD Request </p>';	  
   }
  $mail->MsgHTML($body);
if($mail->Send())
{
 echo '<h3>Mail sent successfully</h3>';
}  
else
{
 echo '<h2>There was an error, please contact the systems administrator.</h2>';
}
	
	}
	
	?>

    <div id="inputArea">
	<form method="post" id="msgform" class="msgform">
	<label>Issue Type:</label><br><select  name="issuetype" class="reqtype" required /><option value="" selected="selected">Select Issue Type</option><option value="book">Books</option> <option value="datacard">Datacard</option><option value="ipad">IPAD</option></select>
	<br>
	
	<label id="booklabel">Name of Book</label><br>
	<select  name="bookname" id="bookname" required />
	<?php
	$connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
    mysql_select_db(DATABASE,$connection);
    
	$getbooks = mysql_query('Select * from books');
	while($rowbooks = mysql_fetch_assoc($getbooks))
	{
	echo'<option value="'.$rowbooks[bookid].'">'.$rowbooks[bookname].'</option>';
	}
	?>
	
	</select>

    <br>
	
	<label>Comments:</label> <textarea name="comments" rows="5" cols="40" required></textarea>
	<input type="submit" name="submit" value="Send Request">
	<input type="hidden" name="reqdate" value="<?php echo date('Y-m-d')?>" />
	</form>
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
<script>
$("#msgform").validate();
</script>  
</body>
</html>