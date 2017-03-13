
					<?					
					$sql = "SELECT * FROM `mandarinko_main_menu` WHERE `name` = 'first_menu'";
					$g = mysql_fetch_assoc(mysql_query($sql));
					$sql = "SELECT * FROM `mandarinko_main_menu_item` WHERE `pid`='".$g['id']."'";					
					$r_main_menu= mysql_query($sql);
					for($data=array();$row=mysql_fetch_assoc($r_main_menu);$data[]=$row)						
					?>
					
			<!-- menu_bar -->
			
			<div id="menu_bar">				
				<div  id="menu">				
					<ul>
						<? foreach($data as $el){
									if ($el['parent_title']=="root"){
									$r_title=$el['title'];
									$r_parent_title=$el['parent_title'];?>									
							<li class="first_li">
								<a href="<?=$el['link']?>"><?=$el['text']?></a>
							</li>
							<?};}?>
					</ul>				
				</div>
				<div id="search"> 
					<form name="quick_search" action="/search" method="get">											
							<input type="text" name="keyword" class="input_text" value="<?=$_GET['keyword']?>"/>
							<input type="image" src="/images/search_lipa.png" alt="Search" title="Search" class="input_img">													
					</form>
				</div>																
			</div>
			
			<!-- /menu_bar -->