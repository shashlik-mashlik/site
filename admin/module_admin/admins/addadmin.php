<?
if($_POST['addpage']) {

	if($_POST['seed'] && $_POST['cnt'] && $_POST['number']) {
		$seed = mysql_real_escape_string($_POST['seed']);
		$cnt = mysql_real_escape_string($_POST['cnt']) - 2;
		
		$hotp = new cHotp(); 
		$cur_cnt = $hotp->authOTP($seed, $_POST['number'], $cnt, $admin_data['tokenAuth']); 
		
		if(!$cur_cnt) {
			$ERROR[] = 'Введеные для токена данные неверны. Админ не создан.';
		}
	}

	if(!$ERROR) {			$sql = "INSERT INTO `mandarinko_admins` SET
			`email`   = '".mysql_real_escape_string($_POST['email'])."',
			`pass`    = '".mysql_real_escape_string($_POST['pwd'])."',
			`token_seed` = '".$seed."',
			`token_cnt` = '".$cnt."',
			`rights`  = '1,2,3,4,5,6,7,8,9,10',
			`login_now_time` = '0',
			`login_now_ip`   = '127.0.0.1',
			`login_last_time`= '0',
			`login_last_ip`  = '127.0.0.1'";
		mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE ADMIN');	
		
		header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
		exit;
	}
}


?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку записей</a></p>
<p><b>Добавление записи</b></p>
<?
if($ERROR) {
?><ul><?
	foreach($ERROR as $e) {
		?>
		<li><?=$e;?></li>
		<?
	}
?></ul><?	
}
?>
<form action="" method="post">
<table class="addtable">
  <tr>
  	<td width="150">E-mail</td>
  	<td><input name="email"  class="long" value="<?=$r['email'];?>"></td>
  </tr>
  <tr>
  	<td width="150">Пароль</td>
  	<td><input name="pwd"  class="long" value="<?=$r['pwd'];?>"></td>
  </tr>
  <tr>
  	<td colspan="2" width="50"><b>Поля ниже - ревизиты токена. Заполняется при необходимости.</b></td>  	
  </tr>
  <tr>
  	<td width="150">Seed (см. в xml токена)</td>
  	<td><input name="seed"  class="long" value="<?=$r['token_seed'];?>"></td>
  </tr>
  <tr>
  	<td width="150">Счетчик (4 сек. тап, 4 раза клик, последние цифры)</td>
  	<td><input name="cnt"  class="long" value="<?=$r['token_cnt'];?>"></td>
  </tr>
   <tr>
  	<td width="150">Значение токена (для проверки)</td>
  	<td><input name="number"  class="long" value="<?=$r['number'];?>"></td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><input type="submit" name="addpage" value="Добавить запись"></td>
  </tr>
</table>
</form>