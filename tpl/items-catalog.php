
    


    <!-- Menu Masonry Three Column
    ============================================= -->
    <section class="padding-b-100 text-center masonry_menu masonry_columm_full">




<?
if ($URL[2]=='') {  

    ?>  


      <!-- Menu Bar -->
      <div class="menu-bar dark">
        <!-- menu Filter
        ============================================= -->
        <ul id="menu-fillter" class="clearfix">
          <li class="activeFilter"><a href="menu_masonry_fullwidth.html#" data-filter="*">Показать все</a></li>
          <li><a href="menu_masonry_fullwidth.html#" data-filter=".247">Шашлыки</a></li>
          <li><a href="menu_masonry_fullwidth.html#" data-filter=".256">Салаты</a></li>
          <li><a href="menu_masonry_fullwidth.html#" data-filter=".258">Соусы</a></li>
          <li><a href="menu_masonry_fullwidth.html#" data-filter=".259">Хлеб</a></li>
          <li><a href="menu_masonry_fullwidth.html#" data-filter=".260">Напитки</a></li>
          <li><a href="menu_masonry_fullwidth.html#" data-filter=".261">Пиво</a></li>
        </ul>
        <!-- #menu-filter end -->
      </div>
      <!-- End menu bar -->
      
<? } ?>  

<?
if (($URL[2]=='shashliks') && ($URL[3]=='')) {  

    ?>  


      <!-- Menu Bar -->
      <div class="menu-bar dark">
        <!-- menu Filter
        ============================================= -->
        <ul id="menu-fillter" class="clearfix">
          <li class="activeFilter"><a href="#" data-filter="*">Шашлыки</a></li>
          <li><a href="#" data-filter=".248">Свинина</a></li>
          <li><a href="#" data-filter=".249">Баранина</a></li>
          <li><a href="#" data-filter=".250">Курица</a></li>
          <li><a href="#" data-filter=".251">Телятина</a></li>
          <li><a href="#" data-filter=".252">Говядина</a></li>
          <li><a href="#" data-filter=".253">Рыба</a></li>
          <li><a href="#" data-filter=".254">Наборы</a></li>
          <li><a href="#" data-filter=".255">Овощи</a></li>
        </ul>
        <!-- #menu-filter end -->
      </div>
      <!-- End menu bar -->
      
<? } ?> 



      <!-- Menu Items
      ============================================= -->
      <div class="container-fluid padding-t-100">
        <!-- Menu Items Masonary Content -->
        <div id="menu-items" class="masonry-content dark clearfix" >




<?

$url = 'https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.xchange+where+pair+=+%22EURRUB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
$content = file_get_contents($url);
$json = json_decode($content, true);
$Ask = $json['query']['results']['rate']['Ask'];

?>

          <?//сюда надо подсунуть переменную запроса - $sql для таблицы айтемов$el['name']

          $g =(mysql_query($sql));
          
          $i=0;
          
          for($data=array();$row=mysql_fetch_assoc($g);$data[]=$row){/*$i++; if (($i==26)&&($URL[1]=="")) {break;}*/}
          
          foreach($data as $el){  if ($el['new'] == 'on') {?>

                <?
                
                  $images_url='./upload/catalog/tmb/'.$el['id'].'.jpg';/*тыбля с тучкой*/
                  $no_images='/images/no_photo.jpg';
                  
                  if (file_exists($images_url)) {
                    $images_url='/upload/catalog/tmb/'.$el['id'].'.jpg';
                  } else {
                    $images_url=$no_images;
                  }

                ?>


                  <?
                    $class_for_247 = "";

                    if (($el['cid']=="249") || ($el['cid']=="250") || ($el['cid']=="251") || ($el['cid']=="252") || ($el['cid']=="253") || ($el['cid']=="254") || ($el['cid']=="255")) {
                        $class_for_247 = "247";

                    }

                  ?>

          <!-- Menu Item -->
          <article class="menu-item <?=$el['cid']?> <?=$class_for_247?>">
            <!-- Overlay Content -->
            <div class="overlay_content overlay-menu">


                



              <!-- Overlay Item -->
              <div class="overlay_item"> <img src="<?=$images_url?>?" alt="<?=$el['name']?>" title="<?=$el['name']?>">
                <div class="overlay">
                  <div class="icons">
                    <h3><?=mb_substr($el['name'],0,40,"UTF-8")." ..."?></h3>
                    <h3><?=number_format($el['price'], 2, ',', ' ')?>р.</h3>
                    <!-- Rating 
                    <fieldset class="rating">
                      <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span class="active"><i class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                    </fieldset>-->
                    <!-- end Rating -->
                    <!-- Button -->
                    <div class="button"> 
                      <a class="btn btn-gold" href="menu_masonry_fullwidth.html#"><i class="fa fa-shopping-cart"></i></a>
                      <a class="btn btn-gold" href="/market/<?=$el['url']?>/<?=$el['c_url']?>"><i class="fa fa-link"></i></a> </div>
                    <!-- End Button -->
                    <a class="close-overlay hidden">x</a> </div>
                </div>
              </div>
              <!-- Overlay Item -->
            </div>
            <!-- End Overlay Content -->
          </article>
          <!-- End Menu Item -->

          <? } } ?> 


                  </div>
        <!-- #menu end -->
        <!--<a href="menu_masonry_fullwidth.html#" class="more btn btn-gold">Load more</a> </div>-->
      <!-- end of container -->
    </section>
    <!-- End masonry Column-->