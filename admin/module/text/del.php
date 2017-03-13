<?
if($_GET['delete'] AND $_SESSION['status'] == 'superadmin') {	$sql = "DELETE FROM `mandarinko_text` WHERE `id` = '".mysql_real_escape_string($_GET['delete'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL TEXT'.$sql);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
} else {	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;

}


?>