<?
if ($URL[1]=='') {  
  $sql = "SELECT * FROM `mandarinko_static` WHERE `url` = 'main'";
  $r = mysql_query($sql);
  if (mysql_num_rows($r)==1) {
    $r = mysql_fetch_assoc($r);// http://example.org/page/name    
    $CONTENT['title'] .= " - ".$r['header'];    
    $CONTENT['metak'] = $r['metakey'];
    $CONTENT['metad'] = $r['metadesc'];?> 


  <!-- Zooming Slider
    ============================================= -->
  <section id="home-header" class="zooming-slider dark fullheight">
    <div class="bg-transparent fullheight">
      <!-- Slider content -->
      <div class="slider-content">
        <!-- Text Rotater -->
        <ul id="fade">
          <li>
            <h1>ИСКУССТВО П‎РИГОТОВЛЕНИЯ ШАШЛЫКОВ НА МАНГАЛЕ</h1>
          </li>
          <li>
            <h1>Рады Вас видеть</h1>
          </li>
          <li>
            <h1>Сочетание традиций и вкуса</h1>
          </li>
        </ul>
        <!-- End Text Rotater -->
        <i class="icon-home-ico"></i>
        <p class="text-uppercase">Мы создаем вкусные воспоминания</p>
        <a href="#" class="btn btn-gold white mega-menu">МЕНЮ</a> </div>
      <!-- End Slider content  -->
    </div>
  </section>
  <!-- End Zooming Slider -->




     <!-- HEADER -->
        
    <? include("tpl/header.php"); ?>
            
    <!-- /HEADER -->  



<!-- Document Content
    ============================================= -->
  <div id="content">
    <!-- welcome block
    ============================================= -->
    <section  class="padding-100 welcome-block">
      <div class="container">
        <div class="row">
          <!-- Left Img Intro -->
          <div class="col-md-4"> <img class="img-responsive" src="themes/majesty/img/Left-Image.jpg" alt=""> </div>
          <!-- End Left Img Intro -->
          <!-- Intro Text Center -->
          <div class="col-md-4 text-center">
          <!-- Head Title -->
            <div class="head_title">
                <i class="icon-intro"></i>
                <h1><?=$TEXT['block1_title']?></h1>
                <span class="welcome">Welcome to Shashlik-Mashlik</span>
            </div>
            <!-- End# Head Title -->
            <p><?=$TEXT['block1_text']?></p>
            <a href="/about" class="btn btn-gold">О нас</a> </div>
          <!-- End intro center -->
          <!-- Right Img Intro -->
          <div class="col-md-4"> <img class="img-responsive" src="themes/majesty/img/right-image.jpg" alt=""> </div>
          <!-- End Right Img Intro -->
        </div>
      </div>
    </section>
    <!-- End welcome block -->
    <!-- Discover
    ============================================= -->
    <section id="slide-2" class="discover dark text-center">
      <!-- Parallax Bg -->
      <div class="bcg background14"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 100px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#slide-2"
    >
        <!-- Bg Transparent -->
        <div class="bg-transparent padding-100" >
          <div class="container">
            <h1><?=$TEXT['block2']?></h1>
            <!--<p class="text-uppercase">You can promote your creative parallax effects</p>
            <a href="about" class="btn btn-gold white">О нас</a> </div>-->
        </div>
        <!-- End Bg transparent -->
      </div>
      <!-- End Parallax Bg -->
    </section>
    <!-- End Discover -->

    <!-- Intro  
    ============================================= -->
    <section id="intro01" class="padding-100 intro2_01">
      <div class="container">
        <div class="row">
          
          <div class="col-md-5"> <img class="img-responsive" src="img/home2/art.jpg" alt=""> </div>
          <div class="col-md-6 text-center intro_message mt40"> 
            <!-- Head Title -->
            <div class="head_title">
              <i class="icon-intro"></i>
                <h1>О нас</h1>
                <span class="welcome">Welcome to Shaslik-Mashlik</span>
            </div>
            <!-- End# Head Title -->
            <p>


            <?  echo stripslashes($r['text']); ?>


            </p>
          </div>
          <!-- End intro center -->
        </div>
      </div>
    </section>
    <!-- End intro -->

    <!-- Video 
    ============================================= -->
    <section id="slide-04" class="video dark text-center" >
      <!-- BG Parallax -->
      <div class="bcg background16"
        data-center="background-position: 50% 0px;"
        data-bottom-top="background-position: 50% 100px;"
        data-top-bottom="background-position: 50% -100px;"
        data-anchor-target="#slide-04"
    >
        <!-- Bg transparent -->
        <div class="bg-transparent padding-100">
          <!-- Left bg -->
          <div class="left_bg"> <img  src="/themes/majesty/img/background/left_bg.png" alt=""> </div>
          <!-- End left bg -->
          <!-- Right bg -->
          <div class="right_bg"> <img  src="/themes/majesty/img/background/right_bg.png" alt=""> </div>
          <!-- End right bg -->
          <!-- Left bg2 -->
          <div class="right_bg2"> <img  src="/themes/majesty/img/background/right_bg2.png" alt=""> </div>
          <!-- End right bg2 -->
          <div class="container">
            <div class="row">
              <!-- Video source 
              <div class="col-md-5">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/23851992"  ></iframe>
                </div>
              </div>-->
              <!-- End video source -->
              <!-- Text video center 
              <div class="col-md-7 text-center">-->
              <div class="col-md-12 text-center">
                <h1 class="">SHASHLIK-MASHLIK</h1>
                <b><?=$TEXT['block3']?></b>
                <p class="italic mt40">Минимальная стоимость заказа варьируется в зависимости от вашего района. </p>
              </div>
              <!-- End Text video center -->
            </div>
          </div>
        </div>
        <!-- End bg transpernt -->
      </div>
      <!-- End bg parallax -->
    </section>
    <!-- End video -->

    <!-- Latest News
    ============================================= -->
    <section class="latest_news">
      <div class="container">
        <div class="row">
         <!-- Head Title -->
          <!--  <div class="head_title">
                <i class="icon-intro"></i>
                <h1>Последние события</h1>
                <span class="welcome">Stay up to Date</span>
            </div>

         

          <div class="news-content dark">

            <div class="news-item col-md-4 col-sm-4 col-xs-12">
              <figure> <img class="img-responsive" src="/themes/majesty/img/blog/block4.jpg" alt="RELAXING AMBIENCE" />
                <figcaption class="text-center">
                  <div class="fig_container"> <i class="fa fa-picture-o"></i>
                    <h3><a href="blog_single_image.html">Новый год</a></h3>
                    <p>Event</p>
                    <div class="fig_content"> <a href="blog_single_image.html">Отмечаем новый год!</a> </div>
                  </div>
                  <span class="btn btn-gold primary-bg white">30 ДЕКАБРЯ 2015</span> </figcaption>
              </figure>
            </div>

            <div class="news-item col-md-4 col-sm-4 col-xs-12">
              <figure> <img class="img-responsive" src="/themes/majesty/img/blog/block5.jpg" alt="RELAXING AMBIENCE" />
                <figcaption class="text-center">
                  <div class="fig_container"> <i class="fa fa-video-camera"></i>
                    <h3><a href="blog_single_video.html">День Святого Валентина</a></h3>
                    <p>Event</p>
                    <div class="fig_content"> <a href="blog_single_video.html"> Праздник к нам приходит.</a> </div>
                  </div>
                  <span class="btn btn-gold primary-bg white">14 ФЕВРАЛЯ 2015</span> </figcaption>
              </figure>
            </div>

            <div class="news-item col-md-4 col-sm-4 col-xs-12 ">
              <figure> <img class="img-responsive" src="/themes/majesty/img/blog/block6.jpg" alt="RELAXING AMBIENCE" />
                <figcaption class="text-center">
                  <div class="fig_container"> <i class="fa fa-volume-up"></i>
                    <h3><a href="blog_single_soundclouds.html">Женский день</a></h3>
                    <p>Event</p>
                    <div class="fig_content"> <a href="blog_single_soundclouds.html">Корпоратив по случаю, так сказаьт...</a> </div>
                  </div>
                  <span class="btn btn-gold primary-bg white">8 МАРТА 2015</span> </figcaption>
              </figure>
            </div>

          </div>-->
          <!-- End News Content -->
        </div>
      </div>
    </section>
    <!-- End latest News-->
  </div>
  <!-- End content !-->



      <?
    
  
  } else {
    include('tpl/404.php');
  }
} else {
  include('tpl/404.php');
}

?>