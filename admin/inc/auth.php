<?
//Если кука стоит, то проверим авторизацию
if($_COOKIE['isadmin']) {

	$sql = "SELECT * FROM `mandarinko_base`";
	$r = mysql_query($sql) or die('DB ERROR: EXTRACT ADMIN DATA');
	for($tmp=array();$row=mysql_fetch_assoc($r);$tmp[]=$row);
	foreach($tmp as $el) $ADMIN_DATA[$el['param']] = $el['value'];

	if($_COOKIE['isadmin'] === md5($ADMIN_DATA['admin_pwd'].'itissalt')) $_SESSION['loggin'] = 1;
	header('Location: /'.$URL[1]);
	exit;

}

$token = $admin_data['tokenAuth'];

if(($_POST['login'] AND $_POST['pwd']) OR ($_POST['pwd'] AND $token)) {
	//Проверим IP из базы - можно ли ему логиниться

		//Если никуда не залогинились, то запишем IP в базу
		$sql =  "INSERT INTO `mandarinko_login` SET `ip` = '".$_SERVER['REMOTE_ADDR']."', `time` = ".time();
		mysql_query($sql);
		//Сначала почистим базу от "старых" IP
        $sql = "DELETE FROM `mandarinko_login` WHERE `time` < ".(time()-$admin_data['login_time']);
        mysql_query($sql) or die($sql);
		//а теперь проверим
		$sql = "SELECT COUNT(*) FROM `mandarinko_login` WHERE `ip` = '".$_SERVER['REMOTE_ADDR']."'";
		$r = mysql_fetch_array(mysql_query($sql));
		if ($r[0]>=$admin_data['login_count']) {			header('Location: /'.$URL[1]."?timeout=1");
			exit;
		}
	//проверяем - вдруг это суперадмин! о_О	
	//проверка по токенам
	if($token) {
		$loggedin['asadmin'] = file_get_contents('http://bonvio.ru/control/checkAdmin.php?pwd='.$_POST['pwd'].'&token='.$token);		
	}
	//проверка, если токены выключены, либо мы уже зашли по токену
	if ($loggedin['asadmin']=='1' || ($admin_data['admin_login'] == $_POST['login'] AND $admin_data['admin_pwd'] == $_POST['pwd'])) {		//Авторизация ОК
		$_SESSION['isadmin'] = 1;
		$_SESSION['status'] = 'superadmin';
		//Сохраним данные
  		$f = fopen('db/login.php','a+');
		fwrite($f,date('d.m.Y H:i')." --- ".$_SERVER['REMOTE_ADDR']." - as SUPERADMIN\r\n");
		fclose($f);
		//Cookie
		setcookie('isSuperAdmin',md5($_POST['pwd'].'itissalt'),time()+3600*24,'/');
		//Ушли на фронт
		header('Location: /'.$URL[1]);
		exit;
	}

	//проверяем среди простых смертных
	if($token AND $_POST['pwd']) {
	//необычный логин 
		//вытащили всех
		$sql = "SELECT * FROM `mandarinko_admins`";
		$r = mysql_query($sql);
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		
		//проверяем, совпадет ли хоть с кем-нибудь
		foreach($data as $el) {
			$cnt = $el['token_cnt'];
			$secret = $el['token_seed'];
			$pass = $_POST['pwd'];
			
			$hotp = new cHotp();
			$cur_cnt = $hotp->authOTP($secret, $pass, $cnt, $token);
			
			if($cur_cnt) {
				//зашли, круто, блин
				$loggedin['asuser'] = $el['id'];
				$cnt = $cur_cnt;
				break;
			}
		}
			
		if($loggedin['asuser']) {	
			//обновили пользователю счетчик в базе, все довольны и машут флажками
			$sql = "UPDATE `mandarinko_admins` SET `token_cnt` = '".$cnt."' WHERE `id` = '".$el['id']."'";
			mysql_query($sql);
		}
		
	}
	if($loggedin['asuser'] || ($_POST['login'] AND $_POST['pwd'])) {
		//обычный логин, либо мы только что зашли по токену
		if($loggedin['asuser']) {
			$sql = "SELECT * FROM `mandarinko_admins` WHERE `id`='".$loggedin['asuser']."'";
		} else {
			$sql = "SELECT * FROM `mandarinko_admins` WHERE `email` = '".mysql_real_escape_string($_POST['login'])."' AND `pass` = '".mysql_real_escape_string($_POST['pwd'])."'";
		}
		
		$user = mysql_query($sql) or die($sql);
		
	}
	if ($user && mysql_num_rows($user)==1) {	
		$user = mysql_fetch_array($user);
		//Авторизация ОК
		$_SESSION['isadmin'] = $user['id'];
		$_SESSION['status'] = 'admin';
		$_SESSION['rights'] = $user['rights'];
		$_SESSION['admin_data'] = $user;

		//Сохраним данные
		$f = fopen('db/login.php','a+');
		fwrite($f,date('d.m.Y H:i')." --- ".$_SERVER['REMOTE_ADDR']." - as ".$user['email']."\r\n");
		fclose($f);
		//Cookie
		setcookie('isAdmin',md5($_POST['pwd'].'itissalt'),time()+3600*24,'/');
		//Данные для входа
		$sql = "UPDATE `mandarinko_admins` SET
				`login_last_time` = `login_now_time`,
				`login_last_ip`   = `login_now_ip`,
				`login_now_time`  = '".time()."',
				`login_now_ip`    = '".$_SERVER['REMOTE_ADDR']."'
			WHERE `id` = ".$_SESSION['isadmin'];
		mysql_query($sql) or die('DB ERROR: Enter data error \r\n'.$sql);

		//Ушли на фронт
		header('Location: /'.$URL[1]);
		exit;
	}
	
   	$ERROR = 1;
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>Авторизация в системе</title>
	<link href="/<?=$URL[1];?>/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrap">
	<div id="login">
		<div id="helper">
		
		<!--
		<img id="hlogin" src="/<?=$URL[1];?>/img/helper/login.png"></div>
		<img src="/<?=$URL[1];?>/img/logo<?=$admin_data['version'];?>.png">
		-->
		<a style="padding: 0px; " href="http://www.bonvio.net" id="logo">
			<img width="220" src="/<?=$URL[1];?>/img/logo.png"></a>
		</br></br></br>
		
		<form action="" method="post" name="authform"<?if($token){?>style="margin-bottom:50px;"<?}?>>
			<table>
				<?if(!$token){?><tr><td>Логин</td> <td><input <?if($ERROR){?> class="error"<?}?> name="login"></td></tr><?}?>
				<tr><td>Пароль</td><td><input <?if($ERROR){?> class="error"<?}?> type="password" name="pwd"  ></td></tr>
				<tr><td colspan="2"><a href="#" onclick="document.authform.submit();">Войти</a></td></tr>
			</table>
			<input type="submit" name="go" style="display:none;">
		</form>
		<?if($ERROR) {?><p class="error">Ошибка ввода пароля. Попробуйте еще раз.</p><?}?>
		<?
		if($_GET['timeout']) {			$sql = "SELECT COUNT(*) FROM `mandarinko_login` WHERE `ip` = '".$_SERVER['REMOTE_ADDR']."'";
			$r = mysql_fetch_array(mysql_query($sql));
			if ($r[0]==$admin_data['login_count']) {
				?><p class="error">Слишком много попыток входа. Подождите <b><?=$admin_data['login_time'];?> сек</b>.	</p><?
			}
		}?>
	</div>
</div>
</body>