<?php
require 'DBConnect.php';
include 'header.php';

// Ensure session is only started once
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding items to cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'], $_POST['price'], $_POST['quantity'])) {
    $item = [
        'name' => $_POST['name'],
        'price' => floatval($_POST['price']),
        'quantity' => intval($_POST['quantity'])
    ];

    // Check if the item already exists in the cart and update quantity
    $exists = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['name'] == $item['name']) {
            $cartItem['quantity'] += $item['quantity'];
            $exists = true;
            break;
        }
    }

    if (!$exists) {
        $_SESSION['cart'][] = $item;
    }
}

// Handle item removal
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove'])) {
    $_SESSION['cart'] = array_filter($_SESSION['cart'], fn($item) => $item['name'] !== $_POST['remove']);
}

// Calculate total price
$total = array_reduce($_SESSION['cart'], fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0);

// Handle order submission & reset cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_order'])) {
    // Logic to process the order (e.g., save to database)
    $_SESSION['cart'] = []; // Reset cart after submission
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ordering Cart</title>
    <style>
        .cart-container { text-align: center; max-width: 600px; margin: auto; background-color: #222; padding: 20px; border-radius: 10px; }
    .cart-item { margin-bottom: 10px; color: white; }
    .cart-total { font-size: 20px; font-weight: bold; color: white; }
    .form-button { padding: 10px 15px; background-color: teal; color: white; border: none; cursor: pointer; }
    .form-button:hover { background-color: darkslategray; }
        
    </style>
</head>      
<body>
    <div class="cart-container">
        <h1 style="font-size:50px; color: white; ">Ordering Cart</h1>

        <?php if (!empty($_SESSION['cart'])): ?>
            <h2>Your Cart Items</h2>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <li class="cart-item">
                        <?= htmlspecialchars($item['quantity']) ?> x <?= htmlspecialchars($item['name']) ?> - 
                        <strong>$<?= number_format($item['price'] * $item['quantity'], 2) ?></strong>
                        <form action="cart.php" method="POST" style="display:inline;">
                            <input type="hidden" name="remove" value="<?= htmlspecialchars($item['name']) ?>">
                            <button type="submit" class="form-button">Remove</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h3 class="cart-total">Total Price: $<?= number_format($total, 2) ?></h3>
            
            <form action="cart.php" method="POST">
                <button type="submit" name="submit_order" class="form-button">Submit Order</button>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
</body>
</html>


