<?php

$dbuser  = "antondtl_sm";
$dbname  = "antondtl_sm";
$dbpass  = "y3l0l3k0r";
$dbhost  = "antondtl.beget.tech";

mysql_connect($dbhost, $dbuser, $dbpass) or die ("Could not connect: ".mysql_error());
mysql_select_db($dbname);
mysql_query("set names utf8");

session_start();

?>