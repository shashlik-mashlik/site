<?
if($_POST['save']) {
	$sql = "UPDATE `mandarinko_presentation` SET
		`url`    = '".mysql_real_escape_string($_POST['url'])."',
		`name`    = '".mysql_real_escape_string($_POST['name'])."',
		`width`    = '".mysql_real_escape_string($_POST['width'])."',
		`height`   = '".mysql_real_escape_string($_POST['height'])."',
		`time_pause`    = '".mysql_real_escape_string($_POST['time_pause'])."',
		`time_active`    = '".mysql_real_escape_string($_POST['time_active'])."',
		`method`    = '".mysql_real_escape_string($_POST['method'])."',
		`text_position`   = '".mysql_real_escape_string($_POST['text_position'])."'		
	WHERE `id`= ".mysql_real_escape_string($_GET['edit']);
	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE PRESENTATION');
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3]);
	exit;
}
$sql = "SELECT * FROM `mandarinko_presentation` WHERE `id` = ".mysql_real_escape_string($_GET['edit']);
$r = mysql_fetch_assoc(mysql_query($sql));
?>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку презентаций</a></p>
<p><b>Редактирование презентации</b></p>
<form action="" method="post">
<table class="addtable">
   <tr>
  	<td>URL</td>
	<td>(пример bonvio.com/page/<span style="color: red; font: bold;">test</span>/)</td>
  		<td>
  			<select class="long" name="url" value="<?=$r['url'];?>">		
				<?
				$sql = "SELECT * FROM `mandarinko_static`";
				$r = mysql_query($sql);
				for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
					?>
					<?
					foreach($data as $el) {?>
					<option><?=$el['url'];?></option>
				<?}?>	
			</select>
  		</td>
  </tr>
  <tr>
  	<td>Название</td>
	<td></td>
  	<td><input name="name"  class="long" value="<?=$r['name'];?>"></td>
  </tr>
  <tr>
  	<td>Ширина </td>
	<td>(указано в пикселах)</td>
  	<td><input name="width"  class="long" value="<?=$r['width'];?>"></td>
  </tr>
  <tr>
   	<td>Высота </td>
	<td>(указано в пикселах)</td>
  	<td><input name="height"  class="long" value="<?=$r['height'];?>"></td>
  </tr>
  <tr>
  	<td>Время показа </td>
	<td>(указано в мс)</td>
  	<td><input name="time_pause"  class="long" value="2000"></td>
  </tr>
  <tr>
  	<td>Время паузы </td>
	<td>(указано в мс)</td>
  	<td><input name="time_active"  class="long" value="1000"></td>
  </tr>
  <tr>
  	<td>Метод смены картинки</td>
	<td></td>
  	<td>
		<select name="method" class="long" value="All">

		<option>shuffle</option>
		<option>zoom</option>
		<option>scrollRight</option>
		<option>scrollLeft</option>
		<option>curtainX</option>
		<option>curtainY</option>
		<option>turnUp</option>
		<option>turnDown</option>
		</select>	
	</td>
  </tr>
<!-- 
 <tr>
  	<td>Позиция текста</td>
  	<td><input name="text_position"  class="long" value="<?=$r['text_position'];?>"></td>
  </tr>
-->
  <tr>
	<td height="40"></td>
  </tr>
  <tr>
	<td></td>
  	<td colspan="2" align="right"><input type="submit" name="save" value="Сохранить изменения"></td>
  </tr>
</table>
</form>
