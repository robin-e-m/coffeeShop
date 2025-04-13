<?php

require "DBConnect2.php";

$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];
$category = $_GET['category'];



$sql = "insert into menu values (0, '" . $name . "', '" . 
  $description . "', '" . $price . "', '" . 
  $category .  "')";
echo modifyDB($sql) . "<br>Use back button to return";
?>
