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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Staff</title>

    </head>
    
    <body>
        <div class="home-top-section"></div>
        <div class="home-top-text">
            <h1 style="font-size:100px; font-family:inherit;">Perk & Pour</h1>
            <p style="font-size:35px">Staff Page</p>
        </div>
        <div class="home-main-content">
            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit; text-align:left;">Staff Actions:</h3>

            <p >
            <ul style="font-size:20px; text-align:left";>

                <li><a href="registerCustomer.php">Add new customer</a></li>
                <li><a href="registerMenu.php">Register new menu item</a></li>
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
                Password: <?php echo $password; ?>
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
                <a href="profileUpdate.php">Update your profile</a>
            </p>

            <br>
            <br>
            <?php include 'footer.php' ?>
    </body>
</html>