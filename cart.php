<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!(isset($_SESSION['usertype']))) {
    if ($usertype != 1 OR $usertype != 2 OR usertype != 3)
        header("Location:index.php");
    exit;
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ordering Cart</title>
    <br>

</head>      

<body>
    <div class="home-top-section"></div>
    <div class="home-top-text">
        <h1 style="font-size:100px; font-family:inherit;">Ready to Checkout?</h1>
    </div>
    <div class='home-main-content'>
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
                echo "<p>Order submitted successfully!</p>";
                exit;
            }
    
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        echo "<p class='home-main-content' style='font-size:30px'>Your cart is empty!</p>";
    }
    
    else {
        $total = 0;
        echo "<div class='home-main-content'>";
        echo "<ul style='font-size: 30px; list-style-position: inside; text-align: center; padding-left: 0;'>";
foreach ($_SESSION['cart'] as $index => $item) {
    $itemTotal = $item['price'] * $item['quantity'];
    $total += $itemTotal;
    echo "<li style='display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;'>
            <span>{$item['quantity']} x {$item['name']} = $" . number_format($itemTotal, 2) . "</span>
                <div style='display: flex; align-items: center;'>
            <form method='post' action='updateCart.php'>
            <input type='number' name='quantity' value='{$item['quantity']}' min='1' style='width: 50px;'>
            <input type='hidden' name='itemIndex' value='$index'>
            <input type='hidden' name='itemID' value='{$item['itemID']}'>
            <button type='submit' class='form-button' style='font-size:20px'>Adjust qty</button>
            </form>
            <form method='post' action='addToCart.php'>
                <input type='hidden' name='itemIndex' value='$index'>
                <button type='submit' class='remove-button' style='font-size:20px'>Remove</button>
            </form>
            </div>
          </li>";
}
        echo "</ul>";
        echo "<p style='font-size: 35px;'>Total: $" . number_format($total, 2) . "</p>";
        echo "<div class='butt-center'>
        <input class='form-button' type='submit' value='Submit' style='font-size:30px;' onclick=\"document.location='cartAction.php'\" />
      </div>";
        echo "</div>";
}
    ?>
    <?php include 'footer.php' ?>
    </div>
</body>
</html>