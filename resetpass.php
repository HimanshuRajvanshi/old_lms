<?php
include_once 'login.class.php';

$obj = new Login();

if(isset($_GET['val']) && $_GET['val'] == '0') {
	$obj->logout();
}

if(isset($_COOKIE['trilauser'])&&($_COOKIE['trilapass'])){

	 $qry=mysql_query("select * from employee where username='".$_COOKIE['trilauser']."' and password='".$_COOKIE['trilapass']."'") or DIE(MYSQL_ERROR());
	   if(mysql_num_rows($qry)!=0){
            $_SESSION['username'] = $_COOKIE['trilauser'];
            $_SESSION['permission'] = 'yes';
            $sessid = session_id();
            $_SESSION['sessid']= $sessid; 
               header('location: securearea.php?sessid='.$sessid);            	   	
	   	
	}
}

if(isset ($_POST[submit])) {

       $response = $obj->login_user($_POST['username'],$_POST['password']);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Trilasoft Intranet</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">
<meta name="keywords" content="Trilasoft Solutions Pvt Ltd." />
<!-- Main CSS-->
<link rel="stylesheet" href="css/login-screen.css" type="text/css" media="screen" title="default" />
<!-- Bootstrap CSS-->
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome CSS-->
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
<!-- Google fonts - Roboto -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700"> 
<!-- theme stylesheet-->
<link rel="stylesheet" href="css/login-bs4.css" id="theme-stylesheet">

<!-- Javascript files-->
<script src="vendor/js/jquery-3.2.1.min.js"></script>
<script src="vendor/js/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="js/front.js"></script>	
<!--  jquery core <script src="js/jquery-1.8.1.min.js" type="text/javascript"></script> -->
<script src="js/custom_jquery.js" type="text/javascript"></script>
<link rel="shortcut icon"  href="http://www.trilasoft.com/favicon2.ico" type="image/x-icon" />
<style>
*, ::after, ::before {
    box-sizing:border-box !important;
}
</style>
</head>

<body>
<div class="page login-page">
      <div class="container">	 
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Intranet </span><strong class="text-dark-orange">Trila</strong><strong class="text-primary">Soft</strong></div>          
			
			
			 <div id="" style="min-height:49.5vh;">
				<p>Reset Password:</p>
				<p><img src="images/images-responsive.png" alt="" class="img-fluid"></p>
				 <?php
     ini_set("display_errors", 0);  
    $id= $_GET['id'];
    if(isset($_POST['submit']))
    {
    	
    	if($_POST['password'] == $_POST['confpassword'])
    	{
    		

    		
    		require_once('database.inc.php');
    		$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
         mysql_select_db(DATABASE,$connection);

          $password = trim(md5($_POST['password']));           

         $sql = "UPDATE `trilasof_intranet`.`employee` SET `password` = '".$password."' WHERE `employee`.`empid` = '".$id."'";

    		$res = mysql_query($sql, $link_identifier = $connection)or die(mysql_error());
    		if($res) {
    			echo 'Password has been updated successfully, Please <a href="index.php">login</a>';
    		}
    		
    		else {
    			
    			echo'Passwords could not be updated';
   	     }
         
         	
    	}
    	else {
               echo'Passwords do not match';    		
   		}
    }
    
 
    ?>
				<form action="resetpass.php?id=<?php echo $id;  ?>"  method="POST">					
			  <div class="form-group">
                <label for="" class="label-custom">Password</label>
                <input type="password" name="password"  class="" />
              </div>
			   <div class="form-group">
                <label for="" class="label-custom">Confirm Password</label>
                <input type="password" name="confpassword"    class="" />
              </div>
				<input type="submit" name="submit" class="btn btn-primary"  value="Submit" />				
				</form>	
				
			 </div>			
			
          </div>
          <div class="copyrights text-center">
            <p>Copyright <a href="http://www.trilasoft.com" target="_blank" class="external">TrilaSoft</a></p>            
          </div>
        </div>
      </div>
    </div>
</body>
</html>
