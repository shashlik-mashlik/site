<?
$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id` = '".mysql_real_escape_string($_GET['item'])."'";
$item = mysql_fetch_assoc(mysql_query($sql));

if($_POST['cancel']) {
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?item='.$item['id']);
	exit;
}

if($_POST['saveitem']) {

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
		if($el['input']!='outside') $SET[] .= "`".$el['name']."`='".mysql_real_escape_string($_POST[$el['name']])."'";
	}
	$sql = "UPDATE `mandarinko_catalog_item` SET ";
	$sql .= implode(' , ', $SET);
	$sql .= "WHERE `id` = '".$item['id']."'";

	mysql_query($sql) OR die('DB ERROR: CAN\'T UPDATE ITEM');

 	if($_FILES['img']['name']) {
		move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['id'].'.jpg')
		or die("Ошибка закачки файла");
		copy($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['id'].'.jpg',$_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$item['id'].'.jpg');

	//	SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['articul'].'.jpg',288,347);
		SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$item['id'].'.jpg',476,239);
	//	SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$item['id'].'.jpg',164,218);
		SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$item['id'].'.jpg',476,303);
	}
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?cid='.$_GET['cid']);
	exit;
}

if($_GET['edit']) {
	$_POST = $item;
?>
	<p><b>Редактирование товара</b></p>
	<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?cid=<?=$_GET['cid'];?>">Вернуться к списку товаров</a></p>
	<form action="" method="post" enctype="multipart/form-data">
	<table class="addtable">
		<tr>
		  	<td>Фотография</td>
		  	<td><img width="100" src="/upload/catalog/<?=$_POST['id'];?>.jpg?<?=time();?>"/><input name="img" class="long" type="file"></td>
		</tr>
		<tr>
			<td colspan="2"><b>Параметры позиции</b></td>
		</tr>
		<?
		foreach($item_base as $el) {
		?>
		<tr> 
			<td><?=$el['field'];?></td>
			<td>
			<?
			if ($el['input']=='checkbox') {
				?><label><input type="<?=$el['input'];?>" name="<?=$el['name'];?>" <?if($_POST[$el['name']]){?>checked <?}?>/></label><?
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
				$spaw1 = new SPAW_Wysiwyg($el['name'], isset($_POST[$el['name']])?stripslashes($_POST[$el['name']]):'', 'ru', 'full', 'default', '520px', '200px');
				$spaw1->show();
			} else {
				?><input type="<?=$el['input'];?>" name="<?=$el['name'];?>" value="<?=$_POST[$el['name']];?>"/><?
			}
			?>
			</td>
		</tr>
		<?
		}
		?>

	  	<td colspan="2" align="left"><input type="submit" name="cancel" value="Отменить изменения"/><input type="submit" name="saveitem" value="Сохранить изменения"/></td>
	  </tr>
	</table>
	</form>
<?
}
?>