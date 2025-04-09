<!DOCTYPE html>
<?php
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 3) {
    header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Customer</title>

    </head>
    <body>
        <h2>Customer Page</h2>
        <p>WORK IN PROGRESS</p>


        <br>
        <br>
        <?php include "footer.php" ?>
    </body>
</html>
