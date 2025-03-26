
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

$address = $_GET["address"];
$city = $_GET["city"];
$state = $_GET["state"];
$zip = $_GET["zip"];

if ($usertype == "3") { //if customer
    
    $pay = 0.00;
    $hire = 0000-00-00;
     
    $sql = "insert into user values (0, '" . $name . "', '" . $user . "', '" .
            $pswd . "', '" . $address . "', '" . $city . "', '" . $state . "', '" .
            $zip . "', '" . $phone . "', '" . $email . "', '" . $question . "', '" .
            $answer . "', '" . $pay . "', '" . $hire . "', '" . $usertype . "')";
} else { //if manager or staff
    
    $pay = $_GET["pay"];
    $hire = $_GET["hire"];
    
}


$sql = "insert into user values (0, '" . $name . "', '" . $user . "', '" .
            $pswd . "', '" . $address . "', '" . $city . "', '" . $state . "', '" .
            $zip . "', '" . $phone . "', '" . $email . "', '" . $question . "', '" .
            $answer . "', '" . $pay . "', '" . $hire . "', '" . $usertype . "')";
echo modifyDB($sql) . "<br>Use back button to return";
?>