<?
if($_POST['addpage'] AND $_SESSION['status'] == 'superadmin') {	$sql = "INSERT INTO `mandarinko_text` SET
		`position`= '".mysql_real_escape_string($_POST['position'])."',
		`text`    = '".mysql_real_escape_string($_POST['text'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE TEXT');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку блоков</a></p>
<p><b>Добавление текстового блока</b></p>
<form action="" method="post">
<table class="addtable">
  <tr>
  	<td width="50">Позиция</td>
  	<td><input name="position"  class="long" value="<?=$r['position'];?>"></td>
  </tr>
  <tr>
  	<td colspan="2">Текст<br>
  	<textarea name="text" class="long"><?=$r['text'];?></textarea></td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><input type="submit" name="addpage" value="Добавить"></td>
  </tr>


</table>
</form>