<?
include($_SERVER['DOCUMENT_ROOT'].'/_config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<link href="/<?=$URL[1];?>/style.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="/<?=$URL[1];?>/js/jquery.js"></script>
	<link href="/<?=$URL[1];?>/js/farbtastic/farbtastic.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="/<?=$URL[1];?>/js/farbtastic/farbtastic.js"></script>
</head>
<body>
<?

$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
$r = mysql_fetch_assoc(mysql_query($sql));
$colors = explode(",",preg_replace("/ /", "", $r['color']));

if ($_GET['deletecolor']) {
	$temp = array();
	for($i=0;$i<count($colors);$i++) {
		if ($colors[$i]!="#".$_GET['deletecolor']) {
			$temp[] = $colors[$i];
		}
	}
	$colorsdel = implode(",", $temp);
	$sql = "UPDATE `mandarinko_catalog_item` SET `color` = '".$colorsdel."' 
			WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
	mysql_query($sql);
	
	$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));
	$colors = explode(",",preg_replace("/ /", "", $r['color']));	
}

if($_POST['color']){
	$colors[] = $_POST['color'];
	$colorsadd = implode(",", $colors);
	$sql = "UPDATE `mandarinko_catalog_item` SET `color` = '".$colorsadd."' 
			WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
	mysql_query($sql);
	
	$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));
	$colors = explode(",",preg_replace("/ /", "", $r['color']));
}
if(!$colors[0]) {
	unset($colors[0]);
}

?>

<p><b>Цвета позиции #<?=$_GET['item'];?></b></p>
<form action="" method="post" enctype="multipart/form-data">
<?if(count($colors)>0){?>
<p>Для удаления цвета из набора просто кликните на нем.</p>
	<?
	foreach($colors as $el) {
		?><a onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>/iframes/color.php?item=<?=$_GET['item'];?>&color=1&deletecolor=<?=substr($el, 1);?>" style="border:1px solid #000;float:left;display:block; width:30px; height:30px; background:<?=$el;?>;"></a><?
	}	
} else { ?><p>Пока цвета для позиции не заданы.</p><? }
	?>
	<br style="clear:both;"/>
	<br/>
	<input type="text" id="color" name="color" value="#000000" /><input type="submit" value="Добавить цвет"/>	
</form>
<div id="colorpicker"></div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#colorpicker').farbtastic('#color');
		});
	</script>
<br/>
</body>
</html>