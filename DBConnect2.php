<?php
// Connection string
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
    if ($conn->connect_error) {
        return "Connection failed: " . $conn->connect_error;
    } else {
        return "Connected";
    }
}

function closeDB() {
    global $conn;
    if ($conn) {
        $conn->close();
    }
}

// API to modify DB (Insert/Update/Delete for 'menu' table)
function modifyDB($sql) {
    global $conn;
    $message = openDB();
    if ($message == "Connected") {
        if ($conn->query($sql) === TRUE) {
            $message = "Operation successful";
        } else {
            $message = "Error: " . $conn->error;
        }
        closeDB();
    }
    return $message . "<br>";
}

// API to query DB (Retrieve data from 'menu' table)
function queryDB($sql) {
    global $conn;
    $message = openDB();
    if ($message == "Connected") {
        $result = $conn->query($sql);
        if (gettype($result) == "object") {
            $message = $result;
        } else {
            $message = "Error: " . $conn->error . "<br>Your SQL: " . $sql;
        }
        closeDB();
    }
    return $message;
}

// Example Function: Add a new menu item
function addMenuItem($name, $description, $price, $category) {
    $sql = "INSERT INTO menu (name, description, price, category) VALUES ('$name', '$description', '$price', $category)";
    return modifyDB($sql);
}

// Example Function: Retrieve all menu items
function getMenuItems() {
    $sql = "SELECT * FROM menu";
    $result = queryDB($sql);
    if (gettype($result) == "object") {
        while ($row = $result->fetch_assoc()) {
            echo "Item: " . $row['name'] . " - Price: $" . $row['price'] . "<br>";
        }
    } else {
        echo $result;
    }
}
?>
