<?php ob_start(); ?>
<?php
include_once 'login.class.php';
$securearea = new Login();
$response = $securearea->session_check();
ini_set('session.gc_maxlifetime', 86400);
ini_set('date.timezone', 'Asia/Calcutta');

$nomid = $_GET['nomid'];
$action = $_GET['action'];

if($nomid)
{
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

			if($action == 'delete')
			{
			$sqldel = "DELETE FROM nominations where nomid = '$nomid' ";
			$resdel = mysql_query($sqldel)or die(mysql_error());
			if($resdel)
				{
				header('location:nominations.php?sessid='.$_SESSION['sessid'].'&mess=success');
				}
				else
				{
				exit();	
				}
}




		if($action == 'unselect')
		{
		$sql = "UPDATE nominations SET result='' where nomid = '$nomid' ";
		$res = mysql_query($sql)or die(mysql_error());
		}
		else
		{
		$sql = "UPDATE nominations SET result='Selected' where nomid = '$nomid' ";
		$res = mysql_query($sql)or die(mysql_error());
		}
		if($res)
			{
			header('location:nominations.php?sessid='.$_SESSION['sessid'].'&mess=success');
			}
		}
		else
		{
		exit();
		}



?>
<?php ob_flush(); ?>