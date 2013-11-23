<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'toor';
$dbname = 'easyask';
$mysql = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$mysql) {
    die('MySQL connection fail');
}
$db = mysql_select_db($dbname, $mysql);
if (!$db) {
    die("Can't connect to database");
}

?>
