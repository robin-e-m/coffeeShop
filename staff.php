<!DOCTYPE html>
<?php
require 'DBConnect.php';
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
  <div class="w3-container w3-center">
    <h1>New Item for menu click here </h1>
    <a href="NewItem.php" class="w3-bar-item w3-button w3-mobile ">New Item</a>
    
  </div>
  <br>
    <?php include 'footer.php' ?>
</body>
</html>
