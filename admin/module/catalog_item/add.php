<?
if($_POST['addend']) {
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?cid='.$_GET['cid']);
	exit;
}

if($_POST['additem']) {
	$SET = array();
	foreach($item_base as $el) {
		if($el['type']=='int') {			
			$c = preg_replace("/[^\d]/", "", $_POST[$el['name']]);
			
			if($el['name']=='weight') {
				if(preg_match("/кг/", $_POST[$el['name']])) {
						$c *= 1000;
				}
			}
			$_POST[$el['name']] = $c;
		}
		$SET[] .= "`".$el['name']."`='".mysql_real_escape_string($_POST[$el['name']])."'";
	}

	$sql = "INSERT INTO `mandarinko_catalog_item` SET
		`cid` = '".mysql_real_escape_string($_GET['cid'])."', ";
	$sql .= implode(' , ', $SET);		
	mysql_query($sql) OR die('DB ERROR: CAN\'T CREATE ITEM');

	$id = mysql_insert_id();
	
	$pid = mysql_real_escape_string($_GET['cid']);
	
	for($i = 1; $i < 5; $i++) {
		$sql = "SELECT `pid`, `url` FROM `mandarinko_catalog` WHERE `id`='".$pid."'";
		$r = mysql_fetch_assoc(mysql_query($sql));
		$pid = $r['pid'];
		$URL_[] = $r['url'];
	}		
	foreach($URL_ as $k=>$el) {
		if (is_null($el)||$el='') {
			unset($URL_[$k]);
		}
	}
	$URL_ = array_reverse($URL_);	
	$URL_ = implode("/", $URL_);	
	
	$sql = "UPDATE `mandarinko_catalog_item` SET `url` = '".$URL_."' WHERE `id` = '".$id."'";
	mysql_query($sql) or die($sql);
	
// 	if($_FILES['img']['name']) {
//		move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$articul.'.jpg')
//		or die("Ошибка закачки файла");
		//copy($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$articul.'.jpg',$_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$articul.'_fs.jpg');
		
		//copy($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$articul.'.jpg',$_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$articul.'.jpg');
		
//		copy($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$articul.'.jpg',$_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$articul.'.jpg');

	//	SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$id.'.jpg',288,347);
	//	SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$id.'.jpg',164,218);
//	}


$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id` = '".$id."'";
$item = mysql_fetch_assoc(mysql_query($sql));

	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE CATEGORY');

 	if($_FILES['img']['name']) {
		move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['id'].'.jpg')
		or die("Ошибка закачки файла");
		copy($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['id'].'.jpg',$_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$item['id'].'.jpg');

	//	SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['articul'].'.jpg',288,347);
		SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['id'].'.jpg',555,239);
	//	SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$item['id'].'.jpg',164,218);
		SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$item['id'].'.jpg',476,303);
	}
	
	
	
	if($_POST['outside']) 
		header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?add=1&cid='.$_GET['cid'].'&outside='.$id);
	else 
		header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?cid='.$_GET['cid']);
	exit;
}

if($_GET['add']) {
	if($_GET['outside']) {
	?>
	<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_ok_sm.png"> Позиция успешно создана. На данном шаге вы можете задать дополнительные параметры позиции.</p>			
	<p><b>Добавление позиции - шаг 2</b></p>
	<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?cid=<?=$_GET['cid'];?>">Вернуться к списку товаров</a></p>		
	<br/>
	<p>Дополнительные параметры позиции:</p>
	<br/>
	<?
		foreach($item_base as $el) {
			if($el['input']=='outside') {
				?>
				<b><?=$el['field'];?></b> <a class="iframe" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/iframes/<?=$el['name'];?>.php?item=<?=$_GET['outside'];?>&<?=$el['name'];?>=1&cid=<?=$_GET['cid'];?>">Редактировать</a>				
				<?
			}
		}
	?>
	<br/><br/>
	<form action="" method="post">
		<input type="submit" name="addend" value="Завершить добавление позиции"/>
	</form>
	<?
	} else {
	?>
	<p><b>Добавление позиции</b></p>
	<p class="text_img"><img width="100"> src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?cid=<?=$_GET['cid'];?>">Вернуться к списку товаров</a></p>
	<form action="" method="post" enctype="multipart/form-data">
		<table class="addtable">
			<tr>
				<td>Фотография</td>
				<td><input name="img"  class="long" type="file"></td>
			</tr>

			<tr>
				<td colspan="2"><b>Параметры позиции</b></td>
			</tr>
			<?
			$outside = false;
			foreach($item_base as $el) {
				if($el['input']!='outside'){
			?>
			<tr>
				<td><?=$el['field'];?></td>
				<td>
				<?
				if ($el['input']=='checkbox') {
					?><label><input type="<?=$el['input'];?>" name="<?=$el['name'];?>" <?if($_POST[$el['name']]){?>checked <?}?>/><?=$el['field'];?></label><?
				} elseif($el['input']=='radio') {
					$values = explode(",", $el['values']);
					foreach($values as $val) {
					?>
					<label><input <?if($_POST[$el['name']]==$val){?>checked <?}?>type="<?=$el['input'];?>" name="<?=$el['name'];?>" value="<?=$val;?>"/><?=$val?$val:'Отмена';?></label>
					<?
					}					
				} elseif($el['input']=='textarea') {
					?>
					<!--<textarea rows="35" cols="4" name="< ?=$el['name'];?>">< ?=$_POST[$el['name']];?></textarea>-->
					<?					
					include_once $_SERVER['DOCUMENT_ROOT']."/admin/ckeditor/ckeditor_php5.php";
					$initialValue = stripslashes($_POST[$el['name']]);
					$CKEditor = new CKEditor();

					$CKEditor->basePath = '/admin/ckeditor/';
					$config['skin'] = 'office2003';
					$CKEditor->editor($el['name'], $initialValue, $config);
					
				} elseif($el['input']=='wysiwyg') {
					include($_SERVER['DOCUMENT_ROOT']."/admin/js/spaw2/spaw.inc.php");
					$spaw1 = new SPAW_Wysiwyg($el['name'], isset($_POST[$el['name']])?stripslashes($_POST[$el['name']]):'', 'ru', 'full', 'default', '100%', '200px');
					$spaw1->show();
				} else {
					?><input type="<?=$el['input'];?>" name="<?=$el['name'];?>" value="<?=$_POST[$el['name']];?>"/><?
				}
				?>
				</td>
			</tr>
			<?
				} else {
					if(!$outside) {?><input type="hidden" name="outside" value="1"/><?}
					$outside = true;
				}
			}
			?>

		  <tr>
			<td colspan="2" align="left"><input type="submit" name="additem" value="<?if($outside){?>Перейти на второй шаг<?}else{?>Добавить позицию<?}?>"></td>
		  </tr>
		</table>
	</form>
<?
	}
}
?>
