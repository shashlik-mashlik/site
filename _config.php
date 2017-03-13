<?php

//DATABASE
$dbuser  = "shashlld_sm";
$dbname  = "shashlld_sm";
$dbpass  = "passwordshlk";//u
$dbhost  = "localhost";

mysql_connect($dbhost, $dbuser, $dbpass)
               or die ("Could not connect: ".mysql_error());
mysql_select_db($dbname);
mysql_query("set names utf8");

ob_start();
ob_start("ob_gzhandler", 1);
session_start();


if(strpos($_SERVER['REQUEST_URI'],'?')) $finish = strpos($_SERVER['REQUEST_URI'],'?');
	else $finish = strlen($_SERVER['REQUEST_URI']);
$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'],0,$finish);
$URL = explode ('/',mysql_real_escape_string($_SERVER['REQUEST_URI']));

//include($_SERVER['DOCUMENT_ROOT'].'/function.php');

?>
