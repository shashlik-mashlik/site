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
$sql = "SELECT * FROM `orders` LIMIT 1";
$r = mysql_query($sql);
if (mysql_num_rows($r)!=1) {
	//catalog base setup
    $sql = explode(';',trim(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/30_orders.sql.php'),'<>?'));
    foreach($sql as $el) mysql_query($el);
	
	//header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/');
}


?>

<?
if($_GET['type'])   include($URL[2].'/'.$URL[3].'/edit.php');
else {
?>
    <h1>Управление заказами</h1>

	<!--<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_add.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=1">Добавить меню</a></p>-->
	<table class="table" style="word-wrap: break-word;">
	  <tr>
	  	<th style="width: 300px !important;">О заказе</th> <!--номер, имя, тлф, кол-во персон -->
	  	<th style="width: 180px !important;">Адрес</th>
	  	<th>Состав заказа</th> 	
	  	<th></th>
	  </tr>
	<?
	$sql = "SELECT * FROM `orders` WHERE `status`='ready' OR `status`='expected' ORDER BY `id` DESC";
	$r = mysql_query($sql) or die('DB ERROR: CAN\'T EXTRACT orders');
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);

//	$html = "<table>";
//    $ord = json_decode($el['ord']);
//	for ($i = 0; $i < sizeof($ord); $i++) {
//	    $html .= "<tr><td>";
//	    $html .= $ord[$i]->name . ' ' . $ord[$i]->count . ' ' . $ord[$i]->price;
//	    $html .= "</td></tr>";
//
//    }
//    $html = "</table>";
  	foreach($data as $el) {?>
	  <tr>	  	
	  	<td>
	  		<table>
	  			<tr>
	  				<td style="color: #818181;">Номер заказа, статус:</td>
	  				<td><?=$el['id'];?></td>
	  			</tr>
                <tr>
                    <td style="color: #818181;">Статус:</td>
                    <td><?=$el['status'] == 'ready' ? '<span style="color: red;">Ожидание</span >' : '<span style="color: green;">Готовится</span>';?></td>
                </tr>
	  			<tr>
	  				<td style="color: #818181;">Имя:</td>
	  				<td><?=$el['name'];?></td>
	  			</tr>
	  			<tr>
	  				<td style="color: #818181;">Сумма:</td>
	  				<td><?=$el['sum'];?></td>
	  			</tr>
	  			<tr>
	  				<td style="color: #818181;">Телефон:</td>
	  				<td><?=$el['phone'];?></td>
	  			</tr>
	  			<tr>
	  				<td style="color: #818181;">Кол-во персон:</td>
	  				<td><?=$el['prsns'];?></td>
	  			</tr>
	  		</table>
	  	</td>
	  	<td style="width: 180px !important; overflow: hidden; text-overflow: ellipsis; display: block;" title="<?=$el['adrs'];?>"><?=$el['adrs'];?></td>
          <?
          $html = "<table>";
          $ord = json_decode($el['ord']);
          for ($i = 0; $i < sizeof($ord); $i++) {
              $html .= "<tr><td>";
              $html .= $ord[$i]->name . ', ' . $ord[$i]->count . ', ' . $ord[$i]->price;
              $html .= "</td></tr>";

          }
          $html .= "</table>";
          ?>
	  	<td><?=$html?></td>
	  	<td width="56">
	  	    <a aria-hidden="true" class="fa fa-check" style="color: green; font-size: 18px; text-decoration: none;" title="Сменить статус" href="/admin/module/orders?type=state&id=<?=$el['id'];?>"></a>
	  	</td>
	  </tr>
      <tr>
       <th style="width: 300px !important;"></th> <!--номер, имя, тлф, кол-во персон -->
       <th style="width: 180px !important;"></th>
       <th></th>
       <th></th>
      </tr>
	<?}
	?></table><?
}?>