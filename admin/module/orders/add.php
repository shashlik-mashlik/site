<?
//if($_POST['add']) {
$order = array();
foreach ($_SESSION['products'] as $key=>$value) {
    $q = "SELECT * FROM `mandarinko_catalog_item` WHERE id='" . $key . "'";
    $product = mysql_fetch_assoc(mysql_query($q));
    $order[] = ["id" => $key, "Наименование" => $product['name'], "Цена" => $product['price'], "Сумма" => $_SESSION['products'][$key]['count'] * $_SESSION['products'][$key]['coast'], "Количество" => $_SESSION['products'][$key]['count']];
}

	$sql = "INSERT INTO `orders` SET
		`sum`    = '".mysql_real_escape_string($_SESSION['cart_coast'])."',
		`adrs`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['adrs'],0,32))))."',
		`prsns`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['col'],0,32))))."',
		`ord`  =   '".mysql_real_escape_string(json_encode($order))."',
		`phone`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['tel'],0,32))))."',
		`email`  =   '".mysql_real_escape_string(isset($email) ? $email : '')."',
		`comment`  =   '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['message'],0,32))))."',
		`name`    = '".mysql_real_escape_string(htmlspecialchars(stripslashes(substr($_POST['name'],0,32))))."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE GALLERY');
	//header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	//exit;
//}
?>