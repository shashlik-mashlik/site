
<?php
	foreach ($_SESSION['products'] as $key=>$value) {$i++;
		$q="SELECT * FROM `mandarinko_catalog_item` WHERE id='".$key."'";
		$product=mysql_fetch_assoc(mysql_query($q));

		$basket = $basket."
					\n__________________________________________________________".
					"\n№ продукта: ".$key.
					"\nнаименование ".$product['name'].
					"\nартикул ".$product['articul'].
					"\nцена ".$product['price'].
					"\nсумма: ".$_SESSION['products'][$key]['count']*$_SESSION['products'][$key]['coast'].
					"\nколичество.: ".$_SESSION['products'][$key]['count'];

		$primary_key = $primary_key.$key;

	}
?>

<?php

$date_today = date("mdy");
$primary_key = $primary_key."-".$date_today."-".time ();

//$email = $_POST['email'];
$subject = "'SHASHLIK-MASHLIK' Заказ №: ".$primary_key." принят.";
$message = "

	<html>
	<head>
	<title>SHASHLIK-MASHLIK</title>
	</head>
	<body>
	<p>Заказ №: ".$primary_key." принят.</p>
	<table>
	<tr>
	<th>Имя заказчика</th>
	<th>Кол-во персон</th>
	<th>Адрес</th>
	<th>Телефон</th>
	<th>Комментарий</th>
	</tr>
	<tr>
	<td>".htmlspecialchars(stripslashes(substr($_POST['name'],0,32)))."</td>
	<td>".htmlspecialchars(stripslashes(substr($_POST['col'],0,32)))."</td>
	<td>".htmlspecialchars(stripslashes(substr($_POST['adrs'],0,32)))."</td>
	<td>".htmlspecialchars(stripslashes(substr($_POST['tel'],0,32)))."</td>
	<td>".htmlspecialchars(stripslashes(substr($_POST['message'],0,32)))."</td>
	</tr>
	</table>
	<hr>
	<p>общая итоговая сумма заказа.: ".$_SESSION['cart_coast']."</p>
	</body>
	</html>
	
";

$msg = "";

//$phonenumber=$_POST['tel'];
//$msg_sms="BONVIO-TRADE | Заказ №: ".$primary_key." принят.";
//include('tpl/register.php');//-------------------------------------------------------------------------------<<<а


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <orders@shashlik-mashlik.com>' . "\r\n";

//$headers .= "Cc: " . $TEXT['email'] . "\r\n";
//$headers .= "Bcc: " . $TEXT['email'] . "\r\n";

if (mail($TEXT['email'].", ".$_POST['email'], $subject, $message, $headers)){
	//@mail($email, $subject, $message, $headers );
	$msg = "<div class='alert alert-warning alert-dismissable'>Заказ # ".$primary_key." принят!</div>";
}
	

if (!empty($message)){
  $msg .= "";
}

include $_SERVER['DOCUMENT_ROOT'] . '/admin/module/orders/add.php';

?>