<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 3) {
  header("Location:index.php");
  exit;
}
?>
<html>
    <head>
        <title>text</title>
    <br>
</head>

<body>
    <h1> work in progress for Customer page :) </h1>
    
    
    <br>
    <br>
    <?php include 'footer.php' ?>
</body>
</html>