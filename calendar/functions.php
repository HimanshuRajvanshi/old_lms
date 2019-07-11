<?php
require_once('database.inc.php');


function getdepartment() {
$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

 $result = mysql_query("SELECT * FROM department", $connection) or die(mysql_error());
while($row = mysql_fetch_array($result))
{ 
 echo '<option value='.$row['depid'].'>'.$row['depname'].'</option>';
 } 
}

function getgroup() {
	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);
mysql_select_db(DATABASE,$connection);

	$result = mysql_query("SELECT * FROM  usergroup ", $connection) or die(mysql_error());
while($row = mysql_fetch_array($result))
{ 
 echo '<option value='.$row['groupid'].'>'.$row['groupname'].'</option>';
 } 
}


function hourmin($hid = "hour", $mid = "minute", $pid = "pm", $hval = "", $mval = "", $pval = "")
{
	if(empty($hval)) $hval = date("h");
	if(empty($mval)) $mval = date("i");
	if(empty($pval)) $pval = date("a");

	$hours = array(12, 1, 2, 3, 4, 5, 6, 7, 9, 10, 11);
	$out = "<select name='$hid' id='$hid'>";
	foreach($hours as $hour)
		if(intval($hval) == intval($hour)) $out .= "<option value='$hour' selected>$hour</option>";
		else $out .= "<option value='$hour'>$hour</option>";
	$out .= "</select>";

	$minutes = array("00", 15, 30, 45);
	$out .= "<select name='$mid' id='$mid'>";
	foreach($minutes as $minute)
		if(intval($mval) == intval($minute)) $out .= "<option value='$minute' selected>$minute</option>";
		else $out .= "<option value='$minute'>$minute</option>";
	$out .= "</select>";
	
	$out .= "<select name='$pid' id='$pid'>";
	$out .= "<option value='am'>am</option>";
	if($pval == "pm") $out .= "<option value='pm' selected>pm</option>";
	else $out .= "<option value='pm'>pm</option>";
	$out .= "</select>";
	
	return $out;
}

?>
