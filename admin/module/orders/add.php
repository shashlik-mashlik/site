<?
if($_POST['add']) {
	$sql = "INSERT INTO `orders` SET
		`about`    = '".mysql_real_escape_string($_POST['about'])."',
		`name`    = '".mysql_real_escape_string($_POST['name'])."'";		
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE GALLERY');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}
?>