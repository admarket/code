<?php 
// $link = mysql_connect('hostname','dbuser','dbpassword'); 
// if (!$link) { 
// 	die('Could not connect to MySQL: ' . mysql_error()); 
// } 
// echo 'Connection OK'; mysql_close($link); 
// ereg(pattern, string);
?> 
<?php
$date="2012-02-02";
if (ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $date, $regs)) {
    echo "$regs[3].$regs[2].$regs[1]";
} else {
    echo "Invalid date format: $date";
}
?> 