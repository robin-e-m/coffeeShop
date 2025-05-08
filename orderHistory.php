<?php
require 'DBConnect.php';
include 'header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$orderID = isset($_SESSION['last_order_id']) ? $_SESSION['last_order_id'] : null;

if ($orderID === null) {
    echo "Error: No order found.";
    exit;
}

// Open DB connection
global $conn;
openDB();

// Fetch the order details (customer info, date, etc.)
$sql_order = "SELECT * FROM `order` WHERE `orderID` = '$orderID'";
$result = $conn->query($sql_order);
if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
    // Fetch customer info
    $userID = $order['customerID'];
    $date = $order['date'];
    $time = $order['time'];

    $sql_user = "SELECT * FROM user WHERE userID = '$userID'";
    $user_result = $conn->query($sql_user);
    $user = $user_result->fetch_assoc();
    $name = $user['name'];
    $phone = $user['phone'];
}

// Capture form data using POST
//$firstName = isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
//$lastName = isset($_POST['LastName']) ? $_POST['LastName'] : '';
//$phoneNumber = isset($_POST['number']) ? $_POST['number'] : '';
//$paymentMethod = isset($_POST['method']) ? $_POST['method'] : '';
//$orderTotal = isset($_POST['order-total']) ? $_POST['order-total'] : '';

// Display the order details
echo "<div class=home-main-content>";
echo "<h1 style='font-family:inherit'>Order Confirmation</h1>";
echo "<p><strong>Name:</strong>$name</p>";
echo "<p><strong>Phone Number:</strong>$phone</p>";
echo "</div>";

 // Now get the items in the order
    $sql_items = "SELECT om.quantity, m.name, m.price
                  FROM ordermenu om
                  JOIN menu m ON om.itemID = m.itemID
                  WHERE om.orderID = '$orderID'";

    $items_result = $conn->query($sql_items);
    if ($items_result->num_rows > 0) {
        echo "<div class=home-main-content>";
        echo "<h2 style='font-family:inherit'>Ordered Items:</h2><ul>";
        $total = 0;
        while ($item = $items_result->fetch_assoc()) {
            $name = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $itemTotal = $quantity * $price;
            $total += $itemTotal;

            echo "<li><strong>$name:</strong> $quantity x $$price = $$itemTotal</li>";
        }
        echo "</ul>";
        echo "<p><strong>Total:</strong> $$total</p>";
    } else {
        echo "<p>No items found for this order.</p>";
    }


echo "<p>Your order has been placed successfully!</p>";
echo "<a href='index.php'>Go back to Home</a>";
echo "</div>";

?>


