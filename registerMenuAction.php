<!DOCTYPE html>
<?php

require 'DBConnect.php';
include 'header.php';

$userID = $_SESSION['userID'];

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $file_tmp_name = $_FILES['photo']['tmp_name'];
    $file_name = $_FILES['photo']['name'];
    $file_size = $_FILES['photo']['size'];
    $file_type = $_FILES['photo']['type'];

    $upload_dir = 'uploads/';

    $new_file_name = uniqid() . '_' . $file_name;

    if (move_uploaded_file($file_tmp_name, $upload_dir . $new_file_name)) {
        $image_url = $upload_dir . $new_file_name;
    } else {
        echo "Error uploading file!";
        exit;
    }
} else {
    echo "No file uploaded or there was an error.";
    exit;
}

// Retrieve input values
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];

// Check for duplicates in the menu table
$unique_name_check = "SELECT EXISTS (SELECT 1 FROM menu WHERE name = '$name') AS duplicate";
$unique_name_result = queryDB($unique_name_check);
$row = mysqli_fetch_assoc($unique_name_result);

if ($row['duplicate']) {
    header("Location: regsiterMenu.php?error=duplicate_name");
    exit;
}

// Insert the new menu item
$sql = "insert into menu values (0, '" . $name . "', '" . 
  $description . "', '" . $price . "', '" .  $category .  "', '" . $image_url . "')";
echo modifyDB($sql);
header("Location: registerMenu.php?status=register_success");

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Complete</title>
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