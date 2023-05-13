<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';
    
    // inclure la balise head
    include 'components/head/head.php';
?>
<body>
    
    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <section>
        <h1>403</h1>
        <h2>Vous vous êtes perdu?</h2>
        <p>Oh là ! Il semble que vous ayez rencontré une barrière inattendue. Malheureusement, l'accès à cette page est interdit. Vous pourriez être confronté à une erreur 403, ce qui signifie que vous n'avez pas les autorisations nécessaires pour afficher son contenu.</p>
        <a href="index.php">retourner en lieu sur</a>
    </section>
</body>