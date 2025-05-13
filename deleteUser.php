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
        <title>Delete User</title>
    </head>
    <body>
        <div class="input-form">
            <h1 style="font-family:inherit">Delete User</h1>
            <h2 style="font-family:inherit">Please enter the username to delete</h2>
            <div class="form-card">

                <!-- displays error message if redirected after failed attempt -->
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'username_not_found') {
                    echo "<p>Username not found.</p>";
                }

                if (isset($_GET['status']) && $_GET['status'] == 'update_success') {
                    echo "<p>Account deleted successfully!</p>";
                    exit;
                }
                ?>

                <form name="delete_user" action="deleteUserAction.php"
                      method="get" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <div class="register-option">
                        <label style="font-size: 20px">Username</label>
                        <input type="text" name="username" size="90" required/>
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
