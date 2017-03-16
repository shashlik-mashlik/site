<?

$url = 'https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.xchange+where+pair+=+%22EURRUB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
$content = file_get_contents($url);
$json = json_decode($content, true);
$Ask = $json['query']['results']['rate']['Ask'];

?>


        <?

          $g =(mysql_query($sql));

          for($data=array();$row=mysql_fetch_assoc($g);$data[]=$row){}
          
          foreach($data as $el){  ?> 


                <?
                
                  $images_url='./upload/catalog/'.$el['id'].'.jpg';/*тыбля с тучкой*/
                  $no_images='/images/no_photo.jpg';
                  
                  if (file_exists($images_url)) {
                    $images_url='/upload/catalog/'.$el['id'].'.jpg';/*ебля с тыбля*/
                  } else {
                    $images_url='/images/no_photo.jpg';
                  }
                  
                ?>




  
    <!-- Single menu
      ============================================= -->
    <section class="single-menu text-left padding-100">
      <div class="container">
        <div class="row">
          <!-- Menu thumb slider -->
          <div class="menu-thumb-slide col-md-6">
            <div id="single-img" class="owl-carousel">
              <div class="item"><img src="<?=$images_url?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div>
							<? if (file_exists('./upload/catalog/'.$el['id'].'_01.jpg')) {?><div class="item"><img src="<?='/upload/catalog/'.$el['id'].'_01.jpg'?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div><?}?>
			  			<? if (file_exists('./upload/catalog/'.$el['id'].'_02.jpg')) {?><div class="item"><img src="<?='/upload/catalog/'.$el['id'].'_02.jpg'?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div><?}?>
							<? if (file_exists('./upload/catalog/'.$el['id'].'_03.jpg')) {?><div class="item"><img src="<?='/upload/catalog/'.$el['id'].'_03.jpg'?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div><?}?>
            </div>
            <div id="thumb-img" class="owl-carousel">
			  			<? if (file_exists('./upload/catalog/'.$el['id'].'_01.jpg')) {?><div class="item"><img src="<?=$images_url?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div><?}?>
						  <? if (file_exists('./upload/catalog/'.$el['id'].'_01.jpg')) {?><div class="item"><img src="<?='/upload/catalog/'.$el['id'].'_01.jpg'?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div><?}?>
							  <? if (file_exists('./upload/catalog/'.$el['id'].'_02.jpg')) {?><div class="item"><img src="<?='/upload/catalog/'.$el['id'].'_02.jpg'?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div><?}?>
								  <? if (file_exists('./upload/catalog/'.$el['id'].'_03.jpg')) {?><div class="item"><img src="<?='/upload/catalog/'.$el['id'].'_03.jpg'?>" alt="<?=$el['name']?>" title="<?=$el['name']?>"></div><?}?>
            </div>
          </div>
          <!--End Menu thumb slider -->
          <!-- Menu Desc -->
          <div class="menu-desc col-md-6">
            <h2><?=$el['name']?> <span class="pull-right"><?=number_format($el['price'], 2, ',', ' ')?> руб.</span></h2>
            <!-- Rating -->
            <fieldset class="rating">
              <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> 
              <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span>
              <span><i class="fa fa-star"></i></span>
            </fieldset>
            <!-- End Rating -->
            <!-- Tagged -->
            <div class="tagged"> 
              <!--<span class="label red">Spicy</span> -->
              <span class="label label-default"><?=$el['name']?></span> 
              <!--<span class="label instock">In Stock</span> -->
            </div>
            <!-- Ends Tagged -->
            <!-- Description content -->
            <div class="desc-content">
              <p><?=$el['desc']?></p>
              <!-- Meta description -->
              <div class="meta-desc"> 

              <span onclick="basketAjax.add_to_cart(<?php echo $el['id'] ?>); basketAjax.changeButton(<?php echo $el['id'] ?>);" class="shop btn btn-gold"data-toggle="tooltip" data-original-title="Добавить в корзину"><i id="add_cart_btn_<?php echo $el['id'] ?>" class="fa fa-shopping-cart"></i></span>
              <a class="added_to_cart wc-forward" style="visibility: hidden; margin-top: 12px;" id="go_to_cart_<?php echo $el['id'] ?>" href="/basket">Перейти в корзину</a>
									<div class="social pull-right ya-share2" data-image="http://shashlld.beget.tech<?=$images_url?>" data-title="Самые вкусные шашлыки в СПб. Я заказываю здесь! <?=$el['name']?>" data-services="vkontakte,facebook,odnoklassniki"></div>
<!--                <ul class="social pull-right">-->
<!--                  <li><a href="menu_single.html#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>-->
<!--                  <li><a href="menu_single.html#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>-->
<!--                  <li><a href="menu_single.html#" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>-->
<!--                  <li><a href="menu_single.html#" data-toggle="tooltip" title="" data-original-title="Behance"><i class="fa fa-behance"></i></a></li>-->
<!--                </ul>-->
              </div>
              <!--End Meta description -->
            </div>
            <!--End Description content -->
          </div>
          <!--End Menu Desc -->
        </div>
      </div>
    </section>
    <!-- End single menu -->










        <? }?>