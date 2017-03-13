<ul>
	<?$dir = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/module_admin');
	for($i=2;$i<count($dir);$i++) {    	$name = @file_get_contents($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/module_admin/'.$dir[$i].'/about');
    	if(strlen($name)>2) {?>
	    	<li><a href="/<?=$URL[1];?>/module_admin/<?=$dir[$i];?>"><?=$name;?></a>
	  	<?}

	}

	?>
</ul>