<?
if ($URL[1] != '') {
    $sql = "SELECT * FROM `feedback` WHERE `status` = '1' ORDER BY `id` DESC LIMIT 5";
    $r = mysql_query($sql);
    if (mysql_num_rows($r) >= 0) {
        ?>


<!-- banner
    ============================================= -->
<section class="banner about dark">
    <div id="service-parallax">
        <div class="bcg background47"
             data-center="background-position: 50% 0px;"
             data-bottom-top="background-position: 50% 100px;"
             data-top-bottom="background-position: 50% -100px;"
             data-anchor-target="#service-parallax"
        >
            <div class="bg-transparent">
                <div class="banner-content">
                    <div class="container">
                        <div class="slider-content"><i class="icon-home-ico"></i>
                            <h1>Отзывы</h1>
                            <ol class="breadcrumb">
                                <li><a href="/">Главная</a></li>
                                <li>Отзывы</li>
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
                <div class="col-md-12 text-center intro_message mt40">
                    <!-- Head Title -->
                    <div class="head_title">
                        <i class="icon-intro"></i>
                        <h1>Отзывы</h1>
                        <!--<span class="welcome">Welcome to Shaslik-Mashlik</span>-->
                    </div>
                    <!-- End# Head Title -->
                    <p>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="review">
                                <!-- Comments -->
                                <div class="comment-blog">
                                    <div id="comments">



                                        <div id="respond">
                                            <h3 id="reply-title">Мы будем рады любому отзыву о нас!<small> <a rel="nofollow" id="cancel-comment-reply-link" href="menu_single.html#" class="cancelled">Cancel reply</a></small> </h3>
                                            <!-- Contact form -->
                                            <div class="contact-form">
                                                <form>
                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-4 col-sx-12">
                                                                <!-- Element -->
                                                                <div class="element">
                                                                    <input type="text" id="ajax_name" class="form-control text" placeholder="Имя *" required/>
                                                                    <span style="visibility: hidden; padding: 10px; background: #000; opacity: 0.7; color: #FFF; position: absolute; top: -35px; left: 10px;" id="ajax_name_span"></span>
                                                                </div>
                                                                <!-- End Element -->
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-sx-12">
                                                                <!-- Element -->
                                                                <div class="element">
                                                                    <input type="text" id="ajax_email" class="form-control text" placeholder="E-mail *" required/>
                                                                    <span style="visibility: hidden; padding: 10px; background: #000; opacity: 0.7; color: #FFF; position: absolute; top: -35px; left: 10px;" id="ajax_email_span"></span>
                                                                </div>
                                                                <!-- End Element -->
                                                            </div>
                                                            <div class="col-md-4 col-sm-4 col-sx-12">
                                                                <!-- Element -->
                                                                <div class="element">
                                                                    <input type="text" id="ajax_phone" class="form-control text" placeholder="Телефон *" required/>
                                                                    <span style="visibility: hidden; padding: 10px; background: #000; opacity: 0.7; color: #FFF; position: absolute; top: -35px; left: 10px;" id="ajax_phone_span"></span>
                                                                </div>
                                                                <!-- End Element -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End form group -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <!-- Form Group -->
                                                            <div class="form-group">
                                                                <!-- Element -->
                                                                <div class="element">
                                                                    <textarea id="ajax_comment" class="text textarea" placeholder="Комментарий *" required></textarea>
                                                                    <span style="visibility: hidden; padding: 10px; background: #000; opacity: 0.7; color: #FFF; position: absolute; top: -35px; left: 10px;" id="ajax_comment_span"></span>
                                                                </div>
                                                                <!-- End Element -->
                                                            </div>
                                                            <!-- End form Group -->
                                                        </div>
                                                    </div>
                                                    <!-- Element -->
                                                    <div class="element text-center">
                                                        <button  type="submit" id="submit-form" name="send" onclick="feedback.send(); return false;" class="btn btn-black btn-gold">Отправить</button>
                                                        <div class="loading"></div>
                                                    </div>
                                                    <!-- End Element -->
                                                </form>
                                                <div class="done mt30"> <strong>Thank you!</strong> We have received your message. </div>
                                            </div>
                                            <!-- End contact form -->
                                        </div>

                                        <hr style="margin: 20px;">

                                        <div id="comments-list-wrapper" class="comments">
                                            <ol id="comments-list">
                                                <?while ($row = mysql_fetch_array($r)) { ?>
                                                        <li class="comment-x byuser" >
                                                            <div class="the-comment" >
                                                            <div class="comment-author vcard" > <span class="fn n" ><?=$row['name']?></span > </div >
                                                            <div class="comment-meta" > <span ><?=$row['date']?></span > </div >
                                                            <div class="comment-content" >
                                                                <p style="font-size: 16px;"><?=$row['text'];?></p >
                                                            </div >
                                                            </div >
                                                        </li >
                                                <?
                                                }
                                                ?>
                                            </ol>
                                        </div>







                                    </div>
                                </div>
                            <!-- End# Comments -->
                            </div>
                        <!-- End Description tab-->
                        </div>
                    <!-- End Tab panes -->
                    </div>
                </p>
            </div>
            <!-- End intro center -->
        </div>
    </div>
    </section>
    <!-- End intro -->
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