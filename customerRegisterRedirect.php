<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Logout to register</title>
        <?php include 'header.php' ?>

    </head>
    <link rel="stylesheet" href="mystyles.css">

    <body>
        <div class="home-main-content">
        
            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit"> Looks like you're already logged in! </h3>
            <br>

           <p style="font-size:20px;margin-left:40px"> To register a new account, please log out first.</p>
           <form class="form-inline" name="logout" action="logoutAction.php" method="post">
                        <div class="form-group">
                            <button type="submit" class="form-button">Logout</button>
                        </div>
            </form>

        <br>
        <br>

        <?php include 'footer.php' ?>
        </div>
    </body>

</html>