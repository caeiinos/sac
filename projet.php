<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/DbConnect.php';

    //fonctions pour les projets
    include 'utils/Myprojects.php';

    //fonctions pour les intercalaires
    include 'utils/Mylayers.php';

    //fonctions pour les chapitres
    include 'utils/MyChapters.php';

    //fonctions pour les documents
    include 'utils/MyDocuments.php';

    //fonctions pour les examens
    include 'utils/MyExams.php';

    // trouver le projet
    $activeid = $_GET['projetid'];

    $activeproject = mysqli_query($db, "SELECT * FROM myprojects WHERE id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['title'];

    // trouver les chapitres
    $activetitle = $activedata['title'];

    $ProjectChild = mysqli_query($db, "SELECT * FROM mylayers WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';
?>

<body class="page page--projets">
    
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer.php'; ?>

    <main class="content content--projet">

        <!-- nav pour le content filtre, add, ect... -->
        <aside class="aside aside--projet">        
            <h1 class="aside__title">
                Projet >>
                <span><?php echo $pagetitle ?></span>
            </h1>   

            <div class="aside__content">
                <div class="aside__filtre aside__item">
                    <button class="aside__filtrebutton">
                        <?php include 'components/svg/filter.php'; ?>
                    </button>
                </div>

                <!-- add layer  -->
                <div class="aside__add  aside__item">
                    <button class="aside__trigger aside__trigger--add">
                        <p>Nouvelle Intercalaire</p>
                    </button>

                    <form class="aside__addform" method="POST">
                        <label class="aside__addlabel aside__addlabel--title" for="layertitle">Titre</label>
                        <input class="aside__addinput aside__addinput--title" type="text" name="layertitle">
                        <input class="hidden" type="text" name="layerparent" value="<?php echo $activedata['title']; ?>" readonly="readonly">
                        <input class="hidden" type="text" name="layerbase" value="<?php echo $activedata['title']; ?>" readonly="readonly">


                        <button  class="aside__addsubmit"  type="submit" name="submitlayer">valider</button>
                    </form>
                </div>
            </div>
        </aside>


        <h2 class="filter__title">2023</h2>
        <!-- show content -->
        <h3 class="pre-tease">Les intercalaires</h3>
        
        <div class="tease">
            <!-- show layer  -->
            <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 
                <section class="tease__content tease__content--layer">
                    <a class="tease__link" href="<?php echo 'layer.php?layerid='.$row['id']; ?>">
                        <h4 class="tease__title tease__title--layer">
                            <?php echo $row['title']; ?>
                        </h4>
                        <ul class="tease__data">
                            <li class="tease__item">
                                <?php 
                                    $layerpapa = $row['fullname'];

                                    $ChildChapter= mysqli_query($db, "SELECT COUNT(title) AS chapternumber FROM mychapters WHERE parent='$layerpapa';");

                                    $chaptersnumber = mysqli_fetch_array($ChildChapter);
                                ?> 
                                <p class="tease__fact">chapitres</p>
                                <p class="tease__number"><?php echo $chaptersnumber['chapternumber']; ?></p>
                            </li>

                            
                            <li class="tease__item">
                                <?php 

                                    // nbr de chapitres
                                    $ChildDocument = mysqli_query($db, "SELECT COUNT(title) AS documentnumber FROM mydocuments where parent LIKE '$layerpapa%';");
                                
                                    $ChildExam = mysqli_query($db, "SELECT COUNT(title) AS examnumber FROM myexams where parent LIKE '$layerpapa%';");

                                    $documentsnumber = mysqli_fetch_array($ChildDocument);

                                    $examsnumber = mysqli_fetch_array($ChildExam);
                                
                                ?> 
                                <p class="tease__fact">
                                    documents
                                </p>
                                <p class="tease__number">
                                    <?php echo $documentsnumber['documentnumber'] + $examsnumber['examnumber']; ?>
                                </p>
                            </li>
                        </ul>                
                    </a>
                </section>
            <?php } ?>
        </div>
    </main>
    
</body>
</html>