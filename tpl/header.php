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
            <a href="/" class="light-logo"><img src="/themes/majesty/img/logo.png" alt="Logo" height="60px"></a> 
            <a href="/" class="dark-logo"><img src="/themes/majesty/img/logo-dark.png" alt="Logo" height="70px"></a> 

            <span style="color: #d7d7d7;">89214101296</span>
        </div>
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
                    	<div class="item"> <a href="/market/shashliks"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/shashliks.jpg"  alt="shashliks">
                        	<h2>Шашлыки</h2>
                        </a> </div>
                      	<!--
                      	<div class="item"> <a href="/market/shashliks/svinina"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/dishes.jpg"  alt="dishes">
                        	<h2>Свинина</h2>
                        </a> </div>
                      	<div class="item"> <a href="/market/shashliks/baranina"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/fishes.jpg"  alt="fishes">
                        	<h2>Баранина</h2>
                        </a> </div>
                      	<div class="item"> <a href="/market/shashliks/kura"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/salads.jpg"  alt="salads">
                        	<h2>Курица</h2>
                        </a> </div>
                      	<div class="item"> <a href="/market/shashliks/telyatina"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/deserts.jpg"  alt="deserts">
                        	<h2>Телятина</h2>
                        </a> </div>
                      	<div class="item"> <a href="/market/shashliks/govyadina"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/drinks.jpg"  alt="drinks">
                        	<h2>Говядина</h2>
                        </a> </div>
                      	<div class="item"> <a href="/market/shashliks/ryba"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/soup.jpg"  alt="Soups">
                        	<h2>Рыба</h2>
                        </a> </div>
                      	<div class="item"> <a href="/market/shashliks/nabory"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/combo.jpg"  alt="Combo Meals">
                        	<h2>Наборы</h2>
                        </a> </div>
						<div class="item"> <a href="/market/shashliks/ovoschi"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/combo.jpg"  alt="Combo Meals">
                        	<h2>Овощи</h2>
                        </a> </div>
						-->
						<div class="item"> <a href="/market/salat"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/salat.jpg"  alt="salat">
                        	<h2>Салаты и Закуски</h2>
                        </a> </div>
						<div class="item"> <a href="/market/garniry"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/garniry.jpg"  alt="garniry">
                        	<h2>Гарниры</h2>
                        </a> </div>
						<div class="item"> <a href="/market/sousy"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/sousy.jpg"  alt="sousy">
                        	<h2>Соусы</h2>
                        </a> </div>
                        <div class="item"> <a href="/market/hleb"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/hleb.jpg"  alt="hleb">
                        	<h2>Хлеб</h2>
                        </a> </div>
                        <div class="item"> <a href="/market/napitki"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/napitki.jpg"  alt="napitki">
                        	<h2>Напитки</h2>
                        </a> </div>
                        <div class="item"> <a href="/market/pivo"> <img class="img-responsive" src="/themes/majesty/img/drop_menu/pivo.jpg"  alt="pivo">
                        	<h2>Пиво</h2>
                        </a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
            <li><a href="/about"><div>О нас</div></a></li>
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
              <h4>Shopping Cart</h4>
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
