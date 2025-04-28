<!DOCTYPE html>
<?php

require 'DBConnect.php';
include 'header.php';
session_start();
$userID = $_SESSION['userID'];

// Retrieve input values
$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];
$category = $_GET['category'];

// Check for duplicates in the menu table
$unique_name_check = "SELECT EXISTS (SELECT 1 FROM menu WHERE name = '$name') AS duplicate";
$unique_name_result = queryDB($unique_name_check);
$row = mysqli_fetch_assoc($unique_name_result);

if ($row['duplicate']) {
    header("Location: regsiterMenu.php?error=duplicate_name");
    exit;
}

// Insert the new menu item
$sql = "insert into menu values (0, '" . $name . "', '" . 
  $description . "', '" . $price . "', '" .  $category .  "')";
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