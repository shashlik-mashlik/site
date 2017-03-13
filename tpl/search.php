<script>

</script>
	


					<!-- article ------------------------------------------------------------- -->
				
					<div id="article" class="container" style="width: 780px;">

						<!--Bootstrap-->
					
						<ol class="breadcrumb">
							<li><a href="/basket">Быстрый поиск</a></li>
						</ol>
						
						<blockquote class="blockquote-reverse">
						<?

							include ('search/search-function.php');
							
							if (($_GET['keyword']) == '') {echo('<h3>Введите запрос</h3>');}else
							if (count(creat_array_from_separate_transition($_GET['keyword']))  <= 1) {echo('<h3>Введите более точный запрос. Ваш запрос "' . $_GET['keyword'] . '"</h3>');}
							else {echo('<h3>Результат поиска по запросу "' . $_GET['keyword'] . '" </h3>');}

							 


						?>
						</blockquote>
						
						
						
						<!-- -contact ------------------------------------------------------------- -->
						
						<? 
						
						
						if ((($_GET['keyword']) != '') && ((strlen($_GET['keyword'])) < 100)) {
						
							$keyword = mysql_real_escape_string($_GET['keyword']);
							$keyword .= " ";

						?>
						
							<table class="table table-hover" style="width: 750px;">												
							<?
	
							$array_coin_id_len=0;
							
							$sql = "SELECT * FROM `mandarinko_catalog_item`";
							$g =(mysql_query($sql));
							for($data=array();$row=mysql_fetch_assoc($g);$data[]=$row) {}
							$array_coin_id_len = 0;
							foreach($data as $el){
								
								$id = $el['id'];
								$articul = $el['articul'];
								$name = $el['name'];
								$desc = $el['desc'];
								$price = $el['price'];
								$url = $el['url'];
								$c_url = $el['c_url'];
								
								if (points($keyword, $name) != 0){
								//	print_item($id,$articul,$name,$desc,$price);
									$coin[] = points($keyword, $name);
									$array_coin_id[] = array($id, $articul, $name, $desc, $price, $url, $c_url, points($keyword, $name));	
									$array_coin_id_len++;
								}
								
							}
						/*	
							for ($i = 0; $i < $array_coin_id_len; $i++){  //Вывод не отсортированного массива
								print_item($array_coin_id[$i][0],$array_coin_id[$i][1],$array_coin_id[$i][2],$array_coin_id[$i][3],$array_coin_id[$i][4],$array_coin_id[$i][5],$array_coin_id[$i][6],$array_coin_id[$i][7]);
							}
						*/	
							array_multisort($coin, $array_coin_id); //Сортировка по $coin
							
						//	for ($i = 0; $i < $array_coin_id_len; $i++) {
						//	//	echo $array_coin_id[$i][0]."</br>"; //Вывод отсортированного $coin
						//	}
							
						
							$stop = $array_coin_id_len-10;
							for ($i = $array_coin_id_len-1; $i > $stop; $i--){ //Вывод отсортированного массива по $coin
								if ($array_coin_id[$i][0] == "") {break;} //Выпиливаем из отображения баганутые лоты
								print_item($array_coin_id[$i][0],$array_coin_id[$i][1],$array_coin_id[$i][2],$array_coin_id[$i][3],$array_coin_id[$i][4],$array_coin_id[$i][5],$array_coin_id[$i][6],$array_coin_id[$i][7]);
							}
							
							?>
							</table>
						
						<?
						} 
						?>
						
						<div class="alert alert-warning alert-dismissable">
							
							<strong>Внимание</strong> Уточните наличие товара на складе у менеджера
						</div>					
						
						<!-- /contact ------------------------------------------------------------- 						
						
						
						
						
					
					</div>
				
					<!-- /article ------------------------------------------------------------- -->



