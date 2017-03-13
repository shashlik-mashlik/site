<?
if($_POST['savestatic']) {
	if ($_SESSION['status'] == 'superadmin') {
		if($_POST['editable']=='on') {
			$e = "`editable` = 'n',";
		} else $e = "`editable` = '',";
    } else $e = '';
	$sql = "UPDATE `mandarinko_static` SET
		".$e."
		`title`    = '".mysql_real_escape_string($_POST['title'])."',
		`header`    = '".mysql_real_escape_string($_POST['header'])."',
		`text`      = '".mysql_real_escape_string($_POST['text'])."',
		`lastedit`  = '".time()."',
		`metadesc`  = '".mysql_real_escape_string($_POST['metadesc'])."',
		`metakey`   = '".mysql_real_escape_string($_POST['metakey'])."'
	WHERE `id`= '".mysql_real_escape_string($_GET['edit'])."'";

	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE PAGE');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}


$sql = "SELECT * FROM `mandarinko_static` WHERE `id` = '".mysql_real_escape_string($_GET['edit'])."'";
$r = mysql_fetch_assoc(mysql_query($sql));
?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку страниц</a></p>
<p><b>Редактирование страницы</b></p>

<form action="" method="post">
<table class="addtable">
  <tr>
  	<td>Название&nbsp;страницы</td>
  	<td><input name="title"  class="long" value="<?=$r['title'];?>"></td>
  </tr>
  <tr>
  	<td width="70">Заголовок&nbsp;страницы</td>
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

  		<?
  		/*
  		include($_SERVER['DOCUMENT_ROOT']."/admin/js/spaw2/spaw.inc.php");
		$spaw1 = new SPAW_Wysiwyg('text', isset($r['text'])?stripslashes($r['text']):'', 'ru', 'full', 'default', '100%', '400px');
		$spaw1->show();
		*/
		?></td>
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
  	<td><input name="editable" type="checkbox" <?if($r['editable']=='n'){?> checked<?}?>></td>
  </tr>
  <?}?>
  <tr>
  	<td colspan="2" align="right"><input type="submit" name="savestatic" value="Сохранить изменения"></td>
  </tr>


</table>
</form>