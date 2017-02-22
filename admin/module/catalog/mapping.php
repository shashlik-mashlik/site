<?
if($_GET['delmap']) {
	$sql = "DELETE FROM `mandarinko_catalog_mapping` WHERE `id`='".mysql_real_escape_string($_GET['delmap'])."'";
	mysql_query($sql);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?mapping='.$_GET['mapping']);
}

if($_POST['fid'] && !$_POST['map']) {
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?mapping='.$_POST['fid']);
	exit;
}
if($_POST['map']) {
	$sql = "SELECT * FROM `mandarinko_catalog_mapping` WHERE 
		`fid`='".mysql_real_escape_string($_POST['fid'])."' AND 
		`sid`='".mysql_real_escape_string($_POST['sid'])."'";
	$r = mysql_query($sql);
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
	
	if(count($data)==0) {
	
		$sql = "INSERT INTO `mandarinko_catalog_mapping` SET
			`fid`='".mysql_real_escape_string($_POST['fid'])."',
			`sid`='".mysql_real_escape_string($_POST['sid'])."'";
		mysql_query($sql);
	}	
}

$sql = "SELECT * FROM `mandarinko_catalog` ORDER BY `sort` ASC";
$r = mysql_query($sql);
for($cat=array();$row=mysql_fetch_assoc($r);$cat[]=$row);
?>

<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>">Вернуться к списку разделов</a></p>
<p><b>Управление соответствиями</b></p>
<p>Соответствия направлены в одну сторону, то есть связь каталога 1 с каталогом 2 не будет означать связь 2 с 1.</p>
<form action="" method="post" name="formmap">
	<p>Связать 
		<select name="fid" onchange="document.formmap.submit();">
			<option disabled value="">Выберите раздел магазина</option>
			<?
			foreach($cat as $el[0]) {
				if($el[0]['pid']==0) {
				?><option <?if($el[0]['root']!='leaf'){?>disabled <?}?><?if($_GET['mapping']==$el[0]['id']){?>selected <?}?>value="<?=$el[0]['id'];?>"><?=$el[0]['name'];?></option><?
					foreach($cat as $el[1]) {
						if($el[1]['pid']==$el[0]['id']) {
						?><option <?if($el[1]['root']!='leaf'){?>disabled <?}?><?if($_GET['mapping']==$el[1]['id']){?>selected <?}?>value="<?=$el[1]['id'];?>">- <?=$el[1]['name'];?></option><?
							foreach($cat as $el[2]) {
								if($el[2]['pid']==$el[1]['id']) {
								?><option <?if($el[2]['root']!='leaf'){?>disabled <?}?><?if($_GET['mapping']==$el[2]['id']){?>selected <?}?>value="<?=$el[2]['id'];?>">-- <?=$el[2]['name'];?></option><?
									foreach($cat as $el[3]) {
										if($el[3]['pid']==$el[2]['id']) {
										?><option <?if($el[3]['root']!='leaf'){?>disabled <?}?><?if($_GET['mapping']==$el[3]['id']){?>selected <?}?>value="<?=$el[3]['id'];?>">--- <?=$el[3]['name'];?></option><?
											foreach($cat as $el[4]) {
												if($el[4]['pid']==$el[3]['id']) {
												?><option <?if($el[4]['root']!='leaf'){?>disabled <?}?><?if($_GET['mapping']==$el[4]['id']){?>selected <?}?>value="<?=$el[4]['id'];?>">---- <?=$el[4]['name'];?></option><?
													foreach($cat as $el[5]) {
														if($el[5]['pid']==$el[4]['id']) {
														?><option <?if($el[5]['root']!='leaf'){?>disabled <?}?><?if($_GET['mapping']==$el[5]['id']){?>selected <?}?>value="<?=$el[5]['id'];?>">----- <?=$el[5]['name'];?></option><?
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}			
			}
			?>
		</select> с  
		<select name="sid">
			<option disabled selected value="">Выберите раздел магазина</option>
			<?
			foreach($cat as $el[0]) { 
				if($el[0]['id']==$_GET['mapping']){continue;} 
				if($el[0]['pid']==0) {
				?><option <?if($el[0]['root']!='leaf'){?>disabled <?}?>value="<?=$el[0]['id'];?>"><?=$el[0]['name'];?></option><?
					foreach($cat as $el[1]) {
						if($el[1]['id']==$_GET['mapping']){continue;}
						if($el[1]['pid']==$el[0]['id']) {
						?><option <?if($el[1]['root']!='leaf'){?>disabled <?}?>value="<?=$el[1]['id'];?>">- <?=$el[1]['name'];?></option><?
							foreach($cat as $el[2]) {
								if($el[2]['id']==$_GET['mapping']){continue;}
								if($el[2]['pid']==$el[1]['id']) {
								?><option <?if($el[2]['root']!='leaf'){?>disabled <?}?>value="<?=$el[2]['id'];?>">-- <?=$el[2]['name'];?></option><?
									foreach($cat as $el[3]) {
										if($el[3]['id']==$_GET['mapping']){continue;}
										if($el[3]['pid']==$el[2]['id']) {
										?><option <?if($el[3]['root']!='leaf'){?>disabled <?}?>value="<?=$el[3]['id'];?>">--- <?=$el[3]['name'];?></option><?
											foreach($cat as $el[4]) {
												if($el[4]['id']==$_GET['mapping']){continue;}
												if($el[4]['pid']==$el[3]['id']) {
												?><option <?if($el[4]['root']!='leaf'){?>disabled <?}?>value="<?=$el[4]['id'];?>">---- <?=$el[4]['name'];?></option><?
													foreach($cat as $el[5]) {
														if($el[5]['id']==$_GET['mapping']){continue;}
														if($el[5]['pid']==$el[4]['id']) {
														?><option <?if($el[5]['root']!='leaf'){?>disabled <?}?>value="<?=$el[5]['id'];?>">----- <?=$el[5]['name'];?></option><?
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}			
			}
			?>
		</select>
	</p>
	<br/><input type="submit" name="map" value="Связать"/>
</form>

<br/>
<p><b>Список соответствий</b></p>
<?
$sql = "SELECT `map`.`id`, `map`.`fid`, `map`.`sid`, `cat`.`name` FROM `mandarinko_catalog_mapping` as `map`, `mandarinko_catalog` as `cat`
	WHERE `map`.`fid` = '".mysql_real_escape_string($_GET['mapping'])."' AND
	`map`.`fid` = `cat`.`id`
	ORDER BY `map`.`id`";
$r = mysql_query($sql);

for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
for($i=0;$i<count($data);$i++) {
	$sql = "SELECT `id`, `name` FROM `mandarinko_catalog` WHERE `id`='".$data[$i]['sid']."'";
	$r = mysql_fetch_assoc(mysql_query($sql));
	$data[$i]['sname'] = $r['name'];
	$data[$i]['s_id'] = $r['id'];
}

if(count($data)==0) {
?><p>Соответствий не задано.</p><?
} else {
?>
	<table class="table">
		<tr>
			<th>Каталог</th>
			<th>Связан с</th>
			<th></th>
		</tr>
<?
	for($i=0;$i<count($data);$i++) {
		?>
		<tr>
			<td><?=$data[$i]['fid'];?> - <b><?=$data[$i]['name'];?></b></td>
			<td><?=$data[$i]['sid'];?> - <b><?=$data[$i]['sname'];?></b></td>
			<td><a class="tooltip" title="Удалить связь" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?mapping=<?=$_GET['mapping'];?>&delmap=<?=$data[$i]['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"/></a></td>
		</tr>
		<?
	}
	?>
	</table>
	<?
}
?>
