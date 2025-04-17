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
        <h1 style="font-family:inherit">Staff Registration</h1>
          <!-- error/success messages -->
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'register_success') {
                echo "<p>Account created successfully!</p>";
                echo "<a href='index.php'>Return to homepage</a>";
                exit;
            }
            
            if(isset($_GET['error']) && $_GET['error'] == 'duplicate_username') {
                echo "<p>Username already taken. Please try again.</p>";
            }
            
            if(isset($_GET['error']) && $_GET['error'] == 'retry_password') {
                echo "<p>The passwords you entered don't match. Please try again.</p>";
            }
            ?>
        <br>
        <div class="form-card">

            <form name="register" action="registerAction.php" method="get">

                <div class="register-option">
                    <label>Full Name</label>
                    <br>
                    <input type="text" name="name" size="90" required />
                </div>

                <div class="register-option">
                    <label>Username</label>
                    <br>
                    <input type="text" name="username" size="90" required />
                </div>

                <div class="register-option">
                    <label>Password</label>
                    <br>
                    <input type="password" name="pass" size="90" required />
                </div>

                <div class="register-option">
                    <label>Confirm Password</label>
                    <br>
                    <input type="password" name="pass2" size="90" required />
                </div>

                <div class="register-option">
                    <label>Street Address</label>
                    <br>
                    <input type="text" name="address" size="90" required />
                </div>

                <div class="register-option">
                    <label>City</label>
                    <br>
                    <input type="text" name="city" size="90" required />
                </div>

                <div class="register-option">
                    <label>State</label>
                    <br>
                    <select name="state" required >
                        <option disabled selected value>Select your state</option>
                        <option value="al">AL</option>
                        <option value="ak">AK</option>
                        <option value="az">AZ</option>
                        <option value="ar">AR</option>
                        <option value="ca">CA</option>
                        <option value="co">CO</option>
                        <option value="ct">CT</option>
                        <option value="de">DE</option>
                        <option value="dc">DC</option>
                        <option value="fl">FL</option>
                        <option value="ga">GA</option>
                        <option value="hi">HI</option>
                        <option value="id">ID</option>
                        <option value="il">IL</option>
                        <option value="in">IN</option>
                        <option value="ia">IA</option>
                        <option value="ks">KS</option>
                        <option value="ky">KY</option>
                        <option value="la">LA</option>
                        <option value="me">ME</option>
                        <option value="md">MD</option>
                        <option value="ma">MA</option>
                        <option value="mi">MI</option>
                        <option value="mn">MN</option>
                        <option value="ms">MS</option>
                        <option value="mo">MO</option>
                        <option value="mt">MT</option>
                        <option value="ne">NE</option>
                        <option value="nv">NV</option>
                        <option value="nh">NH</option>
                        <option value="nj">NJ</option>
                        <option value="nm">NM</option>
                        <option value="ny">NY</option>
                        <option value="nc">NC</option>
                        <option value="nd">ND</option>
                        <option value="oh">OH</option>
                        <option value="ok">OK</option>
                        <option value="or">OR</option>
                        <option value="pa">PA</option>
                        <option value="pr">PR</option>
                        <option value="ri">RI</option>
                        <option value="sc">SC</option>
                        <option value="sd">SD</option>
                        <option value="tn">TN</option>
                        <option value="tx">TX</option>
                        <option value="ut">UT</option>
                        <option value="va">VA</option>
                        <option value="wa">WA</option>
                        <option value="wv">WV</option>
                        <option value="wi">WI</option>
                        <option value="wy">WY</option>
                    </select>
                </div>

                <div class="register-option">
                    <label>Zip Code</label>
                    <br>
                    <input type="text" name="zip" size="10" required />
                </div>

                <div class="register-option">
                    <label>Phone Number</label>
                    <br>
                    <input type="text" name="phone" size="90" required />
                </div>

                <div class="register-option">
                    <label>E-Mail</label>
                    <br>
                    <input type="email" name="email" size="90" required />
                </div>

                <div class="register-option">
                    <label>Security Question</label>
                    <br>
                    <input type="text" name="question" size="90" required />
                </div>

                <div class="register-option">
                    <label>Answer</label>
                    <br>
                    <input type="password" name="answer" size="90" required />
                </div>

                <div class="register-option">
                    <label>Pay Rate</label>
                    <input type="text" name="pay" size="5" required />
                </div>

                <div class="register-option">
                    <label>Hire Date</label>
                    <input type="date" name="hire" size="8" required />
                </div>

                <div class="register-option">
                    <label>User Type:</label>
                    <select name="usertype" required >
                        <option value="">Select employee type</option>
                        <option value="1">1. Manager</option>
                        <option value="2">2. Staff</option>
                    </select>

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
