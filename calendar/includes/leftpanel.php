<?php 
if(isset($response)) 
{
	$sessid = $_SESSION['sessid'];
	include_once('functions.php');
	
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  `employee` where username = '".$_SESSION['username']."'", $connection) or die(mysql_error());
	

	$row = mysql_fetch_object($result);
	
	
?>
<div class="sidebarmenu">


 
                  <?php
if($row->type == '1')
	{
    
	
?>

 
              <a class="menuitem" id="home" href="securearea.php?sessid=<?php echo $sessid; ?>">Home</a>
                <a class="menuitem submenuheader" href="">User Management</a>
                <div class="submenu">
                    <ul>
                
                    <li><a href="addemployee.php?sessid=<?php echo $sessid; ?>" id="">Add New Employee</a></li>
                      <li><a href="viewemployee.php?sessid=<?php echo $sessid; ?>" id="">View Employees</a></li>
                   
                 
                    </ul>
                      </div>
                         <a class="menuitem submenuheader" href="">Leave Management</a>
                      
                        <div class="submenu">
                      
                
                    <ul>
                    <li><a href="leaveapply.php?sessid=<?php echo $sessid; ?>" id="apply">Apply Leave</a></li>
                      <li><a href="viewleave.php?sessid=<?php echo $sessid; ?>" id="viewleave">View Leaves</a></li>
					   <li><a href="leavereport.php?sessid=<?php echo $sessid; ?>" id="viewleave">Leaves Report</a></li>
                   
                    </ul>
             </div>
                <a class="menuitem" id="home" href="leavecalendar.php?sessid=<?php echo $sessid; ?>">Leave Calendar</a>
                    <a class="menuitem submenuheader" id="home" href="">Leave Entitlement</a>
                     <div class="submenu"> 
                    <ul>
                
                    <li><a href="leaveentitle.php?sessid=<?php echo $sessid; ?>" id="">Add New Entitlement</a></li>
                  
                   
                 
                    </ul>
                      </div>
                      
                      <a class="menuitem" id="home" href="registerissue.php?sessid=<?php echo $sessid; ?>">Register an Issue</a>
                        <a class="menuitem" id="home" href="viewissue.php?sessid=<?php echo $sessid; ?>">View/Edit Issues</a>
     <a class="menuitem" id="home" href="viewmyissue.php?sessid=<?php echo $sessid; ?>">View My Issues</a>
<a class="menuitem" id="home" href="attendance.php?sessid=<?php echo $sessid; ?>">View Attendance</a> 
<a class="menuitem" id="home" href="sendrequest.php?sessid=<?php echo $sessid; ?>">Send Request</a>
                        <?php
                   
                }
                
                ?>
                
               
                
                
                
<?php
if($row->type == '2')
	{
		
	
	
?>
 <a class="menuitem" id="home" href="securearea.php?sessid=<?php echo $sessid; ?>">Home</a>
 
              
                         <a class="menuitem submenuheader" href="">Leave Management</a>
                      
                        <div class="submenu">
                      
                
                    <ul>
                    <li><a href="leaveapply.php?sessid=<?php echo $sessid; ?>" id="apply">Apply Leave</a></li>
                      <li><a href="viewleave.php?sessid=<?php echo $sessid; ?>" id="viewleave">View Leaves</a></li>
                   
                    </ul>
             </div>
                   <a class="menuitem" id="home" href="leavecalendar.php?sessid=<?php echo $sessid; ?>">Leave Calendar</a>
                      <a class="menuitem" id="home" href="leavebalance.php?sessid=<?php echo $sessid; ?>">Leave Balance</a>
                       <a class="menuitem" id="home" href="registerissue.php?sessid=<?php echo $sessid; ?>">Register an Issue</a>
                      <?php
                      if($row->department == 8)
                      {
                      ?>
                      <a class="menuitem" id="home" href="viewissue.php?sessid=<?php echo $sessid; ?>">View/Edit Issues</a>
                                         
                     <?php
                     }
                                  ?>
                      
                        <a class="menuitem" id="home" href="viewmyissue.php?sessid=<?php echo $sessid; ?>">View My Issues</a>
                      <a class="menuitem" id="home" href="sendrequest.php?sessid=<?php echo $sessid; ?>">Send Request</a>
                 <?php
                   
                }
                
                ?>
                
            <?php
if($row->type == '3')
	{
		
	
	
?>
 <a class="menuitem" id="home" href="securearea.php?sessid=<?php echo $sessid; ?>">Home</a>
              
                         <a class="menuitem submenuheader" href="">Leave Management</a>
                      
                        <div class="submenu">
                      
                
                    <ul>
                    <li><a href="leaveapply.php?sessid=<?php echo $sessid; ?>" id="apply">Apply Leave</a></li>
                      <li><a href="viewleave.php?sessid=<?php echo $sessid; ?>" id="viewleave">View Leaves</a></li>
                    <li><a href="leavereportrm.php?sessid=<?php echo $sessid; ?>" id="leavereport">Leaves Report</a></li>
                    </ul>
             </div>
                   <a class="menuitem" id="home" href="leavecalendar.php?sessid=<?php echo $sessid; ?>">Leave Calendar</a>
                     <a class="menuitem" id="home" href="leavebalance.php?sessid=<?php echo $sessid; ?>">Leave Balance</a>
                      <a class="menuitem" id="home" href="registerissue.php?sessid=<?php echo $sessid; ?>">Register an Issue</a>
     <a class="menuitem" id="home" href="viewmyissue.php?sessid=<?php echo $sessid; ?>">View My Issues</a>
      <a class="menuitem" id="home" href="sendrequest.php?sessid=<?php echo $sessid; ?>">Send Request</a>  
	 
                 <?php
                   
                }
                
                ?>    
                
     <?php
if($row->type == '4')
	{
    
	
?>

 
              <a class="menuitem" id="home" href="securearea.php?sessid=<?php echo $sessid; ?>">Home</a>
                <a class="menuitem submenuheader" href="">User Management</a>
                <div class="submenu">
                    <ul>
                
                    <li><a href="addemployee.php?sessid=<?php echo $sessid; ?>" id="">Add New Employee</a></li>
                      <li><a href="viewemployee.php?sessid=<?php echo $sessid; ?>" id="">View Employees</a></li>
                   
                 
                    </ul>
                      </div>
                         <a class="menuitem submenuheader" href="">Leave Management</a>
                      
                        <div class="submenu">
                      
                
                    <ul>
                    <li><a href="leaveapply.php?sessid=<?php echo $sessid; ?>" id="apply">Apply Leave</a></li>
                      <li><a href="viewleave.php?sessid=<?php echo $sessid; ?>" id="viewleave">View Leaves</a></li>
					    <li><a href="leavereport.php?sessid=<?php echo $sessid; ?>" id="viewleave">Leaves Report</a></li>
                   
                    </ul>
             </div>
                <a class="menuitem" id="home" href="leavecalendar.php?sessid=<?php echo $sessid; ?>">Leave Calendar</a>
                    <a class="menuitem submenuheader" id="home" href="">Leave Entitlement</a>
                     <div class="submenu"> 
                    <ul>
                
                    <li><a href="leaveentitle.php?sessid=<?php echo $sessid; ?>" id="">Add New Entitlement</a></li>
                     
                   
                 
                    </ul>
                      </div>
<a class="menuitem" id="home" href="addbook.php?sessid=<?php echo $sessid; ?>">Add Books</a>
<a class="menuitem" id="home" href="adddatacard.php?sessid=<?php echo $sessid; ?>">Add Datacard</a>
<a class="menuitem" id="home" href="broadcast.php?sessid=<?php echo $sessid; ?>">Send Broadcast Message</a>
<a class="menuitem" id="home" href="sendrequest.php?sessid=<?php echo $sessid; ?>">Send Request</a>
<a class="menuitem" id="home" href="viewrequest.php?sessid=<?php echo $sessid; ?>">View Requests</a>
                                <a class="menuitem" id="home" href="registerissue.php?sessid=<?php echo $sessid; ?>">Register an Issue</a>
     <a class="menuitem" id="home" href="viewmyissue.php?sessid=<?php echo $sessid; ?>">View My Issues</a>
           <a class="menuitem" id="home" href="attendance.php?sessid=<?php echo $sessid; ?>">View Attendance</a>           
                 

                        <?php
                   
                }
                
                ?>                 
                
               <a class="menuitem" id="home" href="askhr.php?sessid=<?php echo $sessid; ?>">Ask HR</a>  
     <a class="menuitem" id="home" href="infosecpolicy.php?sessid=<?php echo $sessid; ?>">Info Security Policy</a>  
	 
	   <a class="menuitem" id="home" href="documents.php?sessid=<?php echo $sessid; ?>">Documents</a>  
	   
	  
                
             </div>
<?php
}
else {
	header('Location:index.php');
}
?>              
               
                    
          