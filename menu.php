<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <?php include 'header.php' ?>
    </head>
    <body>
        <div class="home-main-content">
        <h1 style="font-family:inherit">Menu</h1>
        <hr>
        
        <?php
require 'DBConnect.php';

$sql = "SELECT name, description, price FROM menu WHERE category='hot'";
$result = queryDB($sql);

echo "<h2 style='font-family:inherit'>Hot Drinks</h2>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
        echo "</div>";
    }
}
else {
    echo "No items available";
}

$sql2 = "SELECT name, description, price FROM menu WHERE category='cold'";
$result2 = queryDB($sql2);

echo "<h2 style='font-family:inherit'>Cold Drinks</h2>";

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
        echo "</div>";
    }
}
    
else {
    echo "No items available";
}

$sql3 = "SELECT name, description, price FROM menu WHERE category='bake'";
$result3 = queryDB($sql3);

echo "<h2 style='font-family:inherit'>Bakery</h2>";

if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
        echo "</div>";
    }
}
    
else {
    echo "No items available";
}

$sql4 = "SELECT name, description, price FROM menu WHERE category='limited'";
$result4 = queryDB($sql4);

echo "<h2 style='font-family:inherit'>Seasonal</h2>";

if ($result4->num_rows > 0) {
    while($row = $result4->fetch_assoc()) {
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
        echo "</div>";
    }
}
    
else {
    echo "No items available";
}

    ?>
        </div>
    </body>

