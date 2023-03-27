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

    <!-- explorer -->
    <?php include 'components/explorer.php'; ?>

    <main class="content">

        <!-- nav pour le content filtre, add, ect... -->
        <aside class="aside aside--accueil">      
            <h1 class="aside__title">
                Accueil SAC
            </h1>

            <div class="aside__content">
                <div class="aside__filtre aside__item">
                    <button class="aside__filtrebutton">
                        <?php include 'components/svg/filter.php'; ?>
                    </button>
                </div>

                <div class="aside__add  aside__item">
                    <button class="aside__trigger aside__trigger--add">
                        <p>Nouveau Projet</p>
                    </button>

                    <form class="aside__addform" method="POST" action="index.php">
                        <label class="aside__addlabel aside__addlabel--title" for="projecttitle">Titre</label>
                        <input class="aside__addinput aside__addinput--title" type="text" id="projecttitle" name="projecttitle">
                        <label class="aside__addlabel aside__addlabel--desc" for="projectdescription">Description</label>
                        <input class="aside__addinput aside__addinput--desc" type="text" id="projectdescription" name="projectdescription">

                        <button class="aside__addsubmit" type="submit" name="submitproject">valider</button>
                    </form>
                </div> 
            </div>


        </aside>

        <h2 class="filter__title">2023</h2>
        <!-- show content -->
        <h3 class="pre-tease">Les projets</h3>

        <div class="tease">
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

                        <ul class="tease__data">            
                            <!-- nbr intercalaires -->
                            <li class="tease__item">
                                <?php 
                                    // projet parent
                                    $projetpapa = $row['title'];

                                    // nbr d'intercalaires
                                    $ChildLayers = mysqli_query($db, "SELECT COUNT(title) AS layernumber FROM mylayers WHERE parent='$projetpapa';");
                                
                                    $layersnumber = mysqli_fetch_array($ChildLayers);
                                
                                ?> 
                                <p class="tease__fact">
                                    Intercalaires
                                </p>
                                <p class="tease__number">
                                    <?php echo $layersnumber['layernumber']; ?>
                                </p>
                            </li>
                            <!-- nbr chapitres -->
                            <li class="tease__item">
                                <?php 

                                    // nbr de chapitres
                                    $ChildChapter = mysqli_query($db, "SELECT COUNT(title) AS chapternumber FROM mychapters where parent LIKE '$projetpapa%';");
                                
                                    $chaptersnumber = mysqli_fetch_array($ChildChapter);
                                
                                ?> 
                                <p class="tease__fact">
                                    Chapitres
                                </p>
                                <p class="tease__number">
                                    <?php echo $chaptersnumber['chapternumber']; ?>
                                </p>
                            </li>

                            <li class="tease__item">
                                <?php 

                                    // nbr de chapitres
                                    $ChildDocument = mysqli_query($db, "SELECT COUNT(title) AS documentnumber FROM mydocuments where parent LIKE '$projetpapa%';");

                                    $documentsnumber = mysqli_fetch_array($ChildDocument);
                                
                                ?> 
                                <p class="tease__fact">
                                    documents
                                </p>
                                <p class="tease__number">
                                    <?php echo $documentsnumber['documentnumber']; ?>
                                </p>
                            </li>

                            <li class="tease__item">
                                <p class="tease__fact">Création</p>
                                <p class="tease__number"><?php echo $row['creation']; ?></p>
                            </li>
                        </ul>                        
                    </a> 
                </section>

            <?php } ?>            
        </div>   
    
    </main>
   


    
</body>
</html>