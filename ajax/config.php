<?php

//DATABASE
$dbuser  = "shashlld_sm";
$dbname  = "shashlld_sm";
$dbpass  = "123456";//u
$dbhost  = "localhost";

mysql_connect($dbhost, $dbuser, $dbpass) or die ("Could not connect: ".mysql_error());
mysql_select_db($dbname);
mysql_query("set names utf8");

session_start();

?>