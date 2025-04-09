<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;
}
?> 

<html>
    <head>
        <meta charset="UTF-8">

        <title>Owner</title>


    </head>
    <body>
        <h2>Owner Page</h2>

        <p>WORK IN PROGRESS</p>
        

        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>