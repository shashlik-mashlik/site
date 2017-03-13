<?
if($_POST['savestatic']) {

	if($_POST['seed'] && $_POST['cnt'] && $_POST['number']) {
		$seed = mysql_real_escape_string($_POST['seed']);
		$cnt = mysql_real_escape_string($_POST['cnt']) - 2;
		
		$hotp = new cHotp(); 
		$cur_cnt = $hotp->authOTP($seed, $_POST['number'], $cnt, $admin_data['tokenAuth']); 
		
		if(!$cur_cnt) {
			$ERROR[] = 'Введеные для токена данные неверны. Система категорически отказывается что-либо делать при таком раскладе.';
		}
	}
	
	
	foreach($_POST['right'] as $k=>$el) {		if($el=='on') $RIGHTS[] = $k;
	}
	$RIGHTS = implode(',',$RIGHTS);

	if(strlen($_POST['pwd'])>1) $newpwd = "`pass`   = '".mysql_real_escape_string($_POST['pwd'])."',";

	if($seed && $cnt) $newtoken = "`token_seed`='".$seed."', `token_cnt`='".$cur_cnt."',";
	
	if(!$ERROR) {		$sql = "UPDATE `mandarinko_admins` SET
			".$newtoken."
			".$newpwd."
			`rights` = '".$RIGHTS."'
		WHERE `id`= '".mysql_real_escape_string($_GET['edit'])."'";

		mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE ADMIN');
		header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
		exit;
	}
}


$sql = "SELECT * FROM `mandarinko_admins` WHERE `id` = '".mysql_real_escape_string($_GET['edit'])."'";
$r = mysql_fetch_assoc(mysql_query($sql));
$t = explode(',',$r['rights']);
foreach($t as $el) $RIGHTS[$el] = $el;
?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку записей</a></p>
<?if($ERROR) foreach($ERROR as $el){?><p><?=$el;?></p><?}?>
<p><b>Изменение пароля для учетной записи <u><?=$r['email'];?></u></b></p>
<form action="" method="post">
<table class="addtable">
  <tr>
  	<td width="150">Введите новый пароль</td>
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
  	<td width="150">Права доступа</td>
  	<td>
	<?
		$dir = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/module');
		for($i=2;$i<count($dir);$i++) {
			if(!is_dir($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/module/'.$dir[$i])) continue;
			$t = file($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/module/'.$dir[$i].'/about');
			$t[0]=trim($t[0]);
	    	?><input type="checkbox" name="right[<?=$t[0];?>]" <?if($RIGHTS[$t[0]]>0){?>checked<?}?>> <?=$t[1];?><br><?
		}
	?>
	</td>
  </tr>

  <tr>
  	<td colspan="2" align="right"><input type="submit" name="savestatic" value="Сохранить"></td>
  </tr>
</table>
</form>