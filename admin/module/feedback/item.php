<?

include($_SERVER['DOCUMENT_ROOT']."/".$URL[1]."/inc/_function.php");

if(is_numeric($_GET['deletep'])) {
	$sql = "SELECT `pid` FROM `mandarinko_main_menu_item` WHERE `id`='".mysql_real_escape_string($_GET['deletep'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));
	$sql = "DELETE FROM `mandarinko_main_menu_item` WHERE `id`='".mysql_real_escape_string($_GET['deletep'])."'";
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}

if($_POST['cancel']) {
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}


if($_POST['saveitem']) {

	$sql = "UPDATE `mandarinko_main_menu_item` SET
		`pid`	=	'".mysql_real_escape_string($_GET['item'])."',
		`title`	=	'".mysql_real_escape_string($_POST['title'])."',
		`parent_title`	=	'".mysql_real_escape_string($_POST['parent_title'])."',
		`link`	=	'".mysql_real_escape_string($_POST['link'])."',
		`text`	=	'".mysql_real_escape_string($_POST['text'])."'
		WHERE `id` = ".mysql_real_escape_string($_GET['editp']);
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE ITEM');

	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}


if($_POST['additem']) {

	$sql = "INSERT INTO `mandarinko_main_menu_item` SET
		`pid`	=	'".mysql_real_escape_string($_GET['item'])."',
		`title`    = '".mysql_real_escape_string($_POST['title'])."',
		`parent_title`    = '".mysql_real_escape_string($_POST['parent_title'])."',
		`link`   = '".mysql_real_escape_string($_POST['link'])."',
		`text`   = '".mysql_real_escape_string($_POST['text'])."'";	
		
		mysql_query($sql) OR die('DB ERROR: CAN\'T INSERT ITEM');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$_GET['item']);
	exit;
}

?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку</a></p>

<?if($_GET['editp']) {
	$sql = "SELECT * FROM `mandarinko_main_menu_item` WHERE `id` = ".mysql_real_escape_string($_GET['editp']);
	$r = mysql_fetch_assoc(mysql_query($sql));
	$r_link=$r['title'];	
	$r_link=$r['text'];
	$r_link=$r['parent_title'];	
	$r_link=$r['link'];	
	?>
	<p><b>Редактирование пункта меню</b></p>
	<form action="" method="post" enctype="multipart/form-data">
	<table class="addtable">
		<tr>
			<td>Заголовок</td>
			<td>Латиницей</td>
			<td><input type="text" class="long" name="title" value="<?=$r['title'];?>"/></td>
		</tr>
		<tr>
			<td>Текст</td>
			<td>Отображение пункта меню</td>
			<td><input type="text" class="long" name="text" value="<?=$r['text'];?>"/></td>
		</tr>
		<tr>
			<td>Родительский заголовок</td>
			<td>Выбрать из списка</td>
			<td>
				<select class="long" name="parent_title" value="<?=$r['parent_title'];?>">
				<option><?=$r['parent_title'];?></option>		
				<?
				$sql = "SELECT * FROM `mandarinko_main_menu_item`";
				$r = mysql_query($sql);
				for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
					?>
					<?
					foreach($data as $el) {?>
					<option><?=$el['title'];?></option>
				<?}?>	
				</select>			
			</td>
		</tr>
		<tr>
			<td>Ссылка</td>
			<td>Выбрать из списка существующих страиниц</td>
			<td>
				<select class="long" name="link" value="<?=$r['link'];?>">
				<option>/</option>
				<option>/<?=$r_link;?></option>				
				<?
				$sql = "SELECT * FROM `mandarinko_static`";
				$r = mysql_query($sql);
				for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
					?>
					<?
					foreach($data as $el) {?>
					<option>/<?=$el['url'];?></option>
					<option>/page/<?=$el['url'];?></option>
				<?}?>	
				</select>			
			</td>
		</tr>
	  	<td colspan="2" align="left"><input type="submit" name="cancel" value="Отменить изменения"><input type="submit" name="saveitem" value="Сохранить изменения"></td>
	  </tr>
	</table>
	</form>
<?} else {?>
<p><b>Добавление пункта меню</b></p>
<form action="" method="post" enctype="multipart/form-data">
<table class="addtable">
  <tr>
	<td>Заголовок</td>
	<td>Латиницей</td>
	<td><input class="long" name="title" value=""></td>
  </tr>
   <tr>
	<td>Текст</td>
	<td>Отображение пункта меню</td>
	<td><input class="long" name="text" value=""></td>
  </tr>
  <tr>
	<td>Родительский заголовок</td>
	<td>Выбрать из списка</td>
	<td>
		<select class="long" name="parent_title" value="root">
		<option>root</option>		
		<?
			$sql = "SELECT * FROM `mandarinko_main_menu_item`";
			$r = mysql_query($sql);
			for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		?>
		<?
			foreach($data as $el) {?>
			<option><?=$el['title'];?></option>
		<?}?>	
		</select>	
	</td>
  </tr>
  <tr>
	<td>Ссылка</td>
	<td>Выбрать из списка существующих страиниц</td>
	<td>
			<select class="long" name="link" value="<?=$r['link'];?>">
				<option>/</option>			
				<?
				$sql = "SELECT * FROM `mandarinko_static`";
				$r = mysql_query($sql);
				for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
					?>
					<?
					foreach($data as $el) {?>
					<option>/<?=$el['url'];?></option>
					<option>/page/<?=$el['url'];?></option>
				<?}?>	
			</select>
	</td>
  </tr>
  <tr>
  	<td colspan="2" align="right"><input type="submit" name="additem" value="Добавить"></td>
  </tr>
</table>
</form>
<?}?>


<?$sql = "SELECT * FROM `mandarinko_main_menu_item` WHERE `pid` = ".mysql_real_escape_string($_GET['item'])." ORDER BY `id`";
$r = mysql_query($sql);
for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
?>
<br>
<table class="table">
  <tr>
    <th>Заголовок</th>
	<th>Родительский заголовок</th>
	<th>Ссылка</th>
	<th>Текст</th>
    <th></th>
  </tr>
<?
foreach($data as $el) {?>
  <tr>
    <td><?=$el['title'];?></td>
	<td><?=$el['parent_title'];?></td>
	<td><?=$el['link'];?></td>
	<td><?=$el['text'];?></td>
    <td width="36">
		<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$_GET['item'];?>&editp=<?=$el['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"/></a>
	  	<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$_GET['item'];?>&deletep=<?=$el['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"/></a>
    </td>
  </tr>
<?}?>
</table>


