<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    // find the layer
    $LayerActiveQuery = $db->prepare("SELECT * FROM chelv__layers WHERE layer__id=?;");
    $LayerActiveQuery->execute([$_GET['layerid']]);
    // find pagetitle
    $pagetitle = $LayerActiveQuery->fetchColumn(1);
    //find base for explorer
    $LayerActiveQuery->execute([$_GET['layerid']]);
    $ExplorerBase = $LayerActiveQuery->fetchColumn(6);

    // trouver les chapitres
    $activeuser = $_SESSION['id'];
    $LayerChapterQuery = $db->prepare("SELECT * FROM chelv__chapters WHERE chapter__layer=? AND chapter__owner='$activeuser';");
    $LayerChapterQuery->execute([$_GET['layerid']]);
    // trouver les documents
    $LayerDocQuery = $db->prepare("SELECT * FROM chelv__documents WHERE document__layer=? AND document__owner='$activeuser' AND document__haschapter=0 ;");
    $LayerDocQuery->execute([$_GET['layerid']]);

    // update the date
    $NewModified = date('Y-m-d H:i:s');
    $LayerActiveUpdate = $db->prepare("UPDATE chelv__layers SET layer__opened = ? WHERE layer__id=?;");  
    $LayerActiveUpdate->execute([$NewModified, $_GET['layerid']]);
    //403 and 404
    // if (mysqli_num_rows($LayerActiveQuery)== 0) {
    //     header("Location: 404.php");
    // } else if ($activeuser != $LayerActiveData['layer__owner']) {
    //     header("Location: 403.php");
    // }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="page page--layer">

    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- layer content -->
    <main class="content content--layer">

        <span class="layer__type">Intercalaire</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 

        <!-- get family -->
        <?php include 'components/family/family--layer.php'; ?>
    </main>   

    <!-- chapter -->
    <aside class="aside aside--chapter">

        <h2 class="aside__title aside__title--chapter">Les chapitres</h2>
        <!-- add chapter  -->
        <div class="aside__add aside__add--chapter aside__item aside__item--chapter">
            <button class="aside__trigger aside__trigger--add">
                <p>Nouveau chapitre</p>
            </button>

            <!-- form to add chapter -->
            <?php include 'components/form/form--chapter.php'; ?>
        </div>

        <form class="LayerChapterQuerys__form" action="search.php" method="get">
            <input class="LayerChapterQuerys__search"  type="text" name="search" placeholder="Search...">
            <div id="LayerChapterQuerys" class="tease">
                <!-- show chapter  -->
                <?php 
                while ($LayerChapterRow = mysqli_fetch_array($LayerChapterQuery)) {  
                    include 'components/tease/tease--chapter.php';
                } ?>
            </div>
        </form>
    </aside>

    
    <!-- document -->
    <aside class="aside aside--document">

        <h2 class="aside__title aside__title--document">Les documents</h2>
        <!-- add document  -->
        <div class="aside__add aside__add--document aside__item aside__item--document">
            <button class="aside__trigger aside__trigger--add">
                <p>Nouveau document</p>
            </button>

            <!-- form to add document -->
            <?php include 'components/form/form--doc.php'; ?>
        </div>

        <form class="LayerDocQuerys__form" action="search.php" method="get">
            <input class="LayerDocQuerys__search"  type="text" name="search" placeholder="Search...">
            <div id="LayerDocQuerys" class="tease">
                <!-- show document  -->
                <?php 
                while ($LayerDocRow = mysqli_fetch_array($LayerDocQuery)) {
                    include 'components/tease/tease--doc.php';
                } ?>
            </div>
        </form>
    </aside>
    
</body>
</html>