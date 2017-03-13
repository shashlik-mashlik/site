<h1>Архив</h1>
<?
if($_SESSION['status'] != 'superadmin') {
	die('NOT ACCESS');
}
$CONTENT['title'] .= 'Архив';

if($URL[4]=='do') {
	//Подготовим файл
	$file = fopen($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/backup/'.time().'.sql','w');
	//Вытащим все таблицы из БД
	$sql = "SHOW TABLES";
	$r = mysql_query($sql) or die('1'.mysql_error());
 	for($tables=array();$row=mysql_fetch_assoc($r);$tables[]=$row);

 	//Инфо в файл
 	foreach($tables as $el) $TABLES[] = $el['Tables_in_'.$dbname];
 	fwrite($file,'--'.implode(', ',$TABLES)."\r\n");

 	$DAMP = '';
 	foreach($tables as $el) {
   		//Все колонки
   		$sql = "SHOW COLUMNS FROM `".$el['Tables_in_'.$dbname]."`";
		$r = mysql_query($sql) or die('2'.mysql_error());
	 	for($colls=array();$row=mysql_fetch_assoc($r);$colls[]=$row);
		$tmp = array();
	 	foreach($colls as $el2) {
	 		$tmp[]='`'.$el2['Field'].'`';
	 	}
	 	//Шапка дампа
		$DAMP = "INSERT INTO `".$el['Tables_in_'.$dbname]."` (".implode(', ',$tmp).") VALUES ";
		//Сам дамп
		$sql = "SELECT * FROM `".$el['Tables_in_'.$dbname]."`";
		$r = mysql_query($sql) or die(mysql_error());
	 	if(mysql_num_rows($r)>0) {
		 	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
			$tmp = array();
			foreach($data as $el3) {
				$t = array();
				foreach($el3 as $t1) {$t[]= "'".$t1."'";}
				$tmp[] = "(".implode(', ',$t).")";
			}
			$DAMP .= implode(",\r\n",$tmp).';';
			fwrite($file,$DAMP."\r\n------\r\n");
		}
 	}
 	fclose($file);
 	?>
 	<h3>Создание образа завершено</h3>
 	<p>BackUp done. All right :-)</p>
 	<br>

 	<?
}

?>
	<h3>Доступные образы БД</h3>
	<p><a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/do">Создать образ сейчас</a></p>
	<table class="table">
	  <tr>
	  	<th width="120"><p class="text_img">Дата <a class="tooltip" title="Время создания образа"><img src="/<?=$URL[1];?>/img/ico_info.png"></a></p></th>
	  	<th>Таблицы</th>
	  	<th></th>
	  </tr>
	<?$dir = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/backup');


	for($i=2;$i<count($dir);$i++) {?>
	  <tr>
	    <td><?=date('d.m.Y H:i',substr($dir[$i],0,10));?></td>
	    <td>
	    	<?
		    $file = fopen($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/backup/'.$dir[$i],'r');
			echo trim(fgets($file),'-');
   			fclose($file);
	    	?>
	    </td>
	    <td><a href="/<?=$URL[1];?>/backup/<?=$dir[$i];?>">[скачать]</a></td>
	  </tr>
	<?}?>
	</table>
