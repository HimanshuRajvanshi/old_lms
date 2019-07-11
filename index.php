<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/home/trilasoft93324/intranet.trilasoft.com');

include_once 'login.class.php';
$obj = new Login();
if(isset($_GET['val']) && $_GET['val'] == '0') {
	$obj->logout();
}

if(isset($_COOKIE['trilauser'])&&($_COOKIE['trilapass'])&&($_COOKIE['type'])&&($_COOKIE['empid'])){

	 $qry=mysql_query("select * from employee where username='".$_COOKIE['trilauser']."' and password='".$_COOKIE['trilapass']."' and userstatus = 'active'") or DIE(MYSQL_ERROR());
	 
	   if(mysql_num_rows($qry)!=0){
            $_SESSION['username'] = $_COOKIE['trilauser'];
            $_SESSION['permission'] = 'yes';
	    $rowempl = mysql_fetch_object($qry);
	    $_SESSION['type'] = $_COOKIE['type'];
	    $_SESSION['empid'] = $_COOKIE['empid'];
	   
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
			<div id="login-form">
			 <?php if(isset($response))
				echo "<div class=\"alert alert-warning\"><img alt=\"negative\" style=\"vertical-align:top;\" src=\"images/error.png\"> <strong>" . $response . "</strong></div>"; 
				?>		
			<p>Welcome, Please Login:</p>
			<p><img src="images/images-responsive.png" alt="" class="img-fluid"></p>			
            <form  action="index.php" method="POST">
              <div class="form-group">
                <label for="login-username" class="label-custom">User Name</label>
                <input id="login-username" type="text" name="username" required="">
              </div>
              <div class="form-group">
                <label for="login-password" class="label-custom">Password</label>
                <input id="login-password" type="password" name="password" required="">
              </div>			  
			  <div class="terms-conditions d-flex justify-content-center">
				<input type="checkbox" name="remember" class="form-control-custom" id="login-check" />                
                <label for="login-check">Remember me</label>
              </div>
			  <input type="submit" value="Login" name="submit" class="btn btn-primary"  />	
            </form>
			<small></small><a href="" class="forgot-pass">Forgot Password?</a>
			</div>
			
			 <div id="forgotbox-light" style="min-height:49.5vh;">
				<p>Reset your Password:</p>
				<p><img src="images/images-responsive.png" alt="" class="img-fluid"></p>			 
				<form action="process.php" method="POST">
				<div class="form-group">
                 <label for="register-email" class="label-custom">Email Address</label>
                <input type="text" value="" name="email" required="">
				</div>
				<input type="submit" value="Submit" name="forgotpass" class="btn btn-primary"  />
				</form>
				<small></small><a href="" id="forgot-label" class="back-login-new">Back to login</a>
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