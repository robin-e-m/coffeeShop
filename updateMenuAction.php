<!DOCTYPE html>
<?php
require "DBConnect.php";
include 'header.php';

openDB();

$item = isset($_GET["name"]) ? $_GET["name"] : (isset($_POST["name"]) ? $_POST["name"] : null);
$result_item = null; //needs a default value, otherwise throws error

//check menu table for item name
$sql_item = "SELECT name, desciption, price, category FROM menu WHERE name = '$name'";
$result_item = queryDB($sql_item);

//if item name found, get item data from menu table
if (mysqli_num_rows($result_item) == 1) {
    $row = mysqli_fetch_assoc($result_item);
    $name = $row['name'];
    $desciption = $row['description'];
    $price = $row['price'];
    $category = $row['category'];
}

//if item name not found, redirect back to updateMenu.php with error message
if (mysqli_num_rows($result_item) == 0) {
    header("Location: updateMenu.php?error=item_not_found");
    exit;
} else {

    // Retrieve input values
    $name = $_GET['name'];
    $description = $_GET['description'];
    $price = $_GET['price'];
    $category = $_GET['category'];

    //Updating data in user table
    $sql = "UPDATE menu SET description = '" . $description . "', price = '" . 
            $price . "', category = '" . $category . "' where itemID = " . $itemID;

    echo modifyDB($sql) . "<br>Use back button to return";

    header("Location: updateMenu.php?status=update_success");
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Complete</title>
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