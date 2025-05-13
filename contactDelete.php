<?php
require 'DBConnect.php';
include 'header.php';
    session_start();
    if (!(isset($_SESSION['usertype'])) || ($_SESSION['usertype'] != 1 && $_SESSION['usertype'] != 2)) {
        header("Location:index.php");
        exit;
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['revID'])) {
    $revID = intval($_POST['revID']);

    // Execute delete query
    $sql_delete = "DELETE FROM feedback WHERE revID = '$revID'";
    if (queryDB($sql_delete)) {
        echo "<p>Customer feedback deleted successfully.</p>";
    } else {
        echo "<p>Failed to delete.</p>";
    }
}

header("Location:contactSummary.php");
exit;

include 'footer.php';
?>



