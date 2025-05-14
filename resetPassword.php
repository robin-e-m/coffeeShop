<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
        <?php include 'header.php'?>
    </head>
    <body>
        <div class="input-form">
        <h1 style="font-family:inherit">Password Reset</h1>
        <h2 style="font-family:inherit">Please enter your username to proceed</h2>
        <div class="form-card">
              
            <!-- displays error message if redirected after failed attempt -->
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'username_not_found') {
                echo "<p style='font-size:20px'>Username not found.</p>";
            }
            ?>

            <form name="reset_password" action="resetAction.php" method="get">
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
