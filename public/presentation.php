<?php
    session_start();
    include ('partials/header.php') ;
    if(!isset($_SESSION['user_id'])){
        ?> <script type="text/javascript">     window.location.href = 'login.php'; </script> <?php
    }
        include ("database/connect.php");


        if(isset($_POST['score'])){
            $posted_score = $_POST['score'];

            $user_id = $_POST['user_id'];
            $comment = $_POST['comment'];
            $is_published = 0;

            if(isset($_POST['is_published'])){
                $is_published = 1;
            }

            $sql = "SELECT * FROM evaluation WHERE user_id = '".$user_id."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                }


                $sql = "UPDATE evaluation SET score=" . $posted_score. ", comment='" . $comment . "', is_published = " . $is_published . " WHERE id=". $id;


                if ($conn->query($sql) === TRUE) {
//                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                var_dump("insert");

                $sql = "INSERT INTO evaluation (user_id, score, comment, is_published) VALUES ('" . $user_id . "', '" . $posted_score ."', ' " . $comment . "', ". $is_published . " )";

                if ($conn->query($sql) === TRUE) {

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }







        $sql = "SELECT * FROM evaluation WHERE user_id = '".$_SESSION['user_id']."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $user_id = $_SESSION['user_id'];
                $score = $row["score"];
                $comment = $row["comment"];
                $is_published = $row["is_published"];
            }
        } else {
            $user_id = $_SESSION['user_id'];
            $score = 0;
            $comment = "";
            $is_published = false;
        }
    ?>

    <video width="400" controls>
        <source src="/presentation/test.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <form action="" method="POST">
        Score: <input  <?php if(($is_published == true)){echo " disabled";}?> type="number" name="score" minlength="0" maxlength="5" value="<?php echo ($score)?>"></br></br>
        <input type="hidden" name="user_id" value="<?php echo($_SESSION['user_id'])?>">
        Comment: <textarea  <?php if(($is_published == true)){echo " disabled";}?> name="comment"><?php echo ($comment)?></textarea></br></br>
        Publish <input  type="checkbox" name="is_published" value="true" <?php if(($is_published == true)){echo " disabled checked";}?>></br></br>
        <button type="submit" <?php if(($is_published == true)){echo "disabled";}?>>Save</button></br>
    </form>



<?php
    include ("database/close.php");
    include ('partials/footer.php');
?>