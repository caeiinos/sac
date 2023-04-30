<?php

include "config.php";

if (isset($_SESSION['user_id']) == false) {
    header("Location: sign-in.php");
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
    <h1><?php echo 'hello ' . $_SESSION['firstname'] ?></h1>
    <a href="Logout.php">Logout</a>
</body>
</html>