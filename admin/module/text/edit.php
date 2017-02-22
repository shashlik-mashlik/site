<?
if($_POST['savestatic']) {	$sql = "UPDATE `mandarinko_text` SET
		`text`   = '".mysql_real_escape_string($_POST['text'])."'
	WHERE `id`= '".mysql_real_escape_string($_GET['edit'])."'";

	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE PAGE');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


$sql = "SELECT * FROM `mandarinko_text` WHERE `id` = '".mysql_real_escape_string($_GET['edit'])."'";
$r = mysql_fetch_assoc(mysql_query($sql));
?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку блоков</a></p>
<p><b>Редактирование блока</b></p>
<form action="" method="post">
<table class="addtable">
  <tr>
  	<td colspan="2">Текст<br>
  	<textarea name="text" class="long"><?=stripslashes($r['text']);?></textarea></td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><input type="submit" name="savestatic" value="Сохранить изменения"></td>
  </tr>


</table>
</form>