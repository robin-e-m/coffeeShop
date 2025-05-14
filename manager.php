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

        <div class="home-main-content">

            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit; text-align:left;">Manager Profile:</h3>
            <a href="profileUpdate.php" style="font-size:20px;color:#60b9bf;font-family:inherit;">Update your profile</a>
            <p style="font-size:20px; text-align:center;">

                Full Name: <?php echo $name; ?>
                <br>
                <br>

                Username: <?php echo $username; ?>
                <br>
                <br>

                Address: <?php echo $address; ?>
                <br>
                <br>

                City: <?php echo $city; ?>
                <br>
                <br>

                State: <?php echo $state; ?>
                <br>
                <br>

                Zip Code: <?php echo $zip; ?>
                <br>
                <br>

                Phone Number: <?php echo $phone; ?>
                <br>
                <br>

                Email Address: <?php echo $email; ?>

                <br>
            </p>

            <br>
            <br>
            <?php include 'footer.php' ?>
            </body>
            </html>

