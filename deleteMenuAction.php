<!DOCTYPE html>
<?php
require "DBConnect.php";
include 'header.php';

if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;
}
openDB();


//get name
$item = $_GET["name"];

//check if item exists
$sql_item = "SELECT * FROM menu WHERE name = '$item'";
$result_item = queryDB($sql_item);

//if username found, get question and answer from user table
if (mysqli_num_rows($result_item) == 1) {
    $row = mysqli_fetch_assoc($result_item);

    $sql_item = "DELETE FROM menu WHERE name = '$item'";
    echo modifyDB($sql_item);
    header("Location: deleteMenu.php?status=update_success");
}
else {
    //if username not found, redirect back to deleteUser.php with error message
if (mysqli_num_rows($result_item) == 0) {
    header("Location: deleteMenu.php?error=item_not_found");
    exit;
}
}


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Item Deletion Complete</title>
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