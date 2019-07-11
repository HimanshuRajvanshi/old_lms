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

<script src="js/jquery.validate.min.js" type="text/javascript"></script>
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

<style>
.sucess{
color:#088A08;
}
.error{
color:red;
}

label.error, label.error {
    color: red;
    font-style: italic;
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
	<div id="page-heading"></div>
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
    

  
       
        
<?php 
if(isset($_POST['upload']))
{
	
$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
$upload_exts = end(explode(".", $_FILES["photo"]["name"]));
if ((($_FILES["photo"]["type"] == "image/gif")
|| ($_FILES["photo"]["type"] == "image/jpeg")
|| ($_FILES["photo"]["type"] == "image/png")
|| ($_FILES["photo"]["type"] == "image/pjpeg"))
&& ($_FILES["photo"]["size"] < 1000000)
&& in_array($upload_exts, $file_exts))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["photo"]["error"] . "<br>";
}
else
{
echo "Upload: " . $_FILES["photo"]["name"] . "<br>";
echo "Type: " . $_FILES["photo"]["type"] . "<br>";
echo "Size: " . round($_FILES["photo"]["size"] / 1024) . " kB<br>";

// Enter your path to upload file here
if (file_exists("docs/" .
$_FILES["photo"]["name"]))
{
echo "<div class='error'>"."(".$_FILES["photo"]["name"].")".
" already exists. "."</div>";
}
else
{
	
$random_digit=rand(000000,999999);
$new_file_name=$random_digit.$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"], "docs/" . $new_file_name);
echo "<div class='sucess'>"."Stored in: " . "docs/" . $_FILES["photo"]["name"]."</div>";

$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

$empid = $_SESSION['empid'];
$doctype = $_POST['doctype'];

$sql = "INSERT into docs (doctype, empid, document) VALUES ('$doctype', '$empid', '$new_file_name') ";
$res = mysql_query($sql)or die(mysql_error());
mysql_close($connection);
}
}
}
else
{
echo "<div class='error'>File cannot be blank</div>";
}

}
?>
   <h2>Upload Documents</h2>
<form enctype="multipart/form-data" method="post" class="cmxform">
<div style="padding:5px"><label>
<h3>Select Document </h3></label></div>
<div style="padding:5px">
<select  name="doctype">
<option value="PAN Card">PAN Card</option>
<option value="Voter Card">Voter Card</option>
<option value="Driving Licence">Driving Licence</option>
<option value="Aadhar Card">Aadhar Card</option>
<option value="Passport">Passport</option>

</select>

</div>
<div style="padding:5px">
<input type="file" name="photo" class="required" accept="image/*" />
<div style="font-style:italic; color:#930">(Image size should be less than 1MB in GIF, JPEG or PNG formats)</div>
</div>
<div style="padding:5px">
<input type="submit" name="upload" class="ui-button" />

</div>

</form>
<div style="width:100%; height:2px; background-color:#E6E6E6; margin-bottom:10px; margin-top:10px"></div>
<h2>My Uploaded Documents</h2>        
<?php
$empid = $_SESSION['empid'];
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);
$q1 = "Select * from docs, employee where docs.empid =  '$empid' and docs.empid = employee.empid  ";
$r1 = mysql_query($q1)or die(mysql_error());


echo '<table id="datatable" style="width:50%; border:1px solid #ccc"><tr><td class="rowhead">Document Type</td><td class="rowhead">Document Image</td></tr>';
while($row = mysql_fetch_array($r1))
{
echo '<tr><td>'.$row['doctype'].'</td><td>';
$url = 'http://intranet.trilasoft.com/docs/'.$row['document'].'';
$title = "Expand Document Image";
echo '<a href="javascript:;" target="_blank" onclick="myFunction()"><img src="docs/'.$row['document'].'" style="width:150px; height:75px"/></a></td></tr>';
}
echo '</table>';

echo'<script>
function myFunction() {
    var myWindow = window.open("", "myWindow", "width=500, height=500");
    myWindow.document.write("<img src='.$url.'>");
   
}
</script>';

mysql_close($connection);
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
