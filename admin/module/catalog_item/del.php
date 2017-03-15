<?

if($_GET['delete']) {

	$sql = "DELETE FROM `mandarinko_catalog_item` WHERE `id` = ".mysql_real_escape_string($_GET['item']);
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL ITEM');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$_GET['item'].'.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$_GET['item'].'_1.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$_GET['item'].'_2.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$_GET['item'].'_3.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$_GET['item'].'.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$_GET['item'].'_1.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$_GET['item'].'_2.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$_GET['item'].'_3.jpg');

	$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `cid` = '".mysql_real_escape_string($_GET['cid'])."'";
	$r = mysql_query($sql);
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
	if(!$data) {
		$sql = "UPDATE `mandarinko_catalog` SET `root`='nd' WHERE `id` = '".mysql_real_escape_string($_GET['cid'])."'";
		mysql_query($sql);
	}

	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?cid='.$_GET['cid']);
	exit;
}


?>