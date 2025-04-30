<?php

require "DBConnect.php";

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
    header("Location: registerMenu.php?error=duplicate_name");
    exit;
}

// Insert the new menu item
$sql = "insert into menu values (0, '" . $name . "', '" . 
  $description . "', '" . $price . "', '" . 
  $category .  "')";
echo modifyDB($sql) . "<br>Use back button to return";

?>