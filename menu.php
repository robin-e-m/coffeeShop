<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <?php include 'header.php' ?>
    </head>
    <body>
        <div class='menu-main-content'>
        <h1 style="font-family:inherit; font-size:60px;">Cafe Menu</h1>
        <h4 style="font-family:inherit; text-align: center;">Explore our hand-crafted drinks and pastries. Crafted with care, from scratch daily.</h4> 
        <hr>
        
    <form method="get" action="menu.php" style="display: flex; gap: 5px; align-items: center;">
    <input type="text" name="search" placeholder="Search menu..." style="padding: 5px; font-size: 14px;">
    <button class="form-button" type="submit" style="padding: 5px 10px; font-size: 14px; cursor: pointer;">Search</button>
    <button class="form-button" type="submit" name="search" value="" style="padding: 5px 10px; font-size: 14px; cursor: pointer;">Clear Search</button>
    </form>
        
        <?php
require 'DBConnect.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$search = trim($search); // just in case user types extra spaces

$sql = "SELECT name, description, price, image_url FROM menu WHERE category='hot'";

if (!empty($search)) {
    $safeSearch = htmlspecialchars($search); // just extra safety
    $sql .= " AND name LIKE '%$safeSearch%'";
}

$result = queryDB($sql);

if ($result->num_rows > 0) {
    echo "<h1 class='menu-section-title' style='font-family:inherit; text-align: center;'>Hot Drinks</h1>";
    echo "<div class='menu-items-grid'>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='menu-item'>";
        echo "<img class='menu-item-img' src='" . htmlspecialchars($row['image_url']) . "' alt='Image Missing' style='height:300px; width: 300px;'>";
        echo "<div class='menu-item-info'>";
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 class='menu-item-name' style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p class='menu-item-description'>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p class='menu-item-price'><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
        echo "<button style='padding: 5px 10px; background-color: #444; color: white; border: none; border-radius: 5px; cursor: pointer;' 
                onmouseover=\"this.style.backgroundColor = 'teal'; this.style.transform = 'scale(1.1)';\" 
                onmouseout=\"this.style.backgroundColor = '#444'; this.style.transform = 'scale(1)';\"; class='add-to-cart'>Add to Cart</button>";
        echo "<div style='display:none; align-items: center; gap: 10px; margin-top: 10px;'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "<br>";
}

$sql2 = "SELECT name, description, price, image_url FROM menu WHERE category='cold'";

if (!empty($search)) {
    $safeSearch = htmlspecialchars($search); // just extra safety
    $sql2 .= " AND name LIKE '%$safeSearch%'";
}

$result2 = queryDB($sql2);

if ($result2->num_rows > 0) {
    echo "<h1 class='menu-section-title' style='font-family:inherit; text-align: center;'>Cold Drinks</h2>";
    echo "<div class='menu-items-grid'>";
    while($row = $result2->fetch_assoc()) {
        echo "<div class='menu-item'>";
        echo "<img class='menu-item-img' src='" . htmlspecialchars($row['image_url']) . "' alt='Image Missing' style='height:300px; width: 300px;'>";
        echo "<div class='menu-item-info'>";
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 class='menu-item-name' style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p class='menu-item-description'>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p class='menu-item-price'><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
        echo "<button style='padding: 5px 10px; background-color: #444; color: white; border: none; border-radius: 5px; cursor: pointer;' 
                onmouseover=\"this.style.backgroundColor = 'teal'; this.style.transform = 'scale(1.1)';\" 
                onmouseout=\"this.style.backgroundColor = '#444'; this.style.transform = 'scale(1)';\"; class='add-to-cart'>Add to Cart</button>";
        echo "<div style='display:none; align-items: center; gap: 10px; margin-top: 10px;'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "<br>";
}

$sql3 = "SELECT name, description, price, image_url FROM menu WHERE category='bake'";

if (!empty($search)) {
    $safeSearch = htmlspecialchars($search); // just extra safety
    $sql3 .= " AND name LIKE '%$safeSearch%'";
}

$result3 = queryDB($sql3);

if ($result3->num_rows > 0) {
    echo "<h2 style='font-family:inherit; text-align: center;'>Bakery</h2>";
    echo "<div class='menu-items-grid'>";
    while($row = $result3->fetch_assoc()) {
        echo "<div class='menu-item'>";
        echo "<img class='menu-item-img' src='" . htmlspecialchars($row['image_url']) . "' alt='Image Missing' style='height:300px; width: 300px;'>";
        echo "<div class='menu-item-info'>";
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 class='menu-item-name' style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p class='menu-item-description'>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p class='menu-item-price'><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
                echo "<button style='padding: 5px 10px; background-color: #444; color: white; border: none; border-radius: 5px; cursor: pointer;' 
                onmouseover=\"this.style.backgroundColor = 'teal'; this.style.transform = 'scale(1.1)';\" 
                onmouseout=\"this.style.backgroundColor = '#444'; this.style.transform = 'scale(1)';\"; class='add-to-cart'>Add to Cart</button>";
        echo "<div style='display:none; align-items: center; gap: 10px; margin-top: 10px;'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "<br>";
    }

$sql4 = "SELECT name, description, price, image_url FROM menu WHERE category='limited'";

if (!empty($search)) {
    $safeSearch = htmlspecialchars($search); // just extra safety
    $sql4 .= " AND name LIKE '%$safeSearch%'";
}

$result4 = queryDB($sql4);

if ($result4->num_rows > 0) {
    echo "<h2 style='font-family:inherit; text-align: center;'>Seasonal</h2>";
    echo "<div class='menu-items-grid'>";
    while($row = $result4->fetch_assoc()) {
        echo "<div class='menu-item'>";
        echo "<img class='menu-item-img' src='" . htmlspecialchars($row['image_url']) . "' alt='Image Missing' style='height:300px; width: 300px;'>";
        echo "<div class='menu-item-info'>";
        echo "<div style='margin-bottom: 20px;'>";
        echo "<h3 class='menu-item-name' style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
        echo "<p class='menu-item-description'>" . htmlspecialchars($row["description"]) . "</p>";
        echo "<p class='menu-item-price'><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
                echo "<button style='padding: 5px 10px; background-color: #444; color: white; border: none; border-radius: 5px; cursor: pointer;' 
                onmouseover=\"this.style.backgroundColor = 'teal'; this.style.transform = 'scale(1.1)';\" 
                onmouseout=\"this.style.backgroundColor = '#444'; this.style.transform = 'scale(1)';\"; class='btn btn-primary'>Add to Cart</button>";
        echo "<div style='display:none; align-items: center; gap: 10px; margin-top: 10px;'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "<br>";
    }
    
    if ($result->num_rows === 0 && $result2->num_rows === 0 && $result3->num_rows === 0 && $result4->num_rows === 0) {
    echo "<h1 class='home-main-content'; style='font-family:inherit'>No items found</h1>";
}

    ?>
        </div>
    </body>

