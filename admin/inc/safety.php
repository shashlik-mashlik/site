<?if($_SESSION['status'] == 'superadmin'){?>
	<br><b>Приветствую, мой господин!</b><br>
	Режим супербога активирован, вы можете творить, повелитель! Я в вашем распоряжении.


<?} else {?>
	<b>Система безопасности.</b><br>
	Последний вход в систему: <b><?=date('H:i d.m.Y',$_SESSION['admin_data']['login_last_time']);?></b><br>
	IP: <b><?=$_SESSION['admin_data']['login_now_ip'];?></b>
	<?//CHECK LAST IP
	if($_SESSION['admin_data']['login_last_ip'] != $_SESSION['admin_data']['login_now_ip']) {?>
		<a class="tooltip" title="Внимание!<br> В прошлый раз ваш<br> IP был <?=$_SESSION['admin_data']['login_last_ip'];?><br>Сейчас <?=$_SESSION['admin_data']['login_now_ip'];?> "><img src="/<?=$URL[1];?>/img/ico_alarm.gif"></a>
	<?}?>

	<?//CHECK VERSION :: UPDATE FROM SERVER
	if(!$_SESSION['admin']['version']) {		$tmp = file_get_contents('http://bonvio.ru/lastversion');
		$_SESSION['admin']['version'] = $tmp;
	}
	//CHECK VERSION :: CHECK
	if($_SESSION['admin']['version']==$admin_data['version']) {?>
		<br>У вас установлена самая свежая версия ПО. Ваша система <b>безопасна</b>.
	<?}else {?>
		<br>Ваша система <b style="color:red">требует обновления</b>. Обратитесь к разработчикам.
	<?}?>
<?}?>