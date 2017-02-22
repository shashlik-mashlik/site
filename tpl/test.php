
<?php


include('tpl/basket/basket-functions.php');



?>


	
				<!-- article ------------------------------------------------------------- -->
				
				<div id="article" class="container" style="width: 780px;">

					<!-- -contact ------------------------------------------------------------- -->
					
					<form method="post" action="/test">
					
						<!--Bootstrap-->
					
						<ol class="breadcrumb">
							<li><a href="/basket">Подтверждение заказа</a></li>
						</ol>
						
						<blockquote class="blockquote-reverse">
							<? 
							
							
							

							if (($_SESSION['products_incart'])<1) {echo('<h3>В корзине нет товаров</h3>');} else {?>
							<h3>В корзине <?=$_SESSION['products_incart'];
							if ($_SESSION['products_incart']==1) {echo(" позиция");} else
							if (($_SESSION['products_incart']>1)&&($_SESSION['products_incart']<5)) {echo(" позиции");} else
							if ($_SESSION['products_incart']>4) {echo(" позицй");}
								?> на сумму: <span><?=$_SESSION['cart_coast']?></span> руб.</h3>
							<?} ?>
						</blockquote>					
					
					

	
							
							<table class="table table-striped" style="width: 750px;">
								<tr>
									<td> <dt>Наименование:</dt></td><td> <dt>Артикул:</dt></td><td> <dt>Цена:</dt></td><td> <dt>Сумма:</dt></td><td> <dt>Количетсво:</dt></td>
								</tr>
								<?
							

								foreach ($_SESSION['products'] as $key=>$value) {$i++;
									$q="SELECT * FROM `mandarinko_catalog_item` WHERE id='".$key."'";
									$product=mysql_fetch_assoc(mysql_query($q));

								?>
								
								<tr>	
									<td><dd style="display: block;"><?=$product['name']?></dd></td> 
									<td><dd style="display: block;"><?=$product['articul']?></dd></td> 
									<td><dd style="display: block;"><?=$product['price']?> руб.</dd></td> 
									<td><dd style="display: block;"><?=($_SESSION['products'][$key]['count']*$_SESSION['products'][$key]['coast'])?> руб.</dd></td> 
									<td><dd style="display: block;"><?=$_SESSION['products'][$key]['count']?></dd></td> 
								</tr>

								<?php

								$basket = "№ продукта: "; 
									/*		
								$basket = $basket + "№ продукта: ".$key.". 
											наименование ".$product['name'].".
											артикль ".$product['articul'].". 
											цена: ".$product['price'].". 
											сумма: ".($_SESSION['products'][$key]['count']*$_SESSION['products'][$key]['coast'].". 
											количество.: ".$_SESSION['products'][$key]['count']; 											
											*/
								
								}
								?>
							</table>				
					
					
					
						<fieldset>
						

							
						
									<div class="alert alert-warning alert-dismissable">
										<strong>Внимание</strong> Уточните наличие товара на складе у менеджера
									</div>
									
									
									<div style="width: 750px; margin: 0 auto;">
										
										<table style="width: 750px;">
											<tr>
											<td><div class="form-group">
												<label for="exampleInputEmail1">Город</label>
												<select name="sity" class="form-control" id="exampleInputEmail1" placeholder="Enter email" style="width: 250px;">
													<option>Москва</option>
													<option>Санкт-Петербург</option>
												</select>
											</div></td>
											<td><div class="form-group">
												<label for="exampleInputEmail1">Улица</label>
												<input name="street" type="text" class="form-control" id="exampleInputEmail1" placeholder="ул. политехническая" value="<?php 
							if (isset($_POST['street']) && !empty($_POST['street'])) echo $_POST['street']; ?>" style="width: 250px;">
											</div></td>
											</tr>
											<tr>
											<td><div class="form-group" style="float: left; margin-right: 20px;">
												<label for="exampleInputEmail1">Дом</label>
												<input name="home" type="text" class="form-control" id="exampleInputEmail1" placeholder="9" style="width: 100px;" value="<?php 
							if (isset($_POST['home']) && !empty($_POST['home'])) echo $_POST['home']; ?>">
											</div></td>
											<td><div class="form-group">
												<label for="exampleInputEmail1">Квартира</label>
												<input name="room" type="text" class="form-control" id="exampleInputEmail1" placeholder="32" style="width: 100px;" value="<?php 
							if (isset($_POST['room']) && !empty($_POST['room'])) echo $_POST['room']; ?>">
											</div></td>
											</tr>
											<tr>
											<td><div class="form-group">
												<label for="exampleInputEmail1">Телефон (для получания СМС)</label>
												<input name="tel" type="tel" class="form-control" id="exampleInputEmail1" placeholder="88122973048" value="<?php 
							if (isset($_POST['tel']) && !empty($_POST['tel'])) echo $_POST['tel']; ?>" style="width: 250px;">
											</div></td>
											<td><div class="form-group">
												<label for="exampleInputEmail1">Имя получателя</label>
												<input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Петров Петр Петрович" value="<?php 
							if (isset($_POST['name']) && !empty($_POST['name'])) echo $_POST['name']; ?>" style="width: 250px;">
											</div></td>
											</tr>
											<tr>
											<td><div class="form-group">
												<label for="exampleInputEmail1">E-mail</label>
												<input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="info@bonvio.com" value="<?php 
							if (isset($_POST['email']) && !empty($_POST['email'])) echo $_POST['email']; ?>" style="width: 250px;">
											</div></td>
											<td><div class="form-group">
												<label for="exampleInputEmail1">Комментарий</label>
												<textarea name="message" class="form-control" id="exampleInputEmail1" placeholder="What's on your mind?" value="<?php 
							if (isset($_POST['message']) && !empty($_POST['message'])) echo $_POST['message']; ?>" style="width: 250px; height: 60px;">
												</textarea>
											</div></td>
											</tr>
										</table>

									</br>	
					
									<button type="submit" name="submit" class="btn btn-success" style="dysplay: block; float: right;" onclick="Сообщение отправлено">Подтвердить заказ</button>
						</br></br></br></br></br>



<?php



include('tpl/mailto.php');



?>						
									
									
									</div>	



						</fieldset>
					</form>
				
				</div></br>
				
				<!-- /article ------------------------------------------------------------- -->
<? //}?>


	