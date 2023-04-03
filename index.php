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


        <div class="tease tease--project">
            <?php foreach ($ProjectsData as $row) { ?>

                <!-- projets -->
                <section class="tease__content">
                    <a class="tease__link" href="<?php echo 'projet.php?projetid='.$row['id']; ?>">
                    
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
    
    </main>
   


    
</body>
</html>