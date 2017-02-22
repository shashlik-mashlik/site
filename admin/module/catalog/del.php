<?
if($_GET['delete']) {


	$sql = "SELECT `url` FROM `mandarinko_catalog` WHERE `id` = '".mysql_real_escape_string($_GET['delete'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));

	$sql = "DELETE FROM `mandarinko_static` WHERE `url` = '".$r['url']."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL PAGE'.$sql);
	
	/*
	Место сдается под каскадное удаление каталога
	*/
		
	$sql = "SELECT `pid` FROM `mandarinko_catalog` WHERE `id` = '".mysql_real_escape_string($_GET['delete'])."'";
	$pid = mysql_fetch_assoc(mysql_query($sql));	
		
	$sql = "DELETE FROM `mandarinko_catalog` WHERE `id` = '".mysql_real_escape_string($_GET['delete'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL CATEGORY');
	
	$sql = "SELECT * FROM `mandarinko_catalog` WHERE `pid` = '".$pid['pid']."'";
	$r = mysql_query($sql);
	for($cat=array();$row=mysql_fetch_assoc($r);$cat[]=$row);
	if(!$cat) {
		$sql = "UPDATE `mandarinko_catalog` SET `root`='nd' WHERE `id` = '".$pid['pid']."'";
		mysql_query($sql);
	}
	
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


?>
