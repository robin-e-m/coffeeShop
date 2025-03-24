<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>New Customer Registration</title>

        <?php include "header.php" ?>
    </head>
    
    <body>
        <h1>New Customer Registration</h1>
        <div>

            <form name="customer_register" action="registerAction.php" method="get">

                <div>
                    <label>Full Name</label>
                    <input type="text" name="name" size="40" required/>
                </div>

                <div>
                    <label>Username</label>
                    <input type="text" name="username" size="15" required/>
                </div>

                <div>
                    <label>Password</label>
                    <input type="password" name="pass" size="20" required/>
                </div>

                <div>
                    <label>Confirm Password</label>
                    <input type="password" name="pass2" size="20" required/>

                </div>


                <div>
                    <label>Phone Number</label>
                    <input type="text" name="phone" size="10" />
                </div>

                <div>
                    <label>E-Mail</label>
                    <input type="email" name="email" size="50" required/>
                </div>

                <div>
                    <label>Security Question</label>
                    <input type="text" name="question" size="50" />
                </div>

                <div>
                    <label>Answer</label>
                    <input type="password" name="answer" size="50" required/>
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


