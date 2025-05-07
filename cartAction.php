<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

if (!(isset($_SESSION['usertype']))) {
    if ($usertype != 1 OR $usertype != 2 OR usertype != 3)
        header("Location:index.php");
    exit;
}
//get username
$user = $_GET["userID"];
$item = $_GET["name"];
$price = $_GET["price"];
$quantity= $_GET["quantity"];
$date = $_GET['date'];
$time = $_GET['time'];

/* This section may not be needed???
  
//check for username within the user table
$sql_user = "SELECT userID FROM user WHERE username = '$user'";
$result_user = queryDB($sql_user);

//if username is found, get the userID
if (mysqli_num_rows($result_user) == 1) {
    $row = mysqli_fetch_assoc($result_user);
    $userNum = row['userID'];
}

//check for item within the menu table
$sql_item = "SELECT itemID, price FROM menu WHERE name=$item";
$result_item= queryDB($result_item);

//if item name is found, get the itemID
if (mysqli_num_rows($result_item) == 1) {
    $row = mysqli_fetch_assoc($result_item);
    $itemNum = row['menuID'];
}

*/


$sql = "INSERT INTO order values (0, '" . $user . "', '" . $item . "', '" .
            $price . "', '" . $quantity . "', '" . $date . "', '" . $time . "')";

echo modifyDB($sql);
header("Location: cart.php?status='success'");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Order Submitted</title>
    </head>
    
    <body>
                <div>
                    <a href="orderHistory.php">See your order confirmation</a>
                        </div>
        
        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>