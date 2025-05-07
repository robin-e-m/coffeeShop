<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

if (!(isset($_SESSION['usertype']))) {
    if ($usertype != 1 OR $usertype != 2 OR usertype != 3)
        header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ordering Cart</title>
    <br>

</head>      

<body>
    <div class="home-top-section"></div>
    <div class="home-top-text">
        <h1 style="font-size:100px; font-family:inherit;">Ordering Cart</h1>
    </div>
    
    <?php
    if (isset($_GET['status']) && $_GET['status'] == 'success') {
                echo "<p>Order submitted successfully!</p>";
                exit;
            }
    
    //Item data
    $name = $_GET['name'];
    $price = $_GET['price'];
    $quantity = $_GET['quantity'];

    echo '<h2>You ordered ' . $quantity . 'of ' . $name . ', and the total was $'
            . $price * $quantity * ($price * $quantity *.6025);
    ?>
    
    <div class="butt-center">
        <input class="form-button" type="submit"
               value="Submit" onclick="document.location='cartAction.php'" />
    </div>
    
</body>
</html>

