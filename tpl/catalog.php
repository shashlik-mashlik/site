<?
if ($URL[1]=='market') {	
	$sql = "SELECT * FROM `mandarinko_static` WHERE `url` = 'market'";
	$r = mysql_query($sql);
	if (mysql_num_rows($r)==1) {
		$r = mysql_fetch_assoc($r);// http://example.org/page/name		
		$CONTENT['title'] .= " - ".$r['header'];		
		$CONTENT['metak'] = $r['metakey'];
		$CONTENT['metad'] = $r['metadesc'];?>		
		
				


  <!-- banner 
    ============================================= -->
  <section class="banner about dark" >
    <div id="menu-single-parallax">
      <div class="bcg background45"
                data-center="background-position: 50% 0px;"
                data-bottom-top="background-position: 50% 100px;"
                data-top-bottom="background-position: 50% -100px;"
                data-anchor-target="#menu-single-parallax"
              >
        <div class="bg-transparent">
          <div class="banner-content">
            <div class="container" >
              <div class="slider-content"> <i class="icon-home-ico"></i>
                <h1>Меню</h1>
                <p>Enjoy taste</p>
                <ol class="breadcrumb">
                  <li><a href="/">Главная</a></li>
                  <li>Меню</li>
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



  <!-- Content
    ============================================= -->
  <div id="content">

          

					<?
					
						$count_url = 0;					
						for ($i=1; $URL[$i]!=''; $i++) {
							$count_url++;
						}

						$url_str = '';
						for ($i=2; $URL[$i]!=''; $i++) {
							if ($URL[$i+1]=='') {
								//	echo $URL[$i];
								$url_str_cat = $url_str;
								$url_str .= $URL[$i];
							} else {
								//	echo $URL[$i];
								$url_str .= $URL[$i];
								//	echo "/";
								$url_str .= "/";
							}								
						}	
					
						$i = $count_url;					

						if ($i == 1) { 
							$sql = "SELECT * FROM `mandarinko_catalog_item` ORDER BY `cid`"; 
						//	include('tpl/items-catalog.php');
						}				
				
						if ($i >= 2) { 
							//$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `url`='".mysql_real_escape_string($url_str)."'"; 
							$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `url` LIKE '".mysql_real_escape_string($url_str)."%'"; 
						//	include('tpl/items-catalog.php');
						}								
					
					?>

					<?
					$rows = mysql_query($sql);
					if (mysql_num_rows($rows)==0) { //значит это итем
						$sql = "SELECT * FROM `mandarinko_catalog_item` WHERE `c_url` = '".$URL[$i]."'";						
						include('tpl/item-catalog.php'); //сюда надо подсунуть переменную запроса - $sql для таблицы айтемов при получении одного итема
					} 
					else {
						include('tpl/items-catalog.php'); //сюда надо подсунуть переменную запроса - $sql для таблицы айтемов для получания списка имемов
					}					
					?>	







  </div>
  <!-- End #content -->










				
		<?
		
	
	} else {
		include('tpl/404.php');
	}
} else {
	include('tpl/404.php');
}

?>