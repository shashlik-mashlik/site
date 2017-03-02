<?
include $_SERVER['DOCUMENT_ROOT'] . '/ajax/config.php';

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
    if (!empty($_SESSION['products'][$product_id])) {
        $_SESSION['products'][$product_id]['count']++;
    } else {
        $_SESSION['products'][$product_id] = array();
        $q = "SELECT price FROM `mandarinko_catalog_item` WHERE id='$product_id'";
        $add_product = mysql_fetch_assoc(mysql_query($q));
        $_SESSION['products'][$product_id]['coast'] = $add_product['price'];
        $_SESSION['products'][$product_id]['count'] = $count;
    }

    echo json_encode([
        "id" => $product_id,
        "count" => $_SESSION['products'][$product_id]['count'],
        "coast" => $_SESSION['products'][$product_id]['coast'],
        "all" => update_cart()
    ]);
    exit();
}

function del_basket_item($product_id, $count = 1)
{   
    if (!empty($_SESSION['products'][$product_id]) && $_SESSION['products'][$product_id] > 1) {
        if ($_SESSION['products'][$product_id]['count'] > 1) {
            $_SESSION['products'][$product_id]['count']--;
        }

    } /*else if ($_SESSION['products'][$product_id]['count'] === 1) {
        echo json_encode(["status": false, "msg": "remove"]);
        exit();

    } else {    
        echo json_encode(["status": false, "msg": "Warning: #1 ajax query illegal"]);
        exit();
    }

    echo json_encode([
        "status": true,
        "id" => $product_id,
        "count" => $_SESSION['products'][$product_id]['count'],
        "all" => update_cart()
    ]);
    */
}

function update_cart()
{
    $_SESSION['products_incart'] = count($_SESSION['products']);
    $_SESSION['cart_coast'] = 0;
    foreach ($_SESSION['products'] as $key => $value) {
        $_SESSION['cart_coast'] += $_SESSION['products'][$key]['coast'] * $_SESSION['products'][$key]['count'];
    }
    return [$_SESSION['products_incart'], $_SESSION['cart_coast']];
}

function update_product_count($product_id, $count)
{
    $_SESSION['products'][$product_id]['count'] = $count;
}

function remove_from_cart($product_id)
{
    unset($_SESSION['products'][$product_id]);
    echo json_encode([
        "id" => $product_id,
        "status" => true,
        "all" => update_cart()
    ]);
    exit();
}
?>