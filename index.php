<?
include ('_config.php');

$CONTENT['title'] = "Bonvio";

//TEXT
$sql = "SELECT `position`,`text` FROM `mandarinko_text`";
$r = mysql_query($sql);
for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
foreach($data as $el)$TEXT[$el['position']] = stripslashes($el['text']);

ob_start();

if ($URL[2]=='main') {
	include('tpl/404.php');
} elseif ($URL[1]=='') { 
	include('tpl/main.php');
} elseif ($URL[1]=='market') {
	include('tpl/catalog.php');



} elseif ($URL[1]=='about') {
	include('tpl/about.php');

} elseif ($URL[1]=='foto') {
	include('tpl/foto.php');
} elseif ($URL[1]=='page') {
	include('tpl/page.php');
} elseif ($URL[1]=='basket') {
	include('tpl/basket.php');
} elseif ($URL[1]=='order') {
	include('tpl/order.php');
} elseif ($URL[1]=='search') {
	include('tpl/search.php');
  elseif ($URL[1]=='feedback') {
    include('tpl/feedback.php');
} elseif ($URL[1]=='test') {
	include('tpl/test.php');

/*
} elseif (substr($URL[1],0,5)=='page-') {
	include('tpl/page-other.php');
*/
	
} else {
	include('tpl/404.php');
}


$CONTENT['text']   = ob_get_contents();
ob_clean();

include('main.tpl');
?>