<?
if($_POST['add']) {
/*	$sql = "INSERT INTO `mandarinko_static` SET
		".$e."
		`url`       = '".mysql_real_escape_string($_POST['url'])."',
		`title`    = '".mysql_real_escape_string($_POST['name'])."',
		`header`    = 'Раздел каталога - ".mysql_real_escape_string($_POST['name'])."',
		`lastedit`  = '".time()."',
		`metadesc`  = '".mysql_real_escape_string($_POST['name'])."',
		`metakey`   = '".mysql_real_escape_string($_POST['name'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE PAGE');
*/



	$sql = "INSERT INTO `mandarinko_catalog` SET
		`url`    = '".mysql_real_escape_string(preg_replace("/ /", "-", $_POST['url']))."',
		`c_url`    = '".mysql_real_escape_string($_POST['c_url'])."".mysql_real_escape_string(preg_replace("/ /", "-", $_POST['url']))."',
		`metak`    = '".mysql_real_escape_string($_POST['metak'])."',
		`metad`    = '".mysql_real_escape_string($_POST['metad'])."',		
		`pid`    = '".mysql_real_escape_string($_GET['add'])."',
		`name`   = '".mysql_real_escape_string($_POST['name'])."',
		`root`	=	'nd'";		
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE CATEGORY');	
	
	$sql = "UPDATE `mandarinko_catalog` SET `sort`='".mysql_insert_id()."' WHERE `id`='".mysql_insert_id()."'";
	mysql_query($sql);
	
	$sql = "UPDATE `mandarinko_catalog` SET 
		`root` = 'root' WHERE `id`= '".mysql_real_escape_string($_GET['add'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE CATEGORY');
	
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}

if ($_GET['add']!=0) {
	$sql = "SELECT * FROM `mandarinko_catalog` WHERE `id`='".mysql_real_escape_string($_GET['add'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));
}
?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку разделов</a></p>
<p><b>Добавление раздела (<?if($_GET['add']==0){?>Корневой раздел<?}else{?><?=$r['name'];?><?}?>)</b></p>
<form action="" method="post">
</br>
<table class="addtable">
  <tr>
  	<td width="90">URL</td>
	<td width="190"><input name="c_url"  class="long" value="<?=$r['c_url'];?><?if ($r['c_url'] != '') echo ('/');?>"></td>
  	<!--<td><input name="url"  class="long" value="< ?=$r['url'];?>< ?if ($r['url'] != '') echo ('/');?>"></td>-->
	<td><input name="url"  class="long" value=""></td>
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
  	<td colspan="2" align="right"></br><input type="submit" name="add" style="height: 40px; width: 200px;" value="Добавить раздел"></td>
  </tr>


</table>
</form>
