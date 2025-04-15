<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

//session control
if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;

//check if user is listed within user table
    $sql_user = "SELECT * FROM user WHERE username = '$user'";
    $result = $conn->query($sql);

//if username found, get user's data from user table
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $name = $row['name']
        $addresss = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $phone = $row['phone'];
        $email = $row['email'];
        $security_question = $row['question'];
    }
}
?> 

<html>
    <head>
        <meta charset="UTF-8">

        <title>Manager</title>

    </head>
    <body>
    <body>
        <div class="home-top-section"></div>
        <div class="home-top-text">
            <h1 style="font-size:100px; font-family:inherit;">Perk & Pour</h1>
            <p style="font-size:35px">Coffee and Pastries</p>
        </div>
        <div class="home-main-content">

            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit">Manger Page</h3>

            <p style="font-size:20px; text-align:left;">Profile Details:
                <br>
                <br>
                Full Name: <?php echo $name; ?>
                <br>
                Username: <?php echo $user; ?>
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
                Security Question: <?php echo $security_question; ?>
            </p>

            <br>
            <br>
            <?php include 'footer.php' ?>
            </body>
            </html>