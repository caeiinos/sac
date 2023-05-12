<?php

    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';
    

    if (isset($_POST['email'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $encrypted__password = hash('sha256', $password);

        $result = mysqli_query($db, "SELECT * FROM chelv__users WHERE user__email='$email' AND user__password='$encrypted__password';");

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['user__id'];
            $_SESSION['email'] = $row['user__email'];
            $_SESSION['name'] = $row['user__name'];

            header("Location: index.php");
        }
    }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body>
    <h1>
        Connectez-vous à
    </h1>

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

    <div>
        <p>Nouveau sur CHELV ?</p>
        <a href="sign-up.php"> Créer un compte</a>
    </div>
</body>
</html>