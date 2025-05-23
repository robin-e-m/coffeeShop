

<?php
require 'DBConnect.php';
include 'header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usertype'])) {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
    header("Location: cart.php");
    exit;
}

$userID = $_SESSION['userID'];

date_default_timezone_set('America/New_York');
$date = date("Y-m-d");
$time = date("H:i:s");

global $conn;
openDB();

$sql_order = "INSERT INTO `order` (customerID, date, time) VALUES ('$userID', '$date', '$time')";
if ($conn->query($sql_order) === TRUE) {
    $orderID = $conn->insert_id;
} else {
    die("Error inserting order: " . $conn->error);
}

$_SESSION['last_order_id'] = $orderID;

foreach ($_SESSION['cart'] as $item) {
    $itemID = $item['itemID'];
    $quantity = $item['quantity'];

    $sql_item = "INSERT INTO ordermenu (orderID, itemID, quantity)
                 VALUES ('$orderID', '$itemID', '$quantity')";
    modifyDB($sql_item);
}

unset($_SESSION['cart']);

header("Location: orderHistory.php");
exit;

include 'footer.php'; 
?>