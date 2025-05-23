<!DOCTYPE html>
<?php

require "DBConnect.php";
include 'header.php';

// collect form data

$name = $_GET["name"];
$user = $_GET["username"];

//hashes password using bcrypt
$pswd = $_GET["pass"];
$pswd2 = $_GET["pass2"];
$hashed_pswd = password_hash($pswd, PASSWORD_DEFAULT);

$phone = $_GET["phone"];
$email = $_GET["email"];

$question = $_GET["question"];
$answer = $_GET["answer"];

$usertype = $_GET["usertype"];
$address = $_GET["address"];
$city = $_GET["city"];
$state = $_GET["state"];
$zip = $_GET["zip"];

if ($usertype == "1" || $usertype == "2") { //if owner or staff
    $address = $_GET["address"];
    $city = $_GET["city"];
    $state = $_GET["state"];
    $zip = $_GET["zip"];

    $pay = $_GET["pay"];
    $hire = $_GET["hire"];
}

//check for duplicates in user table
if ($usertype == "1" || $usertype == "2") {
    $unique_user_check = "SELECT EXISTS(SELECT 1 FROM user WHERE username = '$user') AS duplicate";
    $unique_user_result = queryDB($unique_user_check);
    $row = mysqli_fetch_assoc($unique_user_result);

    if ($row['duplicate']) {
        header("Location: registerStaff.php?error=duplicate_username");
        exit;
    }
}

if ($usertype == '3') {
    $unique_user_check = "SELECT EXISTS(SELECT 1 FROM user WHERE username = '$user') AS duplicate";
    $unique_user_result = queryDB($unique_user_check);
    $row = mysqli_fetch_assoc($unique_user_result);

    if ($row['duplicate']) {
        header("Location: registerCustomer.php?error=duplicate_username");
        exit;
    }
}

//check for matching password re-type
if ($usertype == "1" || $usertype == "2"){
if ($pswd != $pswd2) {
    header("Location: registerStaff.php?error=retry_password");
    exit;
}
}

if ($usertype == "3"){
    if ($pswd != $pswd2) {
    header("Location: registerCustomer.php?error=retry_password");
    exit;
    }
}

//Entering data into users table
if ($usertype == "3") { //if customer
    $pay = 0.00; //set pay to 0.00
    $hire = 0000 - 00 - 00; //set hiring date to blank

    $sql = "insert into user values (0, '" . $name . "', '" . $user . "', '" .
            $hashed_pswd . "', '" . $email . "', '" . $phone . "', '" . $address . "', '" .
            $city . "', '" . $state . "', '" . $zip . "', '" . $question . "', '" .
            $answer . "', '" . $pay . "', '" . $hire . "', '" . $usertype . "')";
} else { //if manager or staff
    $pay = $_GET["pay"];
    $hire = $_GET["hire"];

    $sql = "insert into user values (0, '" . $name . "', '" . $user . "', '" .
            $hashed_pswd . "', '" . $email . "', '" . $phone . "', '" . $address . "', '" .
            $city . "', '" . $state . "', '" . $zip . "', '" . $question . "', '" .
            $answer . "', '" . $pay . "', '" . $hire . "', '" . $usertype . "')";
}

$result = modifyDB($sql);
if($usertype == "1" || $usertype == "2") {
    if($result) {
    header("Location: registerStaff.php?status=register_success");
}
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles.css">
        <title>Registration Complete</title>
    </head>
    <link rel="stylesheet" href="mystyles.css">
    
    <body>
                <div class="home-main-content">
                    <h1 style="font-family:inherit">Registration Successful!</h1>
                    <h2 style="font-family:inherit">Return to home and log in to your account using your credentials.</h2>
                    <br>
                    <a href="index.php" style="font-size:30px;">Return to Home Page</a>
                        </div>
        
        <br>
        <br>
    </body>
</html>