<?php 
    date_default_timezone_set("Europe/Brussels");
    //connect the db
    include 'utils/config.php';
    // inclure la balise head
    include 'components/head/head.php';
    //if not log
    include 'utils/notlog/notlog.php';

    //recupére les projets de l'utilisateur
    $activeuser = $_SESSION['id'];

    //get binders from mysql db
    $IndexBinderData = $db->prepare("SELECT * FROM chelv__binders WHERE binder__owner = $activeuser");

?>

<body class="page page--accueil">
        
    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php 
        $IndexBinderData->execute();
        include 'components/explorer/explorer--front.php'; 
    ?>

    <main class="content">

        <div class="library">
            <div class="library__head">
                <h1 class="library__title">Mes fardes</h1>
                <select class="library__filter" name="binderfilter" class="damn">
                    <option value="binder__name">nom</option>
                    <option value="binder__creation">création</option>
                    <option value="binder__opened">récent</option>
                </select>                
            </div>



            <div id="tease--binder" class="tease tease--binder">

                <?php 

                    $IndexBinderData->execute();
                    foreach ($IndexBinderData as $IndexBinderRow) {
                        include 'components/tease/tease--binder.php';
                    } 
                ?> 

            </div>               
        </div>
        
    
    </main>
   


    
</body>
</html>