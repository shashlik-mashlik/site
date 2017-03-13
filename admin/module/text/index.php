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
$sql = "SELECT * FROM `mandarinko_text` LIMIT 1";
$r = mysql_query($sql);
if (mysql_num_rows($r)!=1) {
    $sql = explode(';',trim(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/4_text.sql.php'),'<>?'));
    foreach($sql as $el) mysql_query($el);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/');
}

?>

<h1>Управление текстовыми блоками</h1>
	<?if($_SESSION['status'] == 'superadmin') {?>
		<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_add.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=1">Добавить блок</a></p>
	<?}?>
<?
$CONTENT['title'] .= 'Управление текстовыми блоками';
if($_GET['add']) include($URL[2].'/'.$URL[3].'/add.php');
elseif($_GET['delete']) include($URL[2].'/'.$URL[3].'/del.php');
elseif($_GET['edit'])   include($URL[2].'/'.$URL[3].'/edit.php');
else {
?>
	<h3>Текстовые блоки</h3>
	<table class="table">
	  <tr>
	  	<th width="100">Позиция</th>
	  	<th>Часть текста</th>
	  	<th></th>
	  </tr>
	<?//IMPORT ALL PAGE
	$sql = "SELECT * FROM `mandarinko_text` ORDER BY `id`";
	$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT TEXT');
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
	$i = 0;
	foreach($data as $el) {?>
	  <tr <?if($i%2==0){?>style="background: #eee"<?}?>>
	  	<td><?=stripslashes($el['position']);?></td>
	  	<td><?=mb_substr(stripslashes(htmlspecialchars($el['text'])),0,200,'UTF-8');?></td>
	  	<td width="18">
	  		<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>

			<?if($_SESSION['status'] == 'superadmin') {?>
		  		<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>
	  		<?}?>
	  	</td>
	  </tr>
	<?$i++;}
	?></table><?
}?>