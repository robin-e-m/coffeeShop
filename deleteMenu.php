<!DOCTYPE html>
<?php
require 'DBConnect.php';
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

            <div class="form-card">

                <!-- displays error message if redirected after failed attempt -->
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'item_not_found') {
                    echo "<p>Item not found.</p>";
                }

                if (isset($_GET['status']) && $_GET['status'] == 'update_success') {
                    //echo "<div class=home-main-content>";
                    echo "<p>Item deleted successfully!</p>";
                    echo "<a href='index.php'>Return to homepage</a>";
                    //echo"</div>";
                    exit;
                }
                ?>

                <form name="delete_menu" action="deleteMenuAction.php"
                      method="get" enctype="multipart/form-data"
                      onsubmit="return confirmation('Are you sure you want to delete this item?')">

                    <!--
                    <div class="register-option">
                        <label style="font-size: 20px">Item Name</label>
                        <input type="text" name="name" size="90" required/>
                    </div>
                    
                    -->

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
