<?
echo $_GET['id'];
$sql = "SELECT `status` FROM `orders` WHERE `id` = " . $_GET['id'];
$r = mysql_fetch_assoc(mysql_query($sql));
echo var_dump($r);
//echo mysql_ping();
//if ($r['status'] == 'ready') {
//    mysql_query("UPDATE `orders` SET `status` = 'expected'");
//} else {
//    mysql_query("UPDATE `orders` SET `status` = 'sent'");
//}
//Header('Location: /admin/module/orders');
?>