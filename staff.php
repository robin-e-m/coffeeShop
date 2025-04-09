<!DOCTYPE html>
<?php
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 2) {
    header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <title>Staff</title>
    <br>

</head>

<body>
    <h1> Staff Page</h1>

    <p>WORK IN PROGRESS</p>
    <br>
    <br>
    <?php include 'footer.php' ?>
</body>
</html>
