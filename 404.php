<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';
    
    // inclure la balise head
    include 'components/head/head.php';
?>
<body class="page">
    
    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <section class="notfound">
        <h1 class="notfound__title">404!</h1>
        <h2 class="notfound__subtitle">Vous vous êtes perdu?</h2>
        <p class="notfound__text">Oh non ! Il semble que vous ayez atteint une page qui n'existe pas. La fameuse erreur 404. Ne vous inquiétez pas, cela arrive parfois lorsque l'on s'aventure dans des territoires inconnus.</p>
        <a class="notfound__link" href="index.php">retourner en lieu sur</a>
    </section>
</body>