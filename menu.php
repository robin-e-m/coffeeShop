<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu</title>
        <?php include 'header.php'; ?>
    </head>
    <body>
        <div class='menu-main-content'>
            <h1 style="font-family:inherit; font-size:60px;">Cafe Menu</h1>
            <h4 style="font-family:inherit; text-align: center;">Explore our hand-crafted drinks and pastries. Crafted with care, from scratch daily.</h4> 
            <hr>

            <?php
            require 'DBConnect.php';

            function displayMenuItems($category, $title) {
                $sql = "SELECT name, description, price, image_url FROM menu WHERE category='$category'";
                $result = queryDB($sql);

                echo "<h1 class='menu-section-title' style='font-family:inherit; text-align: center;'>$title</h1>";

                if ($result->num_rows > 0) {
                    echo "<div class='menu-items-grid'>";
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='menu-item'>";
                        echo "<img class='menu-item-img' src='" . htmlspecialchars($row['image_url']) . "' alt='Image Missing' style='height:300px; width: 300px;'>";
                        echo "<div class='menu-item-info'>";
                        echo "<div style='margin-bottom: 20px;'>";
                        echo "<h3 class='menu-item-name' style='font-family:inherit'>" . htmlspecialchars($row["name"]) . "</h3>";
                        echo "<p class='menu-item-description'>" . htmlspecialchars($row["description"]) . "</p>";
                        echo "<p class='menu-item-price'><strong>$" . htmlspecialchars($row["price"]) . "</strong></p>";
                        
                        // Add to Cart Form
                        echo "<form action='cart.php' method='POST'>";
                        echo "<input type='hidden' name='name' value='" . htmlspecialchars($row["name"]) . "'>";
                        echo "<input type='hidden' name='price' value='" . htmlspecialchars($row["price"]) . "'>";
                        echo "<label for='quantity'>Quantity:</label>";
                        echo "<input type='number' name='quantity' min='1' max='10' value='1'>";
                        echo "<button type='submit' style='padding: 5px 10px; background-color: #444; color: white; border: none; border-radius: 5px; cursor: pointer;' 
                                onmouseover=\"this.style.backgroundColor = 'teal'; this.style.transform = 'scale(1.1)';\" 
                                onmouseout=\"this.style.backgroundColor = '#444'; this.style.transform = 'scale(1)';\">Add to Cart</button>";
                        echo "</form>";

                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div><br>";
                } else {
                    echo "<p style='text-align:center;'>No items available</p>";
                }
            }

            displayMenuItems('hot', 'Hot Drinks');
            displayMenuItems('cold', 'Cold Drinks');
            displayMenuItems('bake', 'Bakery');
            displayMenuItems('limited', 'Seasonal');

            ?>
        </div>
    </body>
</html>


