<?
if ($URL[1]!='') {	
	$sql = "SELECT * FROM `mandarinko_static` WHERE `url` = '".mysql_real_escape_string($URL[1])."'";
	$r = mysql_query($sql);
	if (mysql_num_rows($r)==1) {
		$r = mysql_fetch_assoc($r);// http://example.org/page/name		
		$CONTENT['title'] .= " - ".$r['header'];		
		$CONTENT['metak'] = $r['metakey'];
		$CONTENT['metad'] = $r['metadesc'];?>
		


<!-- banner 
    ============================================= -->
  <section class="banner dark" >
    <div id="contact-parallax">
      <div class="bcg background47"
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 100px;"
                data-top-bottom="background-position: 50% -100px;"
                data-anchor-target="#contact-parallax"
              >
        <div class="bg-transparent">
          <div class="banner-content">
            <div class="container" >
              <div class="slider-content"> <i class="icon-home-ico"></i>
                <h1>CONTACT US</h1>
                <p>Get in touch</p>
                <ol class="breadcrumb">
                  <li><a href="index01.html">Главная</a></li>
                  <li>Наши контакты</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- End Banner content -->
        </div>
        <!-- End bg trnsparent -->
      </div>
    </div>
    <!-- Service parallax -->
  </section>
  <!-- End Banner -->

    <!-- HEADER -->
        
    <? include("tpl/header.php"); ?>
            
    <!-- /HEADER -->  


    <div id="content">
	<!-- Intro  
    ============================================= -->
    <section id="intro01" class="padding-100 intro2_01">
      <div class="container">
        <div class="row">
          <div class="col-md-6"> <img class="img-responsive" src="img/home2/art.jpg" alt=""> </div>
          <div class="col-md-5 text-center intro_message mt40"> 
            <!-- Head Title -->
            <div class="head_title">
            	<i class="icon-intro"></i>
                <h1>О нас</h1>
                <span class="welcome">Welcome to Shaslik-Mashlik</span>
            </div>
            <!-- End# Head Title -->
            <p>


            <? 	echo stripslashes($r['text']); ?>


            </p>
          </div>
          <!-- End intro center -->
        </div>
      </div>
    </section>
    <!-- End intro -->



    <!-- Address content
    ============================================= -->
    <section class="address-content dark">
      <!--  BG parallax -->
      <div id="address-content">
        <div class="bcg"
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 100px;"
                data-top-bottom="background-position: 50% -100px;"
                data-anchor-target="#address-content"
                style="background-image:url('img/banner/certification.jpg');"
              >
          <!-- BG transparent -->
          <div class="bg-transparent padding-100">
            <div class="container">
              <div class="row">
                <!-- Adress -->
                <div class="col-md-4 adress">
                  <!-- Icon -->
                  <div class="col-md-3 icon "> <i class="fa fa-road"></i> </div>
                  <!-- End Icon -->
                  <!-- Content Item -->
                  <div class="col-md-9 content-item">
                    <h3>Adress</h3>
                    <p> Юр. адрес 5-я линия В.О. д.30 кв 10. <hr>
                      	ИП Иванян Г. Г.<br>
						ИНН 691508628714.</p>
                  </div>
                  <!-- End content Item -->
                </div>
                <!--End Adress -->
                <!-- Phone -->
                <div class="col-md-4 Phone">
                  <!-- Icon -->
                  <div class="col-md-3 icon"> <i class="fa fa-phone"></i> </div>
                  <!-- End Icon -->
                  <!-- Content Item -->
                  <div class="col-md-9 content-item">
                    <h3>PHONE</h3>
                    <p>Телефон:<span>8(812) 985-00-06</span></p>
                    
                  </div>
                  <!-- End content Item -->
                </div>
                <!--End Phone -->
                <!-- Email -->
                <div class="col-md-4 email">
                  <!-- Icon -->
                  <div class="col-md-3 icon"> <i class="fa fa-envelope"></i> </div>
                  <!-- End Icon -->
                  <!-- Content Item -->
                  <div class="col-md-9 content-item">
                    <h3>E-MAIL</h3>
                    <p>Почта:<a href="mailto:shashlikmashlik.spb@gmail.com">shashlikmashlik.spb@gmail.com</a></p>
                    
                  </div>
                  <!-- End content Item -->
                </div>
                <!--End Email -->
              </div>
            </div>
          </div>
        </div>
        <!-- End BG transparent -->
      </div>
      <!-- End BG parallax -->
    </section>
    <!-- End address content -->
    <!-- Map 
    ============================================= -->
    <div class="map">
    	<!--
      <div id="map"></div>-->
      <iframe src="https://api-maps.yandex.ru/frame/v1/-/CZgvNQpT" width="100%" height="500px" frameborder="0"></iframe>
    </div>
    <!-- End map -->
  </div>
  <!-- end of #content -->	


				
		<?
		
	
	} else {
		include('tpl/404.php');
	}
} else {
	include('tpl/404.php');
}

?>