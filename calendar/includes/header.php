<?php
ini_set("session.cache_expire","86400");
ini_set('session.gc_maxlifetime', '86400');

?>

<!-- start logo -->
<div id="logo"> <img src="http://trilasoft.com/images/logo.png" alt="TrilaSoft" title="TrilaSoft"  />
  <div class="clear"></div>
</div>
<!-- end logo -->
 <div class="right_header">
<?php 
if(isset($response)) 
{

$empid = $response;
$sql = "Select *from `employee` where `username` = '$empid'";
$res=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_object($res);

echo "Welcome " . $row->fname." ".$row->lname.", " ;
?>

<a href="changepass.php?sessid=<?php echo $_SESSION['sessid']; ?>" class="settings">Change Password</a> | <a href="index.php?val=0" class="logout">Logout</a>
</div>


<?php
}
else{ 
header('Location:index.php');
}
?>