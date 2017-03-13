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
unset($el);
?>
<?
//посмотрим глубину каталога
$t = file($_SERVER['DOCUMENT_ROOT'].'/'.$URL[1].'/'.$URL[2].'/'.$URL[3].'/about');
$lvl = trim($t[2]);
$lvl++;//так как указываем мы на уровень ниже, ибо считаем не от нуля
?>
<h1>Управление каталогом</h1>
<?


$CONTENT['title'] .= 'Управление каталогом';
if($_GET['add']) include($URL[2].'/'.$URL[3].'/add.php');
elseif($_GET['delete']) include($URL[2].'/'.$URL[3].'/del.php');
elseif($_GET['edit'])   include($URL[2].'/'.$URL[3].'/edit.php');
elseif($_GET['sort'])   include($URL[2].'/'.$URL[3].'/sort.php');
elseif($_GET['mapping'])   include($URL[2].'/'.$URL[3].'/mapping.php');
elseif($_GET['item'])   include($URL[2].'/'.$URL[3].'/item.php');
else {

    $sql = "SELECT * FROM `mandarinko_catalog` ORDER BY `sort` ASC";
    $r = mysql_query($sql);
    for($cat=array();$row=mysql_fetch_assoc($r);$cat[]=$row);

    $sql = "SELECT * FROM `mandarinko_catalog_item` ORDER BY `cid`, `id` DESC";
    $r = mysql_query($sql);
    for($item=array();$row=mysql_fetch_assoc($r);$item[]=$row);

    ?>
<h3>Выбор раздела каталога</h3>
<script type="text/javascript">
    $(document).ready(function() {
        $('#catselect').treeview({        	
			collapsed: 'true',
			animated: 'fast', 
			persist: 'cookie'
        });
    });
</script>
<style type="text/css">
	/*span.cat_level1 { font-weight: bold; }
	span.cat_level2 { font-weight: bold; font-style: italic; }
	span.cat_level3 { font-style: italic; }
	span.cat_level4 {  }	*/
</style>
<ul id="catselect">
	<li>
		<img src="/<?=$URL[1];?>/img/ico_add.png"/><a class="tooltip" title="Добавить корневой раздел" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=root">Добавить раздел</a>
	</li>
	<?
	
	foreach($cat as $el[0]) {	
	
		if($el[0]['pid']==0) {
		?>
		<li>
			<span class="folder cat_level1"><?=$el[0]['name'];?></span>
			<?if($el[0]['root']=='leaf'){?><a class="tooltip" title="Расстановка соответсвий" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?mapping=<?=$el[0]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_mapping.png"></a><?}?>
			<a class="tooltip" title="Сортировка: выше" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[0]['id'];?>&order=up"><img src="/<?=$URL[1];?>/img/ico_arrow_up.png"></a>
			<a class="tooltip" title="Сортировка: ниже" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[0]['id'];?>&order=down"><img src="/<?=$URL[1];?>/img/ico_arrow_down.png"></a>
			<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el[0]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
			<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el[0]['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>			
			<?if ($lvl > 2 && $el[0]['root']!='leaf') {?>
			<ul>
				<li>					
					<img src="/<?=$URL[1];?>/img/ico_add.png"/><a class="tooltip" title="Добавить подраздел на 1 уровень" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=<?=$el[0]['id'];?>">Добавить подраздел</a><br/>					
				</li>
				<?
				foreach($cat as $el[1]){
					if ($el[1]['pid']==$el[0]['id']) {
					?>
					<li>
						<span class="folder cat_level2"><?=$el[1]['name'];?></span>
						<?if($el[1]['root']=='leaf'){?><a class="tooltip" title="Расстановка соответсвий" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?mapping=<?=$el[1]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_mapping.png"></a><?}?>
						<a class="tooltip" title="Сортировка: выше" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[1]['id'];?>&order=up"><img src="/<?=$URL[1];?>/img/ico_arrow_up.png"></a>
						<a class="tooltip" title="Сортировка: ниже" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[1]['id'];?>&order=down"><img src="/<?=$URL[1];?>/img/ico_arrow_down.png"></a>
						<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el[1]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
						<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el[1]['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>						
						<?if ($lvl > 3 && $el[1]['root']!='leaf') {?>
						<ul>
							<li>
								<img src="/<?=$URL[1];?>/img/ico_add.png"/><a class="tooltip" title="Добавить подраздел на 2 уровень" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=<?=$el[1]['id'];?>">Добавить подраздел</a><br/>
							</li>
						<?
						foreach($cat as $el[2]) {
							if($el[2]['pid']==$el[1]['id'])	{
							?>
							<li>
								<span class="folder cat_level3"><?=$el[2]['name'];?></span>
								<?if($el[2]['root']=='leaf'){?><a class="tooltip" title="Расстановка соответсвий" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?mapping=<?=$el[2]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_mapping.png"></a><?}?>
								<a class="tooltip" title="Сортировка: выше" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[2]['id'];?>&order=up"><img src="/<?=$URL[1];?>/img/ico_arrow_up.png"></a>
								<a class="tooltip" title="Сортировка: ниже" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[2]['id'];?>&order=down"><img src="/<?=$URL[1];?>/img/ico_arrow_down.png"></a>
								<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el[2]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
								<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el[2]['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>
								<?if ($lvl > 4 && $el[2]['root']!='leaf') {?>
								<ul>
									<li>
										<img src="/<?=$URL[1];?>/img/ico_add.png"/><a class="tooltip" title="Добавить подраздел на 3 уровень" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=<?=$el[2]['id'];?>">Добавить подраздел</a><br/>
									</li>
									<?
									foreach($cat as $el[3]) {
										if($el[3]['pid']==$el[2]['id'])	{
										?>
										<li>
											<span class="folder cat_level4"><?=$el[3]['name'];?></span>
											<?if($el[3]['root']=='leaf'){?><a class="tooltip" title="Расстановка соответсвий" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?mapping=<?=$el[3]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_mapping.png"></a><?}?>
											<a class="tooltip" title="Сортировка: выше" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[3]['id'];?>&order=up"><img src="/<?=$URL[1];?>/img/ico_arrow_up.png"></a>
											<a class="tooltip" title="Сортировка: ниже" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[3]['id'];?>&order=down"><img src="/<?=$URL[1];?>/img/ico_arrow_down.png"></a>
											<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el[3]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
											<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el[3]['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>											
											<?if ($lvl > 5 && $el[3]['root']!='leaf') {?>
											<ul>
												<li>
													<img src="/<?=$URL[1];?>/img/ico_add.png"/><a class="tooltip" title="Добавить подраздел на 4 уровень" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?add=<?=$el[3]['id'];?>">Добавить подраздел</a><br/>
												</li>
												<?
												foreach($cat as $el[4]) {
													if($el[4]['pid']==$el[3]['id'])	{
													?>
													<li>
														<span class="folder cat_level5"><?=$el[4]['name'];?></span>
														<?if($el[4]['root']=='leaf'){?><a class="tooltip" title="Расстановка соответсвий" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>mapping=<?=$el[4]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_mapping.png"></a><?}?>
														<a class="tooltip" title="Сортировка: выше" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[4]['id'];?>&order=up"><img src="/<?=$URL[1];?>/img/ico_arrow_up.png"></a>
														<a class="tooltip" title="Сортировка: ниже" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?sort=<?=$el[4]['id'];?>&order=down"><img src="/<?=$URL[1];?>/img/ico_arrow_down.png"></a>
														<a class="tooltip" title="Редактировать" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?edit=<?=$el[4]['id'];?>"><img src="/<?=$URL[1];?>/img/ico_edit.png"></a>
														<a class="tooltip" title="Удалить" href="/<?=$URL[1];?>/<?=$URL[2];?>/<?=$URL[3];?>?delete=<?=$el[4]['id'];?>" onclick="if(confirm('Удалить? Восстановление будет невозможно!')) return true; else return false;"><img src="/<?=$URL[1];?>/img/ico_delete.png"></a>											
													</li>
													<?	
													}
												}
												?>
											</ul>
											<?}?>
										</li>
										<?	
										}
									}
									?>
								</ul>
								<?}?>
							</li>
							<?
							}
						}						
						?>
						</ul>
						<?}?>
					</li>
					<?
					}
				}				
				?>
			</ul>
			<?}?>
		</li>
		<?
		}
	}
	?>
</ul>
<?}?>
