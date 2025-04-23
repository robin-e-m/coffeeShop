<!DOCTYPE html>
<?php

require "DBConnect.php";
include 'header.php';

$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];
$category = $_GET['category'];

$sql = "insert into menu values (0, '" . $name . "', '" . 
  $description . "', '" . $price . "', '" . 
  $category .  "')";
echo modifyDB($sql);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Complete</title>
    </head>
    
    <body>
                <div>
                    <a href="index.php">Return to Home Page</a>
                        </div>
        
        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>