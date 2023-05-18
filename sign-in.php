<?php

    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';
    
    if (isset($_POST['email'])) {
        if (empty($_POST['email']) && empty($_POST['password'])) {
            $errormail = true;
            $errorpassword = true;
        } elseif (empty($_POST['email'])) {
            $errormail = true;
        } elseif (empty($_POST['password'])) {
            $errorpassword = true;
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $encrypted__password = hash('sha256', $password);

            $result = $db->prepare("SELECT * FROM chelv__users WHERE user__email='$email' AND user__password='$encrypted__password';");
            $result->execute();
            $resultData = $result->fetchAll();
            
            if (count($resultData) > 0) {
                foreach ($resultData as $row) {
                    $_SESSION['id'] = $row['user__id'];
                    $_SESSION['email'] = $row['user__email'];
                    $_SESSION['name'] = $row['user__name'];
                }
                header("Location: index.php");
            }            
        }

    }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="sign">

    <h1 class="sign__title">
        Connectez-vous à
    </h1>

    <form class="sign__form" role="form" method="post">
        <?php if (isset($errormail)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>
        <label class="sign__label" for="email">
            email
        </label>        
        <input class="sign__input" type="email" name="email" id="email">
        <?php if (isset($errorpassword)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>
        <label class="sign__label" for="password">
            password
        </label>
        <input class="sign__input" type="password" name="password" id="password">

        <button class="sign__submit" type="submit">Submit</button>    
    </form>

    <div class="sign__go">
        <p class="go__text">Nouveau sur CHELV ?</p>
        <a class="go__link" href="sign-up.php"> Créer un compte</a>
    </div>

    <!-- no phone -->
    <?php include 'components/nophone/nophone.php'; ?>  
    
</body>
</html>