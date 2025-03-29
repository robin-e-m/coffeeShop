
<?php

require "DBConnect.php";

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

if ($usertype == "1" || $usertype == "2") { //if manager or staff
    $address = $_GET["address"];
    $city = $_GET["city"];
    $state = $_GET["state"];
    $zip = $_GET["zip"];

    $pay = $_GET["pay"];
    $hire = $_GET["hire"];
}

if ($usertype == "3") { //if customer, check customer table for duplicate username
    $unique_user_check = "SELECT EXISTS(SELECT 1 FROM customer WHERE username = '$user') AS duplicate";
    $unique_user_result = queryDB($unique_user_check);
    $row = mysqli_fetch_assoc($unique_user_result);
        
    if($row['duplicate']){
        header("Location: registerCustomer.php?error=duplicate_username");
        exit;
            }
    }

if ($usertype == "1" || $usertype == "2"){ //otherwise, same process but check staff table instead
        $unique_user_check = "SELECT EXISTS(SELECT 1 FROM staff WHERE username = '$user') AS duplicate";
    $unique_user_result = queryDB($unique_user_check);
    $row = mysqli_fetch_assoc($unique_user_result);
        
    if($row['duplicate']){
        header("Location: registerCustomer.php?error=duplicate_username");
        exit;
            }
    }
    
if($pswd != $pswd2){
    header("Location: registerCustomer.php?error=retry_password");
    exit;
}



if ($usertype == "3") { //if customer
    $sql = "insert into customer values (0, '" . $user . "', '" .
            $hashed_pswd . "', '" . $name . "', '" . $email . "', '" . $phone . "', '" . $question . "', '" .
            $answer . "', '" . $usertype . "')";
} else {
    $sql = "insert into staff values (0, '" . $name . "', '" . $user . "', '" .
            $hashed_pswd . "', '" . $address . "', '" . $city . "', '" . $state . "', '" .
            $zip . "', '" . $phone . "', '" . $email . "', '" . $question . "', '" .
            $answer . "', '" . $pay . "', '" . $hire . "', '" . $usertype . "')";
}

echo modifyDB($sql);
header("Location: registerCustomer.php?status=register_success");
?>