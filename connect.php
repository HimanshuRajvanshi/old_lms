<?php
$link = mysql_connect('testintranet', 'root', 'execellent');
error_reporting(E_ALL ^ E_DEPRECATED);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);

phpinfo();
?>
