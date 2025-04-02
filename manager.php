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

        <title>Managers</title>


    </head>
    <body>
        <h2>Manager Page</h2>

        <p>Manager information/processes will go on this page</p>
        <a href="registerCustomer.php">Click here to add new customers</a>
        <br>
        <a href="registerStaff.php">Click here to add new employees</a>

        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>