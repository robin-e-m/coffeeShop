<?php

require 'DBConnect.php';
include 'header.php';

if (!(isset($_SESSION['usertype'])) || ($_SESSION['usertype'] != 1 && $_SESSION['usertype'] != 2)) {
    header("Location:index.php");
    exit;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Maintenance Summary</title>
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
        <?php
        // Fetch maintenance reports
        $sql_reviews = "SELECT maintenanceID, name, problem, time, other FROM maintenance";
        $result_reviews = queryDB($sql_reviews);

        if (mysqli_num_rows($result_reviews) > 0) {
            while ($row = mysqli_fetch_assoc($result_reviews)) {
                echo "<div class='data'>
                        <p><strong>Review ID:</strong> " . $row['maintenanceID'] . "</p>
                        <p><strong>Name:</strong> " . $row['name'] . " | <strong>Problem:</strong> " . $row['problem'] . " | <strong>Time:</strong> " . $row['time'] . "</p>
                        <p><strong>Other:</strong> " . $row['other'] . "</p>
                        <form method='post' action='maintenanceDelete.php' onsubmit=\"return confirm('Are you sure you want to delete this entry?');\">
                            <input type='hidden' name='maintenanceID' value='" . $row['maintenanceID'] . "'>
                            <button type='submit' class='remove-button'>Delete</button>
                        </form>
                      </div>";
            }
        } else {
            echo "<div class='data'>No results found</div>";
        }
        ?>
    </body>
</html>


