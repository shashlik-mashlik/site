<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags
    ============================================= -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?=$CONTENT['metad'];?>" />
<meta name="keywords"    content="<?=$CONTENT['metak'];?>" />
<meta name="author" content="konekon.com">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Your Title Page
    ============================================= -->
<title><? //=strip_tags($CONTENT['title']);?>Шашлык-Машлык</title>
<meta name="title" content="<? //=strip_tags($CONTENT['title']);?>Шашлык-Машлык" />
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<!-- Favicon Icons
     ============================================= -->
<link rel="shortcut icon" href="/themes/majesty/img/favicon/favicon.ico">
<!-- Standard iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="57x57" href="/themes/majesty/img/favicon/apple-touch-icon-57x57.png">
<!-- Retina iPhone Touch Icon-->
<link rel="apple-touch-icon" sizes="114x114" href="/themes/majesty/img/favicon/apple-touch-icon-114x114.png">
<!-- Standard iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="72x72" href="/themes/majesty/img/favicon/apple-touch-icon-72x72.png">
<!-- Retina iPad Touch Icon-->
<link rel="apple-touch-icon" sizes="144x144" href="/themes/majesty/img/favicon/apple-touch-icon-144x144.png">
<!-- Bootstrap Links
     ============================================= -->
<!-- Bootstrap CSS  -->
<link href="/themes/majesty/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Plugins
     ============================================= -->
<!-- Owl Carousal -->
<link rel="stylesheet" href="/themes/majesty/stylesheets/owl.carousel.css">
<link rel="stylesheet" href="/themes/majesty/stylesheets/owl.theme.css">
<!-- Animate -->
<link rel="stylesheet" href="/themes/majesty/stylesheets/animate.css">
<!-- Date Picker 
<link rel="stylesheet" href="/themes/majesty/stylesheets/jquery.datetimepicker.css">-->
<!-- Pretty Photo -->
<link rel="stylesheet" href="/themes/majesty/stylesheets/prettyPhoto.css">
<!-- Font awsome icons -->
<link rel="stylesheet" href="/themes/majesty/stylesheets/font-awesome.min.css">
<!-- General Stylesheet
    ============================================= -->
<!-- Custom Fonts Setup via Font-face CSS3 -->
<link href="/themes/majesty/fonts/fonts.css" rel="stylesheet">
<!-- Main Template Styles -->
<link href="/themes/majesty/stylesheets/main.css" rel="stylesheet">
<!-- Main Template Responsive Styles -->
<link href="/themes/majesty/stylesheets/main-responsive.css" rel="stylesheet">
<style>
  .btn-gold:hover > i {color: white;}
</style>
<!--[if lt IE 9]>
      <script src="javascripts/libs/html5shiv.js"></script>
      <script src="javascripts/libs/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Loader
    ============================================= -->
<div id="loader">
  <div class="loader-item"> <img src="/themes/majesty/img/preloader.png" alt="" width="300px">
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  </div>
</div>
<!-- End Loader -->
<!-- Document Wrapper
    ============================================= -->
<div id="wrapper">
  




    <!-- HEADER -->
        
    <? //include("tpl/header.php"); ?>
            
    <!-- /HEADER -->  

    <!-- CONTENT -->
            
    <? include("tpl/content.php"); ?>
        
    <!-- CONTENT -->

    <!-- FOOTER -->     
        
    <? include("tpl/footer.php"); ?>
        
    <!-- /FOOTER -->

  <!--  scroll to top of the page-->
  <a href="index01.html#" id="scroll_up" ><i class="fa fa-angle-up"></i></a> </div>
<!-- End wrapper -->
<!-- Core JS Libraries -->
<script src="/themes/majesty/javascripts/libs/jquery.min.js" type="text/javascript"></script>
<script src="/themes/majesty/javascripts/libs/plugins.js"></script>
<!-- JS Plugins -->
<!--
<script src="http://maps.googleapis.com/maps/api/js"></script>
-->
<script src="/themes/majesty/javascripts/libs/modernizr.js"></script>
<!-- JS Custom Codes -->
<script src="/themes/majesty/javascripts/custom/main.js" ></script>
<script src="/ajax/ajax.js"></script>
<!--<script src="/ajax/common.js"></script>-->
<script src="/ajax/basket/basket.js"></script>
<script src="/ajax/order/order.js"></script>
<script src="/ajax/feedback/feedback.js"></script>
<!-- For This Pgae Only Zooming slider -->
<script src="/themes/majesty/javascripts/custom/mbBgGallery_init.js"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter43851539 = new Ya.Metrika({
                    id:43851539,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/43851539" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>