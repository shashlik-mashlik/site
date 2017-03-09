<?
$sql = "SELECT `status` FROM `orders` WHERE `id` = " . $_GET['id'];
$r = mysql_fetch_assoc(mysql_query($sql));
if ($r['status'] == 'ready') {
    mysql_query("UPDATE `orders` SET `status` = 'expected' WHERE `id`=" . $_GET['id']);
} else {
    mysql_query("UPDATE `orders` SET `status` = 'sent' WHERE `id`=" . $_GET['id']);
}
Header('Location: /admin/module/orders');
?>