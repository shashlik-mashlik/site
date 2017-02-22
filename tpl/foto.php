<?
if(is_numeric($URL[2]))
{
	$sql = "SELECT * FROM `mandarinko_scroller` WHERE `id`='".mysql_real_escape_string($URL[2])."'";
	$g = mysql_fetch_assoc(mysql_query($sql));
	$CONTENT['title'] = "Фотогалерея - Альбом : ".$g['name'];
	
	$sql = "SELECT * FROM `mandarinko_scroller_item` WHERE `pid`='".$g['id']."'";
	$r = mysql_query($sql);
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);

	?><h3><?=$CONTENT['title'];?></h3>
	
	<div class="foto_sep"></div>
	<h4><a href="/foto">&lt;&lt;&lt; Вернуться к списку альбомов </a></h4>	
	<br/><br/>

        <?
	foreach($data as $el)
        {
		?>
		<div class="g_list" style="float: left;">
			<a rel="scroller" class="fancy" href="/upload/scroller/<?=$el['pid'];?>_<?=$el['id'];?>.jpg"><img src="/upload/scroller/tmb/<?=$el['pid'];?>_<?=$el['id'];?>.jpg" alt=""/></a>
		</div>
		<?
	}
} else {

	$CONTENT['title'] .= " - Фотогалерея - Альбомы фотографий";
	$sql = "SELECT * FROM `mandarinko_scroller` ORDER BY `id` DESC";
	$r = mysql_query($sql);
	for($data=array();$row=mysql_fetch_assoc($r);$data[]=$row);

	?><h3><?=$TEXT['foto_article'];?></h3>
	<div class="foto_sep"></div>
	<?
	$i=0;	
	foreach($data as $el) { 
		$i++;		
		$sql = "SELECT COUNT(`id`) as `count`, `id` FROM `mandarinko_scroller_item` WHERE `pid`='".$el['id']."'";
		$r = mysql_query($sql);
		$item = mysql_fetch_assoc($r);
	?>
	<div class="g_block">
						
		<div class="g_frame">
			
			
				<a href="/foto/<?=$el['id'];?>">
				
					
					<div class="g_img" style="background-position: 50% 50%; background: url('/upload/scroller/tmb/<?=$el['id'];?>_<?=$item['id'];?>.jpg') no-repeat;">
						<!--
						<img src="/upload/scroller/tmb/<?//=$el['id'];?>_<?//=$item['id'];?>.jpg" alt="">

						</img>
						-->
						<div class="lefttop"></div>
						<div class="top"></div>
						<div class="righttop"></div>
						
						<div class="left"></div>
						<div class="right"></div>
						
						<div class="leftbottom"></div>
						<div class="bottom"></div>
						<div class="rightbottom"></div>
					</div>
					
				</a>
							
		</div>
				
		<a class="name" href="/foto/<?=$el['id'];?>"><?=stripslashes($el['name']);?></a>
		<p class="date"><?=@date('d.m.Y',$el['lastedit']);?></p>
		<!--<p class="notify">Фотографий в альбоме: < ?//=$item['count'];?></p>-->
	
		
	</div>

	
	<?
	if ($i==3) { $i=0; ?><div class="separator"></div> <div class="foto_sep"></div><? }
	}
	?>
<?
}
?>