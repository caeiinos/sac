<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    // inclure la balise head
    include 'components/head.php';

    //recupére les projets de l'utilisateur
    $activeuser = $_SESSION['id'];
    $chelvbinders = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__owner = $activeuser");

    $bindersData = $chelvbinders->fetch_all(MYSQLI_ASSOC);
?>

<body class="page page--accueil">
        
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>


    <main class="content">

        <!-- explorer -->
        <?php include 'components/explorer.php'; ?>

        <div class="library">
            <h1 class="tease__titletype">Mes fardes</h1>
            <select class="tease__filter" name="" class="damn">
                <option value="title">nom</option>
                <option value="creation">création</option>
                <option value="modified">récent</option>
            </select>


            <div id="tease--binder" class="tease tease--binder">

                <?php foreach ($bindersData as $row) { ?>

                    <!-- fardes -->
                        <a class="tease__link" href="<?php echo 'binder.php?binderid='.$row['binder__id']; ?>">
                            <span class="tease__type">farde</span>
                            <h4 class="tease__title">
                                <?php echo $row['binder__name']; ?>
                            </h4>
                            <p class="tease__description">
                                <?php echo $row['binder__description']; ?> 
                            </p>

                        </a> 

                <?php } ?> 

            </div>               
        </div>
        
    
    </main>
   


    
</body>
</html>