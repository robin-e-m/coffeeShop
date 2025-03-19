<?php

require "DBConnect.php";

// collect form data

$name= $_GET["name"];
$user = $_GET["username"];
$pswd = $_GET["pass"];

$address = $_GET["address"];
$city = $_GET["city"];
$state = $_GET["state"];
$zip = $_GET["zip"];


$phone = $_GET["phone"];
$email = $_GET["email"];

$question = $_GET["question"];
$answer = $_GET["answer"];

$pay = $_GET["pay"];
$hire = $_GET["hire"];

$usertype = $_GET["usertype"];


$sql = "insert into users values (0, '" . $name. "', '" . $user . "', '" .
        
    $pswd . "', '" .  $address . "', '" . $city . "', '" . $state . "', '" .
        
    $zip . "', '" . $phone . "', '" . $email . "', '" . $question . "', '" .
        
    $answer . "', '" . $pay . "', '" . $hire . "', '" . $usertype . "')";

echo modifyDB($sql) . "<br>Use back button to return";
?>
