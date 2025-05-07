<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['userID']))) {
    header("Location:index.php");
    exit;
} else {
    $userID = $_SESSION['userID'];
    global $username, $password, $name, $address, $city, $state, $zip,
    $email, $phone, $question, $answer;
    $sql = "select username, password, name, address, city, state, zip," .
            "email, phone, question, answer from user where userID = " .
            $userID;
    $result = queryDB($sql);
    if (gettype($result) == "object") {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $password = $row['password'];
            $name = $row['name'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $email = $row['email'];
            $phone = $row['phone'];
            $question = $row['question'];
            $answer = $row['answer'];
        }
        echo "";
    } else {
        header("Location:index.php?msg=" . $result);
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Manager</title>

    </head>

    <body>
        <div class="home-top-section"></div>
        <div class="home-top-text">
            <h1 style="font-size:100px; font-family:inherit;">Perk & Pour</h1>
            <p style="font-size:35px">Manger Page</p>
        </div>
        <div class="home-main-content">
            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit; text-align:left;">Manager Actions:</h3>

            <p >
            <ul style="font-size:20px; text-align:left";>
                <!--Account actions-->
                <li><a href="registerStaff.php">Add new staff member</a></li>
                <li><a href="registerCustomer.php">Add new customer</a></li>
                <li><a href="deleteUser.php">Delete users</a></li>
                <br> <!--Menu Actions-->
                <li><a href="registerMenu.php">Add new menu item</a></li>
                <li><a href="updateMenu.php">Modify menu item</a></li>
                <li><a href="deleteMenu.php">Delete menu item</a></li>
                <br><!--Maintenace Actions-->
                <li><a href="maintenance.php">Submit maintenance request</a></li>
                <li><a href="maintenanceSummary.php">View maintenance requests</a></li>
                <br>
                <li><a href="orderHistoryAction.php">View order history</a></li>
                <br>
                <li><a href="contactSummary.php">View customer feedback</a></li>
            </ul>
            <br>
            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit; text-align:left;">Profile Details:</h3>

            <p style="font-size:20px; text-align:left;">
                <br>
                Full Name: <?php echo $name; ?>
                <br>
                Username: <?php echo $username; ?>
                <br>
                Password: <?php echo $password; ?>
                <br>
                Address: <?php echo $address; ?>
                <br>
                City: <?php echo $city; ?>
                <br>
                State: <?php echo $state; ?>
                <br>
                Zip Code: <?php echo $zip; ?>
                <br>
                Phone Number: <?php echo $phone; ?>
                <br>
                Email Address: <?php echo $email; ?>
                <br>
                Security Question: <?php echo $question; ?>
                <br>
                Security Answer: <?php echo $answer; ?>
                <br>
            <li><a href="profileUpdate.php">Update your profile</a></li>
        </p>

        <br>
        <br>
        <?php include 'footer.php' ?>