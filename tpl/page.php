<?
if ($URL[2]!='') {
	
	$sql = "SELECT * FROM `mandarinko_static` WHERE `url` = '".mysql_real_escape_string($URL[2])."'";
	$r = mysql_query($sql);
	if (mysql_num_rows($r)==1) {
		$r = mysql_fetch_assoc($r);// http://example.org/page/name
		
		$CONTENT['title'] .= " - ".$r['header'];
		
		$CONTENT['metak'] = $r['metakey'];
		$CONTENT['metad'] = $r['metadesc'];
		?>

		
		<?
		echo stripslashes($r['text']);
		?>

		
		<?
	} else {
		include('tpl/404.php');
	}
} else {
	include('tpl/404.php');
}

?>
