<?php

    include "config.php";

    if (isset($_POST['email'])) {
        
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $confirmed__password = $_POST['confirmed__password'];
        $created = date('Y-m-d H:i:s');

        if ($password == $confirmed__password) {
            $encrypted__password = hash('sha256', $password);
            mysqli_query($db, "INSERT INTO users (email, firstname, surname, password, created) VALUES ('$email', '$firstname', '$surname', '$encrypted__password', '$created') "); 
        } else {
            echo "<p>password not the same as confirmed password</p>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body>
    <form role="form" method="post">
        <div>
            <input type="email" name="email" id="email">
            <label for="email">
                email
            </label>
        </div>
        <div>
            <input type="text" name="firstname" id="firstname">
            <label for="firstname">
                firstname
            </label>
        </div>
        <div>
            <input type="text" name="surname" id="surname">
            <label for="surname">
                surname
            </label>
        </div>
        <div>   
            <input type="password" name="password" id="password">
            <label for="password">
                password
            </label>
        </div>
        <div>
            <input type="password" name="confirmed__password" id="confirmed__password">
            <label for="confirmed__password">
                confirmed password
            </label>
        </div>

        <button type="submit">Submit</button>    
    </form>
</body>
</html>