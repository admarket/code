<?php 
$link = mysql_connect('admarket.mysql.rds.aliyuncs.com','eadmarket','1admarket'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo 'Connection OK'; mysql_close($link); 
?> 