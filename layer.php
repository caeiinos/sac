<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    // trouver l'intercalaire
    $activeid = $_GET['layerid'];

    $activeproject = mysqli_query($db, "SELECT * FROM chelv__layers WHERE layer__id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['layer__name'];

    // trouver les chapitres
    $activeuser = $_SESSION['id'];
    $layerchapter = mysqli_query($db, "SELECT * FROM chelv__chapters WHERE chapter__layer='$activeid' AND chapter__owner='$activeuser';");

    $layerdocument = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__layer='$activeid' AND document__owner='$activeuser' AND document__haschapter=0 ;");
    // $Chapterdocuments = mysqli_query($db, "SELECT * FROM mydocuments WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';

?>

<body class="page page--intercalaire">

    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- layer content -->
    <main class="content content--layer">
        <span class="layer__type">Intercalaire</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 
        <ul class="family">

            <?php 
                $activebinder = $activedata['layer__binder'];
                $layerbinder = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activebinder' AND binder__owner='$activeuser';");
                $binderparent = mysqli_fetch_array($layerbinder);
            
            ?>
            <li class="family__item">
                <a href="<?php echo 'binder.php?binderid='.$binderparent['binder__id']; ?>" class="family__link">
                    <?php echo $binderparent['binder__name']; ?> 
                </a>
            </li>

            <li class="family__item">
                <a href="" class="family__link">
                <?php echo $pagetitle ?> 
                </a>
            </li>
        </ul> 
        <div class="layer__description">
            <p class="layer__text">

            </p>
        </div>
    </main>   

    <!-- chapter -->
    <aside class="aside aside--chapter">

        <h2 class="aside__title aside__title--chapter">Les chapitres</h2>
        <!-- add chapter  -->
        <div class="aside__add aside__add--chapter aside__item aside__item--chapter">
            <button class="aside__trigger aside__trigger--add">
                <p>Nouveau chapitre</p>
            </button>

            <form class="aside__addform aside__addform--chapter" method="POST">
                <label class="aside__addlabel aside__addlabel--title" for="chaptername">Titre</label>
                <input class="aside__addinput aside__addinput--title" type="text" name="chaptername">
                <input class="hidden" type="text" name="chapterbinder" value="<?php echo $activedata['layer__binder']; ?>" readonly="readonly">
                <input class="hidden" type="text" name="chapterlayer" value="<?php echo $activedata['layer__id']; ?>" readonly="readonly">

                <button  class="aside__addsubmit"  type="submit" name="submitchapter">valider</button>
            </form>
        </div>

        <div class="tease">
            <!-- show chapter  -->
            <?php while ($row = mysqli_fetch_array($layerchapter)) { ?> 
                    <a class="tease__link" href="<?php echo 'chapter.php?chapterid='.$row['chapter__id']; ?>">
                        <h4 class="tease__title tease__title--layer">
                            <?php echo $row['chapter__name']; ?>
                        </h4>
                    </a>
            <?php } ?>
        </div>
    </aside>

    
    <!-- document -->
    <aside class="aside aside--document">

        <h2 class="aside__title aside__title--document">Les documents</h2>
        <!-- add document  -->
        <div class="aside__add aside__add--document aside__item aside__item--document">
            <button class="aside__trigger aside__trigger--add">
                <p>Nouveau document</p>
            </button>

            <form class="aside__addform aside__addform--document" method="POST">
                <label class="aside__addlabel aside__addlabel--title" for="documentname">Titre</label>
                <input class="aside__addinput aside__addinput--title" type="text" name="documentname">
                <input class="hidden" type="text" name="documentbinder" value="<?php echo $activedata['layer__binder']; ?>" readonly="readonly">
                <input class="hidden" type="text" name="documentlayer" value="<?php echo $activedata['layer__id']; ?>" readonly="readonly">
                <input class="hidden" type="number" name="documenthaschapter" value="0" readonly="readonly">
                <input class="hidden" type="text" name="documentchapter" value="" readonly="readonly">

                <button  class="aside__addsubmit"  type="submit" name="submitdocument">valider</button>
            </form>
        </div>

        <div class="tease">
            <!-- show document  -->
            <?php while ($row = mysqli_fetch_array($layerdocument)) { ?> 
                    <a class="tease__link" href="<?php echo 'document.php?documentid='.$row['document__id']; ?>">
                        <h4 class="tease__title tease__title--document">
                            <?php echo $row['document__name']; ?>
                        </h4>
                    </a>
            <?php } ?>
        </div>
    </aside>
    
</body>
</html>