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
        <title>text</title>
    <br>
</head>

<body>
    <h1> work in progress :) </h1>
    
    
    <br>
    <br>
    <?php include 'footer.php' ?>
</body>
</html>
