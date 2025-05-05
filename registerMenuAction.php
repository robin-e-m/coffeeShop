<<<<<<< HEAD
<!DOCTYPE html>
<?php

require 'DBConnect.php';
include 'header.php';
session_start();
$userID = $_SESSION['userID'];

// Make sure the form sends the file correctly
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $file_tmp_name = $_FILES['photo']['tmp_name'];
    $file_name = $_FILES['photo']['name'];
    $file_size = $_FILES['photo']['size'];
    $file_type = $_FILES['photo']['type'];

    // Set the upload directory (ensure this directory is writable)
    $upload_dir = 'uploads/'; // For example, use the 'uploads' folder in your project

    // Generate a unique file name to avoid conflicts
    $new_file_name = uniqid() . '_' . $file_name;

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($file_tmp_name, $upload_dir . $new_file_name)) {
        // Now you have the file path
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
=======
<?php

require "DBConnect.php";

// Retrieve input values
$name = $_GET['name'];
$description = $_GET['description'];
$price = $_GET['price'];
$category = $_GET['category'];

// Check for duplicates in the menu table
$unique_name_check = "SELECT EXISTS (SELECT 1 FROM menu WHERE name = '$name') AS duplicate";
$unique_name_result = queryDB($unique_name_check);
$row = mysqli_fetch_assoc($unique_name_result);

if ($row['duplicate']) {
    header("Location: registerMenu.php?error=duplicate_name");
    exit;
}

// Insert the new menu item
$sql = "insert into menu values (0, '" . $name . "', '" . 
  $description . "', '" . $price . "', '" . 
  $category .  "')";
echo modifyDB($sql) . "<br>Use back button to return";

?>
>>>>>>> origin/Evan
