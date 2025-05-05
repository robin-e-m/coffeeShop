<!DOCTYPE html>
<?php
require 'DBConnect.php';
include 'header.php';

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

if (mysqli_num_rows($result_item) == 0) {
    header("Location: updateMenu.php?error=item_not_found");
    exit;
} else {
    //Updating data in menu table
    $sql = "UPDATE menu SET description = '" . $new_description . "', price = '" .
            $new_price . "', category = '" . $new_category . "', '" . $image_url .
            "' where itemID = " . $itemID;

    $result = modifyDB($sql);

    if ($result) {
        header("Location: updateMenu.php?status=update_success");
    }

    header("Location: updateMenu.php?status=update_success");
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Complete</title>
       
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