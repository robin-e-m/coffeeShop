<?php
include 'header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$itemID = $_POST['itemID'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemIndex'])) {

    $index = $_POST['itemIndex'];

    unset($_SESSION['cart'][$index]);

        $_SESSION['cart'] = array_values($_SESSION['cart']);


    header("Location: cart.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['itemIndex'])) {
    $id = intval($_POST['itemID']);
    $name = $_POST['name'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

//if already in cart, increase quantity of existing entry instead of adding a new cart entry
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $name) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    unset($item);

    if (!$found) {
        $_SESSION['cart'][] = [
            'itemID' => $itemID,   
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }

    $_SESSION['added_to_cart_message'] = $name . " added to cart!";

    header("Location: menu.php");
    exit;
}

include 'footer.php';
?>
