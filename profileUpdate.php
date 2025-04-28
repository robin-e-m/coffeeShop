<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';
if (!(isset($_SESSION['userID']))) {
    header("Location:index.php");
    exit;
} else {
    $userID = $_SESSION['userID'];
    global $username, $password, $name, $address, $city, $state, $zip,
    $email, $phone, $question, $answer;
    $sql = "select username, password, name, address, city, state, zip," .
            "email, phone, question, answer from user where userID = " .
            $userID;
    $result = queryDB($sql);
    if (gettype($result) == "object") {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['username'];
            $password = $row['password'];
            $password2 = $row['password'];
            $name = $row['name'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $email = $row['email'];
            $phone = $row['phone'];
            $question = $row['question'];
            $answer = $row['answer'];
        }
        echo "";
    } else {
        header("Location:index.php?msg=" . $result);
        exit;
    }
}
?>
<div class="input-form">
        <h1 style="font-family:inherit">Edit Your Profile</h1>
        <div>
              <!-- error/success messages -->
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'update_success') {
                echo "<p>Account updated successfully!</p>";
                echo "<a href='index.php'>Return to homepage</a>";
                exit;
            }
            
            if(isset($_GET['error']) && $_GET['error'] == 'retry_password') {
                echo "<p>The passwords you entered don't match. Please try again.</p>";
            }
            ?>
              <div class="form-card">
            <form name="updateProfile" action="profileAction.php" method="get">
                
           <div class="register-option">
                    <label>Full Name</label>
                    <br>
                    <input type="text" name="name" size="90"  value ="<?php echo $name ?>" required/>
                </div>

                <div class="register-option">
                    <label>Username</label>
                    <br>
                    <input type="text" name="username" size="90" value ="<?php echo $username ?>" disabled/>
                </div>

                <div class="register-option">
                    <label>Password</label>
                    <br>
                    <input type="password" name="password" size="90" value ="<?php echo $password ?>" required/>
                </div>

                <div class="register-option">
                    <label>Confirm Password</label>
                    <br>
                    <input type="password" name="password2" size="90" value ="<?php echo $password2 ?>" required/>
                </div>

                <div class="register-option">
                    <label>Phone Number</label>
                    <br>
                    <input type="text" name="phone" size="90" value ="<?php echo $phone ?>" required/>
                </div>

                <div class="register-option">
                    <label>E-Mail</label>
                    <br>
                    <input type="email" name="email" size="90" value ="<?php echo $email ?>"  required/>
                </div>

                <div class="register-option">
                    <label>Street Address</label>
                    <br>
                    <input type="text" name="address" size="90" value ="<?php echo $address ?>"  required />
                </div>

                <div class="register-option">
                    <label>City</label>
                    <br>
                    <input type="text" name="city" size="90" value ="<?php echo $city ?>"  required />
                </div>
                
                <div class="register-option">
                    <label>State</label>
                    <br>
                    <select name="state"  value ="<?php echo $state ?>" required>
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
                    <input type="text" name="zip" size="8" value ="<?php echo $zip ?>"  />
                </div>

                <div class="register-option">
                    <label>Security Question</label>
                    <br>
                    <input type="text" name="question" size="90" value ="<?php echo $question ?>" required />
                </div>

                <div class="register-option">
                    <label>Answer</label>
                    <br>
                    <input type="password" name="answer" size="90" value ="<?php echo $answer ?>"  required/>
                </div>

                <input class = "form-button" type="submit" value ="submit" />
                <input class="form-button" type="reset" value="Reset" />
        </form>
    </div>

</body>
</html>