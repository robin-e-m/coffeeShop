<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
  header("Location:index.php");
  exit;
}
?>
    <head>
        <title>text</title>
    <br>
</head>

<body>
    <h1> work in progress for admin :) </h1>
    
    
    <br>
    <br>
    <?php include 'footer.php' ?>
</body>
</html>