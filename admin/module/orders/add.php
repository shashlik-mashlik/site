<?
if($_POST['add']) {
	$sql = "INSERT INTO `mandarinko_main_menu` SET
		`about`    = '".mysql_real_escape_string($_POST['about'])."',
		`name`    = '".mysql_real_escape_string($_POST['name'])."'";		
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE GALLERY');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}
?>

<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку</a></p>
<p><b>Добавление главного меню</b></p>
<form action="" method="post">
<table class="addtable">
  <tr>
  	<td>Название</td>
	<td>(Пример - "Главное меню" <span style="color: red; font: bold;">Главное меню</span>/ (латиницей))</td>
  	<td><input name="name"  class="long" value=""></td>
  </tr>
  <tr>
  	<td>Описание</td>
	<td></td>
  	<td><input name="about"  class="long" value=""></td>
  </tr>
  <tr>
	<td height="40"></td>
  </tr>
  <tr>
	<td></td>
  	<td colspan="2" align="right"><input type="submit" name="add" value="Добавить меню"></td>
  </tr>
</table></br>
</form>
