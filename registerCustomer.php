<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>New Customer Registration</title>
        <?php include 'header.php' ?>
    </head>
    <body>
        <h1>New Customer Registration</h1>
        <div>

            <form name="customer_register" action="registerAction.php" method="get">

                <div>
                    <label>Full Name</label>
                    <input type="text" name="name" size="30" required/>
                </div>

                <div>
                    <label>Username</label>
                    <input type="text" name="username" size="30" required/>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="pass" size="30" required/>
                </div>

                <div>
                    <label>Confirm Password</label>
                    <input type="password" name="pass2" size="30" required/>

                </div>

                <div>
                    <label>Phone Number</label>
                    <input type="text" name="phone" size="30" />
                </div>

                <div>
                    <label>E-Mail</label>
                    <input type="email" name="email" size="30" required/>
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
                    <select name="state" required>
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
                    <input type="text" name="zip" size="5" />
                </div>

                <div>
                    <label>Security Question</label>
                    <input type="text" name="question" size="30" />
                </div>

                <div>
                    <label>Answer</label>
                    <input type="password" name="answer" size="30" required/>
                </div>

                <input type="hidden" name="usertype" value="3">

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


