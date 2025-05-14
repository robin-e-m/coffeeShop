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
        <title>New Menu Item </title>
    <br>
</head>

<body>
    <div class="input-form">
        <h1 style="font-family:inherit">Register Menu Item</h1>
        <div>
        <!-- error/success messages -->
        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'register_success') {
            echo "<p>Menu item successfully registered!</p>";
            echo "<a href='index.php'>Return to homepage</a>";
            exit;
        }

        if (isset($_GET['error']) && $_GET['error'] == 'duplicate_name') {
            echo "<p>Item already registered. Please try again.</p>";
        }
        ?>
        <div class="form-card">
            <form name="register" action="registerMenuAction.php" method="post" enctype="multipart/form-data">
                <div>
                    <div class="register-option">
                        <label>Item Name</label>
                        <br>
                        <input type="text" name="name" size="90" required />
                    </div>

                    <div class="register-option">
                        <label>Item Description</label>
                        <br>
                        <input type="text" name="description" size="90" required />
                    </div>

                    <div class="register-option">
                        <label>Item Price:</label>
                        <br>
                        <input type="text" name="price" size="90" required />
                    </div>
                    
                    <div class="register-option">
                        <label>Category</label>
                        <br>
                        <select name="category" required >
                            <option disabled selected value>Select item category</option>
                            <option value="hot">Hot Drinks</option>
                            <option value="cold">Cold Drinks</option>
                            <option value="bake">Bakery</option>
                            <option value="limited">Seasonal</option>
                        </select>
                    </div>
                    
                     <div class="form-group">
                        <label>Item photo:</label>
                        <input type="file" class="form-control" placeholder="Add Picture" name="photo">
                     </div>
                    
                   <div class="button-center">
                    <input class="form-button" type="submit" value="Submit" />
                    <input class="form-button" type="reset" value="Reset" />
                    </div>
                     </form>
                </div>
           
        </div>
        <br>
        <br>
        <?php include 'footer.php' ?>
        </body>
        </html>