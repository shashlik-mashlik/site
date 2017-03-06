<?
if($_POST['save']) {
	$sql = "UPDATE `mandarinko_main_menu` SET
		`about`    = '".mysql_real_escape_string($_POST['about'])."',
		`name`    = '".mysql_real_escape_string($_POST['name'])."'
	WHERE `id`= ".mysql_real_escape_string($_GET['edit']);
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE main_menu');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}
$sql = "SELECT * FROM `mandarinko_main_menu` WHERE `id` = ".mysql_real_escape_string($_GET['edit']);
$r = mysql_fetch_assoc(mysql_query($sql));
?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку</a></p>
<p><b>Редактирование меню</b></p>
<form action="" method="post">
<table class="addtable">
   <tr>
  	<td>Название</td>
	<td>(Пример - "Главное меню" <span style="color: red; font: bold;">Главное меню</span>/ (латиницей))</td>
  	<td><input name="name"  class="long" value="<?=$r['url'];?>"></td>
  </tr>
  <tr>
  	<td>Описание</td>
	<td></td>
  	<td><input name="about"  class="long" value="<?=$r['about'];?>"></td>
  </tr>
  <tr>
	<td height="40"></td>
  </tr>
  <tr>
	<td></td>
  	<td colspan="2" align="right"><input type="submit" name="save" value="Сохранить изменения"></td>
  </tr>
</table>
</form>
