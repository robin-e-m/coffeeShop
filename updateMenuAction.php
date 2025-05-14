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
    if (!isset($_FILES['photo'])) {
        echo "Upload failed: \$_FILES['photo'] is not set. Did you name the input field 'photo'?";
    } else {
        $errorCode = $_FILES['photo']['error'];
        $errorMsg = match ($errorCode) {
            1 => "File is too big (exceeds upload_max_filesize in php.ini)",
            2 => "File is too big (exceeds MAX_FILE_SIZE in HTML form)",
            3 => "File only partially uploaded",
            4 => "No file uploaded",
            6 => "Missing a temporary folder",
            7 => "Failed to write file to disk",
            8 => "A PHP extension stopped the file upload",
            default => "Unknown error code: $errorCode"
        };
        echo "Upload failed: $errorMsg";
    }
    exit;
}

// Retrieve input values
$name = $_POST['name'];
$new_description = $_POST['description'];
$new_price = $_POST['price'];
$new_category = $_POST['category'];

// Check for duplicates in the menu table
$unique_name_check = "SELECT EXISTS (SELECT 1 FROM menu WHERE name = '$name') AS duplicate";
$unique_name_result = queryDB($unique_name_check);
$row = mysqli_fetch_assoc($unique_name_result);

//if (mysqli_num_rows($result_item) == 0) {
    //header("Location: updateMenu.php?error=item_not_found");
    //exit;
    
//} else {
    //Updating data in menu table
    $sql = "UPDATE menu 
        SET description = '$new_description', 
            price = '$new_price', 
            category = '$new_category', 
            image_url = '$image_url' 
        WHERE name = '$name'";

    $result = modifyDB($sql);

    header("Location: updateMenu.php?status=update_success");
//}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Update Complete</title>
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