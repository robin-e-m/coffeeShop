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
        <hr>
        
        <?php
require 'DBConnect.php';

$sql = "SELECT `order`.orderID, `order`.date, `order`.time, COUNT(ordermenu.itemID) AS item_count
        FROM `order`
        JOIN ordermenu ON `order`.orderID = ordermenu.orderID
        GROUP BY `order`.orderID, `order`.date, `order`.time
        ORDER BY `order`.date DESC";
$orders = queryDB($sql);
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

    <?php while ($order = $orders->fetch_assoc()): ?>
        <div class="order-summary" onclick="toggleDetails(<?= $order['orderID'] ?>)">
            <strong><?= htmlspecialchars($order['orderDate']) ?></strong> — <?= $order['item_count'] ?> items
        </div>
        <div class="order-details" id="details-<?= $order['orderID'] ?>">
            <?php
            $orderID = $order['orderID'];
            $itemSql = "SELECT menu.name, menu.price, ordermenu.quantity
                        FROM ordermenu
                        JOIN menu ON ordermenu.menuID = menu.menuID
                        WHERE ordermenu.orderID = $orderID";
            $items = queryDB($itemSql);

            while ($item = $items->fetch_assoc()) {
                echo "<p>" . htmlspecialchars($item['quantity']) . "x " . htmlspecialchars($item['itemName']) . " @ $" . number_format($item['price'], 2) . "</p>";
            }
            ?>
        </div>
    <?php endwhile; ?>
</body>
</html>
        

