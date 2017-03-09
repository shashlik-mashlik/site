<?
//Проверка прав доступа
//Если это супер, то пропускаем сразу
if($_SESSION['status'] != 'superadmin') {
    //Проверим права админа
    $t = explode(',',$_SESSION['rights']);
    foreach($t as $el) $RIGHT[$el] =  "1";
    //Посмотрим а наш id модуля
    $t = file($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/about');
    if ($RIGHT[trim($t[0])]!=1) die('NOT ACCESS');
}

//SETUP
$sql = "SELECT * FROM `feedback` LIMIT 1";
$r = mysql_query($sql);
if (mysql_num_rows($r)!=1) {
	//catalog base setup
    $sql = explode(';',trim(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/31_feedback.sql.php'),'<>?'));
    foreach($sql as $el) mysql_query($el);
	
	//header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/');
}


?>

<?
if($_GET['act'])   include($URL[2].'/'.$URL[3].'/edit.php');
else {
?>
    <h1>Управление заказами</h1>

	<!--<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_add.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=1">Добавить меню</a></p>-->
	<table class="table" style="word-wrap: break-word;">
	  <tr>
	  	<th style="width: 300px !important;">Информация</th> <!--номер, имя, тлф, кол-во персон -->
	  	<th>Комментарий</th>
	  	<th></th>
	  </tr>
	<?
	$sql = "SELECT * FROM `feedback` WHERE `status`= '0' ORDER BY `id` DESC";
	$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT orders');
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);

  	foreach($data as $el) {?>
	  <tr>	  	
	  	<td>
	  		<table>
	  			<tr>
	  				<td style="color: #818181;">Номер комментария:</td>
	  				<td><?=$el['id'];?></td>
	  			</tr>
	  			<tr>
	  				<td style="color: #818181;">Имя:</td>
	  				<td><?=$el['name'];?></td>
	  			</tr>
	  			<tr>
	  				<td style="color: #818181;">Телефон:</td>
	  				<td><?=$el['phone'];?></td>
	  			</tr>
	  			<tr>
	  				<td style="color: #818181;">Почта:</td>
	  				<td><?=$el['email'];?></td>
	  			</tr>
	  		</table>
	  	</td>
	  	<td style="width: overflow: hidden; text-overflow: ellipsis; display: block;" title="<?=$el['text'];?>"><?=$el['text'];?></td>
	  	<td width="56">
	  	    <a aria-hidden="true" class="fa fa-check" style="color: green; font-size: 18px; text-decoration: none;" title="Подтвердить" href="/admin/module/feedback?act=add&id=<?=$el['id'];?>"></a>
            <a style="color: red; font-size: 18px; text-decoration: none;" class="fa fa-times" aria-hidden="true" title="Удалить" href="/admin/module/feedback?act=del&id=<?=$el['id'];?>"></a>

        </td>
	  </tr>
      <tr>
       <th style="width: 300px !important;"></th> <!--номер, имя, тлф, кол-во персон -->
       <th></th>
       <th></th>
      </tr>
	<?}
	?></table><?
}?>