<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>New Customer Registration</title>
        <?php include 'header.php'?>
    </head>
    <body>
        <h1>Password Reset</h1>
        <h2>Please enter your username to proceed</h2>
        <div>

            <form name="reset_password" action="securityCheck.php" method="get">
                
                <div>
                    <label>Username</label>
                    <input type="text" name="username" size="15" required/>
                </div>
                
                <div class="item">
                    <input type="submit" value="Submit" />
                </div>
            </form>
        </div>

        <br>
        <br>

        <?php include 'footer.php' ?>
    </body>
</html>


