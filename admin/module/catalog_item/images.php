<?
if ($_GET['deletefoto']) {
	@unlink($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$_GET['deletefoto']);
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?images=1&item='.$_GET['item'].'&cid='.$_GET['cid']);
	exit;
}
if($_POST['addfiles']) {
	$id = $_GET['item'];
	$count = $_POST['counter'];
	
	for ($i = 1; $i <= $count; $i++) {
		if($_FILES["foto".$i]['name']) {
			if($i < 10) $add = "0"; else $add = "";
			move_uploaded_file($_FILES["foto".$i]['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$id.'_'.$add.$i.'.jpg')
			or die("Ошибка закачки файла");			
			copy($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/'.$id.'_'.$add.$i.'.jpg', $_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$id.'_'.$add.$i.'.jpg');
			
			SetImgSize($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/tmb/'.$id.'_'.$add.$i.'.jpg',128,134);			
		}
	}
	header('Location: /'.$URL[1].'/'.$URL[2].'/'.$URL[3].'?images=1&item='.$id.'&cid='.$_GET['cid']);
	exit;
}
?>

<?
$dir = scandir($_SERVER['DOCUMENT_ROOT'].'/upload/catalog/');
$fotos = array();
foreach($dir as $el) {
	if (preg_match("/^".$_GET['item']."_\d+\.jpg$/", $el)) {
		$fotos[] = $el;
	}
}
$dir = $fotos;
$last = preg_replace("/^\d+_(\d+)\.jpg$/", "$1", $dir[count($dir)-1]);
if (!$last) { $last = 1; } else { $last++; }
?>
<script type="text/javascript">
	$(document).ready(function() {		
		$('.addFile').click(function addFile(){
			var counter = parseInt($("#counter").attr('value'));
			counter++;			
			$("#addtable").append('<tr><td><input type="file" name="foto'+counter+'"/></td></tr>');			
			$("#counter").attr('value', counter);
		});			
	});	
</script>
<p class="text_img"><img src="/<?=$URL[1];?>/img/ico_back.png"/> <a href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?cid=<?=$_GET['cid'];?>">Вернуться к списку позиций</a></p>
<br/>
<p><b>Добавить в галерею позиции #<?=$_GET['item'];?></b></p>
<form action="" method="post" enctype="multipart/form-data">
	<??>
	<input type="hidden" name="counter" id="counter" value="<?=$last;?>"/>
	<img src="/<?=$URL[1];?>/img/ico_add.png"/><a class="addFile" href="javascript:void(0);">Добавить фотографию</a>
	<table class="addtable" id="addtable">			
		<tr>
			<td><input type="file" name="foto<?=$last;?>"/></td>
		</tr>
	</table>
	<input type="submit" name="addfiles" value="Загрузить фотографии"/>
</form>
<br/>
<p><b>Все фотографии позиции #<?=$_GET['item'];?></b></p>

<?
if (count($dir)<1) {
	?><p>Для позиции нет фотографий в галерее.</p><?
} else {
	?><p>Для удаления фотографии просто нажмите на нее.</p><?
	foreach($dir as $el){		
		?><a onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?item=<?=$_GET['item'];?>&images=1&deletefoto=<?=$el;?>&cid=<?=$_GET['cid'];?>"><img src="/upload/catalog/tmb/<?=$el;?>?<?=time();?>" alt=""/></a><?		
	}
}
?>
<br/>