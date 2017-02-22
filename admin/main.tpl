<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title><?=$CONTENT['title'];?></title>
	<link href="/<?=$URL[1];?>/style.css" rel="stylesheet" type="text/css" />
	<link href="/<?=$URL[1];?>/js/jquery-treeview/jquery.treeview.css" rel="stylesheet" type="text/css" />
	<link href="/jquery.crayonbox.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="/<?=$URL[1];?>/favicon.png" type="image/x-icon"/>
	<link rel="shortcut icon" href="/<?=$URL[1];?>/favicon.png" type="image/x-icon"/>
	<link href="/<?=$URL[1];?>/js/fancybox/jquery.fancybox-1.3.2.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="/<?=$URL[1];?>/js/jquery.js"></script>
	<script type="text/javascript" src="/<?=$URL[1];?>/js/jquery.cookie.js"></script> 
	<script type="text/javascript" src="/js/jquery.crayonbox.js"></script>	
	<script type="text/javascript" src="/<?=$URL[1];?>/js/jquery-treeview/jquery.treeview.js"></script>
	<script type="text/javascript" src="/<?=$URL[1];?>/js/tooltip.js"></script>
	<script type="text/javascript" src="/<?=$URL[1];?>/js/fancybox/jquery.fancybox-1.3.2.pack.js"></script>
	<script type="text/javascript" src="/<?=$URL[1];?>/js/fancybox/jquery.easing-1.3.pack.js"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		$("a.tooltip").easyTooltip();
	});
	</script>
</head>

<body>
<div id="wrap">
	<div id="header">
		<!--
		<a href="/<?=$URL[1];?>" id="logo">
			<img src="/<?=$URL[1];?>/img/logo<?=$admin_data['version'];?>.png"></a>
		
		<p><?include('inc/safety.php');?></p>
		<a href="http://mozilla-russia.org/" target="_blank" id="recomend"><img src="/<?=$URL[1];?>/img/firefox.png"></a>
		-->
		<a href="/<?=$URL[1];?>" id="logo">
			<img width="220" src="/<?=$URL[1];?>/img/logo.png"></a> 
	</div>

	<div id="menu">
		<?if($_SESSION['status'] == 'superadmin') {?>
		<div class="block">
			<h2>СуперАдминистратор</h2>
			<?include('inc/block_admin.php');?>
		</div>
		<?}?>

		<div class="block">
			<h2>Основные блоки</h2>
			<?include('inc/block_main.php');?>
		</div>

		<a id="exit" href="/<?=$URL[1];?>/logout">Выход</a></h2>

		<?=$_SESSION['ad_block'];?>
		<br /><br />
	</div>

	<div id="content">
   		<?=$CONTENT['text'];?>
	</div>

	<!--
	<div id="footer">2009-<?=date('Y');?> &copy; <a href="http://www.mandarin.millive.ru">millive.ru</a></div>
	-->
</div>
</body>