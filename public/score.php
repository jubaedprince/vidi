<?php
    include ('partials/header.php');
    include  ('database/connect.php');


$sql = "SELECT * FROM evaluation INNER JOIN users ON evaluation.user_id=users.id WHERE is_published = 1 ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    ?>
    <table border="1">
        <tr>
            <td>User Id</td>
            <td>Score</td>
            <td>Comment</td>
        </tr>
        <?php
    while($row = $result->fetch_assoc()) {
    ?>

        <tr>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['score'] ?></td>
            <td><?php echo $row['comment'] ?></td>
        </tr>

        <?php
    }
    ?>
    </table>
    <?php
} else {
    echo "0 results";
}


?>





<?php
include  ('database/close.php');
include ('partials/footer.php');
?>