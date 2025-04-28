<!DOCTYPE html>
    <?php
    
require "DBConnect.php";
include 'header.php';
session_start();
$userID = $_SESSION['userID'];


// Retrieve input values
$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];
$category = $_GET['category'];

if ($pswd != $pswd2) {
    header("Location:#.error=duplicate_item");
    exit;
}
else {

//Updating data in user table
$sql = "UPDATE user SET password = '" . $hashed_pswd . "', name ='" . $name .
  "', address = '" . $address .  "', city = '" . $city .  "', state = '" .
   $state .  "', zip = '" . $zip . "', email = '" . $email . "', phone = '" .
  $phone . "', question = '" . $question . "', answer = '" . 
  $answer . "' where userID = ".$userID;

echo modifyDB($sql) . "<br>Use back button to return";

header("Location: updateMenu.php?status=register_success");
}

?>