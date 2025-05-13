<?php
include 'header.php';
if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Manager</title>

    </head>

    <body>

        <div class="home-main-content">
            <h3 style="font-size:40px;color:#60b9bf;font-family:inherit; text-align:left;">Manager Actions:</h3>

            <p>
            <ul style="font-size:20px; text-align:left";>
                <li><a href="contactSummary.php">View customer feedback</a></li>
                <li><a href="viewPastOrders.php">View order history</a></li>
                <br>

                <!-- Account Actions -->
                Account Actions
                <li><a href="registerStaff.php">Add new staff member</a></li>
                <li><a href="registerCustomer.php">Add new customer</a></li>
                <li><a href="updateUser.php">Update contact information</a></li>
                <li><a href="deleteUser.php">Delete users</a></li>
                <li><a href="manager.php">View your profile</a></li>

                <br> <!--Menu Actions-->
                Menu Actions
                <li><a href="registerMenu.php">Add new menu item</a></li>
                <li><a href="updateMenu.php">Modify menu item</a></li>
                <li><a href="deleteMenu.php">Delete menu item</a></li>

                <br><!--Maintenance Actions-->
                Menu Actions
                <li><a href="maintenance.php">Submit maintenance request</a></li>
                <li><a href="maintenanceSummary.php">View maintenance requests</a></li>

                <br>

            </ul>

            <br>
            <br>
            <?php include 'footer.php' ?>
            </body>
            </html>

