




								<?
							

								foreach ($_SESSION['products'] as $key=>$value) {$i++;
									$q="SELECT * FROM `mandarinko_catalog_item` WHERE id='".$key."'";
									$product=mysql_fetch_assoc(mysql_query($q));

								$basket = $basket."
											____________________________".
											"№ продукта: ".$key.
											"\nнаименование ".$product['name'].
											"артикул ".$product['articul'].
											"цена ".$product['price'].
											"сумма: ".$_SESSION['products'][$key]['count']*$_SESSION['products'][$key]['coast'].
											"количество.: ".$_SESSION['products'][$key]['count'];
											
											
											
								$primary_key = $primary_key.$key;										
											
								
								}
								?>




<?php

$date_today = date("mdy");
$primary_key = $primary_key."-".$date_today."-".time ();

$email = $_POST['email'];
$subject = "'SHASHLIK-MASHLIK' Заказ №: ".$primary_key." принят.";
$message = "Имя заказчика: ".htmlspecialchars(stripslashes(substr($_POST['name'],0,32))).". 
			Кол-во персон :" .htmlspecialchars(stripslashes(substr($_POST['col'],0,32))).". 
			Адрес: ".htmlspecialchars(stripslashes(substr($_POST['adrs'],0,32))).". 
			тел.: ".htmlspecialchars(stripslashes(substr($_POST['tel'],0,32))).". 
			Комментарий: ".htmlspecialchars(stripslashes(substr($_POST['message'],0,32)))."
			".$basket."
			________________________________________________________
			общая итоговая сумма заказа.: ".$_SESSION['cart_coast']."
			________________________________________________________
			номер заказа: ".$primary_key;

$msg = "";


	//$phonenumber=$_POST['tel'];
	//$msg_sms="BONVIO-TRADE | Заказ №: ".$primary_key." принят.";
	//include('tpl/register.php');//-------------------------------------------------------------------------------<<<



$headers= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
//$headers .= "From:\r\n";
/* дополнительные шапки */
$headers .= "From: BONVIO-STEAM <bonvio@bonvio.ru>\r\n";
$headers .= "Cc: bonvio@bonvio.ru\r\n";
$headers .= "Bcc: bonvio@bonvio.ru\r\n";
	if (mail($TEXT['test'], $subject, $message, $headers )){
	@mail($email, $subject, $message, $headers );
	//mail("rus.syndicate@gmail.com", $subject, $message, $headers );
	//mail("gva@bonvio.com", $subject, $message, $headers );
    	$msg = "<div class='alert alert-warning alert-dismissable'>
			<b> Сообщение было отправлено! </b> &nbsp&nbsp&nbsp   Заказ # ".$primary_key."</div>";
	}
	

if (!empty($message)){
  $msg .= "";
}
?>