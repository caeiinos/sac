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
        <h1 class="notfound__title">403!</h1>
        <h2 class="notfound__subtitle">Vous vous êtes perdu?</h2>
        <p class="notfound__text">Accès interdit : vous avez atteint une barrière inattendue. Malheureusement, l'accès à cette page est restreint.</p>
        <a class="notfound__link" href="index.php">retourner en lieu sur</a>
    </section>

    <!-- no phone -->
    <?php include 'components/nophone/nophone.php'; ?>  
    
</body>
</html>