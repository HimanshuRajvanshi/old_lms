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
label{ display: block;}
</style>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
</head>
<body id="login-bg">

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
$id = $_GET['id'];

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
   echo'<h3>The Employee has been updated successfully</h3>';  	
  }
  ?>
  
  <?php
  if($id){
 require_once('database.inc.php');
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);  	
$sql ="Select * from employee, department, usergroup where empid = '".$id."'AND employee.type=usergroup.groupid AND employee.department=department.depid";
  	$res = mysql_query($sql, $link_identifier = $connection)or die(mysql_error());
  	if($res)
  	{
  		
  		$row = mysql_fetch_object($res);
  		
  	
  ?>
         <h2>Edit Employee Details</h2>
         <form action="process.php?action=editemp&sessid=<?php echo $_SESSION['sessid'] ?>" method="post" id="addemployee" class="niceform cmxform">
         
         <div id="inputArea">
     
           <label for="doj">
            Date of Joining *</label>
        <input id="doj" type="text" class="required" name="doj" value="   <?php
        
           $datetime = strtotime($row->doj);
           $mysqldate = date("Y-m-d", $datetime);
   
   ?>" style="width:100px; display:inline" />
         <label for="supemail">
            Supervisor's Email *</label>
        <input id="supemail" type="text" class="required" name="supemail" value="<?php echo $row->supemail; ?>" />
        
          <label for="group">Select User Type *</label>
        <select name="usergroup" id="group">
        <option  value="">Select User Type</option>
        <?php               
        
     $q1 = "Select * from usergroup";
     $r1 = mysql_query($q1, $link_identifier = $connection);
     if($r1)
     {
       while($rowtype = mysql_fetch_array($r1))
       {
       	if($rowtype['groupid'] == $row->type)
       	{
       	 echo '<option value="'.$rowtype['groupid'].'" selected="selected">'.$rowtype['groupname'].'</option>';
       }
        else{ 
       
         echo '<option value="'.$rowtype['groupid'].'">'.$rowtype['groupname'].'</option>';
         }
       }  	
     	}   
        

  
  ?> 
        </select>
        
          <label for="status">Select User Type *</label>
        <select name="status" id="status">
        <option  value="">Select User Type</option>
         <option  value="conf" <?php echo ($row->status == 'conf')?"selected='selected'":"" ?> >Confirmed</option>
    <option  value="prob" <?php echo ($row->status == 'prob')?"selected='selected'":"" ?>>Probation</option>

  
 
        </select>
 
      
        <label for="fname">
            First Name *</label>
        <input id="fname" type="text" class="required" name="fname" value="<?php echo $row->fname; ?>" />
        <label for="lname">
            Last Name *</label>
        <input id="lname" name="lname" type="text" class="required" value="<?php echo $row->lname; ?>" />
<label for="email">
            Email *</label>
        <input id="email" type="text" name="email" class="required email" value="<?php echo $row->email; ?>" />
        <label for="address">
            Address *</label>
        <textarea id="address" name="address"  cols="40" rows="4" class="required" value=""><?php echo $row->address; ?></textarea> 
        <label for="contact">
            Contact *</label>
             <input id="contact" type="text" name="contact" class="required digits" value="<?php echo $row->contact; ?>" />
<label for="emergencyno">
            Emergency No. *</label>
             <input id="emergencyno" type="text" name="emergencyno" class="required digits" value="<?php echo $row->emergencyno; ?>" />
<label for="designation">
            Designation *</label>
             <input id="designation" name="designation" type="text" class="required " value="<?php echo $row->designation; ?>" />
<label for="dob">
            Date of Birth *</label>
            
        <?php
        
           $datetime = strtotime($row->dob);
           $mysqldate = date("Y-m-d", $datetime);
   
   ?>
             <input id="dob" type="text" class="required" name="dob" value="<?php echo $mysqldate; ?>" style="width:100px; display:inline" />
        <label for="department">Department *</label>
             <select id="department" class="required" name="department"><option selected="selected" value="">-----Select Department-----</option>
             <?php               
        
     $qdep = "Select * from department";
     $rdep = mysql_query($qdep, $link_identifier = $connection);
     if($rdep)
     {
       while($rowdep = mysql_fetch_array($rdep))
       {
       	if($rowdep['depid'] == $row->department)
       	 {
       	 echo '<option value="'.$rowdep['depid'].'" selected="selected">'.$rowdep['depname'].'</option>';
          } 
          else {
          		 echo '<option value="'.$rowdep['depid'].'">'.$rowdep['depname'].'</option>';
          }
       }  	
     	}   
        

  
  ?> 
             
             </select>

        <div class="clear" style="padding-top:5px;"></div>
        
        <div class="buttons" style="padding-left:145px;">
   		 <button type="submit" class="positive" name="save" id="save"><img src="images/apply2.png" alt=""/>Update</button>
      	 <a href="javascript:;" id="reset" class="negative"><img src="images/cross.png" alt=""/>Cancel</a>
		 </div>
         
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        
                
         </form>
         
<?php
		}
	}
      
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