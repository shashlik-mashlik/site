<?
if($_POST['add']) {
	$sql = "INSERT INTO `orders` SET
		`sum`    = '".mysql_real_escape_string($_SESSION['cart_coast'])."',
		`adrs`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['adrs'],0,32))))."',
		`prsns`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['col'],0,32))))."',
		`ord`  =   '".mysql_real_escape_string($basket)."',
		`phone`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['tel'],0,32))))."',
		`email`  =   '".mysql_real_escape_string(isset($email) ? $email : '')."',
		`comment`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['message'],0,32))))."',
		`name`    = '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['name'],0,32))))."'";
	echo $sql;
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE GALLERY');
	//header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	//exit;
}
?>