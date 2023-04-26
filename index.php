<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/mydata.php';

    // inclure la balise head
    include 'components/head.php';
?>

<body class="page page--accueil">
        
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>



    <main class="content">

        <!-- explorer -->
        <?php include 'components/explorer.php'; ?>

        <div class="librairie">
            <h1 class="tease__titletype">Mes fardes</h1>
            <select class="tease__filter" name="" class="damn">
                <option value="title">nom</option>
                <option value="creation">création</option>
                <option value="modified">récent</option>
            </select>


            <div id="tease--project" class="tease tease--project">

                <?php foreach ($ProjectsData as $row) { ?>

                    <!-- projets -->
                    <section class="tease__content">
                        <a class="tease__link" href="<?php echo 'projet.php?projetid='.$row['id']; ?>">
                            <span class="tease__type">farde</span>
                            <h4 class="tease__title">
                                    <?php echo $row['title']; ?>
                
                            </h4>
                            <p class="tease__description">
                                <?php echo $row['description']; ?> 
                            </p>

                        </a> 
                    </section>

                <?php } ?> 

            </div>               
        </div>
        
    
    </main>
   


    
</body>
</html>