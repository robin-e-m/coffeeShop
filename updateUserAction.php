<!DOCTYPE html>
<?php
require "DBConnect.php";
include 'header.php';

if (!(isset($_SESSION['usertype'])) or $usertype != 1) {
    header("Location:index.php");
    exit;
}

// collect form data
$name = $_GET["name"];

//check user table for user's name
$sql_user = "SELECT phone, email FROM user WHERE name = '$name'";
$result_user = queryDB($sql_user);

//if username found, get phone and email from form
if (mysqli_num_rows($result_user) == 1) {
    $email = $_GET["email"];
    $phone = $_GET["phone"];

    //Updating data in user table
    $sql = "UPDATE user SET email = '" . $email . "', phone = '" .
            $phone . "' WHERE name = " . $name;

    echo modifyDB($sql);
    header("Location: userUpdate.php?status=update_success");

    
} else {      //user's name not found, redirect back to error message
    header("Location: updateUser.php?error=name_not_found");
    exit;
}
?>

<body>
    <title>Update Complete</title>
</head>

<body>
    <div>
        <a href="index.php">Return to Home Page</a>
    </div>

    <br>
    <br>
    <?php include 'footer.php' ?>
</div>
</body>
</html>