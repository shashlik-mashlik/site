<h1>Настройки сайта</h1>

<?//ADMIN EMAIL
if($_SESSION['status'] != 'superadmin') {
	die('NOT ACCESS');
}


$CONTENT['title'] .= 'Настройки сайта';

if($_POST['email']) {	$sql = "UPDATE `mandarinko_base` SET `value` = '".mysql_real_escape_string($_POST['email'])."' WHERE `param` = 'email'";
	mysql_query($sql) or die('DB ERROR: CAN\'T UPDATE EMAIL');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/?changemail=1&'.time());
	exit;
}


if($_POST['login'] AND $_POST['pwd']) {	$sql = "UPDATE `mandarinko_base` SET `value` = '".mysql_real_escape_string($_POST['login'])."' WHERE `param` = 'admin_login'";
	mysql_query($sql) or die('DB ERROR: CAN\'T UPDATE LOGIN');
	$sql = "UPDATE `mandarinko_base` SET `value` = '".mysql_real_escape_string($_POST['pwd'])."' WHERE `param` = 'admin_pwd'";
	mysql_query($sql) or die('DB ERROR: CAN\'T UPDATE PWD');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/?changepwd=1&'.time());
	exit;
}

?>
<form action="" method="post">
<b>E-mail</b> <input name="email" value="<?=$admin_data['email'];?>">
<input type="submit" name="changeemail" value="Сменить e-mail">
<?if($_GET['changemail']) {?><img src="/<?=$URL[1];?>/img/ico_ok.png"><?}?>
</form>
<br>

<form action="" method="post">
<b>Доступ администратора</b>
<table>
	<tr>
		<td>Логин:</td><td><input name="login" value="<?=$admin_data['admin_login'];?>"></td>
		<?if($_GET['changepwd']) {?><td rowspan="3"><img src="/<?=$URL[1];?>/img/ico_ok.png"></td><?}?>
	</tr>
	<tr>
		<td>Пароль:</td><td><input name="pwd"   value="<?=$admin_data['admin_pwd'];?>"></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input type="submit" name="changepwd" value="Сменить доступы"></td>
	</tr>
</table>

</form>