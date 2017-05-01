<?php include ('partials/header.php') ?>

    <form onSubmit="return validate()"  action="/processRegistration.php" method="POST">
        Username: <input type="text" name="username"></br></br>
        Password: <input type="password" id="password" name="password"></br></br>
        Password (Confirm): <input type="password" id="password_confirmed" name="password_confirmed"></br></br>

        <button type="submit">Register</button>
    </form>

    <script>
        function validate(){
            if(document.getElementById("password").value!==document.getElementById("password_confirmed").value){
                alert("Passwords do no match");
                return false;
            }else {
                return true;
            }
        }
    </script>


<?php include ('partials/footer.php') ?>