<?
include $_SERVER['DOCUMENT_ROOT'] . '_config.php';

if (isset($_POST['add_basket_item'])) {
    add_to_cart($_POST['add_basket_item']);
}
if (isset($_POST['remove_from_cart'])) {
    remove_from_cart($_POST['remove_from_cart']);
}
if (isset($_POST['del_basket_item'])) {
    del_basket_item($_POST['del_basket_item']);
}

function add_to_cart($product_id, $count = 1)
{
    //Если ни одного товара нет
    if (!empty($_SESSION['products'][$product_id])) {
        $_SESSION['products'][$product_id]['count']++;

    } else {
        echo $product_id . ' '; // Убрать
        $_SESSION['products'][$product_id] = array();
        $q = "SELECT `price` FROM `mandarinko_catalog_item` WHERE `id`='$product_id'";
        var_dump(mysql_query($q));
        //$add_product = mysql_fetch_assoc(mysql_query($q));
        echo var_dump($add_product) . ' '; // Убрать
        $_SESSION['products'][$product_id]['coast'] = $add_product['price'];
        $_SESSION['products'][$product_id]['count'] = $count;
    }
    update_cart();
}

function del_basket_item($product_id, $count = 1)
{
    if (!empty($_SESSION['products'][$product_id])) {
        if ($_SESSION['products'][$product_id]['count'] > 1) {
            $_SESSION['products'][$product_id]['count']--;
        } else {
            remove_from_cart($product_id);
        }

    }
    update_cart();
}

function update_cart()
{
    $_SESSION['products_incart'] = count($_SESSION['products']);
    $_SESSION['cart_coast'] = 0;
    foreach ($_SESSION['products'] as $key => $value) {
        $_SESSION['cart_coast'] += $_SESSION['products'][$key]['coast'] * $_SESSION['products'][$key]['count'];
    }
    exit;
}

function update_product_count($product_id, $count)
{
    $_SESSION['products'][$product_id]['count'] = $count;
    update_cart();
}

function remove_from_cart($product_id)
{
    unset($_SESSION['products'][$product_id]);
    update_cart();
}

?>