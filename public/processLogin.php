<?php
session_start();
include ('database/connect.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '".$username."' AND  password = '".$password."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['user_id'] = $row["id"];
        ?> 
        <script type="text/javascript">  window.location.href = 'presentation.php'; </script> 
        <?php

    }
} else {
    echo "0 results";
}

include "database/close.php";
?>