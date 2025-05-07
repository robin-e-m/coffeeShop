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
        <title>Maintenance Report</title>
        <style>
            .data {
                color: white;
                font-family: Arial, sans-serif;
                font-size: 16px;
            }
        </style>
    </head>

    <body>

        <?php
        // Pull customer reviews from the maintenance table
        $sql_reviews = "SELECT maintenanceID, name, problem, time, other FROM maintenance";
        $result_reviews = queryDB($sql_reviews);

        // Confirm there are entries and display all rows
        if (mysqli_num_rows($result_reviews) > 0) {
            while ($row = mysqli_fetch_assoc($result_reviews)) {
                echo "<div class='data'>
                        <p><strong>Review ID:</strong> " . $row['maintenanceID'] . "</p>
                        <p><strong>Name:</strong> " . $row['name'] . " | <strong>Problem:</strong> " . $row['problem'] . " | <strong>Time:</strong> " . $row['time'] . "</p>
                        <p><strong>Other:</strong> " . $row['other'] . "</p>
                        <hr>
                      </div>";
            }
        } else {
            echo "<div class='data'>No results found</div>";
        }
        ?>

    </body>
</html>

