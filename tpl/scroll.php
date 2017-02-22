<?

$url = 'https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.xchange+where+pair+=+%22EURRUB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
$content = file_get_contents($url);
$json = json_decode($content, true);
$Ask = $json['query']['results']['rate']['Ask'];

?>
	
							<?
							$sql = "SELECT * FROM `mandarinko_scroller` WHERE `url`='main'";
							$g = mysql_fetch_assoc(mysql_query($sql));
							$sql = "SELECT * FROM `mandarinko_scroller_item` WHERE `pid`='".$g['id']."'";
							$r_presentation = mysql_query($sql);
							for($data=array();$row=mysql_fetch_assoc($r_presentation);$data[]=$row) 
							?>
								
			<!-- scroll -->	
			
			<div class="scroll"> 

				<ul style="margin-left: -2400px; ">
				
				
<?
					foreach($data as $el){

						?>
					<li>
						<div>
							<a href="<?=$el['link'];?>">
								<img title="<?=$el['title'];?>" src="/upload/scroller/<?=$el['pid'];?>_<?=$el['id'];?>.jpg" alt="<?=$el['title'];?>" width="<?=$g['width'];?>" height="<?=$g['height'];?>"/>
							</a>
							<p class="item_name"><?=$el['text'];?></p>
							<p class="item_coast">цена: <span><?=$el['coast'];?> руб.</span></p>
						</div>
					</li>
					<?  }; ?>				
				
							<?
							$sql1 = "SELECT * FROM `mandarinko_catalog_item`";
							$g1 =(mysql_query($sql1));
							for($data1=array();$row1=mysql_fetch_assoc($g1);$data1[]=$row1){}
							?>
					<?
					foreach($data1 as $el1) {
						if ($el1['top'] == 'on') {
					?>
					<li>
						<div>
							<a href="/market/
									<? //number_format($el['price']*$Ask, 2, ',', ' ')
										$exp = explode("/", $el1['url']);												
										echo $exp[count($exp)-1];?>								
								/<?=$el1['c_url']?>">
								<img title="<?=$el1['title'];?>" src="/upload/catalog/<?=$el1['id'];?>.jpg" alt="<?=$el1['title'];?>" width="200" height="220"/>
							</a>
							<p class="item_name"><?=mb_substr($el1['name'],0,40,"UTF-8")." ..."?></p>
							<p class="item_coast">цена: <span><?=number_format($el1['price'], 2, ',', ' ')?> руб.</span></p>
						</div>
					</li>
					<? } }; ?>
					
				</ul>

			</div>
			
			<!-- /scroll -->
