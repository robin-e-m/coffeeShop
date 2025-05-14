<!DOCTYPE html>
<?php

require "DBConnect.php";
include 'header.php';

// collect form data
$name = $_GET["name"];
$email = $_GET["email"];
$subject = $_GET["subject"];
$message = $_GET["message"];

//Entering data into feedback table

    $sql = "INSERT into feedback values (0, '" . $name . "', '" . $email . "', '" .
            $subject . "', '" . $message . "')";

echo modifyDB($sql);
header("Location: contact.php?status=success");
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Submission Complete</title>
    </head>
    
    <body>
                <div>
                    <p>Thank you for leaving your feedback!</p>
                    <a href="index.php">Return to Home Page</a>
                        </div>
        
        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>