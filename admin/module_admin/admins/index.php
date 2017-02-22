<h1>Администраторы системы</h1>
<?
if($_SESSION['status'] != 'superadmin') {
	die('NOT ACCESS');
}

$CONTENT['title'] .= 'Администраторы системы';
if($_GET['addadmin']) include($URL[2].'/'.$URL[3].'/addadmin.php');
elseif($_GET['delete']) include($URL[2].'/'.$URL[3].'/deladmin.php');
elseif($_GET['edit'])   include($URL[2].'/'.$URL[3].'/editadmin.php');
else {
?>
	<h3>Учетные записи</h3>
	<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_add.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?addadmin=1">Добавить запись</a></p>
	<table class="table">
	  <tr>
	  	<th width="100">E-mail</th>
	  	<th width="100"><p class="text_img">Last Login <a class="tooltip" title="Время последнего логина в системе"><img src="/<?=$URL[1];?>/img/ico_info.png"></a></p></th>
	  	<th>Last IP </th>
	  	<th>Права доступа</th>
	  	<th width="36"></th>
	  </tr>
	<?//IMPORT ALL PAGE
	$sql = "SELECT * FROM `mandarinko_admins` ORDER BY `id`";
	$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT STATIC');
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
	$i = 0;
	foreach($data as $el) {?>
	  <tr <?if($i%2==0){?>style="background: #eee"<?}?>>
	  	<td><?=$el['email'];?></td>
	  	<td><nobr><?=@date('d.m.Y H:i',$el['login_now_time']);?></nobr></td>
	  	<td><?=stripslashes($el['login_now_ip']);?></td>
	  	<td><?=$el['rights'];?></td>
	  	<td width="18">
	  		<a class="tooltip" title="Редактировать запись" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
	  		<a class="tooltip" title="Удалить запись" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>
	  	</td>
	  </tr>
	<?$i++;}
	?></table><?
}?>