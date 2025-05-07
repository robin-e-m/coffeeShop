<!DOCTYPE html>
<html>
    <?php
    require "DBConnect.php";
    include 'header.php';
    openDB();
    
//username needs to be initialized to something, otherwise throws an error
//-> checks if POST or GET. if neither, set to null
$user = isset($_GET["username"]) ? $_GET["username"] : (isset($_POST["username"]) ? $_POST["username"] : null);
$result_user = null; //needs a default value, otherwise throws error

//check user table for username
$sql_user = "SELECT question, answer FROM user WHERE username = '$user'";
$result_user = queryDB($sql_user);

//if username found, get question and answer from user table
if (mysqli_num_rows($result_user) == 1) {
    $row = mysqli_fetch_assoc($result_user);
    $security_question = $row['question'];
    $correct_answer = $row['answer']; 
}

//if username not found, redirect back to resetPassword.php with error message
if (mysqli_num_rows($result_user) == 0){
    header("Location: resetPassword.php?error=username_not_found");
    exit;
}

    //HTML document type and page title
    echo '<!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Reset Password</title>
            
        </head>
        <body>';

//form for security answer
    echo "
    <br>
    <form action='resetAction.php' method='POST' class='password-card'>
        <label for='security_answer' class='security-question'>$security_question</label>
        <br>
        <br>
        <input class='reset-input' type='text' id='security_answer' name='security_answer' required>
        <input type='hidden' id='username' name='username' value='$user'>
        <input type='hidden' id='correct_answer' name='correct_answer' value='$correct_answer'>
        <br>
        <br>
        <button class='form-button' type='submit'>Submit Answer</button>
    </form>";

    //check if form was submitted
    //check if submitted answer matches stored answer
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['security_answer']) && isset($_POST['correct_answer']) && ($_POST['security_answer']) 
                === ($_POST['correct_answer'])) {
            //If matching, show option to reset password
        echo "
        <br>
        <br>
        <form action='resetAction.php' method='POST' class='password-card'>
            <label for='new_password' class='security-question'>Enter new password:</label>
            <br>
            <input class='reset-input' type='password' id='new_password' name='new_password' required>
            <input type='hidden' id='username' name='username' value='$user'>
            <br>
            <br>
            <button class='form-button'type='submit'>Reset Password</button>
        </form>";
            
        }
        else{
            if(!isset($_POST['new_password'])){
                echo "<br><p class='security-question'>Incorrect answer, please try again.</p>";
        }
    }
    }
 
    
    //if a new password entered --> update password in database
    if (isset($_POST['new_password'])) {
        $new_password = $_POST['new_password'];
        $new_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        $sql_update = "UPDATE user SET password = '$new_password' WHERE username = '$user'";
        $result_update = queryDB($sql_update);
        
        if ($result_update) {
            echo "<br><p class='security-question'>Password changed successfully</p>";
        }
        else {
            echo "<br><p class='security-question'>Error, your password was not changed. Please try again.</p>";
        }
    }

    ?>

</head>

<body>
    <div class="home-main-content">

    
    <br>
    <br>
    <?php include 'footer.php' ?>
    </div>
</body>
</html>