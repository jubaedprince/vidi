<?php
    session_start();
    include ('partials/header.php') ;
    if(!isset($_SESSION['user_id'])){
        ?> <script type="text/javascript">     window.location.href = 'login.php'; </script> <?php
    }
        include ("database/connect.php");


        if(isset($_POST['message'])){
            $message = $_POST['message'];
            $user_id = $_SESSION['user_id'];



            $sql = "INSERT INTO anonymous_discussion (message) VALUES ( '" . $message . "' )";

            if ($conn->query($sql) === TRUE) {

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

        $sql = "SELECT * FROM anonymous_discussion";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo('Someone: ' . $row['message'] . '</br>');
            }
        }
    ?>

    <form action="" method="POST">
        Message: <textarea name="message"></textarea></br>
        <button type="submit">Post</button></br>
    </form>



<?php
    include ('database/close.php');
    include ('partials/footer.php');
?>