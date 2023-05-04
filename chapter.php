<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    // trouver l'intercalaire
    $activeid = $_GET['chapterid'];

    $activeuser = $_SESSION['id'];

    $activeproject = mysqli_query($db, "SELECT * FROM chelv__chapters WHERE chapter__id='$activeid' AND chapter__owner='$activeuser';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['chapter__name'];

    // trouver les chapitres
    $activetitle = $activedata['chapter__name'];;

    $chapterdocument = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__chapter='$activeid' AND document__owner='$activeuser';");

    // inclure la balise head
    include 'components/head.php';

?>

<body class="page page--chapitre">

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
                $activebinder = $activedata['chapter__binder'];
                $chapterbinder = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activebinder' AND binder__owner='$activeuser';");
                $binderparent = mysqli_fetch_array($chapterbinder);

                $activelayer = $activedata['chapter__layer'];
                $chapterlayer = mysqli_query($db, "SELECT * FROM chelv__layers WHERE layer__id='$activelayer' AND layer__owner='$activeuser';");
                $layerparent = mysqli_fetch_array($chapterlayer);
            
            ?>
            <li class="family__item">
                <a href="<?php echo 'binder.php?binderid='.$binderparent['binder__id']; ?>" class="family__link">
                    <?php echo $binderparent['binder__name']; ?> 
                </a>
            </li>

            <li class="family__item">
                <a href="<?php echo 'layer.php?layerid='.$layerparent['layer__id']; ?>" class="family__link">
                <?php echo $layerparent['layer__name']; ?> 
                </a>
            </li>

            <li class="family__item">
                <a href="" class="family__link">
                <?php echo $pagetitle ?> 
                </a>
            </li>
        </ul> 
        
    </main>   

    <!-- document -->
    <aside class="aside aside--document">

        <h2 class="aside__title aside__title--document">Les intercalaires</h2>
        <!-- add document  -->
        <div class="aside__add aside__add--document aside__item aside__item--document">
            <button class="aside__trigger aside__trigger--add">
                <p>Nouveau document</p>
            </button>

            <form class="aside__addform aside__addform--document" method="POST">
                <label class="aside__addlabel aside__addlabel--title" for="documentname">Titre</label>
                <input class="aside__addinput aside__addinput--title" type="text" name="documentname">
                <input class="hidden" type="text" name="documentbinder" value="<?php echo $activedata['chapter__binder']; ?>" readonly="readonly">
                <input class="hidden" type="text" name="documentlayer" value="<?php echo $activedata['chapter__layer']; ?>" readonly="readonly">
                <input class="hidden" type="number" name="documenthaschapter" value="1" readonly="readonly">
                <input class="hidden" type="text" name="documentchapter" value="<?php echo $activedata['chapter__id']; ?>" readonly="readonly">

                <button  class="aside__addsubmit"  type="submit" name="submitdocument">valider</button>
            </form>
        </div>

        <div class="tease">
            <!-- show document  -->
            <?php while ($row = mysqli_fetch_array($chapterdocument)) { ?> 
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