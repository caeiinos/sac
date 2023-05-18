<?php

    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    if (isset($_POST['email'])) {

        if (empty($_POST['email'])) {
            $errormail = true;
        };

        if (empty($_POST['password'])) {
            $errorpassword = true;
        };

        if (empty($_POST['name'])) {
            $errorusername = true;
        };

        if (empty($_POST['confirmed__password'])) {
            $errorconfpassword = true;
        };

        if (!empty($_POST['confirmed__password']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $confirmed__password = $_POST['confirmed__password'];
            $created = date('Y-m-d H:i:s');
        
            if ($password == $confirmed__password) {
                $encrypted__password = hash('sha256', $password);
        
                $stmt = $db->prepare("INSERT INTO chelv__users (user__email, user__name, user__password, user__creation) VALUES (:email, :name, :encrypted_password, :created)");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':encrypted_password', $encrypted__password);
                $stmt->bindParam(':created', $created);
        
                $stmt->execute();

                header("Location: sign-in.php");
            } else {
                $passworconfnotok = true;
            }        
        }

    }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="sign">

    <h1 class="sign__title">
        inscrivez-vous à
    </h1>

    <form class="sign__form" role="form" method="post">
            <?php if (isset($errormail)) { ?>
                <p class="form__invalid">Veuillez remplir ce champ</p>
            <?php } ?>
            <label class="sign__label" for="email">
                email
            </label>
            <input class="sign__input" type="email" name="email" id="email">
            <?php if (isset($errorusername)) { ?>
                <p class="form__invalid">Veuillez remplir ce champ</p>
            <?php } ?>
            <label class="sign__label" for="name">
                Nom d'utilisateur
            </label>
            <input class="sign__input" type="text" name="name" id="surname">
            <?php if (isset($errorpassword)) { ?>
                <p class="form__invalid">Veuillez remplir ce champ</p>
            <?php } ?>
            <label class="sign__label" for="password">
                Mot de passe
            </label>
            <input class="sign__input" type="password" name="password" id="password">
            <?php if (isset($errorconfpassword)) { ?>
                <p class="form__invalid">Veuillez remplir ce champ</p>
            <?php } ?>
            <label class="sign__label" for="confirmed__password">
                confirmation du mot de passe
            </label>
            <input class="sign__input" type="password" name="confirmed__password" id="confirmed__password">

        <button class="sign__submit" type="submit">Créer mon compte</button>    
    </form>

    <div class="sign__go">
        <p class="go__text">déjà sur CHELV ?</p>
        <a class="go__link" href="sign-in.php"> Connectez-vous</a>
    </div>
    
    <!-- no phone -->
    <?php include 'components/nophone/nophone.php'; ?>  

</body>
</html>