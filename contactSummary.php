<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

if (!(isset($_SESSION['usertype']))) {
    if ($usertype != 1 OR $usertype != 2)
        header("Location:index.php");
    exit;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact Form Feedback</title>
        <style>
            .data {
                color: white;
                font-family: Arial, sans-serif;
                font-size: 16px;
                padding: 10px;
                border-bottom: 1px solid #ccc;
            }
            .remove-button {
                background-color: red;
                color: white;
                border: none;
                padding: 5px 10px;
                cursor: pointer;
            }
            .remove-button:hover {
                background-color: darkred;
            }
        </style>
    </head>

    <body>

        <br>
        <div class="home-main-content">
            <?php
//pull customer reviews from feedback table
            $sql_reviews = "SELECT revID, name, email, subject, message FROM feedback";
            $result_reviews = queryDB($sql_reviews);

//confirm there are entries and display
            if (mysqli_num_rows($result_reviews) > 0) {
                while ($row = mysqli_fetch_assoc($result_reviews)) {
                    $revNum = $row['revID'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $subject = $row['subject'];
                    $message = $row['message'];

                    // output data of each row
                    echo "<div class='data'>
                <p><strong>Review ID:</strong>Review ID: $revNum</p>
                <p><strong>Name:</strong> Name: $name</p>
                <p><strong>Email: $email</p>
                <p><strong>Subject: $subject</p>
                <p><strong>Message:<br>$message</p>
                    <form method='post' action='contactDelete.php' onsubmit=\"return confirm('Are you sure you want to delete this entry?');\">
                            <input type='hidden' name='revID' value='" . $row['revID'] . "'>
                            <button type='submit' class='remove-button'>Delete</button>
                        </form>
              </div>";
                }
            } else {
                echo "No results found";
            }
            ?>
            <br>
            <?php include 'footer.php' ?>
        </div>
        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>
