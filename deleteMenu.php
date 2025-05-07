<!DOCTYPE html>
<?php
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Menu Item</title>
    </head>
    <body>
        <div class="input-form">
        <h1 style="font-family:inherit">Delete Menu Item</h1>
        <h2 style="font-family:inherit">Please enter the item name to delete</h2>
        <div class="form-card">
              
            <!-- displays error message if redirected after failed attempt -->
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'item_not_found') {
                echo "<p>Menu item not found.</p>";
            }
            
            if (isset($_GET['status']) && $_GET['status'] == 'update_success') {
                echo "<p>Item deleted successfully!</p>";
                exit;
            }
            ?>

            <form name="delete_menu" action="deleteMenuAction.php" method="get">
                <div class="register-option">
                    <label style="font-size: 20px">Item Name</label>
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
