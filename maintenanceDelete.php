<?php

require 'DBConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['maintenanceID'])) {
    $maintenanceID = intval($_POST['maintenanceID']);
    
    // Ensure user is authorized to delete
    session_start();
    if (!(isset($_SESSION['usertype'])) || ($_SESSION['usertype'] != 1 && $_SESSION['usertype'] != 2)) {
        header("Location:index.php");
        exit;
    }
    
    // Execute delete query
    $sql_delete = "DELETE FROM maintenance WHERE maintenanceID = $maintenanceID";
    if (queryDB($sql_delete)) {
        echo "<p>Maintenance report deleted successfully.</p>";
    } else {
        echo "<p>Failed to delete report.</p>";
    }
}

header("Location:maintenanceSummary.php");
exit;
?>



