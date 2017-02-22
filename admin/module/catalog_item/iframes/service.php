<?


include($_SERVER['DOCUMENT_ROOT'].'/_config.php');

$srvlist = array(
	array('name' => 'classic', 'text' => 'Классика', 'num' => '1'),
	array('name' => 'oral', 'text' => 'Оральный', 'num' => '2'),
	array('name' => 'anal', 'text' => 'Анальный', 'num' => '3'),
	array('name' => 'massage', 'text' => 'Массаж', 'num' => '4'),
	array('name' => 'group', 'text' => 'Групповой', 'num' => '5'),
	array('name' => 'deepthroating', 'text' => 'Минет глубокий', 'num' => '6')
);
$srvlist2 = array(
	array('name' => 'srv10', 'text' => 'Минет глубокий', 'num' => '10'),
	array('name' => 'srv11', 'text' => 'Кунилингус', 'num' => '11'),
	array('name' => 'srv12', 'text' => 'Игрушки', 'num' => '12'),
	array('name' => 'srv13', 'text' => 'Лесби шоу', 'num' => '13'),
	array('name' => 'srv14', 'text' => 'Услуги семейной паре', 'num' => '14'),
	array('name' => 'srv15', 'text' => 'фото/видео съемка', 'num' => '15'),
	array('name' => 'srv16', 'text' => 'Эскорт', 'num' => '16'),
	array('name' => 'srv17', 'text' => 'Стриптиз профи', 'num' => '17'),
	array('name' => 'srv18', 'text' => 'Стриптиз не профи', 'num' => '18')
);
$srvlist3 = array(
	array('name' => 'srv21', 'text' => 'Госпожа лайт', 'num' => '21'),
	array('name' => 'srv22', 'text' => 'Госпожа профи', 'num' => '22'),
	array('name' => 'srv23', 'text' => 'Рабыня', 'num' => '23'),
	array('name' => 'srv24', 'text' => 'Страпон', 'num' => '24'),
	array('name' => 'srv25', 'text' => 'Порка', 'num' => '25'),
	array('name' => 'srv26', 'text' => 'Ролевые игры', 'num' => '26'),
	array('name' => 'srv27', 'text' => 'Золотой дождь выдача', 'num' => '27'),
	array('name' => 'srv28', 'text' => 'Копрофагия', 'num' => '28'),
	array('name' => 'srv29', 'text' => 'Фистинг', 'num' => '29'),
	array('name' => 'srv30', 'text' => 'Фистинг анальный', 'num' => '30'),
	array('name' => 'srv31', 'text' => 'Урология', 'num' => '31'),
	array('name' => 'srv32', 'text' => 'Фут фетиш', 'num' => '32'),
	array('name' => 'srv33', 'text' => 'Дополнительно', 'num' => '33')
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<link href="/<?=$URL[1];?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?

$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
$r = mysql_fetch_assoc(mysql_query($sql));
$options = explode(",",preg_replace("/ /", "", $r['service']));

if($_POST['service']){
	$options = array();
	foreach($_POST as $el) {		if($el != $_POST['service']) {
			$options[] = $el;
		}
	}
	$optionsadd = implode(",", $options);
	$sql = "UPDATE `mandarinko_catalog_item` SET `service` = '".$optionsadd."'
			WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
	mysql_query($sql);

	$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `id`='".mysql_real_escape_string($_GET['item'])."'";
	$r = mysql_fetch_assoc(mysql_query($sql));
	$options = explode(",",preg_replace("/ /", "", $r['service']));
	?><b style="color: red">Сохранено</b><?
}
if(!$options[0]) {
	unset($options[0]);
}

?>
<p><b>Позиция №<?=$_GET['item'];?> (<?=$r['name'];?>)</b>

<p><b>Основные услуги</b></p>
<form action="" method="post" enctype="multipart/form-data">
<?
$list = implode(",", $options);
$list = $list.",";

foreach ($srvlist as $el) {?>
	<label style="width: 180px; float: left; line-height: 20px"><input type="checkbox" <?if(preg_match('/'.$el['num'].',/', $list)){?>checked <?}?>name="<?=$el['name'];?>" value="<?=$el['num'];?>"/> <?=$el['text'];?></label>
<?}?>

<p><b>Дополнительные услуги</b></p>
<form action="" method="post" enctype="multipart/form-data">
<?
$list = implode(",", $options);
$list = $list.",";

foreach ($srvlist2 as $el) {?>
	<label style="width: 180px; float: left; line-height: 20px"><input type="checkbox" <?if(preg_match('/'.$el['num'].',/', $list)){?>checked <?}?>name="<?=$el['name'];?>" value="<?=$el['num'];?>"/> <?=$el['text'];?></label>
<?}?>

<p><b>Экстрим</b></p>
<form action="" method="post" enctype="multipart/form-data">
<?
$list = implode(",", $options);
$list = $list.",";

foreach ($srvlist3 as $el) {?>
	<label style="width: 180px; float: left; line-height: 20px"><input type="checkbox" <?if(preg_match('/'.$el['num'].',/', $list)){?>checked <?}?>name="<?=$el['name'];?>" value="<?=$el['num'];?>"/> <?=$el['text'];?></label>
<?}?>
<div  style="width: 500px; float: left; line-height: 20px"><input type="submit" value="Сохранить" name="service"/></div>
</form>

</body>
</html>