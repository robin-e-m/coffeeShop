<!DOCTYPE html>
<?php

require "DBConnect.php";
include 'header.php';

// collect form data
$name = $_GET["name"];
$problem = $_GET["problem"];
$time = $_GET["time"];
$other = $_GET["other"];

//Entering data into feedback table

    $sql = "INSERT into maintenance values (0, '" . $name . "', '" . $problem . "', '" .
            $time . "', '" . $other . "')";

echo modifyDB($sql);
header("Location: maintenance.php?status=success");
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Submission Complete</title>
    </head>
    
    <body>
                <div>
                    <p>Thank you for reporting a problem</p>
                    <a href="index.php">Return to Home Page</a>
                        </div>
        
        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>
