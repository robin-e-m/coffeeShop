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
        <h1>Staff Registration</h1>
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
        <div>

            <form name="register" action="registerAction.php" method="get">

                <div>
                    <label>Full Name</label>
                    <input type="text" name="name" size="40" required />
                </div>

                <div>
                    <label>Username</label>
                    <input type="text" name="username" size="15" required />
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="pass" size="20" required />
                </div>

                <div>
                    <label>Confirm Password</label>
                    <input type="password" name="pass2" size="20" required />
                </div>

                <div>
                    <label>Street Address</label>
                    <input type="text" name="address" size="50" required />
                </div>

                <div>
                    <label>City</label>
                    <input type="text" name="city" size="50" required />
                </div>

                <div>
                    <label>State</label>
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

                <div>
                    <label>Zip Code</label>
                    <input type="text" name="zip" size="5" required />
                </div>

                <div>
                    <label>Phone Number</label>
                    <input type="text" name="phone" size="10" required />
                </div>

                <div>
                    <label>E-Mail</label>
                    <input type="email" name="email" size="50" required />
                </div>

                <div>
                    <label>Security Question</label>
                    <input type="text" name="question" size="50" required />
                </div>

                <div>
                    <label>Answer</label>
                    <input type="password" name="answer" size="50" required />
                </div>

                <div>
                    <label>Pay Rate</label>
                    <input type="text" name="pay" size="5" required />
                </div>

                <div>
                    <label>Hire Date</label>
                    <input type="date" name="hire" size="8" required />
                </div>

                <div>
                    <label>User Type:</label>
                    <select name="usertype" required >
                        <option value="">Select employee type</option>
                        <option value="4">Owner</option>
                        <option value="1">Manager</option>
                        <option value="2">Staff</option>
                        
                    </select>

                </div>

                <div class="item">
                    <input type="submit" value="Submit" />
                    <input type="reset" value="Reset" />
                </div>
            </form>
        </div>

        <br>
        <br>

        <?php include 'footer.php' ?>
    </body>
</html>
