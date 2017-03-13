<?
if($_GET['delete']) {	$sql = "DELETE FROM `mandarinko_admins` WHERE `id` = '".mysql_real_escape_string($_GET['delete'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL ADMIN'.$sql);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


?>