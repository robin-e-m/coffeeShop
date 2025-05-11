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
            while ($row = mysqli_fetch_assoc($result_reviews)) {
            $revNum = $row['revID'];
            $name = $row['name'];
            $email = $row['email'];
            $subject = $row['subject'];
            $message = $row['message'];

            // output data of each row
        echo "<div class='home-main-content'>
                <h1 style='font-family: inherit'>Review ID: $revNum</h3>
                <h2 style='font-family: inherit'><span>Name:</span> $name</h2>
                <h2 style='font-family: inherit'><span>Email:</span> $email</h2>
                <h3 style='font-family: inherit'><span>Subject:</span> $subject</h3>
                <p style='font-size:22px;'><span>Message:</span><br>$message</p>
              </div>";
            }
        } else {
            echo "0 results";
        }
        ?>

    </body>
</html>
