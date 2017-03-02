<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ajax/config.php';

$response[0] = $_SESSION['cart_coast'];
foreach ($_SESSION['products'] as $key => $value) {
	$q = "SELECT name FROM `mandarinko_catalog_item` WHERE id='$key'";
    $r = mysql_fetch_assoc(mysql_query($q));

	$response[] = [
    	"id" => $key,
    	"name" => $r['name'],
    	"coast" => $_SESSION['products'][$key]['coast'],
    	"count" => $_SESSION['products'][$key]['count']
    ];
}

echo json_encode($response);
?>