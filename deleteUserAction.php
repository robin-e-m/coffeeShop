<!DOCTYPE html>
<?php
require "DBConnect.php";
include 'header.php';

if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;
}
openDB();


//-> checks POST or GET
$user = isset($_GET["username"]) ? $_GET["username"] : (isset($_POST["username"]) ? $_POST["username"] : null);

//check user table for username
$sql_user = "SELECT * FROM user WHERE username = '$user'";
$result_user = queryDB($sql_user);

//if username found, get question and answer from user table
if (mysqli_num_rows($result_user) == 1) {
    $row = mysqli_fetch_assoc($result_user);

    $sql_user = "DELETE FROM user WHERE username = '$user'";
    echo modifyDB($sql_user);
    header("Location: deleteUser.php?status=update_success");
}

//if username not found, redirect back to deleteUser.php with error message
if (mysqli_num_rows($result_user) == 0) {
    header("Location: deleteUser.php?error=username_not_found");
    exit;
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>User Deletion Complete</title>
    </head>

    <body>
        <div>
            <a href="index.php">Return to Home Page</a>
        </div>

        <br>
        <br>
        <?php include 'footer.php' ?>
    </body>
</html>