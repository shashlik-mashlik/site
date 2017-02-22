<?
//Проверка прав доступа
//Если это супер, то пропускаем сразу
if($_SESSION['status'] != 'superadmin') {
	//Проверим права админа
	$t = explode(',',$_SESSION['rights']); foreach($t as $el) $RIGHT[$el] =  "1";
	//Посмотрим а наш id модуля
	$t = file($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/about');
    if ($RIGHT[trim($t[0])]!=1) die('NOT ACCESS');
}

//SETUP
$sql = "SELECT * FROM `mandarinko_static` LIMIT 1";
$r = mysql_query($sql);
if (mysql_num_rows($r)!=1) {
    $sql = explode(';',trim(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/1_static.sql.php'),'<>?'));
    foreach($sql as $el) mysql_query($el);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/');
}

?>

<h1>Управление статичными страницами</h1>
<?
$CONTENT['title'] .= 'Управление статичным контентом';
if($_GET['addpage']) include($URL[2].'/'.$URL[3].'/addpage.php');
elseif($_GET['delete']) include($URL[2].'/'.$URL[3].'/delpage.php');
elseif($_GET['edit'])   include($URL[2].'/'.$URL[3].'/editpage.php');
else {
?>
	<h3>Системные страницы (доступно только редактирование)</h3>
	<div style="overflow: auto; width: 735px;">
		<table class="table">
		  <tr>
			<th width="100">URL</th>
			<th width="100"><p class="text_img">Дата <a class="tooltip" title="Время последнего редактирования страницы"><img src="/<?=$URL[1];?>/img/ico_info.png"></a></p></th>
			<th>Название страницы</th>
			<th>Заголовок</th>
			<th>Часть текста</th>
			<th></th>
		  </tr>
		<?//IMPORT ALL PAGE
		$sql = "SELECT * FROM `mandarinko_static` WHERE `editable` = 'n' ORDER BY `url`";
		$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT STATIC');
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		$i = 0;
		foreach($data as $el) {?>
		  <tr <?if($i%2==0){?>style="background: #eee"<?}?>>
			<td><?if (strlen($el['url'])>12) {
				echo substr($el['url'],0,12).'<a class="tooltip" title="'.$el['url'].'">...</a>';
				} else { echo $el['url'];}?></td>
			<td><nobr><?=@date('d.m.Y H:i',$el['lastedit']);?></nobr></td>
			<td><?=stripslashes($el['title']);?></td>
			<td><?=stripslashes($el['header']);?></td>
			<td><?=mb_substr(stripslashes(htmlspecialchars($el['text'])),0,200,'UTF-8');?></td>
			<td width="18">
				<a class="tooltip" title="Редактировать страницу" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
			</td>
		  </tr>
		<?$i++;}
		?></table>
	</div>
	<br />
	<h3>Страницы пользователя</h3>
	<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_add.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?addpage=1">Добавить страницу</a></p>
	<div style="overflow: auto; width: 735px;">
		<table class="table">
		  <tr>
			<th width="100">URL</th>
			<th width="100"><p class="text_img">Дата <a class="tooltip" title="Время последнего редактирования страницы"><img src="/<?=$URL[1];?>/img/ico_info.png"></a></p></th>
			<th>Название страницы</th>
			<th>Заголовок</th>
			<th>Часть текста</th>
			<th width="36"></th>
		  </tr>
		<?//IMPORT ALL PAGE
		$sql = "SELECT * FROM `mandarinko_static` WHERE `editable` != 'n' ORDER BY `url`";
		$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT STATIC');
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		$i = 0;
		foreach($data as $el) {?>
		  <tr <?if($i%2==0){?>style="background: #eee"<?}?>>
			<td><?if (strlen($el['url'])>12) {
				echo substr($el['url'],0,12).'<a class="tooltip" title="'.$el['url'].'">...</a>';
				} else { echo $el['url'];}?></td>
			<td><nobr><?=@date('d.m.Y H:i',$el['lastedit']);?></nobr></td>
			<td><?=stripslashes($el['title']);?></td>
			<td><?=stripslashes($el['header']);?></td>
			<td><?=mb_substr(stripslashes(htmlspecialchars($el['text'])),0,200,'UTF-8');?></td>
			<td width="18">
				<a class="tooltip" title="Редактировать страницу" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
				<a class="tooltip" title="Удалить страницу" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>
			</td>
		  </tr>
		<?$i++;}
		?></table>
	</div><?
}?>