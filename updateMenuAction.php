<!DOCTYPE html>
<?php

require "DBConnect.php";
include 'header.php';
openDB();

$item_name = $_GET['name'];
$new_description = $_GET['description'];
$new_price = $_GET['price'];
$new_category = $_GET['category'];

//check menu table for item name
$sql = "SELECT itemID, description, price, category FROM menu WHERE name = '$item_name'";
$result_item = queryDB($sql);

//if item name found, get itemID from menu table
if (mysqli_num_rows($result_item) == 1) {
    $row = mysqli_fetch_assoc($result_item);
    $itemID = $row['itemID'];
}

//if item name not found, redirect back to updateMenu.php with error message
if (mysqli_num_rows($result_item) == 0) {
    header("Location: updateMenu.php?error=item_not_found");
    exit;
}

else {
    //Updating data in menu table
    $sql = "UPDATE menu SET description = '" . $new_description . "', price = '" . 
            $new_price . "', category = '" . $new_category . "' where itemID = " . $itemID;

    $result = modifyDB($sql);
    
    if($result){
        header("Location: updateMenu.php?status=update_success");
    }

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