<?php
require "DBConnect.php";
openDB();

//username needs to be initialized to something, otherwise throws an error -> checks if POST or GET. if neither, set to null
$user = isset($_GET["username"]) ? $_GET["username"] : (isset($_POST["username"]) ? $_POST["username"] : null);
$result_staff = null; //needs a default value, otherwise throws error if user is customer

//check customer table for username
$sql_customer = "SELECT question, answer FROM user WHERE username = '$user'";
$result_customer = queryDB($sql_customer);

//if username not in customer table, check staff table
if (mysqli_num_rows($result_customer) == 0) {
    $sql_staff = "SELECT question, answer FROM user WHERE username = '$user'";
    $result_staff = queryDB($sql_staff);
}

//if username found in customer table, get question and answer from customer table
if (mysqli_num_rows($result_customer) == 1) {
    $row = mysqli_fetch_assoc($result_customer);
    $security_question = $row['question'];
    $correct_answer = $row['answer']; 
}

//if found in staff table, get question and answer from staff table
if($result_staff != null && mysqli_num_rows($result_staff) == 1){
    $row = mysqli_fetch_assoc($result_staff);
    $security_question = $row['question'];
    $correct_answer = $row['answer'];
}
    
//if username not found in either table, redirect back to resetPassword.php with error message
if (mysqli_num_rows($result_customer) == 0 && ($result_staff == null || mysqli_num_rows($result_staff) == 0)){
    header("Location: resetPassword.php?error=username_not_found");
    exit;
}

    //styling stuff
    echo '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Reset Password</title>
            <link rel="stylesheet" href="mystyles.css">
        </head>
        <body>';
    
//form for security answer
    echo "
    <form action='resetAction.php' method='POST'>
        <label for='security_answer'>$security_question</label>
        <input type='text' id='security_answer' name='security_answer' required>
        <input type='hidden' id='username' name='username' value='$user'>
        <input type='hidden' id='correct_answer' name='correct_answer' value='$correct_answer'>
        <button type='submit'>Submit Answer</button>
    </form>";

    //check if form was submitted and submitted answer matches database
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['security_answer']) && isset($_POST['correct_answer']) && ($_POST['security_answer']) === ($_POST['correct_answer'])) {
            //if so, show option to reset password
        echo "
        <form action='resetAction.php' method='POST'>
            <label for='new_password'>Enter new password:</label>
            <input type='password' id='new_password' name='new_password' required>
            <input type='hidden' id='username' name='username' value='$user'>
            <button type='submit'>Reset Password</button>
        </form>";
            
        }
        else{
            if(!isset($_POST['new_password'])){
                echo "Incorrect security answer."; 
        }
    }
    }
 
    
    //if new password entered, update password in database
    if (isset($_POST['new_password'])) {
        $new_password = $_POST['new_password']; 

        $sql_update = "UPDATE customer SET password = '$new_password' WHERE username = '$user'";
        $result_update = queryDB($sql_update);
        
        if ($result_update) {
            echo "Password changed successfully";
        }
        else {
            echo "Error, password not changd";
        }
    }

?>