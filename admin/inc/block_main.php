<ul>
	<?
	$t = explode(',',$_SESSION['rights']);
	foreach($t as $el) $RIGHT[$el] =  "1";
	$dir = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/module');
	for($i=2;$i<count($dir);$i++) {
		$t = @file($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/module/'.$dir[$i].'/about');    	$name  = $t[1];
    	if(((strlen($name)>2 AND $RIGHT[trim($t[0])]==1) OR $_SESSION['status'] == 'superadmin') AND count($t)>1) {?>
	    	<li><a href="/<?=$URL[1];?>/module/<?=$dir[$i];?>"><?=$name;?></a>
	  	<?}
	}

	?>
	<!--<li><a href="#">Новости</a>
		<a class="video tooltip" title="Нажмите для просмотра видео урока" href="#"></a></li>-->

</ul>