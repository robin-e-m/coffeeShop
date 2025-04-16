
<?php
require 'DBConnect.php';
include 'header.php';

//session control
if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;
}
openDB();

//username needs to be initialized to something, otherwise throws an error
//-> checks if POST or GET. if neither, set to null
$user = isset($_GET["username"]) ? $_GET["username"] : (isset($_POST["username"]) ? $_POST["username"] : null);
$result_user = null; //needs a default value, otherwise throws error
//check user table for username
$sql_user = "SELECT * FROM user WHERE username = '$user'";
$result_user = queryDB($sql_user);

//if username found, get question and answer from user table
if (mysqli_num_rows($result_user) == 1) {
    $row = mysqli_fetch_assoc($result_user);

    $name = $row['name'];
    $username = $row['username'];
    $address = $row['address'];
    $city = $row['city'];
    $state = $row['state'];
    $zip = $row['zip'];
    $phone = $row['phone'];
    $email = $row['email'];
    $question = $row['question'];
    $answer = $row['answer'];
}
?> 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Manager</title>

    </head>
    <body>
    <body>
        <div class="home-top-section"></div>
        <div class="home-top-text">
            <h1 style="font-size:100px; font-family:inherit;">Perk & Pour</h1>
            <p style="font-size:35px">Manger Page</p>
        </div>
        <div class="home-main-content">
            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit; text-align:left;">Manager Actions:</h3>

            <p >
            <ul style="font-size:20px; text-align:left";>
                <li><a href="registerStaff.php">Add new staff member</a></li>
                <li><a href="registerCustomer.php">Add new customer</a></li>
                <li><a href="#">Add new menu item</a></li>
                <li><a href="#">Modify menu item</a></li>
            </ul>
            <br>
            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit; text-align:left;">Profile Details:</h3>

            <p style="font-size:20px; text-align:left;">
                <br>
                Full Name: <?php echo $name; ?>
                <br>
                Username: <?php echo $username; ?>
                <br>
                Address: <?php echo $address; ?>
                <br>
                City: <?php echo $city; ?>
                <br>
                State: <?php echo $state; ?>
                <br>
                Zip Code: <?php echo $zip; ?>
                <br>
                Phone Number: <?php echo $phone; ?>
                <br>
                Email Address: <?php echo $email; ?>
                <br>
                Security Question: <?php echo $question; ?>
                <br>
                Security Answer: <?php echo $answer; ?>
                <br>
                <a href="#">Update your profile</a>
            </p>
            <br>
            
            <br>
            <br>
            <?php include 'footer.php' ?>
            </body>
            </html>