<?
if ($URL[1] != '') {
    $sql = "SELECT * FROM `mandarinko_static` WHERE `url` = 'about'";
    $r = mysql_query($sql);
    if (mysql_num_rows($r) == 1) {
        $r = mysql_fetch_assoc($r);// http://example.org/page/name
        $CONTENT['title'] .= " - " . $r['header'];
        $CONTENT['metak'] = $r['metakey'];
        $CONTENT['metad'] = $r['metadesc']; ?>


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
                            <h1>О нас</h1>
                            <p>Where we all strart.</p>
                            <ol class="breadcrumb">
                                <li><a href="index01.html">Главная</a></li>
                                <li>О нас</li>
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
                                    <!--<h3>Review   [5]</h3>-->
                                    <div id="comments">
                                        <div id="comments-list-wrapper" class="comments">
                                            <ol id="comments-list">
                                                <li id="comment-1" class="comment-x byuser">
                                                    <div class="the-comment">
                                                        <div class="comment-author vcard"> <img src="img/comment/1.jpg" class="avatar" alt=""> <span class="fn n">TereKoi</span> </div>
                                                        <div class="comment-meta"> <span> Nov 22, 2013 at 10:50 am</span> </div>
                                                        <div class="comment-content">
                    <p> Love how stout he is! But he stands so proudly with his long flowing mane of pure awesomeness! : D I love this! </p>
                </div>
                <div class="comment-reply-link "> <a  data-placement="bottom" data-toggle="tooltip" title="" data-original-title="Replay" class="comment-reply-link" href="menu_single.html#"><i class="fa fa-reply"></i></a> </div>
            </div>
            <!--the-comment -->
            <ul class="children">
                <li id="comment-32" class="comment-x byuser comment-author-admin bypostauthor even depth-2 thm-c-y2013 thm-c-m05 thm-c-d19 thm-c-h14">
                    <div class="the-comment">
                        <div class="comment-author vcard"> <img src="img/comment/2.jpg" class="avatar" alt=""> <span class="fn n">FlushedDeadbeat</span> </div>
                        <div class="comment-meta"> <span> Nov 22, 2013 at 10:50 am</span> </div>
                        <div class="comment-content">
                            <p> Gotta love the combo of majestic flowing mane, and adorable stubby body. Fantastic! </p>
                        </div>
                        <div class="comment-reply-link"> <a  data-placement="bottom"  data-toggle="tooltip" title="" data-original-title="Replay" class="comment-reply-link" href="menu_single.html#"><i class="fa fa-reply"></i></a> </div>
                    </div>
                </li>
            </ul>
            </li>
            <li id="comment-2" class="comment-x byuser">
                <div class="the-comment">
                    <div class="comment-author vcard"> <img src="img/comment/3.jpg" class="avatar" alt=""> <span class="fn n">Lontuku</span> </div>
                    <div class="comment-meta"> <span> Nov 22, 2013 at 10:50 am</span> </div>
                    <div class="comment-content">
                        <p> WOoooooow, beautiful and kind of scary I really like it, makes me think. </p>
                    </div>
                    <div class="comment-reply-link"> <a  data-placement="bottom"  data-toggle="tooltip" title="" data-original-title="Replay" class="comment-reply-link" href="menu_single.html#"><i class="fa fa-reply"></i></a> </div>
                </div>
                <!--the-comment -->
            </li>
            </ol>
        </div>
        <div id="respond">
            <h3 id="reply-title">add a Review<small> <a rel="nofollow" id="cancel-comment-reply-link" href="menu_single.html#" class="cancelled">Cancel reply</a></small> </h3>
            <!-- Contact form -->
            <div class="contact-form">
                <form method="post">
                    <!-- Form Group -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-sx-12">
                                <!-- Element -->
                                <div class="element">
                                    <input type="text" name="name" class="form-control text" placeholder="Name *" />
                                </div>
                                <!-- End Element -->
                            </div>
                            <div class="col-md-4 col-sm-4 col-sx-12">
                                <!-- Element -->
                                <div class="element">
                                    <input type="text" name="email" class="form-control text" placeholder="E-mail *" />
                                </div>
                                <!-- End Element -->
                            </div>
                            <div class="col-md-4 col-sm-4 col-sx-12">
                                <!-- Element -->
                                <div class="element">
                                    <input type="text" name="website" class="form-control text" placeholder="Website" />
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
                                    <textarea name="comment" class="text textarea" placeholder="Comment *" ></textarea>
                                </div>
                                <!-- End Element -->
                            </div>
                            <!-- End form Group -->
                        </div>
                    </div>
                    <!-- Element -->
                    <div class="element text-center">
                        <button type="submit" id="submit-form" value="Send" class="btn btn-black btn-gold">Submit</button>
                        <div class="loading"></div>
                    </div>
                    <!-- End Element -->
                </form>
                <div class="done mt30"> <strong>Thank you!</strong> We have received your message. </div>
            </div>
            <!-- End contact form -->
        </div>
</div>
        </div>
        <!-- End# Comments -->
        </div>
        <!-- Description tab-->
        <div role="tabpanel" class="tab-pane" id="description">
            <div class="row">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                </div>
            </div>
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