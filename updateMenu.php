<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['usertype']))) {
    if ($usertype != 1 OR $usertype != 2)
        header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Menu Item</title>
   
    </head>
    <body>
        <div class="input-form">
        <h1 style="font-family:inherit">Update Menu Item</h1>
        <h2 style="font-family:inherit">Please enter the item's name to proceed</h2>
        <div class="form-card">
              
            <!-- displays error message if redirected after failed attempt -->
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'item_not_found') {
                echo "<p>Item not found.</p>";
            }
            ?>

            <form name="update_Item" action="updateMenuAction.php" method="get">
                <div class="register-option">
                    <label style="font-size: 20px">Item Name:</label>
                    <input type="text" name="name" size="90" required/>
                </div>
                <br>
                <div class="button-center">
                    <input class="form-button" type="submit" value="Submit" />
                </div>
            </form>
        </div>

        <br>
        <br>

        <?php include 'footer.php' ?>
        </div>
    </body>
</html>
