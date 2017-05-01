<?php
include "database/connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, password)
VALUES ('" . $username . "', '" . $password ."')";
if ($conn->query($sql) === TRUE) {
    header('Location: /userRegistrationSuccess.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
include "database/close.php";