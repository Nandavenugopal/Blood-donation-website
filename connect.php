<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$db = "register";

$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}


?>