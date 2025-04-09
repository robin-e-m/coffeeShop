<?php

require "DBConnect.php";

$user = $_POST["user"];
$pwd = $_POST["pwd"];

$sql = "select userID, name, usertype from user where username = ? and password = ?";
$result = loginDB($sql, $user, $pwd); 

    if (gettype($result) == "object") {

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userID = $row['userID'];
            $name = $row['name'];
            $usertype = $row['usertype'];

            session_start();
            $_SESSION['userID'] = $userID;
            $_SESSION['name'] = $name;
            $_SESSION['usertype'] = $usertype;

            if ($usertype == 1) //manager logged in
                header("location:manager.php");
            else if ($usertype == 2) //staff logged in
                header("location:staff.php");
            else if ($usertype == 3) //customer logged in
                header("location:customer.php");
            else //ownner logged in
                header("location:owner.php");
            exit;
        } else
            header("location:index.php?msg=Login Failed");
    } else
        header("location:index.php?msg=" . $result);
?>