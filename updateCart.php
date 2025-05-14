<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    $index = $_POST['itemIndex'];
    $quantity = $_POST['quantity'];

    // Ensure quantity is at least 1
    $quantity = max(1, intval($quantity));

    if (isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['quantity'] = $quantity;
    }

    header("Location: cart.php");
    exit;
}
?>