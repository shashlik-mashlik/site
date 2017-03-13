
					<!--Bootstrap-->				
					
					<ol class="breadcrumb">		

					<?
					
					$sql_item_name = "SELECT * FROM `mandarinko_catalog_item` WHERE `c_url` = '".$URL[$i]."'";
					$sql_item_name = mysql_query($sql_item_name);
					$sql_item_name = (mysql_fetch_assoc($sql_item_name));
					$sql_item_name = $sql_item_name['name'];
							
	
						if ($URL[1]=='market') { 
						?>	
							<li><a href="/market">Каталог</a></li> <? 

							for ($step = 2; $step <= $i; $step++) {
								if ($URL[$step]!='') {
									$sql_cat_name = "SELECT * FROM `mandarinko_catalog` WHERE `url` = '".$URL[$step]."'";
									$sql_cat_name = mysql_query($sql_cat_name);
									$sql_cat_name = (mysql_fetch_assoc($sql_cat_name));
									$sql_cat_name = $sql_cat_name['name'];
									?>	
										<li><a href="/market/"><?=$sql_cat_name?></a></li> <? 
								}
							} ?>
							
							<a href="/market/"><?=mb_substr($sql_item_name, 0, 250/$i)?><?if ($sql_item_name != '') { echo "..."; }?></a> <?
						}

						?>
					
					</ol>