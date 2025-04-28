<!DOCTYPE html>
    <?php
    
require "DBConnect.php";
include 'header.php';
session_start();
$userID = $_SESSION['userID'];

openDB();

item = isset($_GET["name"]) ? $_GET["name"] : (isset($_POST["name"]) ? $_POST["name"] : null);
$result_item = null; //needs a default value, otherwise throws error

//check menu table for item name
$sql_user = "SELECT name, desciption, price, category FROM menu WHERE name = '$name'";
$result_user = queryDB($sql_item);

//if item name found, get item data from menu table
if (mysqli_num_rows($result_item) == 1) {
    $row = mysqli_fetch_assoc($result_item);
    $name = $row['name'];
    $desciption = $row['description']; 
    $price = $row['price'];
    $category = $row['category'];
}

//if username not found, redirect back to resetPassword.php with error message
if (mysqli_num_rows($result_item) == 0){
    header("Location: updateMenu.php?error=item_not_found");
    exit;
}
// Retrieve input values
$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];
$category = $_GET['category'];


if ($name == 1) {
    header("Location:updateMenu.php?error=duplicate_item");
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

header("Location: updateMenu.php?status=update_success");
}

?>