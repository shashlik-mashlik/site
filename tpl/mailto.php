




								<?
							

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

$email = $_POST['email'];
$subject = "'SHASHLIK-MASHLIK' Заказ №: ".$primary_key." принят.";
$message = "Имя заказчика: ".htmlspecialchars(stripslashes(substr($_POST['name'],0,32))).
			"\nКол-во персон :" .htmlspecialchars(stripslashes(substr($_POST['col'],0,32))).
			"\nАдрес: ".htmlspecialchars(stripslashes(substr($_POST['adrs'],0,32))). 
			"\nтел.: ".htmlspecialchars(stripslashes(substr($_POST['tel'],0,32))). 
			"\nКомментарий: ".htmlspecialchars(stripslashes(substr($_POST['message'],0,32)))."
			".$basket."
			\n__________________________________________________________
			\nобщая итоговая сумма заказа.: ".$_SESSION['cart_coast']."
			\n__________________________________________________________
			\nномер заказа: ".$primary_key;

$msg = "";


	//$phonenumber=$_POST['tel'];
	//$msg_sms="BONVIO-TRADE | Заказ №: ".$primary_key." принят.";
	//include('tpl/register.php');//-------------------------------------------------------------------------------<<<а



$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
//$headers .= "From:\r\n";
/* дополнительные шапки */
$headers .= "From: SHASHLIK-MASHLIK hertz@cybek.ru\r\n"; //" . $TEXT['email'] . "
//$headers .= "Cc: " . $TEXT['email'] . "\r\n";
//$headers .= "Bcc: " . $TEXT['email'] . "\r\n";
	if (mail($TEXT['email'], $subject, $message, $headers)){
		@mail($email, $subject, $message, $headers );
    	$msg = "<div class='alert alert-warning alert-dismissable'>
			<b> Сообщение было отправлено! </b> &nbsp&nbsp&nbsp   Заказ # ".$primary_key."</div>";
	}
	

if (!empty($message)){
  $msg .= "";
}

include $_SERVER['DOCUMENT_ROOT'] . '/admin/module/orders/add.php';
?>