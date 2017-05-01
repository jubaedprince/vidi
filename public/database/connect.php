<?php
$servername = "localhost";
$username = "eh15acn";
$password = "eT0HfIRX";
$db_name = "dbeh15acn";
//$username = "root";
//$password = "root";
//$db_name = "vidi_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>