<?

include($_SERVER['DOCUMENT_ROOT']."/".$URL[1]."/inc/_function.php");

if(is_numeric($_GET['deletep'])) {
	$sql = "SELECT `pid` FROM `mandarinko_presentation_item` WHERE `id`='".mysql_real_escape_string($_GET['deletep'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));

	$sql = "DELETE FROM `mandarinko_presentation_item` WHERE `id`='".mysql_real_escape_string($_GET['deletep'])."'";
	mysql_query($sql) OR die('DB ERROR: CAN\'T DEL PHOTO');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/presentation/'.$r['pid']."_".$_GET['deletep'].'.jpg');
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/presentation/tmb/'.$r['pid']."_".$_GET['deletep'].'.jpg');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}

if($_POST['cancel']) {
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}


if($_POST['saveitem']) {

	$sql = "UPDATE `mandarinko_presentation_item` SET
		`pid`	=	'".mysql_real_escape_string($_GET['item'])."',
		`title`	=	'".mysql_real_escape_string($_POST['title'])."',
		`text`	=	'".mysql_real_escape_string($_POST['text'])."',
		`link`	=	'".mysql_real_escape_string($_POST['link'])."'
		WHERE `id` = ".mysql_real_escape_string($_GET['editp']);
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE ITEM');

	$id = mysql_real_escape_string($_GET['editp']);
 	if($_FILES['img']['name']) {
		move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/presentation/'.$_GET['item'].'_'.$id.'.jpg')
		or die("Ошибка закачки файла");
		copy($_SERVER['DOCUMENT_ROOT'].'/upload/presentation/'.$_GET['item'].'_'.$id.'.jpg',$_SERVER['DOCUMENT_ROOT'].'/upload/presentation/tmb/'.$_GET['item'].'_'.$id.'.jpg');

		SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/presentation/tmb/'.$_GET['item'].'_'.$id.'.jpg',564,510, 1);
	}
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}


if($_POST['additem']) {

	$sql = "INSERT INTO `mandarinko_presentation_item` SET
		`pid`	=	'".mysql_real_escape_string($_GET['item'])."',
		`title`    = '".mysql_real_escape_string($_POST['title'])."',
		`text`    = '".mysql_real_escape_string($_POST['text'])."',
		`link`   = '/".mysql_real_escape_string($_POST['link'])."'";
		mysql_query($sql) OR die('DB ERROR: CAN\'T INSERT ITEM');

	$id=mysql_insert_id();

 	if($_FILES['img']['name']) {
		//move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/presentation/'.$_GET['item'].'_'.$id.'.jpg')
			echo var_dump($_FILES['img']['tmp_name']);
		or die("Ошибка закачки файла");
		copy($_SERVER['DOCUMENT_ROOT'].'/upload/presentation/'.$_GET['item'].'_'.$id.'.jpg',$_SERVER['DOCUMENT_ROOT'].'/upload/presentation/tmb/'.$_GET['item'].'_'.$id.'.jpg');

		SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/presentation/tmb/'.$_GET['item'].'_'.$id.'.jpg',564,510, 1);
	}
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}

?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку галерей</a></p>

<?if($_GET['editp']) {
	$sql = "SELECT * FROM `mandarinko_presentation_item` WHERE `id` = ".mysql_real_escape_string($_GET['editp']);
	$r = mysql_fetch_assoc(mysql_query($sql));?>
	<p><b>Редактирование фотографии</b></p>
	<form action="" method="post" enctype="multipart/form-data">
	<table class="addtable">
		<tr>
			<td>Фотография</td>
			<td><img src="/upload/presentation/<?=$_GET['item'];?>_<?=$r['id'];?>.jpg?<?=time();?>" alt="" style="max-width:500px"/></td>
		</tr>
		<tr>
		  	<td>Сменить фото</td>
		  	<td><input name="img" class="long" type="file"></td>
		</tr>
		<tr>
			<td>Заголовок</td>
			<td><input type="text" class="long" name="title" value="<?=$r['title'];?>"/></td>
		</tr>
		<tr>
			<td>Текст</td>
			<td><input type="text" class="long" name="text" value="<?=$r['text'];?>"/></td>
		</tr>
		<tr>
			<td>Ссылка</td>
			<td><input type="text" class="long" name="link" value="<?=$r['link'];?>"/></td>
		</tr>
	  	<td colspan="2" align="left"><input type="submit" name="cancel" value="Отменить изменения"><input type="submit" name="saveitem" value="Сохранить изменения"></td>
	  </tr>
	</table>
	</form>
<?} else {?>
<p><b>Добавление фотографии</b></p>
<form action="" method="post" enctype="multipart/form-data">
<table class="addtable">
  <tr>
	<td>Фотография</td>
	<td><input name="img"  class="long" type="file" value=""></td>
  </tr>
  <tr>
	<td>Заголовок</td>
	<td><input class="long" name="title" value=""></td>
  </tr>
  <tr>
	<td>Текст</td>
	<td><input class="long" name="text" value=""></td>
  </tr>
  <tr>
	<td>Ссылка</td>
	<td><input class="long" name="link" value=""></td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><input type="submit" name="additem" value="Добавить"></td>
  </tr>
</table>
</form>
<?}?>


<?$sql = "SELECT * FROM `mandarinko_presentation_item` WHERE `pid` = ".mysql_real_escape_string($_GET['item'])." ORDER BY `id`";
$r = mysql_query($sql);
for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
?>
<br>
<table class="table">
  <tr>
    <th>Фотография</th>
    <th>Заголовок</th>
	<th>Текст</th>
	<th>Ссылка</th>
    <th></th>
  </tr>
<?
foreach($data as $el) {?>
  <tr>
    <td><a class="tooltip" title="<?=$el['title'];?>"><img width="200" style="max-width:300px" src="/upload/presentation/tmb/<?=$el['pid'];?>_<?=$el['id'];?>.jpg?<?=time();?>"/></a></td>
    <td><?=$el['title'];?></td>
	<td><?=$el['text'];?></td>
	<td><?=$el['link'];?></td>
    <td width="36">
		<a class="tooltip" title="Редактировать фотографию" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$_GET['item'];?>&editp=<?=$el['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"/></a>
	  	<a class="tooltip" title="Удалить фотографию" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$_GET['item'];?>&deletep=<?=$el['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"/></a>
    </td>
  </tr>
<?}?>
</table>


