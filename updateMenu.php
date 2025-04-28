<!DOCTYPE html>
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
        <title>Register Staff</title>

    </head>
    <body>
        <div class="input-form">
            <h1 style="font-family:inherit">Update Menu Item</h1>
            <!-- error/success messages -->
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'register_success') {
                echo "<p>Menu item created successfully!</p>";
                echo "<a href='index.php'>Return to homepage</a>";
                exit;
            }

            if (isset($_GET['error']) && $_GET['error'] == 'duplicate_item') {
                echo "<p>Item name is already taken. Please try again.</p>";
            }
            ?>
            <br>
            <div class="form-card">

                <form name="register" action="updateMenuAction.php" method="get">

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
                        <label>Item Description</label>
                        <br>
                        <input type="text" name="description" size="90" required />
                    </div>


                    <div class="register-option">
                        <label>Category</label>
                        <br>
                        <select name="category" required >
                            <option disabled selected value>Select item category</option>
                            <option value="al">Hot Drinks</option>
                            <option value="ak">Cold Drinks</option>
                            <option value="az">Bakery</option>
                            <option value="ar">Seasonal</option>
                        </select>
                    </div>

            </div>

            <div class="button-center">
                <input class="form-button" type="submit" value="Submit" />
                <input class="form-button" type="reset" value="Reset" />
            </div>
        </form>
    </div>

    <br>
    <br>

    <?php include 'footer.php' ?>
</div>
</body>
</html>