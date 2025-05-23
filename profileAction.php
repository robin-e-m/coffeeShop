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

//check for matching password re-type
if ($pswd != $pswd2) {
    header("Location: profileUpdate.php?error=retry_password");
    exit;
}
else {

//Updating data in user table
$sql = "UPDATE user SET password = '" . $hashed_pswd . "', name ='" . $name .
  "', address = '" . $address .  "', city = '" . $city .  "', state = '" .
   $state .  "', zip = '" . $zip . "', email = '" . $email . "', phone = '" .
  $phone . "', question = '" . $question . "', answer = '" . 
  $answer . "' where userID = ".$userID;

echo modifyDB($sql) . "<br>Use back button to return";

header("Location: profileUpdate.php?status=update_success");
}

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