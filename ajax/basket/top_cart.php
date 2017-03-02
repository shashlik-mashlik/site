<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ajax/config.php';

$response = array();
foreach ($_SESSION['products'] as $key => $value) {
	$q = "SELECT price FROM `mandarinko_catalog_item` WHERE id='$key'";
    $r = mysql_fetch_assoc(mysql_query($q));

	$response[] = [
    	"id" => $key,
    	"name" => $r['name'],
    	"coast" => $_SESSION['products'][$key]['coast'],
    	"count" => $_SESSION['products'][$key]['count'],
    	"all_coast" => $_SESSION['cart_coast']
    ];
}
echo json_encode($response);
?>