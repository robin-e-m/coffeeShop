<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

if (!(isset($_SESSION['usertype']) OR ($usertype !=1))) {

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

            <div class="form-card">

                <!-- displays error message if redirected after failed attempt -->
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'item_not_found') {
                    echo "<p>Item not found.</p>";
                }

                if (isset($_GET['status']) && $_GET['status'] == 'update_success') {
                    //echo "<div class=home-main-content>";
                    echo "<p>Item updated successfully!</p>";
                    echo "<a href='index.php'>Return to homepage</a>";
                    //echo"</div>";
                    exit;
                }
                ?>

                <form name="update_Item" action="updateMenuAction.php" method="post" enctype="multipart/form-data">
                    <div class="register-option">
                        <label style="font-size: 20px">Item Name:</label>
                        <select name="name" required>
                            <?php
                            $sql_names = "SELECT name FROM menu";
                            $result_names = queryDB($sql_names);
                            while ($row = mysqli_fetch_assoc($result_names)) {
                            $name = htmlspecialchars($row['name']);
                            echo "<option value=\"$name\">$name</option>";
        }
        ?>
                        </select>
                    </div>

                    <div class="register-option">
                        <label style="font-size: 20px">Description:</label>
                        <br>
                        <input type="text" name="description" size="100" required/>
                    </div>

                    <div class="register-option">
                        <label style="font-size: 20px">Item Price:</label>
                        <br>
                        <input type="text" name="price" size="100" required/>
                    </div>

                    <div class="register-option">
                        <label style="font-size: 20px">Item Category</label>
                        <br>
                        <select name="category" required >
                            <option disabled selected value>Select a category</option>
                            <option value="hot">Hot Drinks</option>
                            <option value="cold">Cold Drinks</option>
                            <option value="bake">Bakery</option>
                            <option value="limited">Seasonal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Item photo:</label>
                        <br>
                        <input type="file" class="form-control" placeholder="Add Picture" name="photo">
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
