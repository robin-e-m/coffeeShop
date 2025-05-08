<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quantity'])) {
    $index = $_POST['itemIndex']; // Assuming you pass the item index to identify it
    $quantity = $_POST['quantity'];

    // Ensure quantity is at least 1
    $quantity = max(1, intval($quantity));

    if (isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['quantity'] = $quantity;
    }

    // Redirect back to the cart page or show an update message
    header("Location: cart.php");
    exit;
}
?>

