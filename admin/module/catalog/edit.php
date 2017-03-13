<?
if($_POST['save']) {	$sql = "UPDATE `mandarinko_catalog` SET
		`url`    = '".mysql_real_escape_string(preg_replace("/ /", "-", $_POST['url']))."',
		`c_url`    = '".mysql_real_escape_string($_POST['c_url'])."".mysql_real_escape_string(preg_replace("/ /", "-", $_POST['url']))."',
		`metak`    = '".mysql_real_escape_string($_POST['metak'])."',
		`metad`    = '".mysql_real_escape_string($_POST['metad'])."',		
		`name`   = '".mysql_real_escape_string($_POST['name'])."'		
	WHERE `id`= ".mysql_real_escape_string($_GET['edit']);

	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE CATEGORY');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


$sql = "SELECT * FROM `mandarinko_catalog` WHERE `id` = ".mysql_real_escape_string($_GET['edit']);
$r = mysql_fetch_assoc(mysql_query($sql));
$_POST=$r;
?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку</a></p>
<p><b>Редактирование раздела (<?if($_GET['edit']==0){?>Корневой раздел<?}else{?><?=$r['name'];?><?}?>)</b></p>
<form action="" method="post">
<table class="addtable">
  <tr>
  	<td width="90">URL</td>
	<td width="190"><input name="c_url"  class="long" value="<?=$r['c_url'];?>"></td>
  	<!--<td><input name="url"  class="long" value="< ?=$r['url'];?>"></td>-->
	<td><input name="url"  class="long" value="<?=$_POST['url'];?>"></td>
  </tr>
  <tr>
	<td width="90">Название</td>
	<td width="190"></td>
  	<td><input name="name"  class="long" value="<?=$_POST['name'];?>"></td>
  </tr>
  <tr>
  	<td width="90">METAK:</td>
	<td width="190"></td>
  	<td><input name="metak"  class="long" value="<?=$_POST['metak'];?>"></td>
  </tr>
  <tr>
  	<td width="90">METAD:</td>
	<td width="190"></td>
  	<td><input name="metad"  class="long" value="<?=$_POST['metad'];?>"></td>
  </tr>  
  <tr>
  	<td colspan="2" align="right"></br><input type="submit" name="save" style="height: 40px; width: 200px;" value="Изменить раздел"></td>
  </tr> 
</table>
</form>
