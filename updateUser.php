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
        <title>Update Contact Information</title>

    </head>
    <body>
        <div class="input-form">
            <h1 style="font-family:inherit">Update Contact Information </h1>
            <h2 style="font-family:inherit">Please enter user's full name</h2>
            <div class="form-card">

                <!-- displays error or success message-->
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'name_not_found') {
                    echo "<p>Name not found.</p>";
                }
                if (isset($_GET['status']) && $_GET['status'] == 'update_success') {
                    echo "<p>Update successful!</p>";
                    exit;
                }
                ?>

                <form name="updateContact" action="updateUserAction.php"
                      method="get" onsubmit="return confirm('Are you sure you want to update this user?')">
                    <div class="register-option">
                        <label>Full Name</label>
                        <br>
                        <input type="text" name="name" size="90" required />
                    </div>

                    <div class="register-option">
                        <label>Phone Number</label>
                        <br>
                        <input type="text" name="phone" size="90" required />
                    </div>

                    <div class="register-option">
                        <label>Email Address</label>
                        <br>
                        <input type="text" name="email" size="90" required />
                    </div>
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
