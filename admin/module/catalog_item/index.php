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
$sql = "SELECT * FROM `mandarinko_catalog` LIMIT 1";
$r = mysql_query($sql);
if (mysql_num_rows($r)!=1) {
	//catalog base setup
    $sql = explode(';',trim(file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/3_catalog.sql.php'),'<>?'));
    foreach($sql as $el) mysql_query($el);

	//setup item table
	include($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/12_catalog_item.php');	
	$sql_item = get_item_base();		
	mysql_query($sql_item); 
	
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/');	 
}

include($_SERVER['DOCUMENT_ROOT']."/".$URL[1]."/inc/_function.php");

include($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/setup/12_catalog_item.php');
$item_base = get_item_base(false);


unset($el);
?>
<h1>Управление товарами</h1>
<script type="text/javascript">
	$(document).ready(function(){$("a.iframe").fancybox({autoDimensions:true});});
</script>
<?
$CONTENT['title'] .= 'Управление товарами';
if($_GET['add']) include($URL[2].'/'.$URL[3].'/add.php');
elseif($_GET['delete']) include($URL[2].'/'.$URL[3].'/del.php');
elseif($_GET['edit'])   include($URL[2].'/'.$URL[3].'/edit.php');
elseif($_GET['images']) include($URL[2].'/'.$URL[3].'/images.php'); 
elseif($_GET['color']) include($URL[2].'/'.$URL[3].'/color.php');
elseif($_GET['links']) include($URL[2].'/'.$URL[3].'/links.php');
else {

    $sql = "SELECT * FROM `mandarinko_catalog` ORDER BY `sort` ASC";
    $r = mysql_query($sql);
    for($cat=array();$row=mysql_fetch_assoc($r);$cat[]=$row);

    $sql = "SELECT * FROM `mandarinko_catalog_item` ORDER BY `cid`, `id` DESC";
    $r = mysql_query($sql);
    for($item=array();$row=mysql_fetch_assoc($r);$item[]=$row);

	if (count($cat)>0) {		
		if($_GET['cid']){?><p class="text_img"><img src="/<?=$URL[1];?>/img/ico_add.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=1&cid=<?=$_GET['cid'];?>">Добавить товар в выбранный каталог</a></p><?}		
	?>	
	<form action="" method="get" id="partf">
		<select name="cid" onChange="document.getElementById('partf').submit();">
			<option disabled <?if(!$_GET['cid']){?>selected <?}?> value="">Выберите раздел магазина</option>
			<?
			foreach($cat as $el[0]) {
				if($el[0]['pid']==0) {
				?><option <?if($_GET['cid']==$el[0]['id']){?>selected <?}?><?if($el[0]['root']=='root'){?>disabled <?}?>value="<?=$el[0]['id'];?>"><?=$el[0]['name'];?></option><?
					foreach($cat as $el[1]) {
						if($el[1]['pid']==$el[0]['id']) {
						?><option <?if($_GET['cid']==$el[1]['id']){?>selected <?}?><?if($el[1]['root']=='root'){?>disabled <?}?>value="<?=$el[1]['id'];?>">- <?=$el[1]['name'];?></option><?
							foreach($cat as $el[2]) {
								if($el[2]['pid']==$el[1]['id']) {
								?><option <?if($_GET['cid']==$el[2]['id']){?>selected <?}?><?if($el[2]['root']=='root'){?>disabled <?}?>value="<?=$el[2]['id'];?>">-- <?=$el[2]['name'];?></option><?
									foreach($cat as $el[3]) {
										if($el[3]['pid']==$el[2]['id']) {
										?><option <?if($_GET['cid']==$el[3]['id']){?>selected <?}?><?if($el[3]['root']=='root'){?>disabled <?}?>value="<?=$el[3]['id'];?>">--- <?=$el[3]['name'];?></option><?
											foreach($cat as $el[4]) {
												if($el[4]['pid']==$el[3]['id']) {
												?><option <?if($_GET['cid']==$el[4]['id']){?>selected <?}?><?if($el[4]['root']=='root'){?>disabled <?}?>value="<?=$el[4]['id'];?>">---- <?=$el[4]['name'];?></option><?
													foreach($cat as $el[5]) {
														if($el[5]['pid']==$el[4]['id']) {
														?><option <?if($_GET['cid']==$el[5]['id']){?>selected <?}?><?if($el[5]['root']=='root'){?>disabled <?}?>value="<?=$el[5]['id'];?>">----- <?=$el[5]['name'];?></option><?
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
	</form><?	
	}	
    
	if($_GET['cid']) {				
		$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `cid` = '".mysql_real_escape_string($_GET['cid'])."' ORDER BY `id`";
		$r = mysql_query($sql);
		for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);
		?>
		<br>
		<table class="table">
		  <tr>
			<th>Фотография</th>
			<?
			foreach($item_base as $el) {
			?>
			<?if(!$el['hide']){?><th><?=$el['field'];?></th><?}?>
			<?
			}
			?>
			<th></th>
		  </tr>
		<?
		foreach($data as $el) {?>
		  <tr>
			<td width="48" align="center"><img width="50%" src="/upload/catalog/<?=$el['id'];?>.jpg?<?=time();?>"/></td>
			<?
			foreach($item_base as $ib) {
			?>
			<?
			if(!$ib['hide']){
			?>
				<td width="100"><?
					$arr=explode(" ", $el[$ib['name']]);
					for($i=0;$i<5;$i++){
					?><?=$arr[$i]." ";?><?
					}
					if(count($arr)>5){?>
						<a href="javascript:void(0);" style="text-decoration:none;" class="tooltip" title="<?=$el[$ib['name']];?>">&lt;...&gt;<?
					}?>
				</td><?
			}?>
			<?
			}
			?>
			<td width="56">
				<a class="tooltip" title="Фотогалерея" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$el['id'];?>&images=1&cid=<?=$_GET['cid'];?>"><img src="/<?=$URL[1];?>/img/ico_photos.png"/></a>
				<a class="tooltip" title="Редактировать позицию" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$el['id'];?>&edit=1&cid=<?=$_GET['cid'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"/></a>
				<a class="tooltip" title="Удалить позицию" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/?item=<?=$el['id'];?>&delete=1&cid=<?=$_GET['cid'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"/></a>
			</td>
		  </tr>
		<?}?>
		</table>

	<?}
}?>