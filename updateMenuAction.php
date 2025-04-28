<!DOCTYPE html>
<?php

require "DBConnect.php";
include 'header.php';
openDB();

//check user table for username
$sql = "SELECT description, price, category FROM menu WHERE name = '$user'";
$result_item = queryDB($sql);

//if username found, get question and answer from user table
if (mysqli_num_rows($result_item) == 1) {
    $row = mysqli_fetch_assoc($result_item);
    $description = $row['description'];
    $price = $row['price']; 
    $category = $row['category'];
}

//if item name not found, redirect back to updateMenu.php with error message
if (mysqli_num_rows($result_item) == 0) {
    header("Location: updateMenu.php?error=item_not_found");
    exit;
} else {

    //Updating data in menu table
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