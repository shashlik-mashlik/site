<?

session_start();// Начинаем сессию

?>

<!-- HEADER -->
	


  <!-- Header
    ============================================= -->
  <header id="header" class="header-transparent">
    <div class="container">
      <div class="row">
        <div id="main-menu-trigger"><i class="fa fa-bars"></i></div>
        <!-- Logo
                    ============================================= -->
        <div id="logo"> 
            <a href="/" class="light-logo"><img src="/themes/majesty/img/logo-intro-dark-loader.png" alt="Logo" height="70px"></a> 
            <a href="/" class="dark-logo"><img src="/themes/majesty/img/logo-intro-dark-loader.png" alt="Logo" height="70px"></a> 
        </div>
        <div style="float: left; height: 70px; line-height: 70px; font-size: 18px; color: white;" class="hidden-xs">тел. <?=$TEXT['phone']?></div>
                    <!--End #logo  -->
        <!-- Primary Navigation
                    ============================================= -->
        <nav id="main-menu" class="dark">
          <ul>
            <li><a href="/"><div>Главная</div></a></li>
            <li class="mega-menu"><a href="#">
              <div>Меню</div>
              </a>
              <div class="mega-menu-content  col-1 clearfix">
                <ul>
                  <li class="mega-menu-title">
                    <div id="menu_carousel">
											<?
											echo "mysql ping: " . mysql_ping();
											$q="SELECT * FROM `mandarinko_presentation_item`";
												$result = mysql_query($q);
												while ($row = mysql_fetch_assoc($result)) {
											?>
												<div class="item">
													<a href="<?=$row['link']?>"> <img class="img-responsive" src="/upload/presentation/tmb/<?=$row['pid'].'_'$row['id']?>"  alt="<?=$row['text']?>">
														<h2><?=$row['title']?></h2>
													</a>
												</div>
											<?}?>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            <li><a href="/about"><div>О нас</div></a></li>
              <li><a href="/feedback"><div>Отзывы</div></a></li>
            <li><a href="/about#contacts"><div>Контакты</div></a></li>
            <li><a href="/basket"><div>Корзина</div></a></li>
            <!--
            <li><a href="/review"><div>Отзывы</div></a></li>
            
            <li><a href="/comtact"><div>Контакты</div></a></li>
            -->
          </ul>
          <!-- Top Cart
                        ============================================= -->
          <div id="shop_cart" style="cursor: pointer;" onclick="basketAjax.top_cart.show();"> 
          	<a id="shop_tigger_"><i class="fa fa-shopping-cart"></i>

                <!--<? if($_SESSION['products_incart'] > 0 ) { ?><span id="header_basket_all_count"><?=$_SESSION['products_incart']; ?></span><? }; ?>-->
                <span id="header_basket_all_count" style="display: <? if($_SESSION['products_incart'] < 1) {echo 'none';} ?>" ><?=$_SESSION['products_incart']; ?></span>

          	</a>
            <div class="shop_cart_content" id="shop_cart_content" style="width: 450px;">
              <h4>Корзина</h4>
              <div class="cart_items" id="top_cart_items">
                <div id="top_cart_content"></div>
                <div class="shop_action clearfix"> <span id="top_cart_all_coast" class="shop_checkout_price">0р</span>
                  <button onclick="window.location = '/basket'" class="btn btn-dark">Перейти в корзину</button>
                </div>
              </div>
              <!-- End cart items -->
            </div>
          </div>
          <!-- End shop cart -->
        </nav>
        <!-- #main-menu end -->
      </div>
    </div>
  </header>
  <!-- End Header Transparent -->


				
<!-- /HEADER -->
