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
        <h2 style="font-family:inherit">Hot Drinks</h2>
        
        <?php
require 'DBConnect.php';

$sql = "SELECT name, description, price FROM menu WHERE category=hot";
$result = queryDB($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["name"]. $row["description"]. "Price: ". $row["price"]. "<br>";
    }
}
else {
    echo "No items available";
}
    ?>
        </div>
    </body>

