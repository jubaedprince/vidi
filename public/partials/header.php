<?php
session_start()?>
<!DOCTYPE html>
<html>
<body>
<ul>
<li><a href="/index.php">Home</a></li>
<li><a href="/register.php">Register</a></li>
<?php
if(isset($_SESSION['user_id'])){
    echo "<li><a href=\"/logout.php\">Logout</a></li>";
    echo "<li><a href=\"/presentation.php\">Presentation</a></li>";
    echo "<li><a href=\"/discussion.php\">Anonymous Discussion</a></li>";
}else{
    echo "<li><a href=\"/login.php\">Login</a></li>";
}
?>
<li><a href="/score.php">Score</a></li>


</ul>