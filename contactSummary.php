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

    </head>

    <body>

        <?php
//pull customer reviews from feedback table
        $sql_reviews = "SELECT revID, name, email, subject, message FROM feedback";
        $result_reviews = queryDB($sql_reviews);

//confirm there are entries and display
        if (mysqli_num_rows($result_reviews) > 0) {

            $row = mysqli_fetch_assoc($result_reviews);
            $revNum = $row['revID'];
            $name = $row['name'];
            $email = $row['email'];
            $subject = $row['subject'];
            $message = $row['message'];

            // output data of each row
            echo "Rewiew ID: " . $revNum . "<br>" .
            "Name: " . $name . " | Email: " . $email . " | Subject: " . $subject . "<br>" .
            "Message: " . $message . "<br>";
        } else {
            echo "0 results";
        }
        ?>

    </body>
</html>
