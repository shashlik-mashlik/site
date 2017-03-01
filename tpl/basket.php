<?

include('tpl/basket/basket-functions.php');


if (isset($_GET['add_basket_item'])) {
    add_to_cart($_GET['add_basket_item']);
}
if (isset($_GET['remove_from_cart'])) {
    remove_from_cart($_GET['remove_from_cart']);
}
if (isset($_GET['del_basket_item'])) {
    del_basket_item($_GET['del_basket_item']);
}


?>


<!-- banner 
  ============================================= -->
<section class="banner dark">
    <div id="cart-parallax">
        <div class="bcg background46"
             data-center="background-position: 50% 0px;"
             data-bottom-top="background-position: 50% 100px;"
             data-top-bottom="background-position: 50% -100px;"
             data-anchor-target="#cart-parallax"
        >
            <div class="bg-transparent">
                <div class="banner-content">
                    <div class="container">
                        <div class="slider-content  "><i class="icon-home-ico"></i>
                            <h1>Cart</h1>
                            <p>Shop With Us</p>
                            <ol class="breadcrumb">
                                <li><a href=".">Главная</a></li>
                                <li>Корзина</li>
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
    <!-- Carts
    ============================================= -->
    <section class="carts text-center padding-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Table carts -->

                    <form action="order" method="get">
                        <blockquote class="blockquote-reverse">
                            <? if (($_SESSION['products_incart']) < 1) {
                                echo('<h3>В корзине нет товаров</h3>');
                            } else { ?>
                                <h3>В корзине <?= $_SESSION['products_incart'];
                                    if ($_SESSION['products_incart'] == 1) {
                                        echo(" позиция");
                                    } else
                                        if (($_SESSION['products_incart'] > 1) && ($_SESSION['products_incart'] < 5)) {
                                            echo(" позиции");
                                        } else
                                            if ($_SESSION['products_incart'] > 4) {
                                                echo(" позицй");
                                            }
                                    ?> на сумму: <span><?= $_SESSION['cart_coast'] ?></span> руб.</h3>
                            <? } ?>
                        </blockquote>


                        <table class="table table-striped table-responsive table-cart">
                            <thead>
                            <tr>
                                <th style="width:40%">Наименование</th>
                                <th style="width:15%">Цена</th>
                                <th style="width:20%">Количество</th>
                                <th style="width:25%">Сумма</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?

                            //echo $i;
                            foreach ($_SESSION['products'] as $key => $value) {
                                $i++;
                                $q = "SELECT * FROM `mandarinko_catalog_item` WHERE id='" . $key . "'";
                                $product = mysql_fetch_assoc(mysql_query($q));

                                ?>


                                <tr>

                                    <?
                                    $images_url = './upload/catalog/' . $product['id'] . '.jpg';/*тыбля с тучкой*/
                                    $no_images = '/images/no_photo.jpg';

                                    if (file_exists($images_url)) {
                                        $images_url = '/upload/catalog/' . $product['id'] . '.jpg';
                                    } else {
                                        $images_url = '/images/no_photo.jpg';
                                    }
                                    ?>

                                    <td><a href="menu_single.html"><img src="<?= $images_url ?>"
                                                                        alt="<?= $product['name'] ?>"
                                                                        title="<?= $product['name'] ?>"
                                                                        class="img-thumbnail"> <?= $product['name'] ?>
                                        </a></td>
                                    <td><?= $product['price'] ?> руб.</td>
                                    <td><!-- input group minus & plus-->

                                        <!--  КНОПКИ НАЧАЛО -->
                                        <div class="input-group plus-minus">

                                            <table style="border: none">
                                                <tr>
                                                    <td class="active">
                                                        <a href="/basket/?del_basket_item=<?php echo $key ?>"
                                                           type="submit" 
                                                           title="Удалить один лот">
                                                            <span class="glyphicon glyphicon-minus"></span></a></td>
                                                    <td class="active" style="width: 70px;">

                                                        <input readonly class="" type="text" size="2"
                                                               id="product_count_<?php echo $key; ?>"
                                                               value="<?php echo $_SESSION['products'][$key]['count'] ?>"/>
                                                    </td>
                                                    <td class="active">
                                                        <span onclick="basketAjax.add_to_cart(<?php echo $key ?>)" title="Добавить один лот">
                                                            <span class="glyphicon glyphicon-plus"></span>
                                                        </span>
                                                    </td>


                                                </tr>

                                                <!-- <button class="btn btn-danger">ggg+++</button> -->

                                            </table>

                                        </div>
                                        <!-- КНОПКИ КОНЕЦ -->


                                        <!-- End input group minus & plus --></td>
                                    <td><span
                                            class="total"><?php echo($_SESSION['products'][$key]['count'] * $_SESSION['products'][$key]['coast']) ?>
                                            руб. </span>
                                        <a class="pull-right" href="/basket/?remove_from_cart=<?php echo $key ?>"><i
                                                class="fa fa-times"></i></a></td>
                                </tr>

                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                        <!-- End Table carts  -->
                </div>
                <!-- Carts content -->
                <div class="col-md-12 carts-content">
                    <div class="row">

                        <!-- Right side -->
                        <div class="col-md-5 col-md-offset-2 right-side">
                            <div class="form-group text-right checkout">
                                <? if (($_SESSION['products_incart']) >= 1) { ?>
                                    <a href="/order" type="submit" class="btn btn-black">Оформить заказ</a>
                                <? } ?>

                            </div>
                        </div>
                        <!--End Right side-->
                    </div>


                    </form>
                </div>
                <!--End Carts content -->


            </div>
        </div>
    </section>
    <!-- End Carts -->


</div>
<!-- end of #content -->
	
				



