<?php
include $_SERVER['DOCUMENT_ROOT'] . '/ajax/config.php';

$response = array();
foreach ($_SESSION['products'] as $key => $value) {
	$response[] = [
    	"id" => $key,
    	"coast" => $_SESSION['products'][$key]['coast'],
    	"count" => $_SESSION['products'][$key]['count'],
    	"all_coast" => $_SESSION['cart_coast']
    ];
}
echo json_encode($response);
?>