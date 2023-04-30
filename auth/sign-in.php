<?php

    include "config.php";

    if (isset($_POST['email'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $encrypted__password = hash('sha256', $password);

        $result = mysqli_query($db, "SELECT * FROM users WHERE email='$email' AND password='$encrypted__password';");

        echo $password . " " . $email;

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['surname'] = $row['surname'];

            header("Location: index.php");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <input type="password" name="password" id="password">
            <label for="password">
                password
            </label>
        </div>

        <button type="submit">Submit</button>    
    </form>
</body>
</html>