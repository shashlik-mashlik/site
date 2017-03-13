<?
if ($_GET['act'] == 'del') {
    mysql_query("DELETE FROM `feedback` WHERE `id`=" . $_GET['id']);
} elseif ($_GET['act'] == 'add') {
    mysql_query("UPDATE `feedback` SET `status` = 1 WHERE `id`=" . $_GET['id']);
}

Header('Location: /admin/module/feedback');
?>
