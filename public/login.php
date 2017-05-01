<?php include ('partials/header.php') ?>
    <form action="/processLogin.php" method="POST">
        Username: <input type="text" name="username"></br></br>
        Password: <input type="password" name="password"></br></br>

        <button type="submit">Login</button>
    </form>
<?php include ('partials/footer.php') ?>