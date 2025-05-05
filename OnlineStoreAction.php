<?php

// Capture form data using POST
$firstName = isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
$lastName = isset($_POST['LastName']) ? $_POST['LastName'] : '';
$phoneNumber = isset($_POST['number']) ? $_POST['number'] : '';
$paymentMethod = isset($_POST['method']) ? $_POST['method'] : '';
$orderTotal = isset($_POST['order-total']) ? $_POST['order-total'] : '';

// Retrieve the quantities for each menu item
$menuItems = [
    "Latte" => isset($_POST['quantity_latte']) ? (int)$_POST['quantity_latte'] : 0,
    "Iced Tea" => isset($_POST['quantity_iced_tea']) ? (int)$_POST['quantity_iced_tea'] : 0,
    "Croissant" => isset($_POST['quantity_croissant']) ? (int)$_POST['quantity_croissant'] : 0,
    "Pumpkin Spice Latte" => isset($_POST['quantity_pumpkin_spice_latte']) ? (int)$_POST['quantity_pumpkin_spice_latte'] : 0,
];

// Display the order details
echo "<h1>Order Confirmation</h1>";
echo "<p><strong>First Name:</strong> $firstName</p>";
echo "<p><strong>Last Name:</strong> $lastName</p>";
echo "<p><strong>Phone Number:</strong> $phoneNumber</p>";
echo "<p><strong>Payment Method:</strong> $paymentMethod</p>";
echo "<p><strong>Order Total:</strong> $$orderTotal</p>";

echo "<h2>Ordered Items:</h2>";
echo "<ul>";
foreach ($menuItems as $item => $quantity) {
    if ($quantity > 0) {
        echo "<li><strong>$item:</strong> $quantity</li>";
    }
}
echo "</ul>";

echo "<p>Your order has been placed successfully!</p>";
echo "<a href='index.php'>Go back to Home</a>";

?>


