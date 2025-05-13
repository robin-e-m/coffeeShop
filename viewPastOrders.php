<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Order History</title>
        <?php include 'header.php' ?>
    </head>
    <body>
        <div class='menu-main-content'>
        <h1 style="font-family:inherit; font-size:60px;">Order History</h1>
        <h3 style="font-family:inherit; text-align:center">Select an order to view details</h3>
        <hr>
        
        <?php
require 'DBConnect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$userID = $_SESSION['userID'];

$sql = "SELECT `order`.orderID, `order`.date, `order`.time, SUM(ordermenu.quantity) AS item_count
        FROM `order`
        JOIN ordermenu ON `order`.orderID = ordermenu.orderID
        WHERE `order`.customerID = $userID
        GROUP BY `order`.orderID, `order`.date, `order`.time
        ORDER BY `order`.date DESC, `order`.time DESC";

$orders = queryDB($sql, 'i', $userID);
?>
    <script>
        function toggleDetails(id) {
            const div = document.getElementById("details-" + id);
            if (div.style.display === "none" || div.style.display === "") {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
    </script>
 
</head>
<body>
    
    <?php if ($orders->num_rows === 0): ?>
    <h1 class='home-main-content' style='font-family:inherit; text-align:center;'>You haven’t placed any orders yet!</h1>
    <?php else: ?>

    <?php while ($order = $orders->fetch_assoc()): ?>
        <?php
        $orderTime = new DateTime($order['time']);
        $formattedTime = $orderTime->format('h:i A');
            ?>
        <div class="order-summary" onclick="toggleDetails(<?= $order['orderID'] ?>)">
            <strong><?= htmlspecialchars($order['date']) ?></strong> — <?= $order['item_count'] ?> items
            <em><?= htmlspecialchars($formattedTime) ?></em>
        </div>
        <div class="order-details" id="details-<?= $order['orderID'] ?>">
            <?php
            $orderID = $order['orderID'];
            $itemSql = "SELECT menu.name, menu.price, ordermenu.quantity
                        FROM ordermenu
                        JOIN menu ON ordermenu.itemID = menu.itemID
                        WHERE ordermenu.orderID = $orderID";
            $items = queryDB($itemSql);
            
            $totalCost = 0;

            while ($item = $items->fetch_assoc()) {
                $itemTotal = $item['quantity'] * $item['price'];
                $totalCost += $itemTotal;
                echo "<p style='font-size:20px;'>" . htmlspecialchars($item['quantity']) . "x " . htmlspecialchars($item['name']) . " - $" . number_format($item['price'], 2) . "</p>";
            }
            
                ?>
                <hr>
                <strong style='font-size:20px'>Total Cost: $<?php echo number_format($totalCost, 2); ?></strong>
        </div>
    <br>
    <?php endwhile; ?>
    <?php endif; ?>
<?php include 'footer.php' ?>
</body>
</html>
        

