<!DOCTYPE html>
<?php

require "DBConnect.php";
include 'header.php';
session_start();
$userID = $_SESSION['userID'];

// collect form data
$name = $_GET["name"];

//hashes password using bcrypt
$pswd = $_GET["password"];
$pswd2 = $_GET["password2"];
$hashed_pswd = password_hash($pswd, PASSWORD_DEFAULT);

$address = $_GET["address"];
$city = $_GET["city"];
$state = $_GET["state"];
$zip = $_GET["zip"];

$email = $_GET["email"];
$phone = $_GET["phone"];

$question = $_GET["question"];
$answer = $_GET["answer"];


//check for duplicates in user table
if ($usertype == "1" || $usertype == "2" || $usertype == '3') {
    $unique_user_check = "SELECT EXISTS(SELECT 1 FROM user WHERE username = '$user') AS duplicate";
    $unique_user_result = queryDB($unique_user_check);
    $row = mysqli_fetch_assoc($unique_user_result);

    if ($row['duplicate']) {
        header("Location: profileUpdate.php?error=duplicate_username");
        exit;
    }
}

//check for matching password re-type
if ($pswd != $pswd2) {
    header("Location: profileUpdate.php?error=retry_password");
    exit;
}

//Updating data in user table
$sql = "update user set Password = '" . $hashed_pswd . "', Name ='" .
  $name . "', Address = '" . $address .  "', City = '" . $city .  "', State = '"
  . $state .  "', Zip = '" . $zip . "', Email = '" . $email . "', Phone = '" .
  $phone . "', Question = '" . $question . "', Answer = '" . 
  $answer . "' where userID = ".$userID;

echo modifyDB($sql) . "<br>Use back button to return";
header("Location: updateProfile.php?status=register_success");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Complete</title>
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