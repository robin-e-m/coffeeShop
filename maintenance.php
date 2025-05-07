<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Maintenance</title>
        <?php include 'header.php'; ?>
    </head>

    <body>
        <div class="home-top-section"></div>
        <div class="home-top-text">
            <h1 style="font-size:100px; font-family:inherit;">Perk & Pour</h1>
            <p style="font-size:35px;">Maintenance Report Page</p>
        </div>

            <div class="input-form">
                <?php
                if (isset($_GET['status']) && $_GET['status'] == 'success') {
                    echo "<p>Message submitted successfully!</p>";
                    echo "<a href='index.php'>Return to homepage</a>";
                    exit;
                }
                ?>
                <div class="form-card">
                    <form name="maintenance" action="maintenanceAction.php" method="get">
                        
                        <div class="register-option">
                            <label style="font-size: 20px">Name:</label>
                            <br>
                            <input type="text" name="name" size="100" required/>
                        </div>

                        <div class="register-option">
                            <label style="font-size: 20px">What is the problem?:</label>
                            <br>
                            <input type="text" name="problem" size="100" required/>
                        </div>

                        <div class="register-option">
                            <label style="font-size: 20px">When did it stop working? </label>
                            <br>
                            <input type="text" name="time" size="100" required/>
                        </div>

                        <div class="register-option">
                            <label style="font-size: 20px">Other information that can help solve problem</label>
                            <br>
                            <input type="text" name="other" size="100" required/>
                        </div>

                        <div class="button-center">
                            <input class="form-button" type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
    </body>
</html>