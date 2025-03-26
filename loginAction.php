<?php

require "DBConnect.php";

$user = $_POST["username"];
$pswd = $_POST["pass"];

$sql = "select userID, name, usertype from users where username = ? and password = ?";
$result = loginDB($sql, $user, $pswd);
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
    if ($usertype == 1)
      header("location:admin.php");
    else if ($usertype == 2)
      header("location:staff.php");
    else
      header("location:welcome.php");
    exit;
  } else
    header("location:index.php?msg=Login Failed");
} else
  header("location:index.php?msg=". $result);
?>

