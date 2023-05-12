<?php

    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    if (isset($_POST['email'])) {
        
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirmed__password = $_POST['confirmed__password'];
        $created = date('Y-m-d H:i:s');

        if ($password == $confirmed__password) {
            $encrypted__password = hash('sha256', $password);
            mysqli_query($db, "INSERT INTO chelv__users (user__email, user__name, user__password, user__creation) VALUES ('$email', '$name', '$encrypted__password', '$created') "); 
        } else {
            echo "<p>password not the same as confirmed password</p>";
        }
    }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body>

    <h1>
        inscrivez-vous à
    </h1>

    <form role="form" method="post">
        <div>
            <input type="email" name="email" id="email">
            <label for="email">
                email
            </label>
        </div>
        <div>
            <input type="text" name="name" id="surname">
            <label for="name">
                Nom d'utilisateur
            </label>
        </div>
        <div>   
            <input type="password" name="password" id="password">
            <label for="password">
                Mot de passe
            </label>
        </div>
        <div>
            <input type="password" name="confirmed__password" id="confirmed__password">
            <label for="confirmed__password">
                confirmation du mot de passe
            </label>
        </div>

        <button type="submit">Créer mon compte</button>    
    </form>

    <div>
        <p>déjà sur CHELV ?</p>
        <a href="sign-in.php"> Connectez-vous</a>
    </div>
</body>
</html>