<?php

//connection string
$servername = "localhost";
$username = "rmorri17";
$password = "CSC4400!!";
$dbname = "coffeeshop";
$conn;

// Internal APIs 
function openDB() {
  global $servername, $username, $password, $dbname, $conn;

// Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error)
    return $conn->connect_error;
  else
    return "Connected";
}

function closeDB() {
  global $conn;
  $conn->close();
}

// API to modify DB
function modifyDB($sql) {
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    if ($conn->query($sql) === TRUE)
      $message = "Update Successful";
    else
      $message = $conn->error;
    closeDB();
  }
  return $message . "<br>";
}

// API to query DB
function queryDB($sql) { // returns an object or a string
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    $result = $conn->query($sql);
    if (gettype($result) == "object")
      $message = $result;
    else
      $message = $conn->error . "<br>Your SQL:" . $sql;
    closeDB();
  }
  return $message;
}

// API for login with prepared statement
function loginDB($sql, $user, $pswd) {
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pswd);
    $stmt->execute();
    $result = $stmt->get_result();
    if (gettype($result) == "object")
      $message = $result;
    else
      $message = $conn->error . "<br>Your SQL:" . $sql;
    closeDB();
  }
  return $message;
}
?>