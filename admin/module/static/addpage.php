<?
if($_POST['addpage']) {
	if($_SESSION['status'] == 'superadmin' AND $_POST['editable']=='on') {		$e = "`editable` = 'n',";
	} else $e = '';
	$sql = "INSERT INTO `mandarinko_static` SET
		".$e."
		`url`       = '".mysql_real_escape_string($_POST['url'])."',
		`title`    = '".mysql_real_escape_string($_POST['title'])."',
		`header`    = '".mysql_real_escape_string($_POST['header'])."',
		`text`      = '".mysql_real_escape_string($_POST['text'])."',
		`lastedit`  = '".time()."',
		`metadesc`  = '".mysql_real_escape_string($_POST['metadesc'])."',
		`metakey`   = '".mysql_real_escape_string($_POST['metakey'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE PAGE');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку страниц</a></p>
<p><b>Добавление страницы</b></p>
<form action="" method="post">
<table class="addtable">
  <tr>
  	<td width="80">URL&nbsp;страницы</td>
  	<td><input name="url"  class="long" value="<?=$r['url'];?>"></td>
  </tr>
  <tr>
  	<td>Название&nbsp;страницы</td>
  	<td><input name="title"  class="long" value="<?=$r['title'];?>"></td>
  </tr>
  <tr>
  	<td>Заголовок&nbsp;страницы</td>
  	<td><input name="header"  class="long" value="<?=$r['header'];?>"></td>
  </tr>
  <tr>
  	<td colspan="2">Текст<br>

			<?php
				include_once $_SERVER['DOCUMENT_ROOT']."/admin/ckeditor/ckeditor_php5.php";
				$initialValue = stripslashes($r['text']);
				$CKEditor = new CKEditor();

				$CKEditor->basePath = '/admin/ckeditor/';
				$config['skin'] = 'office2003';
				$CKEditor->editor("text", $initialValue, $config);
			?>

	</td>
  </tr>
  <tr>
  	<td>META DESC</td>
  	<td><input name="metadesc" class="long" value="<?=$r['metadesc'];?>"></td>
  </tr>
  <tr>
  	<td>META KEY</td>
  	<td><input name="metakey"  class="long" value="<?=$r['metakey'];?>"></td>
  </tr>
  <?if($_SESSION['status'] == 'superadmin') {?>
  <tr>
  	<td>Заблокировать</td>
  	<td><input name="editable" type="checkbox"></td>
  </tr>
  <?}?>
  <tr>
  	<td colspan="2" align="right"><input type="submit" name="addpage" value="Добавить страницу"></td>
  </tr>


</table>
</form>