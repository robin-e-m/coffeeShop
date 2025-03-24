<?php

require "DBConnect.php";

// collect form data

$name = $_GET["name"];
$user = $_GET["username"];
$pswd = $_GET["pass"];

$phone = $_GET["phone"];
$email = $_GET["email"];

$question = $_GET["question"];
$answer = $_GET["answer"];

$usertype = $_GET["usertype"];

if ($usertype == "1" || $usertype == "2") { //if manager or staff
    $address = $_GET["address"];
    $city = $_GET["city"];
    $state = $_GET["state"];
    $zip = $_GET["zip"];

    $pay = $_GET["pay"];
    $hire = $_GET["hire"];
}


if ($usertype == "3") { //if customer
    $sql = "insert into customer values (0, '" . $user . "', '" .
            $pswd . "', '" . $name . "', '" . $email . "', '" . $phone . "', '" . $question . "', '" .
            $answer . "', '" . $usertype . "')";
} else {
    $sql = "insert into staff values (0, '" . $name . "', '" . $user . "', '" .
            $pswd . "', '" . $address . "', '" . $city . "', '" . $state . "', '" .
            $zip . "', '" . $phone . "', '" . $email . "', '" . $question . "', '" .
            $answer . "', '" . $pay . "', '" . $hire . "', '" . $usertype . "')";
}

echo modifyDB($sql) . "<br>Use back button to return";
?>
