<?php
 ob_start();
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
ini_set('session.gc_maxlifetime', 86400);
ini_set('date.timezone', 'Asia/Calcutta');
ini_set('output_buffering', 'on');
include_once('functions.php');
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
  </script>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
 <style type="text/css">
  @media only screen 
and (min-device-width : 768px) 
and (max-device-width : 1024px) {
  .right_content{ width:740px; float:left}
}
 
label{ display: block;} 

a.paginate {
border: 1px solid #000080;
padding: 2px 6px 2px 6px;
text-decoration: none;
color: #000080;
}
a.current {
border: 1px solid #000080;
font: bold .7em Arial,Helvetica,sans-serif;
padding: 2px 6px 2px 6px;
cursor: default;
background: #000080;
color: #FFF;
text-decoration: none;
}

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
<style>
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
    

     <h2>Add Book</h2>
	 <?php
	 
	 if(isset($_POST['submit']))
	 {
	  
	  $bookname = mysql_real_escape_string(trim($_POST['bookname']));
	  
	  $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
      mysql_select_db(DATABASE,$connection);
	  
	 
	  

	  $sql = "INSERT into `books` (`bookname`)VALUES('$bookname')";
      $res = mysql_query($sql)or die(mysql_error());



     if($res)
	  {
	    echo'<h3>The book has been added successfully</h3>';
	  }
	 }
	 
	 
	 // delete code.
	 $action = $_GET['action'];
	 $bookid = $_GET['bookid'];
	 
	 if(($action == 'delete')&&($bookid != NULL))
	 {
	 ob_start();
	    $connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
      mysql_select_db(DATABASE,$connection);
      
	  $sql = "DELETE FROM `books` where bookid ='$bookid'";
      $res = mysql_query($sql)or die(mysql_error());
	 
     if($res)
	  {
	    echo'<h3>The book has been deleted successfully</h3>';
		header("addbook.php?sessid=".$_SESSION['sessid']."");
	  }	 
	 }
	 
	 
	 //delete code ends
	 
	 
	 $mess = $_GET['mess'];
	 
	 if($mess == "updatesuccess")
	 {
	  echo '<h3>The book was updated successfully</h3>';	 
	}
	 ?>
	 
	 
       
         <form method="post" id="msgform" class="msgform">
		 <table style="width:90%; margin:0px; padding:5px"  >
		  <tr><td style="height:10px;"></tr>
		 <tr><td style="width:55px; line-height:25px">Bookname:</td>
		 <td><input type="text" name="bookname"  style="width:100%;height:26px;" required />
		 </td>
			<td>&nbsp;</td>
			<td><input type="submit" value="Add" name="submit" style="background-color:#cccccc; color:#000000; padding:5px 10px;"></td>
			
			</tr>
			</table>
        </form>

<div class="CSSTableGenerator">
<table style="width:100%;margin-top:5px;" class="table table-bordered table-striped table-hover">
<tr>
<td style="width:100px;" class="rowhead">Book ID</td>
<td class="rowhead">Book Name</td>
<td class="rowhead">Date</td>
<td class="rowhead">&nbsp;</td>
</tr>
<?php
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
      mysql_select_db(DATABASE,$connection);

$sql = 'Select *, DATE_FORMAT(`date`, "%d/%m/%Y") from books order by bookname ASC';
$res = mysql_query($sql)or die(mysql_error());


$count = 0;
while($row = mysql_fetch_array($res))
{	
$count++;
echo '<tr><td>'.$count.'</td><td>'.$row['bookname'].'</td><td style="width:200px">'. $row['date'] .'</td></td><td><a href="editbook.php?sessid='.$_SESSION['sessid'].'&bookid='.$row['bookid'].'">Edit</a></td><td><a href="addbook.php?sessid='.$_SESSION['sessid'].'&action=delete&bookid='.$row['bookid'].'">Delete</a></tr>';	
} 
mysql_close($connection); 
?>
</table>

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
<script>
$("#msgform").validate();
</script>  
</body>
</html>