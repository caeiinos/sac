<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/mydata.php';

    // trouver l'intercalaire
    $activeid = $_GET['layerid'];

    $activeproject = mysqli_query($db, "SELECT * FROM mylayers WHERE id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['title'];

    // trouver les chapitres
    $activetitle = $activedata['fullname'];

    $ProjectChild = mysqli_query($db, "SELECT * FROM mychapters WHERE parent='$activetitle';");

    $Chapterdocuments = mysqli_query($db, "SELECT * FROM mydocuments WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';

?>

<body class="page page--intercalaire">

    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer.php'; ?>

    <main class="content content--layer">

        <!-- nav pour le content filtre, add, ect... -->
        <aside class="aside aside--layer">
            <h1 class="aside__title">
                Intercalaire >>
                <span><?php echo $pagetitle ?></span>
            </h1>

            <div class="aside__content">
                <div class="aside__filtre aside__item">
                    <button class="aside__filtrebutton">
                        <?php include 'components/svg/filter.php'; ?>
                    </button>
                </div>
                <!-- add chapter  -->
                <div class="aside__add  aside__item">
                    <button class="aside__trigger aside__trigger--add">
                        <p>Nouveau chapitre</p>
                    </button>

                    <form class="aside__addform" method="POST">
                        <label class="aside__addlabel aside__addlabel--title" for="chaptertitle class="aside__addsubmit"">Titre</label>
                        <input class="aside__addinput aside__addinput--title" type="text" name="chaptertitle">
                        <input class="hidden" type="text" name="chapterparent" value="<?php echo $activedata['fullname']; ?>" readonly="readonly">
                        <input class="hidden" type="text" name="chapterbase" value="<?php echo $activedata['base']; ?>" readonly="readonly">

                        <button class="aside__addsubmit" type="submit" name="submitchapter">valider</button>
                    </form>
                </div>

                <!-- add documents  -->
                <div class="aside__add  aside__item">
                    <button class="aside__trigger aside__trigger--add">
                        <p>Nouveau document</p>
                    </button>

                    <form class="aside__addform" method="POST">
                        <label class="aside__addlabel aside__addlabel--title" for="documenttitle">Titre</label>
                        <input class="aside__addinput aside__addinput--title" type="text" name="documenttitle">
                        <input class="hidden" type="text" name="documentparent" value="<?php echo $activedata['fullname']; ?>" readonly="readonly">
                        <input class="hidden" type="text" name="documentbase" value="<?php echo $activedata['base']; ?>" readonly="readonly">

                        <button class="aside__addsubmit" type="submit" name="submitdocument">valider</button>
                    </form>
                </div>
            </div>
        </aside>

        <h2 class="filter__title">2023</h2>

        <h3 class="pre-tease">Les chapitres</h3>
        <!-- show content -->
        <div class="tease">
            <!-- show chapter  -->
            <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 
                <section class="tease__content tease__content--chapter">
                    <a class="tease__link" href="<?php echo 'chapter.php?chapterid='.$row['id']; ?>">
                        
                        <h4 class="tease__title tease__title--chapter">
                            <?php echo $row['title']; ?>
                        </h4>
                        <ul class="tease__data">
                            <li class="tease__item">
                                <?php 

                                    $chapterpapa = $row['fullname'];

                                    // nbr de chapitres
                                    $ChildDocument = mysqli_query($db, "SELECT COUNT(title) AS documentnumber FROM mydocuments where parent LIKE '$chapterpapa%';");

                                    $documentsnumber = mysqli_fetch_array($ChildDocument);

                                ?> 
                                <p class="tease__fact">
                                    documents
                                </p>
                                <p class="tease__number">
                                    <?php echo $documentsnumber['documentnumber']; ?>
                                </p>
                            </li>
                        </ul>
                    </a>
            </section>
            <?php } ?>
        </div>

        <h3 class="pre-tease">Les documents</h3>

        <div class="tease">
        <!-- show documents  -->
            <?php while ($e = mysqli_fetch_array($Chapterdocuments)) { ?> 

                <section class="tease__content  tease__content--document">
                    <a class="tease__link" href="<?php echo 'document.php?documentid='.$e['id']; ?>">
                        <h4 class="tease__title tease__title--document">
                            <?php echo $e['title']; ?>
                        </h4>
                        <ul class="tease__data">
                            <li class="tease__item">
                                <?php 
                                    // projet parent
                                    $projetpapa = $e['fullname'];

                                    // nbr d'intercalaires
                                    $noteChild = mysqli_query($db, "SELECT COUNT(title) AS notenumber FROM mynotes WHERE parent='$projetpapa';");
                                
                                    $notesnumber = mysqli_fetch_array($noteChild);
                                
                                ?> 
                                <p class="tease__fact">Notes</p>
                                <p class="tease__number"> <?php echo $notesnumber['notenumber']; ?></p>
                            </li>
                        </ul>
                    </a>
                </section>
            <?php } ?>
    </main>
    
</body>
</html>