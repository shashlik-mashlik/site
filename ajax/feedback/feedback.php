<?php
/**
 * Created by PhpStorm.
 * User: kilohertz
 * Date: 09.03.17
 * Time: 11:50
 */
include $_SERVER['DOCUMENT_ROOT'] . '/ajax/config.php';
if ($_POST['type'] == 'show') {}

/*
$q = "SELECT `date`, `name`, `text` FROM `feedback` LIMIT 5";
$r = mysql_fetch_assoc(mysql_query($q));
$response = array();
while ($row = $r) {
    $response[] = ['text' => $row['text'], 'name' => $row['name'], 'date' => $row['date']];
}
echo json_encode($response);
*/

$sql = "INSERT INTO `feedback` SET `name` = '" . $_POST['name'] . "', `email` = '" . $_POST['email'] . "', `text` = '" . $_POST['text'] . "', `phone` = '" . $_POST['phone'] . "'";
echo json_encode(["status" => mysql_query($sql)]);
?>