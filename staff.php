<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

if (!(isset($_SESSION['usertype']) ))
{

        if (($usertype != 1) or ($usertype != 2))
            {
                header("Location:index.php");
                exit;
            }
}
?>
<html>
    <head>
        <title>Staff</title>
    <br>

</head>

<body>
    <h1> Staff Page</h1>
<body>

    <div class="w3-container">
        <h1>New Item for menu </h1>
        <form name="register" action="menuRegisterAction.php" method="get">
            <div class="item">
                <label>Name of item</label>
                <input type="text" name="name" size="40" required/>
            </div>
            <label>Description of item </label>
            <input type="text" name="description" size="40" />
    </div>
    <div class="item">
        <label>Price of item </label>
        <input type="text" name="price" size="40" />
    </div>
    <div class="item">
        <label>What Category does your new item fall into?</label>
        <select name="category" required>
            <option disabled selected value>Select category</option>
            <option value="hot">Hot drink</option>
            <option value="cold">Cold drink</option>
            <option value="bakery">Bakery</option>
            <option value="seasonal">Seasonal</option>
        </select>
    </div>
    <div class="item">
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </div>
</form>
</div>
<br>
<?php include 'footer.php' ?>
</body>
</html>